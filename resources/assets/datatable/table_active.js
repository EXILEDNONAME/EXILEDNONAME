$('body').on('click', '.table_active', function () {
  var id = $(this).data("id");
  $.ajax({
    type: "get", url: this_url + "/active/"+id, processing: true, serverSide: true,
    success: function (data) {
      KTApp.block('#exilednoname_body', {
        overlayColor: '#000000',
        state: 'info',
        message: translations.default.label.processing + ' ...'
      });
      setTimeout(function() {
        KTApp.unblock('#exilednoname_body');
        $('#exilednoname_table').dataTable().fnDraw(false);
        toastr.success(translations.default.notification.success.item_active);
      }, 500);
    },
    error: function (data) {
      toastr.error(translations.default.notification.error.error);
    }
  });
});
