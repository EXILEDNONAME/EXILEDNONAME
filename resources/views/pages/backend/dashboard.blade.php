<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="../"/>
    <title> Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes </title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="/assets/backend/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="/assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/backend/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/backend/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/backend/css/style.bundle.css" rel="stylesheet" type="text/css" />
  </head>

  <body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" data-kt-app-toolbar-fixed="true" class="app-default">
    <script>
      var defaultThemeMode = "light";
      var themeMode;
      if ( document.documentElement ) {
        if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); }
        else {
          if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); }
          else { themeMode = defaultThemeMode; }
        }
        if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
      }
    </script>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
      <!--begin::Page-->
      <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <!--begin::Header-->
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
              <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                  <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <span class="menu-link">
                      <span class="menu-title"> Dashboards </span>
                    </span>
                  </div>
                </div>
              </div>

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
                      Lorem Ipsum is simply dummy text...
                    </div>
                  </div>

                  <div class="row gx-5 gx-xl-10">

                    <div class="col-xl-4 mb-5 mb-xl-0">
                      <div class="card card-flush h-xl-100">
                        <div class="card-header pt-7 mb-7">
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Warephase stats</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">8k social visitors</span>
                          </h3>
                          <div class="card-toolbar">
                            <a href="../../demo1/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-sm btn-light">PDF Report</a>
                          </div>
                        </div>
                        <div class="card-body d-flex align-items-end pt-0">
                          <div id="kt_charts_widget_31_chart" class="w-100 h-300px"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-8">
                      <!--begin::Chart widget 24-->
                      <div class="card card-flush overflow-hidden h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                          <!--begin::Title-->
                          <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Human Resources</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Reports by states and ganders</span>
                          </h3>
                          <!--end::Title-->
                          <!--begin::Toolbar-->
                          <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                              <i class="ki-duotone ki-dots-square fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                              </i>
                            </button>
                            <!--begin::Menu 2-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu separator-->
                              <div class="separator mb-3 opacity-75"></div>
                              <!--end::Menu separator-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Ticket</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Customer</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                <!--begin::Menu item-->
                                <a href="#" class="menu-link px-3">
                                  <span class="menu-title">New Group</span>
                                  <span class="menu-arrow"></span>
                                </a>
                                <!--end::Menu item-->
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                  <!--begin::Menu item-->
                                  <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Admin Group</a>
                                  </div>
                                  <!--end::Menu item-->
                                  <!--begin::Menu item-->
                                  <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Staff Group</a>
                                  </div>
                                  <!--end::Menu item-->
                                  <!--begin::Menu item-->
                                  <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Member Group</a>
                                  </div>
                                  <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Contact</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu separator-->
                              <div class="separator mt-3 opacity-75"></div>
                              <!--end::Menu separator-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <div class="menu-content px-3 py-3">
                                  <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                </div>
                              </div>
                              <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->
                            <!--end::Menu-->
                          </div>
                          <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                          <!--begin::Chart-->
                          <div id="kt_charts_widget_24" class="min-h-auto" style="height: 300px"></div>
                          <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                      </div>
                      <!--end::Chart widget 24-->
                    </div>
                    <!--end::Col-->
                  </div>
                  <!--end::Row-->
                </div>
                <!--end::Content container-->
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

    <script>var hostUrl = "/assets/backend/";</script>
    <script src="/assets/backend/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/backend/js/scripts.bundle.js"></script>
    <script src="/assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="/assets/backend/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="/assets/backend/js/widgets.bundle.js"></script>
    <script src="/assets/backend/js/custom/widgets.js"></script>
    <script src="/assets/backend/js/custom/apps/chat/chat.js"></script>
    <script src="/assets/backend/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="/assets/backend/js/custom/utilities/modals/users-search.js"></script>
  </body>
</html>
