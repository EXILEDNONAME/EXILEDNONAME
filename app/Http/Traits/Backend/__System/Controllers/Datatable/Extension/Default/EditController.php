<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default;

use Illuminate\Http\Request;

trait EditController {

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

}
