@extends('layouts.backend.default')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="exilednoname_card_sticky">
      <div class="card-header">
        <div class="card-title"><h3 class="card-label"> {{ __('default.label.create') }} </h3></div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle" title="{{ __('default.label.hide-show') }}"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body">

        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert"> {{ $message }} </div><hr>
        @endif

        <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/../" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input class="form-control" name="created_by" type="hidden" value="{{ Auth::User()->id }}">
          @include($path . 'form', ['formMode' => 'create'])
          @if (empty($active) || $active == 'true')
          <div class="form-group row">
            <div class="col-lg-3 col-form-label"> {{ __('default.label.active') }} </div>
            <div class="col-lg-9">
              {{ Html::select('active', ['1' => __('default.label.yes'), '0' => __('default.label.no')], (isset($data->active) ? $data->active : '1'))->class($errors->has('active') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('active') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
            </div>
          </div>
          @endif
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> </label>
            <div class="col-lg-9">
              <button type="submit" class="btn btn-block btn-sm btn-outline-primary font-weight-bolder mb-2" form="exilednoname-form">
                {{ __('default.label.submit') }}
              </button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-timepicker.js?v=7.0.6"></script>
@endpush
