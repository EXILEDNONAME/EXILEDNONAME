$('body').on('click', '.table_delete', function () {
  var id = $(this).data("id");
  Swal.fire({ text: translations.default.notification.confirm.delete + "?", icon: "warning", showCancelButton: true, confirmButtonText: translations.default.label.yes, cancelButtonText: translations.default.label.no, reverseButtons: false }).then(function(result) {
    if (result.value) {
      $.ajax({
        type: "get", url: this_url + "/delete/"+id,
        success: function (data) {
          KTApp.block('#exilednoname_body', {
            overlayColor: '#000000',
            state: 'primary',
            message: translations.default.label.processing + ' ...'
          });
          setTimeout(function() {
            KTApp.unblock('#exilednoname_body');
            $('#exilednoname_table').dataTable().fnDraw(false);
            toastr.success(translations.default.notification.success.item_deleted);
          }, 500);
        },
        error: function (data) {
          toastr.error(translations.default.notification.error.error);
        }
      });
    }
  });
});
