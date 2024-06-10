<!DOCTYPE html>
<html lang="en">
@include('templates.__includes.head')

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  @include('templates.__includes.header-mobile')
  <div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

      @include('templates.__includes.sidebar')

      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        @include('templates.__includes.header')
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          @include('templates.__includes.subheader')
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
  @include('templates.__includes.scrolltop')
  @include('templates.__includes.sticky-toolbar')
  @include('templates.__includes.panel-demo')
  @include('templates.__includes.js')

</body>
</html>
