@extends('layouts.default')
@push('title', 'Setting Profiles')

@push('layout-content')
<div class="row">

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-2.svg)">
      <div class="card-body">
        <div class="font-weight-bold text-success">
          <a href="{{ URL::Current() }}/account-informations"> Account Informations </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-2.svg)">
      <div class="card-body">
        <div class="font-weight-bold text-success">
          <a href="{{ URL::Current() }}/change-password"> Change Password </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endpush

@push('js')
<script src="/assets/backend/js/pages/widgets.js?v=7.0.6"></script>
@endpush
