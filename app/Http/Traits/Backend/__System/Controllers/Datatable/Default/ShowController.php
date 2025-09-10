<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Default;

trait ShowController {

  /**
  **************************************************
  * @return SHOW
  **************************************************
  **/

  public function show($id) {
    $url = $this->url;
    $model = $this->model;
    $data = $this->model::find($id);

    if (!$data) {
        return redirect()->back()->with('error', __('default.notification.error.item_not_found'));
    }

    return view($this->path . 'show', compact('data', 'model', 'url'));
  }

}
