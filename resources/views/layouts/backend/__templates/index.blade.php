@extends('layouts.backend.default')

@section('content')
@stack('box')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.main') }} </h3>
        </div>
        <div class="card-toolbar">
          @if (!empty($datatable) && $datatable == 'true')
          <a href="{{ URL::Current() }}/create" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.create') }}"><i class="fas fa-plus"></i></a>
          <a id="table-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>

          @if(($active ?? '') === 'true' || ($status ?? '') === 'true' || ($date ?? '') === 'true' || ($datetime ?? '') === 'true' || ($daterange ?? '') === 'true')
          <div data-toggle="collapse" data-target="#collapse-filter"><a class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.filter./') }}"><i class="fas fa-filter"></i></a></div>
          @else
          @endif

          <div class="dropdown dropdown-inline" bis_skin_checked="1">
            <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md" data-toggle="dropdown"><i class="fas fa-download"></i></button>
            <div class="dropdown-menu dropdown-menu-right" bis_skin_checked="1">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" title="{{ __('default.label.export.description-copy') }}"><a href="javascript:void(0);" class="navi-link" id="export_copy"><i class="navi-icon fa fa-copy"></i> {{ __('default.label.export.copy') }} </a></li>
                <li class="navi-item" title="{{ __('default.label.export.description-excel') }}"><a href="javascript:void(0);" class="navi-link" id="export_excel"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }} </a></li>
                <li class="navi-item" title="{{ __('default.label.export.description-pdf') }}"><a href="javascript:void(0);" class="navi-link" id="export_pdf"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }} </a></li>
                <li class="navi-item" title="{{ __('default.label.export.description-print') }}"><a href="javascript:void(0);" class="navi-link" id="export_print"><i class="navi-icon fa fa-print"></i> {{ __('default.label.export.print') }} </a></li>
              </ul>
            </div>
          </div>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
          <div id="collapse_bulk" class="collapse">
            <div class="dropdown">
              <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                <a class="btn btn-icon btn-xs btn-hover-light-primary mr-1" title="{{ __('default.label.action') }}"><i class="fas fa-ellipsis-h"></i></a>
              </div>
              <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                <ul class="navi navi-hover py-4">
                  @if (!empty($active) && $active == 'true')
                  <li class="navi-item"><a href="javascript:void(0);" class="navi-link selected-active"> {{ __('default.label.selected_active') }} </a></li>
                  <li class="navi-item"><a href="javascript:void(0);" class="navi-link selected-inactive"> {{ __('default.label.selected_inactive') }} </a></li>
                  @endif
                  <li class="navi-item"><a href="javascript:void(0);" class="navi-link selected-delete"> {{ __('default.label.selected_delete') }} </a></li>
                  @if (!empty($extensions) && $extensions == 'management-users')
                  <div class="dropdown-divider"></div>
                  <li class="navi-item"><a href="javascript:void(0);" class="navi-link selected-reset-password"> {{ __('default.label.reset_password') }} </a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
          @endif

          @stack('toolbar-button')
        </div>
      </div>
      <div class="card-body" id="exilednoname_body">

        <div class="accordion" id="accordion-filter">
          <div id="collapse-filter" class="collapse hide" data-parent="#accordion-filter">

            @if (!empty($active) && $active == 'true')
            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <select data-column="-2" class="form-control filter-form filter_active">
                    <option value=""> - {{ __('default.select.active') }} - </option>
                    <option value="1"> {{ __('default.label.yes') }} </option>
                    <option value="0"> {{ __('default.label.no') }} </option>
                  </select>
                </div>
              </div>
            </div>
            @endif

            @if (!empty($status) && $status == 'true')
            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <select data-column="2" class="form-control filter-form filter_status">
                    <option value=""> - {{ __('default.select.status') }} - </option>
                    @foreach ($attributes as $key => $label)
                    <option value="{{ $key }}">
                      {{ __('default.label.' . strtolower($label)) }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            @endif

            @if (!empty($date) && $date == 'true')
            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <div class="input-daterange input-group" id="ex_datepicker_date">
                    <input type="text" id="date" class="form-control filter-form text-center" name="date" placeholder="- {{ __('default.select.date') }} -" autocomplete="off" readonly>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="ki ki-calendar"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif

            @if (!empty($datetime) && $datetime == 'true')
            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <div class="input-daterange input-group" id="ex_datepicker_date">
                    <input type="text" id="datetime" class="form-control filter-form text-center" name="datetime" placeholder="- {{ __('default.select.date') }} -" autocomplete="off" readonly>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="ki ki-calendar"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif

            @if (!empty($daterange) && $daterange == 'true')
            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <div class="input-daterange input-group" id="ex_datepicker_daterange">
                    {{ Html::text('date_start', (isset($data->date_start) ? $data->date_start : ''))->class([$errors->has('date_start') ? 'form-control filter-form is-invalid text-center' : 'form-control filter-form text-center'])->id('date_start')->placeholder('- ' . __("default.select.date-start") . ' -')->isReadOnly() }}
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="la la-ellipsis-h"></i>
                      </span>
                    </div>
                    {{ Html::text('date_end', (isset($data->date_end) ? $data->date_end : ''))->class([$errors->has('date_end') ? 'form-control filter-form is-invalid text-center' : 'form-control filter-form text-center'])->id('date_end')->placeholder('- ' . __("default.select.date-end") . ' -')->isReadOnly() }}
                  </div>
                </div>
              </div>
            </div>
            @endif

            @stack('filter-header')
            <hr>

          </div>
        </div>

        <div class="row dataTables_wrapper dt-bootstrap4 no-footer">
          <div class="col-sm-12 col-md-6">
            <div id="ex_table_length"></div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div id="ex_table_filter"></div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-separate table-head-custom table-checkable table-sm" id="exilednoname_table">
            <thead>
              <tr>
                <th class="no-export"></th>
                <th style="display: none"> {{ __('default.label.created_at') }} </th>
                <th> No. </th>
                @if (!empty($status) && $status == 'true') <th> {{ __('default.label.status') }} </th> @endif
                @if (!empty($file) && $file == 'true') <th> {{ __('default.label.file') }} </th> @endif
                @if (!empty($date) && $date == 'true') <th> {{ __('default.label.date') }} </th> @endif
                @if (!empty($datetime) && $datetime == 'true') <th> {{ __('default.label.datetime') }} </th> @endif
                @if (!empty($daterange) && $daterange == 'true')
                <th> {{ __('default.label.date-start') }} </th>
                <th> {{ __('default.label.date-end') }} </th>
                @endif
                @yield('table-header')
                @if (!empty($active) && $active == 'true') <th> {{ __('default.label.active') }} </th> @endif
                <th class="no-export"></th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="row dataTables_wrapper dt-bootstrap4 no-footer">
          <div class="col-sm-12 col-md-5">
            <div id="ex_table_info"></div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div id="ex_table_paginate"></div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="row">

  @if (!empty($activities) && $activities == 'true')
  <div class="col-lg-4">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_activity">
      <div class="card-header">
        <h4 class="card-title">
          <span class="card-label"> {{ __('default.label.activities') }} </span>
        </h4>
        <div class="card-toolbar">
          <a id="activity-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
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
              <span class="timeline-badge bg-success" data-toggle="tooltip" data-original-title="{{ __('default.activity.item-created') }}" data-placement="bottom"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($item->causer->name) && !empty($data_object['name']))
                  {{ __('default.activity.item-created') }} <span class="font-weight-bolder"> {{ mb_strimwidth($data_object['name'], 0, 10, ' ...') }} </span>
                  @else
                  {{ __('default.activity.item-created') }}
                  @endif
                </span>
                <span class="text-right"><a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="far fa-arrow-alt-circle-right text-muted"></i></a></span>
              </div>
              @endif
              @endforeach

              @if ($item->description == 'updated')
              @if ($item['properties']['attributes']['deleted_at'] == NULL && $item['properties']['old']['deleted_at'] == NULL)
              <span class="timeline-badge bg-warning" data-toggle="tooltip" data-original-title="{{ __('default.activity.item-updated') }}" data-placement="bottom"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($data_object['name']))
                  {{ __('default.activity.item-updated') }} <b>{{ $data_object['name'] }}</b>
                  @else
                  {{ __('default.activity.item-updated') }}
                  @endif
                </span>
                <span class="text-right"><a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="far fa-arrow-alt-circle-right text-muted"></i></a></span>
              </div>
              @else
              <span class="timeline-badge bg-info" data-toggle="tooltip" data-original-title="{{ __('default.activity.item-restored') }}" data-placement="bottom"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($data_object['name']))
                  {{ __('default.activity.item-restored') }} <b>{{ $data_object['name'] }}</b>
                  @else
                  {{ __('default.activity.item-restored') }}
                  @endif
                </span>
                <span class="text-right"><a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="far fa-arrow-alt-circle-right text-muted"></i></a></span>
              </div>
              @endif
              @endif

              @foreach($item['properties'] as $data_object)
              @if ($item->description == 'deleted')
              <span class="timeline-badge bg-danger" data-toggle="tooltip" data-original-title="{{ __('default.activity.item-deleted') }}" data-placement="bottom"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($data_object['name']))
                  {{ __('default.activity.item-deleted') }} <b>{{ $data_object['name'] }}</b>
                  @else
                  {{ __('default.activity.item-deleted') }}
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
  </div>
  @endif

  @if (!empty($charts) && $charts == 'true')
  <div class="col-lg-8">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_chart">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">
            {{ __('default.label.charts') }}
          </h3>
        </div>
        <div class="card-toolbar">
          <a id="chart-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body" id="exilednoname_chart">
        <div id="charts"></div>
      </div>
    </div>
  </div>
  @endif

