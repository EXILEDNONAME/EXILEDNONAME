<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Management;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;

class PermissionController extends Controller {

  use DefaultController;

  function __construct() {
    $this->middleware('auth');
    $this->model = 'App\Models\Permission';
    $this->path = 'pages.backend.__system.administrative.management.permission.';
    $this->url = '/dashboard/administrative\managements\permissions';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('created_at', 'desc')->whereBetween('created_at', [request('date_start'), request('date_end')])->get(); }
    else if (!empty($this->model::get('created_at'))) { $this->data = $this->model::orderby('created_at', 'desc')->get(); }
    else { $this->data = $this->model::get(); }
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(Request $request) {
    $validated = $request->validate($this->RequestStore);
    $store = $request->all();
    $store['guard_name'] = 'web';
    $this->model::create($store);
    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

}
