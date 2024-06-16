<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/layout', function () {
  return view('layouts.default');
});

// APPLICATIONS - DATATABLES
Route::group([
  'as' => 'dashboard.application.datatable.',
  'prefix' => 'dashboard/applications/datatables',
  'namespace' => 'App\Http\Controllers\Backend\__Application\Datatable',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'GeneralController@active')->name('active');
  Route::get('activities', 'GeneralController@activity')->name('activity');
  Route::get('inactive/{id}', 'GeneralController@inactive')->name('inactive');
  Route::get('trash', 'GeneralController@trash')->name('trash');
  Route::resource('/', 'GeneralController')->parameters(['' => 'id']);
});

Route::group([
  'as' => 'dashboard.system.setting.profile.',
  'prefix' => 'dashboard/settings/profiles',
  'namespace' => 'App\Http\Controllers\Backend\__System\Setting',
  'middleware' => 'auth',
], function () {
  Route::get('/', 'ProfileController@index')->name('index');
  Route::get('account-informations', 'ProfileController@account_information')->name('account-information');
  Route::patch('account-informations/update/{id}', 'ProfileController@account_information_update')->name('account-information-update');
  Route::get('change-password', 'ProfileController@change_password')->name('change-password');
  Route::post('update-password', 'ProfileController@update_password')->name('update-password');
});

// LOGOUT
Route::get('dashboard/logout', [App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('dashboard.logout');
Route::get('/dashboard/file-manager', [App\Http\Controllers\Backend\DashboardController::class, 'file_manager'])->name('dashboard.file-manager');

// ADMINISTRATIVE - SETTINGS
Route::get('/dashboard/administrative/applications/settings', [App\Http\Controllers\Backend\__System\Administrative\Application\SettingController::class, 'index'])->name('dashboard.administrative.application.setting.index');
Route::patch('/dashboard/administrative/applications/settings/update/{id}', [App\Http\Controllers\Backend\__System\Administrative\Application\SettingController::class, 'update'])->name('dashboard.administrative.application.setting.update');

// ADMINISTRATIVE - SESSIONS
Route::group([
  'as' => 'dashboard.system.administrative.sessions.',
  'prefix' => 'dashboard/administrative/sessions',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative',
  'middleware' => 'auth',
], function () {
  Route::get('reset', 'SessionController@reset')->name('reset');
  Route::get('/', 'SessionController@index');
});
