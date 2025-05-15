@extends('layouts.backend.default')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom" data-card="true" id="kt_card_1">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> Edit </h3>
        </div>
        <div class="card-toolbar">
          <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
            <i class="ki ki-arrow-down icon-nm"></i>
          </a>
          <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="Reload Card">
            <i class="ki ki-reload icon-nm"></i>
          </a>
          <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary" data-card-tool="remove" data-toggle="tooltip" data-placement="top" title="Remove Card">
            <i class="ki ki-close icon-nm"></i>
          </a>
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-primary font-weight-bolder" form="exilednoname-form">
              {{ __('default.label.save') }}
            </button>
          </div>
        </div>
      </div>

      <div class="card-body">
        <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/../" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="form-group row">
          <label class="col-lg-3 col-form-label"> Name </label>
          <div class="col-lg-9">
            <input name="name" type="name" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label"> Description </label>
          <div class="col-lg-9">
            <input name="description" type="name" class="form-control" />
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
