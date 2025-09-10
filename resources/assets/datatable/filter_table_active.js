$('.filter_table_active').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block('#exilednoname_body', {
    overlayColor: '#000000',
    state: 'primary',
    message: translations.default.label.processing + ' ...'
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
    $('#exilednoname_table').dataTable().fnDraw(false);
  }, 500);
  $('#exilednoname_table').DataTable().column(-2).search( $(this).val() ).draw();
});
