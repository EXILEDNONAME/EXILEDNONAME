$(document).ready(function () {
  KTApp.block('#exilednoname_body', {
    overlayColor: '#000000',
    state: 'primary',
    message: "{{ __('default.label.please_wait') }} ..."
  });
  setTimeout(function () {
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
  "initComplete": function (settings, json) {
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
    "data": function (ex) {
      ex.date = $('#date').val();
      ex.datetime = $('#datetime').val();
      ex.date_start = $('#date_start').val();
      ex.date_end = $('#date_end').val();
    }
  },
  headerCallback: function (thead, data, start, end, display) {
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
    render: function (data, type, row, meta) {
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
    render: function (data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
    }
  },

  ...(status ? [{
    data: 'status',
    orderable: true,
    className: 'align-middle text-nowrap',
    width: '1',
    render: function (data) {
      if (data == 1) return '<span class="label label-dark label-inline">' + translations.default.label.default + '</span>';
      if (data == 2) return '<span class="label label-warning label-inline">' + translations.default.label.pending + '</span>';
      if (data == 3) return '<span class="label label-info label-inline">' + translations.default.label.progress + '</span>';
      if (data == 4) return '<span class="label label-success label-inline">' + translations.default.label.success + '</span>';
      if (data == 5) return '<span class="label label-danger label-inline">' + translations.default.label.failed + '</span>';
    }
  },] : []),

  ...(file ? [{
    data: 'file',
    orderable: false,
    'className': 'align-middle text-nowrap text-center',
    'width': '1'
  },] : []),

  ...(date ? [{
    data: 'date',
    orderable: true,
    'className': 'align-middle text-nowrap',
    'width': '1',
    render: function (data, type, row) {
      if (data == null) {
        return '<center> - </center>'
      } else {
        return data;
      }
    }
  },] : []),

  ...(daterange ? [{
    data: 'date_start',
    orderable: true,
    'className': 'align-middle text-nowrap',
    'width': '1',
    render: function (data, type, row) {
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
    render: function (data, type, row) {
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
    render: function (data, type, row) {
      if (data == 0) {
        return '<a href="javascript:void(0);" id="active" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-dark label-inline">' + translations.default.label.no + '</span></a>';
      }
      if (data == 1) {
        return '<a href="javascript:void(0);" id="inactive" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-info label-inline"> Yes </span></a>';
      }
      if (data == 2) {
        return '<a href="javascript:void(0);" id="active" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-dark label-inline">' + translations.default.label.no + '</span></a>';
      }
    }
  },] : []),

  {
    data: 'action',
    orderable: false,
    searchable: false,
    'width': '1',
    render: function (data, type, row) {
      return '' +
        '<div class="dropdown dropdown-inline">' +
        '<button type="button" class="btn btn-hover-light-dark btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></button>' +
        '<div class="dropdown-menu dropdown-menu-xs" style="">' +
        '<ul class="navi navi-hover py-5">' +
        '<li class="navi-item"><a href="' + this_url + '/' + row.id + '" class="navi-link"><span class="navi-icon"><i class="flaticon2-expand"></i></span><span class="navi-text"> View </span></a></li>' +
        '<li class="navi-item"><a href="' + this_url + '/' + row.id + '/edit" class="navi-link"><span class="navi-icon"><i class="flaticon2-contract"></i></span><span class="navi-text"> Edit </span></a></li>' +
        '<li class="navi-item"><a href="javascript:void(0);" class="navi-link delete" data-id="' + row.id + '"><span class="navi-icon"><i class="flaticon2-trash"></i></span><span class="navi-text"> Delete </span></a></li>' +
        '</ul></div></div>';
    }
  },
  ],
  order: [defaultSort]
});

$('#export_print').on('click', function (e) {
  e.preventDefault();
  table.button(0).trigger();
});
$('#export_copy').on('click', function (e) {
  e.preventDefault();
  table.button(1).trigger();
});
$('#export_excel').on('click', function (e) {
  e.preventDefault();
  table.button(2).trigger();
});
$('#export_pdf').on('click', function (e) {
  e.preventDefault();
  table.button(3).trigger();
});