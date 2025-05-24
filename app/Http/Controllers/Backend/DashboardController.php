<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class DashboardController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth']; }

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
