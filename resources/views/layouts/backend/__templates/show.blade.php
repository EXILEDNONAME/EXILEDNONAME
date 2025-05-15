@extends('layouts.backend.default')

@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="card card-custom" data-card="true" id="kt_card_1">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.details') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-sm btn-outline-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ __('default.label.back') }}
          </a>
          <a data-toggle="modal" class="btn btn-sm btn-icon btn-outline-primary mr-2" data-target="#qrcode_modal"><i class="fas fa-qrcode"></i></a>
          <a data-toggle="modal" class="btn btn-sm btn-icon btn-outline-primary mr-2" onclick="printData('printData')"><i class="fas fa-print"></i></a>
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <ul class="nav nav-hover flex-column">
                <li class="nav-item">
                  <a href="{{ URL::current() }}/edit" class="nav-link">
                    <i class="nav-icon flaticon2-contract"></i>
                    <span class="nav-text"> {{ __('default.label.edit') }} </span>
                  </a>
                </li>
                <li class="nav-item">
                  <form method="POST" id="exilednoname-form" class="nav-link" action="{{ URL::current() }}/../{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <i class="nav-icon flaticon2-trash"></i>
                    <a href="javascript:void(0);" class="nav-text delete"> {{ __('default.label.delete./') }} </a>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div id="printData">
        <div class="card-body" style="">

          <div class="table-responsive">
            <table width="100%" class="table table-bordered table-checkable" id="exilednoname_table">
              <input class="form-control" name="id" type="hidden" value="{{ $data->id }}">
              @if (!empty($datetime) && $datetime == 'true')
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold" width="300"> {{ __('default.label.date-start') }} </td>
                <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date_start)->format('d F Y, H:i') }} </td>
              </tr>
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold" width="300"> {{ __('default.label.date-end') }} </td>
                <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date_end)->format('d F Y, H:i') }} </td>
              </tr>
              @endif
              @stack('content')
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold" width="300"> {{ __('default.label.active') }} </td>
                <td class="align-middle">
                  @if ( $data->active == 1 ) {{ __('default.label.yes') }}
                  @else {{ __('default.label.no') }}
                  @endif
                </td>
              </tr>
              @if ( !empty($status) && $status == 'true')
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold"> Status </td>
                <td class="align-middle">
                  @if ( $data->status == 1 ) {{ __('default.label.success') }}
                  @else {{ __('default.label.pending') }}
                  @endif
                </td>
              </tr>
              @endif
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold"> {{ __('default.label.created-by') }} </td>
                <td class="align-middle">
                  @if ($data->created_by == 0 || $data->created_by == NULL)
                  - System -
                  @else
                  {{ \DB::table('users')->where('id', $data->created_by)->first()->name }}
                  @endif
                </td>
              </tr>
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold"> {{ __('default.label.updated-by') }} </td>
                <td class="align-middle">
                  @if ($data->updated_by == 0 || $data->updated_by == NULL)
                  - System -
                  @else
                  {{ \DB::table('users')->where('id', $data->updated_by)->first()->name }}
                  @endif
                </td>
              </tr>
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold"> {{ __('default.label.created-at') }} </td>
                <td class="align-middle"> {!! \Carbon\Carbon::parse($data->created_at)->format('d F Y, H:i') !!} </td>
              </tr>
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold" width="200px"> {{ __('default.label.updated-at') }} </td>
                <td class="align-middle"> {!! \Carbon\Carbon::parse($data->updated_at)->format('d F Y, H:i') !!} </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="col-lg-3">
    <div class="card card-custom" data-card="true" id="kt_card_1">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> Show </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-sm btn-outline-primary font-weight-bolder mr-1">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ __('default.label.back') }}
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/../" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="form-group row">
          <label class="col-lg-3 col-form-label"> Name </label>
          <div class="col-lg-9">
            <input name="name" type="name" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-lg-3 col-form-label"> Description </label>
          <div class="col-lg-9">
            <input name="description" type="name" class="form-control" />
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="qrcode_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> {{ __('default.label.qr-code') }} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <div id="printQR">
          <p class="text-center"> {!! QrCode::size(300)->generate(URL::current()); !!} </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-icon btn-outline-primary" onclick="printQR('printQR')"><i class="fas fa-print"></i></button>
        <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
function printData(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
</script>

<script>
function printQR(divName){
  var myWindow=window.open('','','');
  myWindow.document.write(document.getElementById(divName).innerHTML);
  myWindow.document.close();
  myWindow.focus();
  myWindow.print();
  myWindow.document.close();
}
</script>

<script>
$('body').on('click', '.delete', function (e) {
  e.preventDefault()
  Swal.fire({ title: "{{ __('default.notification.confirm.are-you-sure') }}?", text: "{{ __('default.notification.confirm.delete') }}", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
    if (result.value) {
      $(e.target).closest('form').submit()
    }
  });
});
</script>
@endpush
