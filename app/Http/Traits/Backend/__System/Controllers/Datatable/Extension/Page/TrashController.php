<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Page;

use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;
use Spatie\Activitylog\Models\Activity;

trait TrashController {

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

}
