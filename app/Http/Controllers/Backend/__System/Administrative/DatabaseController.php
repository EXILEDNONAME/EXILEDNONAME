<?php

namespace App\Http\Controllers\Backend\__System\Administrative;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;
use Ifsnop\Mysqldump as IMysqldump;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;

class DatabaseController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'verified']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__System\Administrative\Database';
    $this->path = 'pages.backend.__system.administrative.database.';
    $this->url = '/dashboard/administratives/databases';
    $this->data = $this->model::orderby('date', 'desc')->get();
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('date', function ($order) { return empty($order->date) ? NULL : \Carbon\Carbon::parse($order->date)->format('d F Y, H:i:s'); })
      ->editColumn('download', function ($order) {
        $url = $this->url . "/download/" . $order->name;
        return '<a href="'.$url.'"><i class="fas fa-download text-danger"></i></a>';
      })
      ->rawColumns(['download'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return CREATE_BACKUP
  **************************************************
  **/

  public function create_backup() {
    $filename = 'database-'.date('Y-m-d_H-i-s').'.sql';

    $this->model::insert([
      'name'          => $filename,
      'date'          => \Carbon\Carbon::now(),
      'path'          => '',
    ]);

    if (!Storage::disk('local')->exists('private/backups')) {
      Storage::disk('local')->makeDirectory('private/backups', 0755, true);
    }

    $path = storage_path("app/private/backups/{$filename}");
    $mysql = config('database.connections.mysql');
    $dump = new IMysqldump\Mysqldump("mysql:host={$mysql['host']};dbname={$mysql['database']}", $mysql['username'], $mysql['password']);
    $dump->start($path);

    return Response::json($path);
  }

  /**
  **************************************************
  * @return DOWNLOAD
  **************************************************
  **/

  public function download($slug) {
    $path = 'backups/' . $slug;
    if (!Storage::disk('local')->exists($path)) {
      abort(404, 'File not found');
    }
    return Storage::disk('local')->download($path);
  }

  /**
  **************************************************
  * @return RESET
  **************************************************
  **/

  public function reset() {
    $files = Storage::disk('local')->files('backups');

    if (empty($files)) {
      return response()->json([
        'status' => 'info',
        'message' => 'Tidak ada file backup untuk dihapus.'
      ]);
    }

    Storage::disk('local')->delete($files);

    $data = $this->model::truncate();
    return Response::json($data);
  }

}
