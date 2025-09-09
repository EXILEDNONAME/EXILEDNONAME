<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Auth;
use Illuminate\Support\Facades\Cache;
use Redirect, Response;

trait ActiveController {

  /**
  **************************************************
  * @return ACTIVE
  **************************************************
  **/

  public function active($id) {
    if (Auth::User()->id != 1 && Auth::User()->id != 2 && $this->model::where('id', $id)->first()->created_by != Auth::User()->id) {
        $data = 'ACCESS RESTRICT!';
        return Response::json($data, 403);
    }
    else {
      $data = $this->model::where('id', $id)->update(['active' => 1]);
      Cache::forget($this->url);
      return Response::json($data);
    }
  }

}
