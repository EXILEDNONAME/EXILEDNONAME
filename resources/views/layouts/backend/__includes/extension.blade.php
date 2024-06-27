@if (!empty($chart) && $chart == 'true' || !empty($activity) && $activity == 'true')
<div class="row">
  <div class="col-lg-8">
    @if (!empty($chart) && $chart == 'true')
    @include('layouts.backend.__includes.extension.chart')
    @endif
  </div>
  <div class="col-lg-4">
    @if(!empty($activity) && $activity == 'true')
    @include('layouts.backend.__includes.extension.activity')
    @endif
  </div>
</div>
@endif
