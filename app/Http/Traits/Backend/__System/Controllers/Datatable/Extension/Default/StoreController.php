<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default;

use Illuminate\Http\Request;

trait StoreController {

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(Request $request) {
    $validated = $request->validate($this->RequestStore);
    $store = $request->all();
    $this->model::create($store);
    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

}
