@extends('layouts.backend.default')
@push('title', 'Change Password')

@section('content')
<div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
  <div class="card-header py-3">
    <div class="card-title align-items-start flex-column">
      <h3 class="card-label font-weight-bolder text-dark"> Change Password </h3>
      <span class="text-muted font-weight-bold font-size-sm mt-1"> Change Your Account Password </span>
    </div>
    <div class="card-toolbar">
      <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle" title="{{ __('default.label.hide-show') }}"><i class="fas fa-caret-down"></i></a>
    </div>
  </div>
  <div class="card-body">

    <form id="exilednoname-form" method="POST" action="{{ URL::current() }}/../update-password" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Current Password </label>
        <div class="col-lg-9">
          {{ Html::password('current-password')->class([ $errors->has('current-password') ? 'form-control is-invalid' : 'form-control'])->required() }}
          @error('current-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> New Password </label>
        <div class="col-lg-9">
          {{ Html::password('new-password')->class([ $errors->has('new-password') ? 'form-control is-invalid' : 'form-control'])->required() }}
          @error('new-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Confirm Password </label>
        <div class="col-lg-9">
          {{ Html::password('confirm-password')->class([ $errors->has('confirm-password') ? 'form-control is-invalid' : 'form-control'])->required() }}
          @error('confirm-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> </label>
        <div class="col-lg-9 text-right">
          <button type="submit" class="btn btn-block btn-sm btn-outline-primary font-weight-bolder" form="exilednoname-form">
            {{ __('default.label.save') }}
          </button>
        </div>
      </div>

    </form>

  </div>
</div>
@endsection
