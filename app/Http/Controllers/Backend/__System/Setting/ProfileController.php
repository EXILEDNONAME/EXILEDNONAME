<?php

namespace App\Http\Controllers\Backend\__System\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Auth;

class ProfileController extends Controller {

  public function __construct() {
    $this->middleware('auth');
    $this->model = 'App\Models\User';
  }

  /**
  **************************************************
  * @return Index
  **************************************************
  **/

  public function index() {
    return redirect('dashboard/settings/profile/account-informations');
  }

  /**
  **************************************************
  * @return Account-Informations
  * @return Change-Password
  **************************************************
  **/

  public function account_information() {
    $data = $this->model::where('id', Auth::User()->id)->first();
    return view('pages.backend.__system.setting.profile.account-information', compact('data'));
  }

  public function account_information_update(Request $request, $id) {
    $this->model::where('id', $id)->update([
      'name' => $request->get('name'),
      'email' => $request->get('email'),
      'phone' => $request->get('phone'),
      'address' => $request->get('address'),
    ]);
    return redirect()->back()->with('success', __('default.notification.success.profile-updated'));
  }

  public function change_password() {
    return view('pages.backend.__system.setting.profile.change-password');
  }

  public function update_password(Request $request) {
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
      return redirect()->back()->with('error', __('default.notification.error.password-current'));
    }

    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
      return redirect()->back()->with('error', __('default.notification.error.password-new'));
    }

    if(!(strcmp($request->get('new-password'), $request->get('confirm-password'))) == 0){
      return redirect()->back()->with('error', __('default.notification.error.password-confirm'));
    }

    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();

    return redirect()->back()->with('success', __('default.notification.success.password-changed'));
  }

}
