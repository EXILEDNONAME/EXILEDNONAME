<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom;

use Illuminate\Http\Request;
use Redirect, Response;

trait InactiveController {

  /**
  **************************************************
  * @return INACTIVE
  **************************************************
  **/

  public function inactive($id) {
    $data = $this->model::where('id', $id)->update([ 'active' => 0 ]);
    return Response::json($data);
  }

}
