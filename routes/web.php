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

Route::get('/dashboard/applications/datatables', [App\Http\Controllers\Backend\__Application\Datatable\GeneralController::class, 'index'])->name('dashboard.__application.datatables.index');
