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

         <li class="menu-dropdown {{ Request::is('admin/specialities*') || Request::is('admin/tools*') || Request::is('admin/skills*') || Request::is('admin/reading_style*') ? 'open active' : '' }}">
    
    <a href="#" class="menu-dropdown">
        <i class="menu-icon glyphicon glyphicon-book"></i>
        <span class="menu-text"> Master Data</span>
        <i class="menu-expand"></i>
    </a>

    <ul class="submenu">      

        <li class="{{ Request::is('admin/specialities*') ? 'active' : '' }}">
            <a href="{{ url('admin/specialities') }}">
                <span class="menu-text">Specialities</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/tools*') ? 'active' : '' }}">
            <a href="{{ url('admin/tools') }}">
                <span class="menu-text"> Tools </span>
            </a>
        </li>
        <li class="{{ Request::is('admin/skills*') ? 'active' : '' }}">
            <a href="{{ url('admin/skills') }}">
                <span class="menu-text"> Skills </span>
            </a>
        </li>
        <li class="{{ Request::is('admin/reading_style*') ? 'active' : '' }}">
            <a href="{{ url('admin/reading_style') }}">
                <span class="menu-text"> Reading Style </span>
            </a>
        </li>

    </ul>

</li>


    <li class="menu-dropdown {{ Request::is('admin/blog*') || Request::is('admin/category*') ? 'open active' : '' }}">
    
    <a href="#" class="menu-dropdown">
        <i class="menu-icon glyphicon glyphicon-book"></i>
        <span class="menu-text"> Blog Management </span>
        <i class="menu-expand"></i>
    </a>

    <ul class="submenu">       

        {{-- Manage Categories --}}
        <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
            <a href="{{ url('admin/category') }}">
                <span class="menu-text"> Manage Categories </span>
            </a>
        </li>
        {{-- Manage Blogs --}}
        <li class="{{ Request::is('admin/blog*') ? 'active' : '' }}">
            <a href="{{ url('admin/blog') }}">
                <span class="menu-text"> Manage Blogs </span>
            </a>
        </li>

    </ul>

</li>

</div>