</div>
@endsection

@push('js')
<script src="{{ mix('assets/backend/mix/js/datatable.js') }}"></script>
<script>
  $(document).ready(function() {
    KTApp.block('#exilednoname_body', {
      overlayColor: '#000000',
      state: 'primary',
      message: translations.default.label.please_wait + " ..."
    });
    setTimeout(function() {
      KTApp.unblock('#exilednoname_body');
    }, 500);
  });

  var card = new KTCard('exilednoname_card');
  var card = new KTCard('exilednoname_activity');
  var card = new KTCard('exilednoname_chart');

  var defaultSort = sort.split(',').map((item, index) => {
    return index === 0 ? parseInt(item.trim()) : item.trim();
  });

  var table = $('#exilednoname_table').DataTable({
    "initComplete": function(settings, json) {
      $('#exilednoname_table_info').appendTo('#ex_table_info');
      $('#exilednoname_table_paginate').appendTo('#ex_table_paginate');
      $('#exilednoname_table_length').appendTo('#ex_table_length');
      $('#exilednoname_table_filter').appendTo('#ex_table_filter');
    },

    "pagingType": "simple_numbers",
    serverSide: true,
    searching: true,
    searchDelay: 2000,
    rowId: 'Collocation',
    select: {
      style: 'multi',
      selector: 'td:first-child .checkable',
    },
    ajax: {
      url: this_url,
      "data": function(ex) {
        ex.date = $('#date').val();
        ex.datetime = $('#datetime').val();
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
    "lengthMenu": [
      [25, 100, 250, 500],
      [25, 100, 250, 500]
    ],
    "pageLength": 25,
    buttons: [{
        extend: 'print',
        title: '',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export"
        },
      },
      {
        extend: 'copyHtml5',
        title: '',
        autoClose: 'true',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export"
        },
      },
      {
        extend: 'excelHtml5',
        title: '',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export"
        },
      },
      {
        extend: 'pdfHtml5',
        title: '',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export"
        },
      },
      {
        extend: 'print',
        title: '',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export",
          rows: {
            selected: true
          }
        },
      },
      {
        extend: 'copyHtml5',
        title: '',
        autoClose: 'true',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export",
          rows: {
            selected: true
          }
        },
      },
      {
        extend: 'excelHtml5',
        title: '',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export",
          rows: {
            selected: true
          }
        },
      },
      {
        extend: 'pdfHtml5',
        title: '',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export",
          rows: {
            selected: true
          }
        },
      },
    ],
    columns: [{
        data: 'checkbox',
        orderable: false,
        searchable: false,
        'width': '1',
        render: function(data, type, row, meta) {
          return '<label class="checkbox checkbox-single checkbox-primary mb-0"><input type="checkbox" data-id="' + row.id + '" class="checkable"><span></span></label>';
        },
      },
      {
        data: 'created_at',
        name: 'created_at',
        visible: false
      },
      {
        data: 'autonumber',
        orderable: false,
        searchable: false,
        'className': 'align-middle text-center',
        'width': '1',
        render: function(data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
      },

      ...(status ? [{
        data: 'status',
        orderable: true,
        className: 'align-middle text-nowrap',
        width: '1',
        render: function(data) {
          if (data == 1) return '<span class="label label-dark label-inline">' + translations.default.label.default+'</span>';
          if (data == 2) return '<span class="label label-warning label-inline">' + translations.default.label.pending + '</span>';
          if (data == 3) return '<span class="label label-info label-inline">' + translations.default.label.progress + '</span>';
          if (data == 4) return '<span class="label label-success label-inline">' + translations.default.label.success + '</span>';
          if (data == 5) return '<span class="label label-danger label-inline">' + translations.default.label.failed + '</span>';
        }
      }, ] : []),

      ...(file ? [{
        data: 'file',
        orderable: false,
        'className': 'align-middle text-nowrap text-center',
        'width': '1'
      }, ] : []),

      ...(date ? [{
        data: 'date',
        orderable: true,
        'className': 'align-middle text-nowrap',
        'width': '1',
        render: function(data, type, row) {
          if (data == null) {
            return '<center> - </center>'
          } else {
            return data;
          }
        }
      }, ] : []),

      ...(datetime ? [{
        data: 'datetime',
        orderable: true,
        'className': 'align-middle text-nowrap',
        'width': '1',
        render: function(data, type, row) {
          if (data == null) {
            return '<center> - </center>'
          } else {
            return data;
          }
        }
      }, ] : []),

      ...(daterange ? [{
          data: 'date_start',
          orderable: true,
          'className': 'align-middle text-nowrap',
          'width': '1',
          render: function(data, type, row) {
            if (data == null) {
              return '<center> - </center>'
            } else {
              return data;
            }
          }
        },
        {
          data: 'date_end',
          orderable: true,
          'className': 'align-middle text-nowrap',
          'width': '1',
          render: function(data, type, row) {
            if (data == null) {
              return '<center> - </center>'
            } else {
              return data;
            }
          }
        },
      ] : []),

      ...window.tableBodyColumns,

      ...(active ? [{
        data: 'active',
        orderable: true,
        'className': 'align-middle text-center',
        'width': '1',
        render: function(data, type, row) {
          if (data == 0) {
            return '<a href="javascript:void(0);" id="active" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-dark label-inline">' + translations.default.label.no + '</span></a>';
          }
          if (data == 1) {
            return '<a href="javascript:void(0);" id="inactive" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-info label-inline">' + translations.default.label.yes + '</span></a>';
          }
          if (data == 2) {
            return '<a href="javascript:void(0);" id="active" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-dark label-inline">' + translations.default.label.no + '</span></a>';
          }
        }
      }, ] : []),

      {
        data: 'action',
        orderable: false,
        searchable: false,
        'width': '1',
        render: function(data, type, row) {
          return '' +
            '<div class="dropdown dropdown-inline">' +
            '<button type="button" class="btn btn-hover-light-dark btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></button>' +
            '<div class="dropdown-menu dropdown-menu-xs" style="">' +
            '<ul class="navi navi-hover py-5">' +
            '<li class="navi-item"><a href="' + this_url + '/' + row.id + '" class="navi-link"><span class="navi-icon"><i class="flaticon2-expand"></i></span><span class="navi-text">' + translations.default.label.view + '</span></a></li>' +
            '<li class="navi-item"><a href="' + this_url + '/' + row.id + '/edit" class="navi-link"><span class="navi-icon"><i class="flaticon2-contract"></i></span><span class="navi-text">' + translations.default.label.edit + '</span></a></li>' +
            '<li class="navi-item"><a href="javascript:void(0);" class="navi-link delete" data-id="' + row.id + '"><span class="navi-icon"><i class="flaticon2-trash"></i></span><span class="navi-text">' + translations.default.label.delete.delete + '</span></a></li>' +
            '</ul></div></div>';
        }
      },
    ],
    order: [defaultSort]
  });

  $('#export_print').on('click', function(e) {
    e.preventDefault();
    table.button(0).trigger();
  });
  $('#export_copy').on('click', function(e) {
    e.preventDefault();
    table.button(1).trigger();
  });
  $('#export_excel').on('click', function(e) {
    e.preventDefault();
    table.button(2).trigger();
  });
  $('#export_pdf').on('click', function(e) {
    e.preventDefault();
    table.button(3).trigger();
  });
</script>
@endpush