<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Response;
use Illuminate\Support\Facades\Storage;
use Shuchkin\SimpleXLSX;

use App\Models\Backend\Schedule\IndonesiaContentFestival;
use App\Models\Backend\Schedule\ContentChallenge;
use App\Models\Backend\Schedule\ECommerce;
use App\Models\Backend\Schedule\SpecialTalentLiveHouse;

class DashboardController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('pages.backend.dashboard');
  }

  public function file_manager() {
    return view('pages.backend.__system.file-manager.index');
  }

  public function language($language = '') {
    request()->session()->put('locale', $language);
    return redirect()->back();
  }

  public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }

}
