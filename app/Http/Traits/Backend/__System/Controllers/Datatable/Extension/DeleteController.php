<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Auth;
use Illuminate\Support\Facades\Cache;
use Redirect, Response;

trait DeleteController {

  /**
  **************************************************
  * @return DELETE
  **************************************************
  **/

  public function delete($id = null) {
    if (!$id) {
        return redirect('/dashboard')->with('error', __('default.notification.error.restrict'));
    }
    
    if (Auth::User()->id != 1 && Auth::User()->id != 2 && $this->model::where('id', $id)->first()->created_by != Auth::User()->id) {
        $data = 'ACCESS RESTRICT!';
        return Response::json($data, 403);
    }
    else {
      $this->model::destroy($id);
      $data = $this->model::where('id', $id)->delete();
      Cache::forget($this->url);
      return Response::json($data);
    }
  }

}
