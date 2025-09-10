$('#date_start').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block('#exilednoname_body', {
    overlayColor: '#ffffff',
    type: 'loader',
    state: 'primary',
    message: translations.default.label.processing + ' ...',
    opacity: 0.3,
    size: 'lg'
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
    $('#exilednoname_table').DataTable().draw();
  }, 500);
});

$('#date_end').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block('#exilednoname_body', {
    overlayColor: '#ffffff',
    type: 'loader',
    state: 'primary',
    message: translations.default.label.processing + ' ...',
    opacity: 0.3,
    size: 'lg'
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
    $('#exilednoname_table').DataTable().draw();
  }, 500);
});
