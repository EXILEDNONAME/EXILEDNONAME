@extends('layouts.backend.default', ['page' => 'statistics'])
@section('title', 'Statistics')

@section('content')
<div class="card card-custom gutter-b" data-card="true">
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label"> {{ __('default.label.statistics') }} </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{ URL::Previous() }}" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
      <a href="{{ route('log-viewer::logs.download', [$log->date]) }}" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('default.label.download') }}"><i class="fas fa-download"></i></a>
      <a href="#delete-log-modal" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-toggle="modal"><i class="fas fa-trash"></i></a>
      <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-3">
        {{-- Log Menu --}}
        <div class="card mb-4">

          <div class="list-group list-group-flush log-menu">
            @foreach($log->menu() as $levelKey => $item)
            @if ($item['count'] === 0)
            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center disabled">
              <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
              <span class="badge empty">{{ $item['count'] }}</span>
            </a>
            @else
            <a href="{{ $item['url'] }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center level-{{ $levelKey }}{{ $level === $levelKey ? ' active' : ''}}">
              <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
              <span class="badge badge-level-{{ $levelKey }}">{{ $item['count'] }}</span>
            </a>
            @endif
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        {{-- Log Details --}}
        <div class="card mb-4">
          <div class="table-responsive">
            <table class="table table-condensed mb-0">
              <tbody>
                <tr>
                  <td width="1" class="text-nowrap">@lang('File path') :</td>
                  <td colspan="7">{{ $log->getPath() }}</td>
                </tr>
                <tr>
                  <td width="1" class="text-nowrap">@lang('Log entries') :</td>
                  <td><span class="badge badge-primary">{{ $entries->total() }}</span></td>
                  <td width="1" class="text-nowrap">@lang('Size') :</td>
                  <td width="1" class="text-nowrap"><span class="badge badge-primary">{{ $log->size() }}</span></td>
                  <td width="1" class="text-nowrap">@lang('Created at') :</td>
                  <td width="1" class="text-nowrap"><span class="badge badge-primary">{{ $log->createdAt() }}</span></td>
                  <td width="1" class="text-nowrap">@lang('Updated at') :</td>
                  <td><span class="badge badge-primary">{{ $log->updatedAt() }}</span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            {{-- Search --}}
            <form action="{{ route('log-viewer::logs.search', [$log->date, $level]) }}" method="GET">
              <div class="form-group">
                <div class="input-group">
                  <input id="query" name="query" class="form-control" value="{{ $query }}" placeholder="@lang('Type here to search')">
                  <div class="input-group-append">
                    @unless (is_null($query))
                    <a href="{{ route('log-viewer::logs.show', [$log->date]) }}" class="btn btn-secondary">
                      (@lang(':count results', ['count' => $entries->count()])) <i class="fa fa-fw fa-times"></i>
                    </a>
                    @endunless
                    <button id="search-btn" class="btn btn-primary">
                      <span class="fa fa-fw fa-search"></span>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        {{-- Log Entries --}}
        <div class="card mb-4">
          @if ($entries->hasPages())
          <div class="card-header">
            <span class="badge badge-info float-right">
              {{ __('Page :current of :last', ['current' => $entries->currentPage(), 'last' => $entries->lastPage()]) }}
            </span>
          </div>
          @endif

          <div class="table-responsive">
            <table id="entries" class="table mb-0">
              <thead>
                <tr>
                  <th style="width: 120px;">@lang('Level')</th>
                  <th style="width: 65px;">@lang('Time')</th>
                  <th>@lang('Header')</th>
                </tr>
              </thead>
              <tbody>
                @forelse($entries as $key => $entry)
                <tr>

                  <td>
                    <span class="badge badge-level-{{ $entry->level }}">
                      {!! $entry->level() !!}
                    </span>
                  </td>
                  <td>
                    <span class="badge badge-secondary">
                      {{ $entry->datetime->format('H:i:s') }}
                    </span>
                  </td>
                  <td>
                    {{ $entry->header }}
                  </td>

                </tr>
                @if ($entry->hasStack() || $entry->hasContext())
                <tr>
                  <td colspan="5" class="stack py-0">
                    @if ($entry->hasStack())
                    <div class="stack-content collapse" id="log-stack-{{ $key }}">
                      {!! $entry->stack() !!}
                    </div>
                    @endif

                    @if ($entry->hasContext())
                    <div class="stack-content collapse" id="log-context-{{ $key }}">
                      <pre>{{ $entry->context() }}</pre>
                    </div>
                    @endif
                  </td>
                </tr>
                @endif
                @empty
                <tr>
                  <td colspan="5" class="text-center">
                    <span class="badge badge-secondary">@lang('The list of logs is empty!')</span>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="date" value="{{ $log->date }}">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang('Delete log file')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>@lang('Are you sure you want to delete this log file: :date ?', ['date' => $log->date])</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary mr-auto" data-dismiss="modal">@lang('Cancel')</button>
          <button type="submit" class="btn btn-sm btn-danger" data-loading-text="@lang('Loading')&hellip;">@lang('Delete')</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('js')
<script>
  $(function () {
    var deleteLogModal = $('div#delete-log-modal'),
    deleteLogForm  = $('form#delete-log-form'),
    submitBtn      = deleteLogForm.find('button[type=submit]');

    deleteLogForm.on('submit', function(event) {
      event.preventDefault();
      submitBtn.button('loading');

      $.ajax({
        url:      $(this).attr('action'),
        type:     $(this).attr('method'),
        dataType: 'json',
        data:     $(this).serialize(),
        success: function(data) {
          submitBtn.button('reset');
          if (data.result === 'success') {
            deleteLogModal.modal('hide');
            location.replace("{{ route('log-viewer::logs.list') }}");
          }
          else {
            alert('OOPS ! This is a lack of coffee exception !')
          }
        },
        error: function(xhr, textStatus, errorThrown) {
          alert('AJAX ERROR ! Check the console !');
          console.error(errorThrown);
          submitBtn.button('reset');
        }
      });

      return false;
    });

    @unless (empty(log_styler()->toHighlight()))
    @php
    $htmlHighlight = version_compare(PHP_VERSION, '7.4.0') >= 0
    ? join('|', log_styler()->toHighlight())
    : join(log_styler()->toHighlight(), '|');
  @endphp

  $('.stack-content').each(function() {
    var $this = $(this);
    var html = $this.html().trim()
    .replace(/({!! $htmlHighlight !!})/gm, '<strong>$1</strong>');

    $this.html(html);
  });
  @endunless
  });
</script>
@endpush
