<!DOCTYPE html>
<html lang="en">
  @include('pages.backend.__includes.head')
  <body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" data-kt-app-toolbar-fixed="true" class="app-default">
    @include('pages.backend.__includes.system')
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
      <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

        <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
          <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
            <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
              <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
              </div>
            </div>
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
              <a href="../../demo1/dist/index.html" class="d-lg-none">
                <img alt="Logo" src="/assets/backend/media/logos/default-small.svg" class="h-30px" />
              </a>
            </div>
            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
              @include('pages.backend.__includes.header-menu')
              <div class="app-navbar flex-shrink-0">
                @include('pages.backend.__includes.menu-search')
                @include('pages.backend.__includes.menu-activities')
                @include('pages.backend.__includes.menu-notifications')
                @include('pages.backend.__includes.menu-chat')
                @include('pages.backend.__includes.menu-links')
                @include('pages.backend.__includes.menu-user')
                <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                  <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
                    <i class="ki-duotone ki-element-4 fs-1">
                      <span class="path1"></span>
                      <span class="path2"></span>
                    </i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
          <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
            <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
              <a href="../../demo1/dist/index.html">
                <img alt="Logo" src="/assets/backend/media/logos/default-dark.svg" class="h-25px app-sidebar-logo-default" />
                <img alt="Logo" src="/assets/backend/media/logos/default-small.svg" class="h-20px app-sidebar-logo-minimize" />
              </a>
              <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
              </div>
            </div>
            @include('pages.backend.__includes.sidebar')
          </div>
          <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <div class="d-flex flex-column flex-column-fluid">
              @include('pages.backend.__includes.navigation-menu')
              <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                  <div class="card card-bordered">
                    <div class="card-header">
                      <h3 class="card-title">Title</h3>
                      <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-light">
                          Action
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <button id="logout" type="button" id="kt_docs_sweetalert_html" class="btn btn-primary">Toggle HTML SweetAlert</button>
                      Lorem Ipsum is simply dummy text...
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @include('pages.backend.__includes.footer')
          </div>
        </div>

      </div>
    </div>

    @include('pages.backend.__includes.drawer-activities')
    @include('pages.backend.__includes.drawer-chat')
    @include('pages.backend.__includes.scroll-top')
    @include('pages.backend.__includes.modal-upgradeplan')
    @include('pages.backend.__includes.modal-searchusers')
    @include('pages.backend.__includes.modal-invitefriend')
    @include('pages.backend.__includes.js')

    <script>
      $("#logout").click(function(e) {
        Swal.fire({
          title: "{{ __('default.notification.confirm.are-you-sure') }}?",
          text: "{{ __('default.label.logout-session') }}",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: '{{ __("default.label.yes") }}',
          cancelButtonText: '{{ __("default.label.no") }}',
          reverseButtons: false
        }).then(function(result) {
          if (result.value) {
            Swal.fire({
              text: "{{ __('default.label.redirect-login') }}",
              timer: 2000,
              showConfirmButton: false,
              allowOutsideClick: false,
              didOpen: () => {
    Swal.showLoading();
  },
            }).then(function(result) {
              if (result.dismiss === "timer") {
                window.location = "{{ url('/dashboard/logout') }}";
              }
            })
          }
        });
      });
    </script>

  </body>
</html>
