<!DOCTYPE html>
<html lang="en">
@include('layouts.backend.__includes.head')

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  @include('layouts.backend.__includes.header-mobile')
  <div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

      @include('layouts.backend.__includes.sidebar')

      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        @include('layouts.backend.__includes.header')
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          @include('layouts.backend.__includes.subheader')
          <div class="d-flex flex-column-fluid">
            <div class="container-fluid">

              @if ($message = Session::get('success'))
              <div id="toast-container" class="toast-bottom-right">
                <div class="toast toast-success" aria-live="polite">
                  <div class="toast-message">{{ $message }}</div>
                </div>
              </div>
              @endif

              @if ($message = Session::get('error'))
              <div id="toast-container" class="toast-bottom-right">
                <div class="toast toast-error" aria-live="polite">
                  <div class="toast-message">{{ $message }}</div>
                </div>
              </div>
              @endif

              @yield('content')
            </div>
          </div>
        </div>

        @include('layouts.backend.__includes.footer')
      </div>
    </div>
  </div>

  @include('layouts.backend.__includes.scrolltop')
  @include('layouts.backend.__includes.sticky-toolbar')
  @include('layouts.backend.__includes.panel-demo')
  @include('layouts.backend.__includes.js')

</body>
</html>
