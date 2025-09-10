$('.filter_status').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block('#exilednoname_body', {
    overlayColor: '#000000',
    state: 'primary',
    message: translations.default.label.processing + ' ...',
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
    var oTable = $('#exilednoname_table').dataTable();
    oTable.fnDraw(false);
  }, 500);
  table.column(3).search( $(this).val() ).draw();
});
