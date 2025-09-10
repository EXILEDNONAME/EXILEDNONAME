$("#refresh_table_chart").on("click", function() {
  KTApp.block('#exilednoname_chart', {
    overlayColor: '#000000',
    state: 'primary',
    message: translations.default.label.please_wait + " ..."
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_chart');
  }, 500);
});
