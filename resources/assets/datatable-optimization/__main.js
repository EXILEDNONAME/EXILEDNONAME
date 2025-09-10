$(document).ready(function() {
  KTApp.block('#exilednoname_body', { overlayColor: '#000000', state: 'primary', message: translations.default.label.please_wait + " ..." });
  setTimeout(function() { KTApp.unblock('#exilednoname_body'); }, 500);
});

var card = new KTCard('exilednoname_card');

var indexLastColumn = $("#exilednoname_table").find('tr')[0].cells.length-1;
var table = $('#exilednoname_table').DataTable({
  "initComplete": function( settings, json ) {
    $('#exilednoname_table_info').appendTo('#ex_table_info');
    $('#exilednoname_table_paginate').appendTo('#ex_table_paginate');
    $('#exilednoname_table_length').appendTo('#ex_table_length');
    $('#exilednoname_table_filter').appendTo('#ex_table_filter');
  },

  "pagingType": "simple_numbers",
  serverSide: true,
  searching: true,
  rowId: 'Collocation',
  select: {
    style: 'multi',
    selector: 'td:first-child .checkable',
  },
  ajax: {
    url: this_url,
  },
  "lengthMenu": [[50, 100, 250, 500, -1], [50, 100, 250, 500, "All"]],
  columns: [
    {
      data: 'autonumber', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function(data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }
    },

    { data: 'name' },
    { data: 'description' },

    {
      data: 'action', orderable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function ( data, type, row ) {
        return '<a id="table-optimizing" href="javascript:void(0);" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-info label-inline">' + translations.default.label.start.toUpperCase() + '</span></a>'
      }
    },

  ],
  order: [
    [indexLastColumn, 'asc']
  ]
});
