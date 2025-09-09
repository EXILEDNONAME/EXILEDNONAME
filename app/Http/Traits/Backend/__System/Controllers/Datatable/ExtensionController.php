<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable;

trait ExtensionController {

  // CONTROLLER EXTENSIONS
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\ActiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\ChartController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\InactiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedActiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedInactiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\DeleteController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\DeletePermanentController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\ResetPasswordController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\ResetPasswordSingleController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\RestoreController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedDeleteController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedDeletePermanentController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedRestoreController;

  // CONTROLLER PAGES
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\ActivityController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\TrashController;

}
