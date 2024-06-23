<?php

namespace App\Http\Controllers\Backend\__Application\Datatable;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;
use Spatie\Activitylog\Models\Activity;

class GeneralController extends Controller {

  function __construct() {
    $this->middleware(['auth']);
    $this->model = 'App\Models\Backend\__Application\Datatable\General';
    $this->path = 'pages.backend.__application.datatable.general.';
    $this->url = '/dashboard/applications/datatables';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date', 'desc')->whereBetween('date', [request('date_start'), request('date_end')])->get(); }
    else if (!empty($this->model::get('date'))) { $this->data = $this->model::orderby('date', 'desc')->get(); }
    else { $this->data = $this->model::get(); }
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    $sort = $this->sort;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date', function ($order) { return empty($order->date) ? NULL : \Carbon\Carbon::parse($order->date)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'date'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model', 'sort'));
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
    $path = $this->path;
    $url = $this->url;
    return view($this->path . 'create', compact('path', 'url'));
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(Request $request) {
    $validated = $request->validate($this->RequestStore);
    $store = $request->all();
    $this->model::create($store);
    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return EDIT
  **************************************************
  **/

  public function edit($id) {
    $data = $this->model::findOrFail($id);
    $path = $this->path;
    $model = $this->model;
    $url = $this->url;
    return view($this->path . 'edit', compact('path', 'data', 'model', 'url'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request, $id) {
    $data = $this->model::findOrFail($id);
    $update = $request->all();
    $data->update($update);
    return redirect($this->url)->with('success', __('default.notification.success.item-updated'));
  }

  /**
  **************************************************
  * @return DESTROY
  **************************************************
  **/

  public function destroy($id) {
    try {
      $this->model::destroy($id);
      return redirect($this->url)->with('success', __('default.notification.success.item-deleted'));
    } catch (\Exception $e) {
      return redirect($this->url)->with('error', __('default.notification.error'));
    }
  }

  /**
  **************************************************
  * @return INACTIVE
  **************************************************
  **/

  public function inactive($id) {
    $data = $this->model::where('id', $id)->update([ 'active' => 0 ]);
    return Response::json($data);
  }

  /**
  **************************************************
  * @return ACTIVITIES
  **************************************************
  **/

  public function activity() {
    if (request('date_start') && request('date_end')) { $this->data = Activity::where('subject_type', $this->model)->orderby('updated_at', 'desc')->whereBetween('updated_at', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = Activity::where('subject_type', $this->model)->orderby('updated_at', 'desc')->get(); }

    // $data = ::->orderby('updated_at', 'desc')->get();

    $model = $this->model;
    $sort = $this->sort;
    $url = $this->url;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('subjects', function($order) { if(!empty($order->properties['attributes']['name'])) { return $order->properties['attributes']['name']; } else { return ''; }})
      ->editColumn('causer_id', function($order) { return $order->causer->name; })
      ->editColumn('updated_at', function($order) { return \Carbon\Carbon::parse($order->updated_at)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'activity', compact('model', 'sort', 'url'));
  }

  /**
  **************************************************
  * @return DELETE
  **************************************************
  **/

  public function delete($id) {
    $this->model::destroy($id);
    $data = $this->model::where('id', $id)->delete();
    return Response::json($data);
  }

  /**
  **************************************************
  * @return RESTORE
  **************************************************
  **/

  public function restore($id) {
    $data = $this->model::withTrashed()->findOrFail($id);
    if ($data->trashed()) {
      $data->restore();
      $data = $this->model::where('id', $id)->update(['deleted_at' => NULL]);
      return Response::json($data);
    } else { return Response::json($data);}
  }

  /**
  **************************************************
  * @return SELECTED-RESTORE
  **************************************************
  **/

  public function selected_restore(Request $request) {
    $data = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$data))->restore();
    return Response::json($data);
  }

  /**
  **************************************************
  * @return TRASH
  **************************************************
  **/

  public function trash() {
    if (request('date_start') && request('date_end')) { $this->data = $this->model::onlyTrashed()->whereBetween('deleted_at', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::onlyTrashed()->get(); }

    $url = $this->url;
    if(request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('deleted_at', function($order) { return \Carbon\Carbon::parse($order->deleted_at)->format('d F Y, H:i'); })
      ->rawColumns(['description'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'trash', compact('url'));
  }

  /**
  **************************************************
  * @return SELECTED-ACTIVE
  **************************************************
  **/

  public function selected_active(Request $request) {
    $data = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$data))->update(['active' => 1]);
    return Response::json($data);
  }

  /**
  **************************************************
  * @return SELECTED-INACTIVE
  **************************************************
  **/

  public function selected_inactive(Request $request) {
    $data = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$data))->update(['active' => 0]);
    return Response::json($data);
  }


}
