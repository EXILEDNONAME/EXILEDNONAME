<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Management;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;

class UserController extends Controller {

  use DefaultController;

  function __construct() {
    $this->middleware(['auth', 'role:master-administrator']);
    $this->model = 'App\Models\User';
    $this->path = 'pages.backend.__system.administrative.management.user.';
    $this->url = '/dashboard/administrative\managements\users';
    $this->sort = 1;
    $this->RequestStore = [
      'name'  => 'required|unique:users',
    ];
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
    if(!(strcmp($request->get('password'), $request->get('confirm-password'))) == 0){
      return redirect()->back()->with('error', __('default.notification.error.password-confirm'));
    }
    $this->model::create($store);
    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request, $id) {
    if ($id == 1) { return redirect($this->url)->with('error', __('default.notification.error.restrict')); }
    else {
      $data = $this->model::findOrFail($id);
      $validated = $request->validate($this->UpdateRequest);
      $update = $request->all();
      $data->update($update);
    }
    return redirect($this->url)->with('success', __('default.notification.success.item-updated'));
  }

  /**
  **************************************************
  * @return DESTROY
  **************************************************
  **/

  public function destroy($id) {
    if ($id == 1) { return redirect($this->url)->with('error', __('default.notification.error.restrict')); }
    else {
      try {
        $this->model::destroy($id);
        return redirect($this->url)->with('success', __('default.notification.success.item-deleted'));
      } catch (\Exception $e) {
        return redirect($this->url)->with('error', __('default.notification.error'));
      }
    }
  }

  /**
  **************************************************
  * @return DELETE
  **************************************************
  **/

  public function delete($id) {
    if ($id == 1) {
      $data = 'RESTRICT!';
      return Response::json($data, 500);
    }
    else {
      $this->model::destroy($id);
      $data = $this->model::where('id',$id)->delete();
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return SELECTED-DELETE
  **************************************************
  **/

  public function selected_delete(Request $request) {
    $data = "0," . $request->EXILEDNONAME;
    $array = explode(",", $data);

    if (array_search("1", $array)){
      $data = 'RESTRICT!';
      return Response::json($data, 500);
    }
    else {
      $data = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$data))->delete();
      return Response::json($data);
    }

  }

}
