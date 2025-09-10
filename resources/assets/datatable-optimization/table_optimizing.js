$('body').on('click', '#table-optimizing', function () {
  var id = $(this).data("id");
  $.ajax({
    type: "get", url: this_url + "/start-optimizing/"+id, processing: true, serverSide: true,
    success: function (data) {
      KTApp.block('#exilednoname_body', {
        overlayColor: '#000000',
        state: 'info',
        message: translations.default.label.processing + ' ...'
      });
      setTimeout(function() {
        KTApp.unblock('#exilednoname_body');
        var oTable = $('#exilednoname_table').dataTable();
        oTable.fnDraw(false);
        toastr.info(translations.default.notification.success.optimizing);
      }, 500);

    },
    error: function (data) {
      toastr.error(translations.default.notification.error.error);
    }
  });
});
