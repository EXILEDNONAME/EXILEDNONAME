<?php

use App\Http\Controllers\Backend\__System\Administrative\DatabaseController;

// ADMINISTRATIVE - DATABASES
Route::group([
  'as' => 'dashboard.system.administrative.databases.',
  'prefix' => 'dashboard/administratives/databases',
  'middleware' => 'auth',
], function () {
  Route::get('create-backup', [DatabaseController::class, 'create_backup'])->name('create_backup');
  Route::get('download/{slug}', [DatabaseController::class, 'download'])->name('download');
  Route::get('reset', [DatabaseController::class, 'reset'])->name('reset');
  Route::get('/', [DatabaseController::class, 'index'])->name('index');
});
