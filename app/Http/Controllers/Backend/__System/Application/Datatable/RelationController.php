<?php

namespace App\Http\Controllers\Backend\__System\Application\Datatable;

use App\Http\Controllers\Controller;
use App\Http\Traits\HandlesFormRequest;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use DataTables;
use Redirect, Response;
use Illuminate\Routing\Controllers\HasMiddleware;

use App\Http\Requests\Backend\__System\Application\Datatable\Relation\StoreRequest;
use App\Http\Requests\Backend\__System\Application\Datatable\Relation\UpdateRequest;

class RelationController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'verified']; }

  use DefaultController;
  use ExtensionController;
  use HandlesFormRequest;

  public function __construct() {
    $this->model      = 'App\Models\Backend\__System\Application\Datatable\Relation';
    $this->path       = 'pages.backend.__system.application.datatable.relation.';
    $this->url        = '/dashboard/applications/datatables/relations';
    $this->sort       = false;

    app()->instance('current.model', $this->model);
    app()->instance('current.url', $this->url);

    $this->middleware(function ($request, $next) {
      $user = auth()->user();
      $action = $request->route()->getActionMethod();
      if ($user->hasRole('user') && in_array($action, ['index', 'show', 'chart'])) { return $next($request); }
      else if ($user->hasRole('master-administrator')) { return $next($request); }
      else {
        if(request()->ajax()){ return response()->json(['status' => 'error', 'message' => __('default.notification.error.restrict')], 403); }
        $message = __('default.notification.error.restrict');
        if(is_array($message)){ $message = implode(', ', $message); }
        session()->flash('error', $message);
        return redirect($this->url);
      }
      return $next($request);
    });
  }

  public function store(StoreRequest $request) {}
  public function update(UpdateRequest $request, $id) {}

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $statusName = property_exists($this, 'status') && $this->status ? $this->status : 'default';
    $statusFilter = \DB::table('system_status_filters')->where('name', $statusName)->first();
    $attributes = json_decode($statusFilter->properties ?? '[]', true);

    $model = $this->model;
    $sort = $this->sort;

    if (request()->ajax()) {
      $query = $this->model::query();

      if (request('date')) { $query->whereDate('date', request('date')); }
      if (request('date_start') && request('date_end')) { $query->whereBetween('date_start', [request('date_start'), request('date_end')]); }

      return DataTables::of($query)
      ->addIndexColumn()
      ->editColumn('date', function ($order) { return empty($order->date) ? NULL : \Carbon\Carbon::parse($order->date)->format('d F Y, H:i'); })
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->editColumn('file', function ($order) {
        if (!$order->file) { return '<span class="text-muted"> - </span>'; }
        $imgUrl = env("APP_URL") . '/storage/files/form-uploads/' . $order->file;
        $modalId = 'modal-file-' . $order->id;
        return <<<HTML
        <a href="javascript:void(0);" data-toggle="modal" data-target="#$modalId"><span class="fas fa-file-image text-success"></span></a>
        <div class="modal fade" id="$modalId" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Preview Image</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><i aria-hidden="true" class="ki ki-close"></i></button></div>
        <div class="modal-body"><img width="100%" data-src="$imgUrl" class="lazy-img" loading="lazy" alt="Preview"></div>
        </div></div></div>
        HTML;
        return str_replace(['__DOWNLOAD__', '__CLOSE__'], [__('default.label.download'), __('default.label.close')], $html);
      })
      ->rawColumns(['file'])
      ->make(true);
    }
    return view($this->path . 'index', compact(['attributes', 'model', 'sort']));
  }

}
