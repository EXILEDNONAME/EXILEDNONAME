<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/file-manager', [App\Http\Controllers\Backend\DashboardController::class, 'file_manager'])->name('dashboard.file-manager');
Route::get('/dashboard/language/{language}', [App\Http\Controllers\Backend\DashboardController::class, 'language'])->name('language');
Route::get('/dashboard/logout', [App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('dashboard.logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

include(base_path(). '/routes/backend/__system/application.php');
include(base_path(). '/routes/backend/__system/administrative.php');
