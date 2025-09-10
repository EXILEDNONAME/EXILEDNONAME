<?php

namespace App\Http\Controllers\Backend\__System\Application\Datatable;

use App\Http\Controllers\Controller;
use App\Http\Traits\HandlesFormRequest;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use DataTables;
use Redirect, Response;
use Illuminate\Routing\Controllers\HasMiddleware;

use App\Http\Requests\Backend\__System\Application\Datatable\General\StoreRequest;
use App\Http\Requests\Backend\__System\Application\Datatable\General\UpdateRequest;

class GeneralController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'verified']; }

  use DefaultController;
  use ExtensionController;
  use HandlesFormRequest;

  public function __construct() {
    $this->model      = 'App\Models\Backend\__System\Application\Datatable\General';
    $this->path       = 'pages.backend.__system.application.datatable.general.';
    $this->url        = '/dashboard/applications/datatables/generals';
    $this->sort       = false;

    app()->instance('current.model', $this->model);
    app()->instance('current.url', $this->url);

    $this->middleware(function ($request, $next) {
      $user = auth()->user();
      $action = $request->route()->getActionMethod();
      if ($user->hasRole('user') && in_array($action, ['index', 'show', 'chart'])) { return $next($request); }
      else if ($user->hasRole('master-administrator')) { return $next($request); }
      else {
        if(request()->ajax()){ return response()->json(['status' => 'error', 'message' => __('default.notification.error.restrict')], 403); }
        $message = __('default.notification.error.restrict');
        if(is_array($message)){ $message = implode(', ', $message); }
        session()->flash('error', $message);
        return redirect($this->url);
      }
      return $next($request);
    });
  }

  public function store(StoreRequest $request) {}
  public function update(UpdateRequest $request, $id) {}

}
