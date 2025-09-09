<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Redirect, Response;

trait SelectedInactiveController {

  /**
  **************************************************
  * @return SELECTED_INACTIVE
  **************************************************
  **/

  public function selected_inactive(Request $request) {
    if (Auth::User()->id != 1 && Auth::User()->id != 2 && $this->model::where('id', $id)->first()->created_by != Auth::User()->id) {
        $data = 'ACCESS RESTRICT!';
        return Response::json($data, 403);
    }
    else {
      $data = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$data))->update(['active' => 0]);
      Cache::forget($this->url);
      return Response::json($data);
    }
  }

}
