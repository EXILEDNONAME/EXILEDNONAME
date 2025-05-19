<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Management;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;
use App\Http\Requests\Backend\__System\Administrative\Management\User\StoreRequest;
use App\Http\Requests\Backend\__System\Administrative\Management\User\UpdateRequest;

class UserController extends Controller {

  function __construct() {
    $this->model = 'App\Models\User';
    $this->path = 'pages.backend.__system.administrative.management.user.';
    $this->url = '/dashboard/administratives\managements\users';
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::get(); }
  }

  public function index() {
    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return SHOW
  **************************************************
  **/

  public function show($id) {
    $url = $this->url;
    $model = $this->model;
    $data = $this->model::findOrFail($id);
    return view($this->path . 'show', compact('data', 'model', 'url'));
  }

  /**
  **************************************************
  * @return CREATE
  **************************************************
  **/

  public function create() {
    $url = $this->url;
    $path = $this->path;
    return view($this->path . 'create', compact('path', 'url'));
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(StoreRequest $request) {
    $store = $request->all();
    if(!(strcmp($request->get('password'), $request->get('confirm-password'))) == 0){
      return redirect()->back()->with('error', __('default.notification.error.password-confirm'));
    }
    $this->model::create($store);
    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return EDIT
  **************************************************
  **/

  public function edit($id) {
    $url = $this->url;
    $path = $this->path;
    $model = $this->model;
    $data = $this->model::findOrFail($id);
    return view($this->path . 'edit', compact('path', 'data', 'model', 'url'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(UpdateRequest $request, $id) {
    if ($id == 1) { return redirect($this->url)->with('error', __('default.notification.error.restrict')); }
    else {
      $data = $this->model::findOrFail($id);
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
