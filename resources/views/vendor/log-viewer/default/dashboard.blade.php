@extends('layouts.backend.default', ['page' => 'statistics'])
@section('title', 'Statistics')

@section('content')
<div class="card card-custom gutter-b" data-card="true">
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label"> {{ __('default.label.statistics') }} </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{ URL::Current() }}/logs" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-toggle="tooltip" data-original-title="{{ __('default.label.logs') }}"><i class="fas fa-history"></i></a>
      <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 col-lg-3">
        <canvas id="stats-doughnut-chart" height="300" class="mb-3"></canvas>
      </div>

      <div class="col-md-6 col-lg-9">
        <div class="row">
          @foreach($percents as $level => $item)
          <div class="col-sm-6 col-md-12 col-lg-4 mb-3">
            <div class="box level-{{ $level }} {{ $item['count'] === 0 ? 'empty' : '' }}">
              <div class="box-icon">
                {!! log_styler()->icon($level) !!}
              </div>

              <div class="box-content">
                <span class="box-text">{{ $item['name'] }}</span>
                <span class="box-number">
                  {{ $item['count'] }} @lang('entries') - {!! $item['percent'] !!} %
                </span>
                <div class="progress" style="height: 3px;">
                  <div class="progress-bar" style="width: {{ $item['percent'] }}%"></div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
