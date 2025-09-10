<?php
namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Routing\Controllers\HasMiddleware;

class CustomizationController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'verified']; }

  public function __construct() {
    $this->model  = 'App\Models\Backend\__System\Administrative\Application\Customization';
    $this->path   = 'pages.backend.__system.administrative.application.customization.';
    $this->data   = $this->model::get();
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $data = $this->model::first();
    return view($this->path . 'index', compact('data'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request) {
    $updated = $this->model::where('id', 1)->update([
      'sticky_toolbar'       => $request->get('sticky_toolbar'),
      'topbar_search'        => $request->get('topbar_search'),
      'topbar_notifications' => $request->get('topbar_notifications'),
      'topbar_quick_actions' => $request->get('topbar_quick_actions'),
      'topbar_cart'          => $request->get('topbar_cart'),
      'topbar_chat'          => $request->get('topbar_chat'),
    ]);

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
