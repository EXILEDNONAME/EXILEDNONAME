$('.selected-inactive').on('click', function(e) {
  var exilednonameArr = [];
  $(".checkable:checked").each(function() { exilednonameArr.push($(this).attr('data-id')); });
  var strEXILEDNONAME = exilednonameArr.join(",");
  Swal.fire({ text: translations.default.notification.confirm.selected_inactive + "?", icon: "warning", showCancelButton: true, confirmButtonText: translations.default.label.yes, cancelButtonText: translations.default.label.no, reverseButtons: false}).then(function(result) {
    if (result.value) {
      $.ajax({
        url: this_url + "/selected-inactive", type: 'get', headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, data: 'EXILEDNONAME='+strEXILEDNONAME,
        success: function (data) {
          KTApp.block('#exilednoname_body', {
            overlayColor: '#000000',
            state: 'info',
            message: translations.default.label.processing + ' ...'
          });
          setTimeout(function() {
            KTApp.unblock('#exilednoname_body');
            $('#collapse_bulk').collapse('hide');
            $('#exilednoname_table').dataTable().fnDraw(false);
            toastr.success(translations.default.notification.success.selected_inactive);
          }, 500);
        },
        error: function (data) {
          toastr.error(translations.default.notification.error.error);
        }
      });
    }
  });
});
