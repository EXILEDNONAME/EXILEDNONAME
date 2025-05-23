<?php

namespace App\Http\Controllers\Backend\__Main;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use DataTables;
use Illuminate\Routing\Controllers\HasMiddleware;

use App\Http\Requests\Backend\__Main\AccessPoint\StoreRequest;
use App\Http\Requests\Backend\__Main\AccessPoint\UpdateRequest;

class AccessPointController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth']; }

  public function __construct() {
    $this->model = 'App\Models\Backend\__Main\AccessPoint';
    $this->path = 'pages.backend.__main.access-point.';
    $this->url = '/dashboard/access-points';
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::get(); }
  }

  use DefaultController;
  use ExtensionController;

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(StoreRequest $request) {
    $store = $request->all();
    $this->model::create($store);
    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(UpdateRequest $request, $id) {
    $data = $this->model::findOrFail($id);
    $update = $request->all();
    $data->update($update);
    return redirect($this->url)->with('success', __('default.notification.success.item-updated'));
  }

}
