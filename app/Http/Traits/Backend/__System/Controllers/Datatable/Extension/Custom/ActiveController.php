<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom;

use Illuminate\Http\Request;
use Redirect, Response;

trait ActiveController {

  /**
  **************************************************
  * @return ACTIVE
  **************************************************
  **/

  public function active($id) {
    $data = $this->model::where('id', $id)->update([ 'active' => 1 ]);
    return Response::json($data);
  }

}
