@extends('layouts.backend.default')

@push('head')
<link href="{{ asset('/assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h4 class="card-label"> {{ __('default.label.trash') }} </h4>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a id="table-refresh" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <div data-toggle="collapse" data-target="#collapse-filter" aria-expanded="true"><a class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.filter') }}"><i class="fas fa-filter"></i></a></div>
          <div class="dropdown dropdown-inline">
            <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description.copy') }}">
                  <a href="javascript:void(0);" id="export_copy" class="navi-link"><i class="navi-icon fa fa-copy"></i> {{ __('default.label.export.copy') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description.excel') }}">
                  <a href="javascript:void(0);" id="export_excel" class="navi-link"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description.pdf') }}">
                  <a href="javascript:void(0);" id="export_pdf" class="navi-link"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description.print') }}">
                  <a href="javascript:void(0);" id="export_print" class="navi-link"><i class="navi-icon fa fa-print"></i> {{ __('default.label.export.print') }}</a>
                </li>
              </ul>
            </div>
          </div>
          <a href="#" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title=""><i class="fas fa-caret-down"></i></a>
          <div class="collapse" id="collapse_bulk">
            <a id="selected-restore" data-url="" class="btn btn-xs btn-icon btn-clean btn-icon-md" data-toggle="tooltip" title="{{ __('default.label.selected-restore') }}"><i class="text-success fas fa-undo"></i></a>
            <a id="selected-delete-permanent" data-url="" class="btn btn-xs btn-icon btn-clean btn-icon-md" data-toggle="tooltip" title="{{ __('default.label.selected-delete-permanent') }}"><i class="text-danger fas fa-trash"></i></a>
          </div>
        </div>
      </div>

      <div class="card-body" id="exilednoname_body">

        <div class="accordion" id="accordion-filter">
          <div id="collapse-filter" class="collapse hide" data-parent="#accordion-filter">

            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <div class="input-daterange input-group" id="ex_datepicker_datetime">
                    <input type="text" id="date_start" class="form-control filter-form text-center" name="date_start" placeholder="- {{ __('default.select.date') }} -" autocomplete="off" readonly>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="la la-ellipsis-h"></i>
                      </span>
                    </div>
                    <input type="text" id="date_end" class="form-control filter-form text-center" name="date_end" placeholder="- {{ __('default.select.date') }} -" autocomplete="off" readonly>
                  </div>
                </div>
              </div>
            </div>

            <hr>
          </div>
        </div>

        <div class="table-responsive">
          <table width="100%" class="table table-striped-table-bordered table-hover table-checkable" id="exilednoname_table">
            <thead>
              <tr>
                <th class="no-export"> </th>
                <th width="1"> No. </th>
                <th width="1" class="text-nowrap"> Deleted At </th>
                @yield('table-header')
                <th class="no-export"> </th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="{{ asset('/assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
<script>
$(document).ready(function() {
  $('#toast-container').fadeOut(5000);
  KTApp.block('#exilednoname_body', {
    overlayColor: '#000000',
    state: 'primary',
    message: "{{ __('default.label.please-wait') }} ..."
  });

  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
  }, 2000);
});

"use strict";

