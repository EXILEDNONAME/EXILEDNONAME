<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware;

use App\Http\Traits\Backend\__System\Widgets\GameController;
use App\Http\Traits\Backend\__System\Widgets\DatatableController;
use App\Http\Traits\Backend\__System\Widgets\CustomController;

class DashboardController extends Controller{

  public static function middleware(): array { return ['auth', 'verified']; }

  use GameController;
  use DatatableController;
  use CustomController;

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
