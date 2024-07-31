@extends('layouts.backend.default')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.details') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a data-toggle="modal" data-target="#qrcode_modal" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.qr-code') }}"><i class="fas fa-qrcode"></i></a>
          <a data-toggle="modal" onclick="printData('printData')" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.print') }}"><i class="fas fa-print"></i></a>
          <div class="dropdown">
            <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
              <a class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.action') }}"><i class="fas fa-ellipsis-h"></i></a>
            </div>
            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
              <ul class="navi navi-hover py-4">
                <li class="navi-item"> <a href="{{ URL::current() }}/edit" class="navi-link"> {{ __('default.label.edit') }} </a></li>
                <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/../{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                  @method('DELETE')
                  @csrf
                  <li class="navi-item delete"> <a href="javascript:void(0);" class="navi-link"> {{ __('default.label.delete./') }} </a></li>
                </form>
              </ul>
            </div>
          </div>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle" title="{{ __('default.label.hide-show') }}"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>

        <div class="card-body" style="">
          <div id="printData">

          <div class="table-responsive">
            <table width="100%" class="table table-bordered table-checkable" id="exilednoname_table">
              <input class="form-control" name="id" type="hidden" value="{{ $data->id }}">

              @if (empty($date) || $date == 'true')
              <tr>
                <td class="align-middle font-weight-bold"> Date </td>
                <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date)->format('d F Y, H:i') }} </td>
              </tr>
              @endif

              @if (empty($status) || $status == 'true')
              <tr>
                <td class="align-middle font-weight-bold"> Status </td>
                <td class="align-middle"> {{ $data->status }} </td>
              </tr>
              @endif

              @stack('content')

              @if (empty($active) || $active == 'true')
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold" width="300"> {{ __('default.label.active') }} </td>
                <td class="align-middle">
                  @if ( $data->active == 1 ) {{ __('default.label.yes') }}
                  @else {{ __('default.label.no') }}
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

@push('modal')

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
