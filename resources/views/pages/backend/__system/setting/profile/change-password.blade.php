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
      <div class="btn-group">
        <button type="submit" class="btn btn-outline-primary" form="form-exilednoname" data-toggle="tooltip" title="{{ __('system.label.save')}}">
          <i class="flaticon2-paperplane"></i> <span class="font-weight-bolder"> </span>
        </button>
      </div>
    </div>
  </div>
  <div class="card-body">

    <form id="form-exilednoname" method="POST" action="{{ URL::current() }}/../update-password" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
      {{ csrf_field() }}

      @if ($message = Session::get('success'))
      <div class="alert alert-success" role="alert"> {{ $message }} </div><hr>
      @endif

      @if ($message = Session::get('error'))
      <div class="alert alert-danger" role="alert"> {{ $message }} </div><hr>
      @endif

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Current Password </label>
        <div class="col-lg-9">
          {{ Html::password('current-password', ['class' => $errors->has('blank') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) }}
          @error('current-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> New Password </label>
        <div class="col-lg-9">
          {{ Html::password('new-password', ['class' => $errors->has('blank') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) }}
          @error('new-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Confirm Password </label>
        <div class="col-lg-9">
          {{ Html::password('confirm-password', ['class' => $errors->has('blank') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) }}
          @error('confirm-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

    </form>

  </div>
</div>
@endsection
