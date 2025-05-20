<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Response;

class CustomizationController extends Controller {

  public function __construct() {
    $this->middleware(['auth', 'role:master-administrator']);
  }

  public function index() {
    $data = \App\Models\Backend\__System\Administrative\Application\Customization::first();
    return view('pages.backend.__system.administrative.application.customization.index', compact('data'));
  }

  public function update(Request $request, $id) {
    \App\Models\Backend\__System\Administrative\Application\Customization::where('id', $id)->update([
      'sticky_toolbar' => $request->get('sticky_toolbar'),
    ]);
    return redirect('/dashboard/administrative/applications\customizations')->with('success', __('default.notification.success.customization-updated'));
  }

}
