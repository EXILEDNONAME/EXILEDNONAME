<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Redirect, Response;

trait SelectedDeleteController {

  /**
  **************************************************
  * @return SELECTED-DELETE
  **************************************************
  **/

  public function selected_delete(Request $request) {
    if (Auth::User()->id != 1 && Auth::User()->id != 2 && $this->model::where('id', $id)->first()->created_by != Auth::User()->id) {
        $data = 'ACCESS RESTRICT!';
        return Response::json($data, 403);
    }
    else {
      $data = $request->EXILEDNONAME;
      $data2 = $this->model::whereIn('id',explode(",",$data))->get();
      foreach ($data2 as $data3) {
        $this->model::destroy($data3->id);
      }
      Cache::forget($this->url);
      return Response::json($data);
    }
  }

}
