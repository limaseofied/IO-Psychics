<div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input type="text" class="searchinput" />
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li class="{{ Request::is('admin/horoscope-signs*') ? 'active' : '' }}">
            <a href="{{ url('admin/horoscope-signs') }}">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> Horoscope Sign </span>
            </a>
        </li>

    {{-- <li class="menu-dropdown">
        
    <a href="#" class="menu-dropdown">
        <i class="menu-icon glyphicon glyphicon-tasks"></i>
        <span class="menu-text"> ------ </span>
        <i class="menu-expand"></i>
    </a>

    <ul class="submenu">
        <li class="">
            <a href="">
                <span class="menu-text">---------</span>
            </a>
        </li>
        
    </ul>
    </li>  --}}
    <!-- /Sidebar Menu -->
</div>
