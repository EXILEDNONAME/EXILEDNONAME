<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.frontend.index'); });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// APPLICATIONS - DATATABLES
Route::group([
  'as' => 'dashboard.application.datatable.',
  'prefix' => 'dashboard/applications/datatables',
  'namespace' => 'App\Http\Controllers\Backend\__Application\Datatable',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'GeneralController@active')->name('active');
  Route::get('activities', 'GeneralController@activity')->name('activity');
  Route::get('delete/{id}', 'GeneralController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'GeneralController@delete_permanent')->name('delete-permanent');
  Route::get('inactive/{id}', 'GeneralController@inactive')->name('inactive');
  Route::get('selected-active', 'GeneralController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'GeneralController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'GeneralController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'GeneralController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('restore/{id}', 'GeneralController@restore')->name('restore');
  Route::get('selected-restore', 'GeneralController@selected_restore')->name('selected-restore');
  Route::get('trash', 'GeneralController@trash')->name('trash');
  Route::resource('/', 'GeneralController')->parameters(['' => 'id']);
});

// SETTINGS - PROFILES
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

// DASHBOARD
Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/file-manager', [App\Http\Controllers\Backend\DashboardController::class, 'file_manager'])->name('dashboard.file-manager');
Route::get('dashboard/logout', [App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('dashboard.logout');

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

// ADMINISTRATIVE - MANAGEMENT PERMISSIONS
Route::group([
  'as' => 'dashboard.system.administrative.management.permissions.',
  'prefix' => 'dashboard/administrative/managements/permissions',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Management',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'PermissionController@active')->name('active');
  Route::get('activities', 'PermissionController@activity')->name('activity');
  Route::get('inactive/{id}', 'PermissionController@inactive')->name('inactive');
  Route::get('delete/{id}', 'PermissionController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'PermissionController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'PermissionController@restore')->name('restore');
  Route::get('trash', 'PermissionController@trash')->name('trash');
  Route::get('selected-active', 'PermissionController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'PermissionController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'PermissionController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'PermissionController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'PermissionController@selected_restore')->name('selected-restore');
  Route::resource('/', 'PermissionController')->parameters(['' => 'id']);
});

// ADMINISTRATIVE - MANAGEMENT ROLES
Route::group([
  'as' => 'dashboard.system.administrative.management.roles.',
  'prefix' => 'dashboard/administrative/managements/roles',
  'namespace' => 'App\Http\Controllers\Backend\__System\Administrative\Management',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'RoleController@active')->name('active');
  Route::get('activities', 'RoleController@activity')->name('activity');
  Route::get('inactive/{id}', 'RoleController@inactive')->name('inactive');
  Route::get('delete/{id}', 'RoleController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'RoleController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'RoleController@restore')->name('restore');
  Route::get('trash', 'RoleController@trash')->name('trash');
  Route::get('selected-active', 'RoleController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'RoleController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'RoleController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'RoleController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'RoleController@selected_restore')->name('selected-restore');
  Route::resource('/', 'RoleController')->parameters(['' => 'id']);
});

// ADMINISTRATIVE - MANAGEMENT USERS
Route::group([
  'as' => 'dashboard.system.administrative.management.users.',
  'prefix' => 'dashboard/administrative/managements/users',
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
