@extends('layouts.backend.default', ['page' => 'statistics'])
@section('title', 'Statistics')

@section('content')
<div class="card card-custom gutter-b" data-card="true">
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label"> {{ __('default.label.logs') }} </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{ URL::Previous() }}" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>

      <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
    </div>
  </div>
  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr>
            @foreach($headers as $key => $header)
            <th scope="col" class="{{ $key == 'date' ? 'text-left' : 'text-center align-middle' }}">
              @if ($key == 'date')
              <span class="badge badge-info">{{ $header }}</span>
              @else
              <span class="badge badge-level-{{ $key }}">
                <span title="{{ $header }}"> {{ log_styler()->icon($key) }} </span>
              </span>
              @endif
            </th>
            @endforeach
            <th scope="col" class="text-right"></th>
          </tr>
        </thead>
        <tbody>
          @forelse($rows as $date => $row)
          <tr>
            @foreach($row as $key => $value)
            <td class="{{ $key == 'date' ? 'text-left align-middle' : 'text-center align-middle' }}">
              @if ($key == 'date')
              <span class="badge badge-primary">{{ $value }}</span>
              @elseif ($value == 0)
              <span class="badge empty">{{ $value }}</span>
              @else
              <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                <span class="badge badge-level-{{ $key }}">{{ $value }}</span>
              </a>
              @endif
            </td>
            @endforeach
            <td class="text-right align-middle">
              <div class="dropdown dropdown-inline">
                <button type="button" class="btn btn-hover-light-dark btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></button>
                <div class="dropdown-menu dropdown-menu-xs" style="">
                  <ul class="navi navi-hover py-5">
                    <li class="navi-item"><a href="{{ route('log-viewer::logs.show', [$date]) }}" class="navi-link"><span class="navi-icon"><i class="flaticon2-expand"></i></span><span class="navi-text">{{ __("default.label.view") }}</span></a></li>
                    <li class="navi-item"><a href="{{ route('log-viewer::logs.download', [$date]) }}" class="navi-link"><span class="navi-icon"><i class="fas fa-download"></i></span><span class="navi-text">{{ __("default.label.download") }}</span></a></li>
                    <li class="navi-item"><a data-log-date="{{ $date }}" href="#delete-log-modal" class="navi-link"><span class="navi-icon"><i class="flaticon2-trash"></i></span><span class="navi-text"> {{ __("default.label.delete./") }} </span></a></li>
                  </ul>
                </div>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="11" class="text-center">
              <span class="badge badge-secondary">@lang('The list of logs is empty!')</span>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{ $rows->render() }}

  </div>
</div>

<div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="date" value="">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang('Delete log file')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p></p>
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

  $("a[href='#delete-log-modal']").on('click', function(event) {
    event.preventDefault();
    var date    = $(this).data('log-date'),
    message = "{{ __('Are you sure you want to delete this log file: :date ?') }}";

    deleteLogForm.find('input[name=date]').val(date);
    deleteLogModal.find('.modal-body p').html(message.replace(':date', date));

    deleteLogModal.modal('show');
  });

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
          location.reload();
        }
        else {
          alert('AJAX ERROR ! Check the console !');
          console.error(data);
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

  deleteLogModal.on('hidden.bs.modal', function() {
    deleteLogForm.find('input[name=date]').val('');
    deleteLogModal.find('.modal-body p').html('');
  });
});
</script>
@endpush
