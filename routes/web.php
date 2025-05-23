<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('pages.frontend.index');
});

require __DIR__.'/auth.php';

include(base_path(). '/routes/backend/__system/administrative.php');
include(base_path(). '/routes/backend/__system/application.php');
include(base_path(). '/routes/backend/__system/dashboard.php');
include(base_path(). '/routes/backend/__system/profile.php');
