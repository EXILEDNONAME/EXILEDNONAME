@extends('layouts.backend.default')
@section('title', 'Account Informations')

@section('content')
<div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
  <div class="card-header py-3">
    <div class="card-title align-items-start flex-column">
      <h3 class="card-label font-weight-bolder text-dark"> Account Informations </h3>
      <span class="text-muted font-weight-bold font-size-sm mt-1"> Change Your Account Informations </span>
    </div>
    <div class="card-toolbar">
      <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle" title="{{ __('default.label.hide-show') }}"><i class="fas fa-caret-down"></i></a>
    </div>
  </div>
  <div class="card-body">

    <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/update/{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}

      @if ($message = Session::get('error'))
      <div class="alert alert-danger" role="alert"> {{ $message }} </div><hr>
      @endif

      <input class="form-control" name="created_by" type="hidden" value="{{ Auth::User()->id }}">

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Access </label>
        <div class="col-lg-9">
          {{ Html::text('id_access', (isset($data->accesses->name) ? $data->accesses->name : ''))->class([ $errors->has('id_access') ? 'form-control is-invalid' : 'form-control form-control-solid'])->required()->isreadonly() }}
          @error('id_access') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Username </label>
        <div class="col-lg-9">
          {{ Html::text('username', (isset($data->username) ? $data->username : ''))->class([ $errors->has('username') ? 'form-control is-invalid' : 'form-control form-control-solid'])->required()->isreadonly() }}
          @error('username') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Name </label>
        <div class="col-lg-9">
          {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class([ $errors->has('name') ? 'form-control is-invalid' : 'form-control'])->required() }}
          @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Email </label>
        <div class="col-lg-9">
          {{ Html::text('email', (isset($data->email) ? $data->email : ''))->class([ $errors->has('email') ? 'form-control is-invalid' : 'form-control form-control-solid'])->required()->isreadonly() }}
          @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Phone </label>
        <div class="col-lg-9">
          {{ Html::text('phone', (isset($data->name) ? $data->phone : ''))->class([ $errors->has('phone') ? 'form-control is-invalid' : 'form-control'])->required() }}
          @error('phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Address </label>
        <div class="col-lg-9">
          {{ Html::text('address', (isset($data->address) ? $data->address : ''))->class([ $errors->has('address') ? 'form-control is-invalid' : 'form-control']) }}
          @error('address') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
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

@push('js')
<script>
  $(document).ready(function() {
    $('#toast-container').fadeOut(5000);
  });
  </script>
@endpush
