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


// DATATABLES - GENERALS
Route::group([
  'as' => 'dashboard.system.application.datatable.generals.',
  'prefix' => 'dashboard/applications/datatables/generals',
  'namespace' => 'App\Http\Controllers\Backend\__System\Application\Datatable',
  'middleware' => ['auth', 'web']
], function () {
  Route::get('active/{id}', 'GeneralController@active')->name('active');
  Route::get('activities', 'GeneralController@activity')->name('activity');
  Route::get('inactive/{id}', 'GeneralController@inactive')->name('inactive');
  Route::get('delete/{id}', 'GeneralController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'GeneralController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'GeneralController@restore')->name('restore');
  Route::get('trash', 'GeneralController@trash')->name('trash');
  Route::get('selected-active', 'GeneralController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'GeneralController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'GeneralController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'GeneralController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'GeneralController@selected_restore')->name('selected-restore');
  Route::resource('/', 'GeneralController')->parameters(['' => 'id']);
});

// ADMINISTRATIVE - MANAGEMENT USERS
Route::group([
  'as' => 'dashboard.system.administrative.management.users.',
  'prefix' => 'dashboard/administratives/managements/users',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Management',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'UserController@active')->name('active');
  Route::get('activities', 'UserController@activity')->name('activity');
  Route::get('inactive/{id}', 'UserController@inactive')->name('inactive');
  Route::get('delete/{id}', 'UserController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'UserController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'UserController@restore')->name('restore');
  Route::get('trash', 'UserController@trash')->name('trash');
  Route::get('selected-active', 'UserController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'UserController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'UserController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'UserController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'UserController@selected_restore')->name('selected-restore');
  Route::resource('/', 'UserController')->parameters(['' => 'id']);
});

// ADMINISTRATIVE - SESSIONS
Route::group([
  'as' => 'dashboard.system.administrative.sessions.',
  'prefix' => 'dashboard/administratives/sessions',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative',
  'middleware' => 'auth',
], function () {
  Route::get('reset', 'SessionController@reset')->name('reset');
  Route::get('/', 'SessionController@index');
});
