<!DOCTYPE html>
<html lang="en">
<head>
  <base href="../../">
  <meta charset="utf-8">
  <title> Metronic | Empty Page </title>
  <meta name="description" content="Page with empty content">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/assets/backend/css/fonts/poppins.css?family=Poppins:300,400,500,600,700">
  <link rel="stylesheet" type="text/css" href="/assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.css">
  <link rel="stylesheet" type="text/css" href="/assets/backend/plugins/global/plugins.bundle.css">
  <link rel="stylesheet" type="text/css" href="/assets/backend/plugins/custom/prismjs/prismjs.bundle.css">
  <link rel="stylesheet" type="text/css" href="/assets/backend/css/style.bundle.css">
  <link rel="stylesheet" type="text/css" href="/assets/backend/css/themes/layout/header/base/light.css">
  <link rel="stylesheet" type="text/css" href="/assets/backend/css/themes/layout/header/menu/light.css">
  <link rel="stylesheet" type="text/css" href="/assets/backend/css/themes/layout/brand/dark.css">
  <link rel="stylesheet" type="text/css" href="/assets/backend/css/themes/layout/aside/dark.css">
  <link rel="shortcut icon" href="/assets/backend/media/logos/favicon.ico">
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

  <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">

    <a href="index.html">
      <img alt="Logo" src="/assets/backend/media/logos/logo-light.png"/>
    </a>

    <div class="d-flex align-items-center">
      <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
        <span></span>
      </button>

      <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
        <span></span>
      </button>

      <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
        <span class="svg-icon svg-icon-xl">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <polygon points="0 0 24 0 24 24 0 24"/>
              <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
              <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
            </g>
          </svg>
        </span>
      </button>
    </div>
  </div>

  <div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

      @include('templates.__includes.sidebar')

      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        <div id="kt_header" class="header header-fixed">
          <div class="container-fluid d-flex align-items-stretch justify-content-between">
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
              <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <ul class="menu-nav">
                  <li class="menu-item menu-item-submenu menu-item-rel menu-item-active" data-menu-toggle="click" aria-haspopup="true">
                    <a  href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Pages</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu menu-submenu-classic menu-submenu-left" ><ul class="menu-subnav">
                      <li class="menu-item" aria-haspopup="true">
                        <a href="index.html" class="menu-link ">
                          <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000"/>
                                <path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                              </g>
                            </svg>
                          </span>
                          <span class="menu-text"> My Account </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="topbar">
            @include('templates.__includes.notification')
            @include('templates.__includes.language')
            @include('templates.__includes.user')
          </div>

        </div>
      </div>

      <!--begin::Content-->
      <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
          <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
              <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bold my-1 mr-5">
                  Empty Page
                </h5>

                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                  <li class="breadcrumb-item"><a href="" class="text-muted"> General </a></li>
                  <li class="breadcrumb-item"><a href="" class="text-muted"> Empty Page </a></li>
                </ul>
              </div>
            </div>

            <div class="d-flex align-items-center">
              <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm"> Actions </a>
            </div>
          </div>
        </div>

        <div class="d-flex flex-column-fluid">
          <div class=" container ">
            <p>Page content goes here...</p>
          </div>
        </div>
      </div>

      @include('templates.__includes.footer')
    </div>
  </div>
</div>

@include('templates.__includes.panel-user')

<div id="kt_scrolltop" class="scrolltop">
  <span class="svg-icon">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
      </g>
    </svg>
  </span>
</div>

@include('templates.__includes.sticky-toolbar')
@include('templates.__includes.panel-demo')

<script> var EXILEDNONAME = { }; </script>
<script src="/assets/backend/plugins/global/plugins.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/js/scripts.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/widgets.js?v=7.0.6"></script>
</body>
</html>
