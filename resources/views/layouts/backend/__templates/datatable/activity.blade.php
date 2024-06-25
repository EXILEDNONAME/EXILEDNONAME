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
          <h4 class="card-label"> {{ __('default.label.activities') }} </h4>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a id="table-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <div data-toggle="collapse" data-target="#collapse-filter" aria-expanded="true"><a class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.filter') }}"><i class="fas fa-filter"></i></a></div>
          <div class="dropdown dropdown-inline" bis_skin_checked="1" title="{{ __('default.label.download') }}">
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
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle" title="{{ __('default.label.hide-show') }}"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>

      <div class="card-body" id="exilednoname_body">

        <div class="accordion" id="accordion-filter">
          <div id="collapse-filter" class="collapse hide" data-parent="#accordion-filter">

            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <select data-column="2" class="form-control filter-form filter_status">
                    <option value=""> - {{ __('default.select.status') }} - </option>
                    <option value="created"> {{ __('default.label.created') }} </option>
                    <option value="updated"> {{ __('default.label.updated') }} </option>
                    <option value="deleted"> {{ __('default.label.deleted') }} </option>
                  </select>
                </div>
              </div>
            </div>

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
          <table class="table table-hover table-separate table-head-custom table-checkable table-sm rounded" id="exilednoname_table">
            <thead>
              <tr>
                <th width="1"> No. </th>
                <th width="1"> </th>
                <th width="1"> Status </th>
                <th> Subject </th>
                <th width="1"> Causer </th>
                <th> Date </th>
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
        ex.filter_causer_id = $('#filter_causer_id').val();
        ex.date_start = $('#date_start').val();
        ex.date_end = $('#date_end').val();
      }
    },
    "lengthMenu": [[50, 100, 250, 500, -1], [50, 100, 250, 500, "All"]],
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
        data: 'autonumber', orderable: true, searchable: false, 'className': 'align-middle text-center', width: '1',
        render: function(data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }
      },
      {
        data: 'description', orderable: false, 'className': 'align-middle', 'width': '1',
        render: function ( data, type, row ) {
          if ( data == 'created' ) { return '<span class="label label-dot label-success"></span>'; }
          else if ( data == 'updated' ) { return '<span class="label label-dot label-warning"></span>'; }
          else if ( data == 'deleted' ) { return '<span class="label label-dot label-danger"></span>'; }
          else if ( data == 'restored' ) { return '<span class="label label-dot label-info"></span>'; }
          else { return ''; }
        }
      },
      {
        data: 'description', orderable: true, 'className': 'align-middle',
        render: function ( data, type, row ) {
          if ( data == 'created' ) { return 'Created'; }
          else if ( data == 'updated' ) { return 'Updated'; }
          else if ( data == 'deleted' ) { return 'Deleted'; }
          else if ( data == 'restored' ) { return 'Restored'; }
          else { return ''; }
        }
      },
      { data: 'subjects' },
      { data: 'causer_id', 'className': 'align-middle text-nowrap', 'width': '1' },
      { data: 'updated_at', 'className': 'align-middle text-nowrap', 'width': '1' },
    ],
    order: [[0, 'asc']]
  });

  $('.filter_status').change(function () {
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
      }, 2000);
      table.column(2).search( $(this).val() ).draw();
  });

  $('.filter_causer_id').change(function () {
    table.column(-2)
    .search( $(this).val() )
    .draw();
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

</script>
@endpush
