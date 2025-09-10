<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('pages.frontend.index');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/backend/language.php';
require __DIR__.'/backend/administrative/application.php';
require __DIR__ . '/backend/application/datatable.php';
require __DIR__.'/backend/administrative/database.php';


Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/file-manager', [App\Http\Controllers\Backend\DashboardController::class, 'file_manager'])->name('dashboard.file-manager');
Route::get('/dashboard/language/{language}', [App\Http\Controllers\Backend\DashboardController::class, 'language'])->name('language');
Route::get('/dashboard/logout', [App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('dashboard.logout');

Route::get('/test-download/{slug}', function($slug) {
    dd('Test route works with slug: ' . $slug);
});

// DASHBOARD - PROFILES
Route::get('/dashboard/profiles', function () { return redirect('/dashboard/profiles/account-informations'); });
Route::get('/dashboard/profiles/account-informations', [App\Http\Controllers\Backend\__System\ProfileController::class, 'account_information'])->name('dashboard.profile.account-information');
Route::patch('/dashboard/profiles/account-informations/update/{id}', [App\Http\Controllers\Backend\__System\ProfileController::class, 'account_information_update'])->name('dashboard.profile.account-information-update');
Route::get('/dashboard/profiles/change-password', [App\Http\Controllers\Backend\__System\ProfileController::class, 'change_password'])->name('dashboard.profile.change-password');
Route::post('/dashboard/profiles/update-password', [App\Http\Controllers\Backend\__System\ProfileController::class, 'update_password'])->name('dashboard.profile.update-password');
Route::get('/dashboard/profiles/account-informations/generate-new-token', [App\Http\Controllers\Backend\__System\ProfileController::class, 'generate_new_token'])->name('dashboard.profile.account-information.generate-new-token');


Route::get('/test-role', function() {
    $user = auth()->user();
    
    if (!$user) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
    }
    
    // Debug: lihat semua role user
    dd([
        'user_id' => $user->id,
        'user_name' => $user->name,
        'roles' => $user->roles->pluck('name')->toArray(), // Jika pakai Spatie
        'has_test_role' => $user->hasRole('master-administrator'), // Jika pakai Spatie
        'is_admin' => $user->hasRole('master-administrator')
    ]);
    });
