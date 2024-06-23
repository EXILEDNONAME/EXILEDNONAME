<?php

namespace App\Http\Controllers\Backend\__Application\Datatable;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;

class GeneralController extends Controller {

  use DefaultController;

  function __construct() {
    $this->middleware(['auth']);
    $this->model = 'App\Models\Backend\__Application\Datatable\General';
    $this->path = 'pages.backend.__application.datatable.general.';
    $this->url = '/dashboard/applications/datatables';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date', 'desc')->whereBetween('date', [request('date_start'), request('date_end')])->get(); }
    else if (!empty($this->model::get('date'))) { $this->data = $this->model::orderby('date', 'desc')->get(); }
    else { $this->data = $this->model::get(); }
  }

}
