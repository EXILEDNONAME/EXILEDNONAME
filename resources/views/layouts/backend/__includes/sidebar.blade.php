<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

  <div class="brand flex-column-auto" id="kt_brand">
    <a href="/dashboard" class="brand-logo">
      <h4 class="text-white"> EXILEDNONAME </h4>
    </a>
  </div>

  <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">

      <ul class="menu-nav">
        <li class="menu-item {{ (request()->is('dashboard')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard') }}" class="menu-link"><i class="menu-icon fas fa-desktop"></i><span class="menu-text"> Dashboard </span></a></li>

        <li class="menu-section">
          <h4 class="menu-text"> APPLICATIONS </h4>
          <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/applications/datatables*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/applications/datatables') }}" class="menu-link "><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Datatables </span></a></li>

        <li class="menu-section">
          <h4 class="menu-text"> EXTENSIONS </h4>
          <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/file-manager*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/file-manager') }}" class="menu-link"><i class="menu-icon fas fa-hdd"></i><span class="menu-text"> File Manager </span></a></li>

        <li class="menu-section">
          <h4 class="menu-text"> SETTINGS </h4>
          <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/settings/profiles*')) ? 'menu-item-open' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon fas fa-user-tie"></i>
            <span class="menu-text"> Profiles </span>
            <i class="menu-arrow"></i>
          </a>
          <div class="menu-submenu">
            <ul class="menu-subnav">
              <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/settings/profiles/account-informations*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/settings/profiles/account-informations') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Account Informations </span></a></li>
              <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/settings/profiles/change-password*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/settings/profiles/change-password') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Change Password </span></a></li>
            </ul>
          </div>
        </li>
        <li class="menu-item"><a class="menu-link" id="logout"><i class="menu-icon fas fa-sign-out-alt"></i><span class="menu-text"> {{ __('default.label.logout') }} </span></a></li>

        <li class="menu-section">
          <h4 class="menu-text"> ADMINISTRATIVE </h4>
          <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>

        <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/administrative/applications*')) ? 'menu-item-open' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon fab fa-xing"></i>
            <span class="menu-text"> Applications </span>
            <i class="menu-arrow"></i>
          </a>
          <div class="menu-submenu">
            <ul class="menu-subnav">
              <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/administrative/applications/customizations*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/administrative/applications/customizations') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Customizations </span></a></li>
              <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/administrative/applications/optimizations*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/administrative/applications/optimizations') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Optimizations </span></a></li>
              <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/administrative/applications/settings*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/administrative/applications/settings') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Settings </span></a></li>
            </ul>
          </div>
        </li>



        <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/administrative/managements*')) ? 'menu-item-open' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon fas fa-user-shield"></i>
            <span class="menu-text"> Managements </span>
            <i class="menu-arrow"></i>
          </a>
          <div class="menu-submenu">
            <ul class="menu-subnav">
              <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/administrative/managements/permissions*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/administrative/managements/permissions') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Permissions </span></a></li>
              <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/administrative/managements/roles*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/administrative/managements/roles') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Roles </span></a></li>
              <li class="menu-item menu-item-submenu {{ (request()->is('dashboard/administrative/managements/users*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/administrative/managements/users') }}" class="menu-link"><span class="menu-text"><i class="menu-bullet menu-bullet-dot"><span></span></i> Users </span></a></li>
            </ul>
          </div>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/administrative/sessions*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/administrative/sessions') }}" class="menu-link "><i class="menu-icon fas fa-clock"></i><span class="menu-text"> Sessions </span></a></li>
        <li class="menu-item {{ (request()->is('dashboard/administrative/statistics*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/administrative/statistics') }}" class="menu-link "><i class="menu-icon fas fa-bug"></i><span class="menu-text"> Statistics </span></a></li>

      </ul>

    </div>
  </div>
</div>
