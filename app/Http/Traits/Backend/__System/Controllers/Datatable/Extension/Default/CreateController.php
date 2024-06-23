<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default;

use Illuminate\Http\Request;

trait CreateController {

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

}
