<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Page;

use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;
use Spatie\Activitylog\Models\Activity;

trait ActivityController {

  /**
  **************************************************
  * @return ACTIVITIES
  **************************************************
  **/

  public function activity() {
    if (request('date_start') && request('date_end')) { $this->data = Activity::where('subject_type', $this->model)->orderby('updated_at', 'desc')->whereBetween('updated_at', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = Activity::where('subject_type', $this->model)->orderby('updated_at', 'desc')->get(); }

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

}
