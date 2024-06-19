<script> var EXILEDNONAME = { }; </script>
<script src="/assets/backend/plugins/global/plugins.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/js/scripts.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/widgets.js?v=7.0.6"></script>
@stack('js')

<script>
$("#logout").click(function(e) {
  Swal.fire({
    title: "{{ __('default.notification.confirm.are-you-sure') }}?",
    text: "{{ __('default.label.logout-session') }}",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    reverseButtons: false
  }).then(function(result) {
    if (result.value) {
      Swal.fire({
        text: "{{ __('default.label.redirect-login') }}",
        timer: 2000,
        onOpen: function() {
          Swal.showLoading()
        }
      }).then(function(result) {
        if (result.dismiss === "timer") {
          window.location = "{{ url('/dashboard/logout') }}";
        }
      })
    }
  });
});
</script>

<script>
$("#logout_topbar").click(function(e) {
  Swal.fire({
    title: "{{ __('default.notification.confirm.are-you-sure') }}?",
    text: "{{ __('default.label.logout-session') }}",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    reverseButtons: false
  }).then(function(result) {
    if (result.value) {
      Swal.fire({
        text: "{{ __('default.label.redirect-login') }}",
        timer: 2000,
        onOpen: function() {
          Swal.showLoading()
        }
      }).then(function(result) {
        if (result.dismiss === "timer") {
          window.location = "{{ url('/dashboard/logout') }}";
        }
      })
    }
  });
});
</script>
