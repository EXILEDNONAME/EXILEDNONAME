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

Route::group([
  'as' => 'main.access-points.',
  'prefix' => 'dashboard/access-points',
  'namespace' => 'App\Http\Controllers\Backend\__Main',
], function(){
  Route::get('active/{id}', 'AccessPointController@active')->name('active');
  Route::get('inactive/{id}', 'AccessPointController@inactive')->name('inactive');
  Route::get('restore/{id}', 'AccessPointController@restore')->name('restore');
  Route::get('restoreall', 'AccessPointController@restoreall')->name('restore-all');
  Route::get('delete-permanent/{id}', 'AccessPointController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'AccessPointController@delete_permanentall')->name('delete-permanentall');
  Route::get('delete/{id}', 'AccessPointController@delete')->name('delete');
  Route::get('deleteall', 'AccessPointController@deleteall')->name('delete-all');
  Route::get('activities', 'AccessPointController@activity')->name('activity');
  Route::get('trash', 'AccessPointController@trash')->name('trash');
  Route::resource('/', 'AccessPointController')->parameters(['' => 'id']);
});
Route::group([
  'as' => 'main.access-points.',
  'prefix' => 'dashboard/access-points',
  'namespace' => 'App\Http\Controllers\Backend\__Main',
], function(){
  Route::get('active/{id}', 'AccessPointController@active')->name('active');
  Route::get('inactive/{id}', 'AccessPointController@inactive')->name('inactive');
  Route::get('restore/{id}', 'AccessPointController@restore')->name('restore');
  Route::get('restoreall', 'AccessPointController@restoreall')->name('restore-all');
  Route::get('delete-permanent/{id}', 'AccessPointController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'AccessPointController@delete_permanentall')->name('delete-permanentall');
  Route::get('delete/{id}', 'AccessPointController@delete')->name('delete');
  Route::get('deleteall', 'AccessPointController@deleteall')->name('delete-all');
  Route::get('activities', 'AccessPointController@activity')->name('activity');
  Route::get('trash', 'AccessPointController@trash')->name('trash');
  Route::resource('/', 'AccessPointController')->parameters(['' => 'id']);
});
Route::group([
  'as' => 'main.access-points.',
  'prefix' => 'dashboard/access-points',
  'namespace' => 'App\Http\Controllers\Backend\__Main',
], function(){
  Route::get('active/{id}', 'AccessPointController@active')->name('active');
  Route::get('inactive/{id}', 'AccessPointController@inactive')->name('inactive');
  Route::get('restore/{id}', 'AccessPointController@restore')->name('restore');
  Route::get('restoreall', 'AccessPointController@restoreall')->name('restore-all');
  Route::get('delete-permanent/{id}', 'AccessPointController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'AccessPointController@delete_permanentall')->name('delete-permanentall');
  Route::get('delete/{id}', 'AccessPointController@delete')->name('delete');
  Route::get('deleteall', 'AccessPointController@deleteall')->name('delete-all');
  Route::get('activities', 'AccessPointController@activity')->name('activity');
  Route::get('trash', 'AccessPointController@trash')->name('trash');
  Route::resource('/', 'AccessPointController')->parameters(['' => 'id']);
});
Route::group([
  'as' => 'main.access-points.',
  'prefix' => 'dashboard/access-points',
  'namespace' => 'App\Http\Controllers\Backend\__Main',
], function(){
  Route::get('active/{id}', 'AccessPointController@active')->name('active');
  Route::get('inactive/{id}', 'AccessPointController@inactive')->name('inactive');
  Route::get('restore/{id}', 'AccessPointController@restore')->name('restore');
  Route::get('restoreall', 'AccessPointController@restoreall')->name('restore-all');
  Route::get('delete-permanent/{id}', 'AccessPointController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'AccessPointController@delete_permanentall')->name('delete-permanentall');
  Route::get('delete/{id}', 'AccessPointController@delete')->name('delete');
  Route::get('deleteall', 'AccessPointController@deleteall')->name('delete-all');
  Route::get('activities', 'AccessPointController@activity')->name('activity');
  Route::get('trash', 'AccessPointController@trash')->name('trash');
  Route::resource('/', 'AccessPointController')->parameters(['' => 'id']);
});
Route::group([
  'as' => 'main.access-points.',
  'prefix' => 'dashboard/access-points',
  'namespace' => 'App\Http\Controllers\Backend\__Main',
], function(){
  Route::get('active/{id}', 'AccessPointController@active')->name('active');
  Route::get('inactive/{id}', 'AccessPointController@inactive')->name('inactive');
  Route::get('restore/{id}', 'AccessPointController@restore')->name('restore');
  Route::get('restoreall', 'AccessPointController@restoreall')->name('restore-all');
  Route::get('delete-permanent/{id}', 'AccessPointController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'AccessPointController@delete_permanentall')->name('delete-permanentall');
  Route::get('delete/{id}', 'AccessPointController@delete')->name('delete');
  Route::get('deleteall', 'AccessPointController@deleteall')->name('delete-all');
  Route::get('activities', 'AccessPointController@activity')->name('activity');
  Route::get('trash', 'AccessPointController@trash')->name('trash');
  Route::resource('/', 'AccessPointController')->parameters(['' => 'id']);
});