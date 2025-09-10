$("#refresh_table_activity").on("click", function() {
  KTApp.block('#exilednoname_activity', {
    overlayColor: '#000000',
    state: 'primary',
    message: translations.default.label.please_wait + " ..."
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_activity');
  }, 500);
});
