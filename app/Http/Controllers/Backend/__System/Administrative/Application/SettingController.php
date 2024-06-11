<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Response;

class SettingController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  /**
  **************************************************
  * @return Index
  **************************************************
  **/

  public function index() {
    $data = \App\Models\Backend\__System\Administrative\Application\Setting::first();
    return view('pages.backend.__system.administrative.application.setting.index', compact('data'));
  }

  public function update(Request $request, $id) {
    \App\Models\Backend\__System\Administrative\Application\Setting::where('id', $id)->update([
      'application_name' => $request->get('application_name'),
      'application_version' => $request->get('application_version'),
    ]);
    return redirect('/dashboard/administrative/applications/settings')->with('success', __('default.notification.success.setting-updated'));
  }

}
