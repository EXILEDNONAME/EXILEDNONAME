<?php
namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Routing\Controllers\HasMiddleware;

class SettingController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'verified']; }

  public function __construct() {
    $this->model  = 'App\Models\Backend\__System\Administrative\Application\Setting';
    $this->path   = 'pages.backend.__system.administrative.application.setting.';
    $this->data   = $this->model::get();
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $data = $this->model::first();
    return view('pages.backend.__system.administrative.application.setting.index', compact('data'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request) {
    $updated = $this->model::where('id', 1)->update(['application_name' => $request->get('application_name'), 'application_version' => $request->get('application_version')]);
    \Artisan::call('cache:clear');

    if ($updated) {
      return response()->json([
        'status'  => 'success',
        'message' => __('default.notification.success.setting-updated'),
      ], 200);
    }

    return response()->json([
      'status'  => 'error',
      'message' => __('default.notification.error.failed'),
    ], 500);
  }

}