var table = $('#exilednoname_table').DataTable({
  "bInfo": false,
  "sPaginationType": "full_numbers",
  serverSide: true,
  searching: true,
  rowId: 'Collocation',
  select: {
    style: 'multi',
    selector: 'td:first-child .checkable',
  },
  ajax: {
    url: "{{ URL::current() }}",
    "data" : function (ex) {
      ex.date_start = $('#date_start').val();
      ex.date_end = $('#date_end').val();
    }
  },
  headerCallback: function(thead, data, start, end, display) {
    thead.getElementsByTagName('th')[0].innerHTML = `
    <label class="checkbox checkbox-single checkbox-solid checkbox-primary mb-0">
    <input type="checkbox" value="" class="group-checkable"/>
    <span></span>
    </label>`;
  },
  "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
  buttons: [
    {
      extend: 'print',
      exportOptions: {
        columns: "thead th:not(.no-export)",
        orthogonal: "Export"
      },
    },
    {
      extend: 'copyHtml5',
      autoClose: 'true',
      exportOptions: {
        columns: "thead th:not(.no-export)",
        orthogonal: "Export"
      },
    },
    {
      extend: 'excelHtml5',
      exportOptions: {
        columns: "thead th:not(.no-export)",
        orthogonal: "Export"
      },
    },
    {
      extend: 'csvHtml5',
      exportOptions: {
        columns: "thead th:not(.no-export)",
        orthogonal: "Export"
      },
    },
    {
      extend: 'pdfHtml5',
      exportOptions: {
        columns: "thead th:not(.no-export)",
        orthogonal: "Export"
      },
    },
    {
      extend: 'pdfHtml5',
      exportOptions: {
        columns: "thead th:not(.no-export)",
        orthogonal: "Export",
        rows: { selected: true }
      },
    },
    {
      extend: 'excelHtml5',
      exportOptions: {
        columns: "thead th:not(.no-export)",
        orthogonal: "Export",
        rows: { selected: true }
      },
    },
    {
      extend: 'copyHtml5',
      autoClose: 'true',
      exportOptions: {
        columns: "thead th:not(.no-export)",
        orthogonal: "Export",
        rows: { selected: true }
      },
    },
    {
      extend: 'print',
      exportOptions: {
        columns: "thead th:not(.no-export)",
        orthogonal: "Export",
        rows: { selected: true }
      },
    },
  ],
  columns: [
    {
      data: 'checkbox', orderable: false, orderable: false, searchable: false, 'width': '1',
      render : function (data, type, row, meta) { return '<label class="checkbox checkbox-single checkbox-primary mb-0"><input type="checkbox" data-id="' + row.id + '" class="checkable"><span></span></label>'; },
    },
    {
      data: 'autonumber', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }
    },
    { data: 'deleted_at', 'className': 'align-middle text-nowrap', 'width': '1', },
    @yield('table-body')
    {
      data: 'action', orderable: false, orderable: false, searchable: false, 'width': '1',
      render : function (data, type, row) {
        return ''+
        '<div class="dropdown dropdown-inline">'+
        '<button type="button" class="btn btn-hover-light-dark btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></button>'+
        '<div class="dropdown-menu dropdown-menu-xs" style=""><ul class="navi navi-hover py-5">'+
        '<li class="navi-item"><a id="restore" href="javascript:void(0);" class="navi-link" data-id="' + row.id + '"><span class="navi-icon"><i class="fas fa-undo"></i></span><span class="navi-text">{{ __("default.label.restore") }}</span></a></li>'+
        '<li class="navi-item"><a id="delete-permanent" href="javascript:void(0);" class="navi-link" data-id="' + row.id + '"><span class="navi-icon"><i class="flaticon2-trash"></i></span><span class="navi-text text-nowrap">{{ __("default.label.delete.permanent") }}</span></a></li>';
      },
    },
  ],
  order: [[1, 'asc']]
});

$('#date_start').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block('#exilednoname_body', {
    overlayColor: '#ffffff',
    type: 'loader',
    state: 'primary',
    message: '{{ __('default.label.processing') }} ...',
    opacity: 0.3,
    size: 'lg'
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
    table.draw();
  }, 2000);
});

$('#date_end').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block('#exilednoname_body', {
    overlayColor: '#ffffff',
    type: 'loader',
    state: 'primary',
    message: '{{ __('default.label.processing') }} ...',
    opacity: 0.3,
    size: 'lg'
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
    table.draw();
  }, 2000);
});

$('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
$('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
$('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
$('#export_csv').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });
$('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(4).trigger(); });

@include('layouts.backend.__templates.datatable.extension.javascript.checkable')
@include('layouts.backend.__templates.datatable.extension.javascript.checkable-group')
@include('layouts.backend.__templates.datatable.extension.javascript.table-refresh')

@include('layouts.backend.__templates.datatable.extension.javascript.restore')
@include('layouts.backend.__templates.datatable.extension.javascript.delete-permanent')
@include('layouts.backend.__templates.datatable.extension.javascript.selected-restore')
@include('layouts.backend.__templates.datatable.extension.javascript.selected-delete-permanent')
</script>
@endpush
