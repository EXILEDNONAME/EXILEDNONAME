<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default;

use Illuminate\Http\Request;

trait DestroyController {

  /**
  **************************************************
  * @return DESTROY
  **************************************************
  **/

  public function destroy($id) {
    try {
      $this->model::destroy($id);
      return redirect($this->url)->with('success', __('default.notification.success.item-deleted'));
    } catch (\Exception $e) {
      return redirect($this->url)->with('error', __('default.notification.error'));
    }
  }

}
