$("#table-reset").on("click", function() {

  Swal.fire({ text: translations.default.notification.confirm.reset_backup + "?", icon: "warning", showCancelButton: true, confirmButtonText: translations.default.label.yes, cancelButtonText: translations.default.label.no, reverseButtons: false }).then(function(result) {
    if (result.value) {
      $.ajax({
        type: "get", url: this_url + "/reset", processing: true, serverSide: true,
        success: function (data) {
          KTApp.block('#exilednoname_body', {
            overlayColor: '#000000',
            state: 'info',
            message: translations.default.label.processing + ' ...'
          });
          setTimeout(function() {
            KTApp.unblock('#exilednoname_body');
            toastr.success(translations.default.notification.success.reset_backup);
            $('#exilednoname_table').DataTable().ajax.reload();
          }, 500);
        },
        error: function (data) {
          toastr.error(translations.default.notification.error.error);
        }
      });
    }
  });
});
