<?php

namespace App\Http\Controllers\Backend\__System\Administrative;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;

class SessionController extends Controller {

  function __construct() {
    $this->middleware('auth');
    $this->model = 'App\Models\Backend\__System\Administrative\Session';
    $this->path = 'pages.backend.__system.administrative.session.';
    $this->url = '/dashboard/administrative/sessions';
    $this->RequestStore = [];
    $this->RequestUpdate = [];
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::get(); }
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
      ->editColumn('user_id', function ($order) {
        if (!empty($order->user_id)) {
          $data = \App\Models\User::where('id', $order->user_id)->first();
          return $data->name . '<br>' . $data->email . '<br>' . $data->phone;
        }
      })
      ->editColumn('last_activity', function ($order) {
        $data = $order->last_activity;
        $datetime = date("d F Y, H:i:s", $data);
        return $datetime;
      })
      ->rawColumns(['user_id'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return RESET
  **************************************************
  **/

  public function reset() {
    $data = $this->model::truncate();
    return Response::json($data);
  }

}
