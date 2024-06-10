@extends('layouts.backend.default')

@push('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="exilednoname_card_sticky">
      <div class="card-header">
        <div class="card-title"><h3 class="card-label"> {{ __('default.label.create') }} </h3></div>
        <div class="card-toolbar">
          <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-primary font-weight-bolder mr-1">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ __('default.label.back') }}
          </a>
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-primary font-weight-bolder" form="exilednoname-form">
              {{ __('default.label.save') }}
            </button>
          </div>
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
        </form>

      </div>
    </div>
  </div>
</div>
@endpush

@push('js')
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-timepicker.js?v=7.0.6"></script>
@endpush
