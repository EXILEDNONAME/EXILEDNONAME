$('body').on('click', '#logout', function () {
  Swal.fire({ text: translations.default.notification.confirm.logout_session + "?", icon: "warning", showCancelButton: true, confirmButtonText: translations.default.label.yes, cancelButtonText: translations.default.label.no, reverseButtons: false }).then(function(result) {
    if (result.value) { Swal.fire({ text: translations.default.label.redirect_login, timer: 2000, onOpen: function(){ Swal.showLoading() }}).then(function(result){ if(result.dismiss === "timer"){ window.location = "/dashboard/logout"; }}) }
  });
});

$("#logout_topbar").click(function(e) {
  Swal.fire({ text: translations.default.notification.confirm.logout_session + "?", icon: "warning", showCancelButton: true, confirmButtonText: translations.default.label.yes, cancelButtonText: translations.default.label.no, reverseButtons: false }).then(function(result) {
    if (result.value) { Swal.fire({ text: translations.default.label.redirect_login, timer: 2000, onOpen: function(){ Swal.showLoading() }}).then(function(result){ if(result.dismiss === "timer"){ window.location = "/dashboard/logout"; }}) }
  });
});
