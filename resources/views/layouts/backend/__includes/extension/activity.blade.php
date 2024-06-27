<div class="card card-custom gutter-b" data-card="true" id="kt_card_1">
  <div class="card-header">
    <h4 class="card-title">
      <span class="card-label"> {{ __('default.label.activities') }} </span>
    </h4>
    <div class="card-toolbar">
      <a id="activity-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
      <a href="#" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
    </div>
  </div>
  <div class="card-body" id="exilednoname_activity">
    <div class="example-preview">
      <div class="timeline timeline-2">
        <div class="timeline-bar"></div>

        @php $activity = activities($model)->take(7); @endphp
        @if (!empty($activity) && !empty($activity->count()))
        @foreach($activity as $item)
        <div class="timeline-item">

          @foreach($item['properties'] as $data_object)
          @if ($item->description == 'created')
          <span class="timeline-badge bg-success"></span>
          <div class="timeline-content d-flex align-items-center justify-content-between">
            <span class="mr-3">
              <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
              @if (!empty($item->causer->name) && !empty($data_object['name']))
               {{ __('default.activity.item-created') }} <span class="font-weight-bolder"> {{ mb_strimwidth($data_object['name'], 0, 10, ' ...') }} </span>
              @else
              {{ __('default.activity.item-created') }} ...
              @endif
            </span>
            <span class="text-right"><a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="far fa-arrow-alt-circle-right text-muted"></i></a></span>
          </div>
          @endif
          @endforeach


          @if ($item->description == 'updated')
          @if ($item['properties']['attributes']['deleted_at'] == NULL && !empty($item['properties']['old']['deleted_at']))
          <span class="timeline-badge bg-info"></span>
          <div class="timeline-content d-flex align-items-center justify-content-between">
            <span class="mr-3">
              <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
              @if (!empty($item->causer->name) && !empty($data_object['name']))
               {{ __('default.activity.item-restored') }} <span class="font-weight-bolder"> {{ mb_strimwidth($data_object['name'], 0, 10, ' ...') }} </span>
              @else
              {{ __('default.activity.item-restored') }} ...
              @endif
            </span>
            <span class="text-right"><a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="far fa-arrow-alt-circle-right text-muted"></i></a></span>
          </div>
          @else
          <span class="timeline-badge bg-warning"></span>
          <div class="timeline-content d-flex align-items-center justify-content-between">
            <span class="mr-3">
              <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
              @if (!empty($data_object['name']))
              {{ __('default.activity.item-updated') }} <span class="font-weight-bolder"> {{ mb_strimwidth($item['properties']['old']['name'], 0, 10, ' ...') }} </span> to <span class="font-weight-bolder"> {{ mb_strimwidth($item['properties']['attributes']['name'], 0, 10, ' ...') }} </span>
              @else
              {{ __('default.activity.item-updated') }} ...
              @endif
            </span>
            <span class="text-right"><a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="far fa-arrow-alt-circle-right text-muted"></i></a></span>
          </div>
          @endif
          @endif

          @foreach($item['properties'] as $data_object)
          @if ($item->description == 'deleted')
          <span class="timeline-badge bg-danger"></span>
          <div class="timeline-content d-flex align-items-center justify-content-between">
            <span class="mr-3">
              <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
              @if (!empty($data_object['name']))
              {{ __('default.activity.item-deleted') }} <b>{{ $data_object['name'] }}</b>
              @else
              {{ __('default.activity.item-deleted') }} ...
              @endif
            </span>
          </div>
          @endif
          @endforeach

        </div>
        @endforeach
        @else
        <span class="text-muted"> {{ trans('default.activity.no-recent-activities') }} ... </span>
        @endif

      </div>
    </div>
  </div>
</div>
