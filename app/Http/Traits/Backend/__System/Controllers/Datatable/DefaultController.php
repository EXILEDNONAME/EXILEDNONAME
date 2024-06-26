<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable;

trait DefaultController {

  // CONTROLLER DEFAULTS
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default\IndexController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default\ShowController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default\CreateController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default\StoreController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default\EditController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default\UpdateController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Default\DestroyController;

  // CONTROLLER EXTENSIONS
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\ActiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\InactiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\DeleteController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\RestoreController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\DeletePermanentController;

// CONTROLLER PAGES
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Page\ActivityController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Page\TrashController;

  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\SelectedActiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\SelectedDeleteController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\SelectedDeletePermanentController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\SelectedInactiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\Custom\SelectedRestoreController;

}
