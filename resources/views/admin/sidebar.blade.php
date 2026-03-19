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

        <li class="menu-dropdown {{ Request::is('admin/horoscope-signs*') || Request::is('admin/daily-horoscope*') || Request::is('admin/monthly-horoscope*')  ? 'open active' : '' }}">    
            <a href="#" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon-book"></i>
                <span class="menu-text">Manage Horoscope</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li class="{{ Request::is('admin/horoscope-signs*') ? 'active' : '' }}">
                    <a href="{{ url('admin/horoscope-signs') }}">
                        <span class="menu-text"> Horoscope Sign </span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/daily-horoscope*') ? 'active' : '' }}">
                    <a href="{{ url('admin/daily-horoscope') }}">
                        <span class="menu-text">Daily Horoscope </span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/monthly-horoscope*') ? 'active' : '' }}">
                    <a href="{{ url('admin/monthly-horoscope') }}">
                        <span class="menu-text">Monthly Horoscope</span>
                    </a>
                </li>
            </ul>
        </li>

    <li class="menu-dropdown {{ Request::is('admin/specialities*') || Request::is('admin/tools*') || Request::is('admin/skills*') || Request::is('admin/readingstyles*') || Request::is('admin/faq*') || Request::is('admin/subscription*') || Request::is('admin/guides*') || Request::is('admin/pay-per-session*')  || Request::is('admin/testimonials*') || Request::is('admin/services*')  ? 'open active' : '' }}">
    
    <a href="#" class="menu-dropdown">
        <i class="menu-icon glyphicon glyphicon-book"></i>
        <span class="menu-text">Console Management</span>
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
        <li class="{{ Request::is('admin/readingstyles*') ? 'active' : '' }}">
            <a href="{{ url('admin/readingstyles') }}">
                <span class="menu-text"> Reading Style </span>
            </a>
        </li>

         <li class="{{ Request::is('admin/faq*') ? 'active' : '' }}">
            <a href="{{ url('admin/faq') }}">
                <span class="menu-text"> FAQ </span>
            </a>
        </li>

        <li class="{{ Request::is('admin/testimonials*') ? 'active' : '' }}">
            <a href="{{ url('admin/testimonials') }}">
                <span class="menu-text"> Testimonials </span>
            </a>
        </li>

         <li class="{{ Request::is('admin/services*') ? 'active' : '' }}">
            <a href="{{ url('admin/services') }}">
                <span class="menu-text"> Services </span>
            </a>
        </li>

        
        <li class="{{ Request::is('admin/subscription*') ? 'active' : '' }}">
            <a href="{{ url('admin/subscription') }}">
                <span class="menu-text">Subscription Plan</span>
            </a>
        </li>


        <li class="{{ Request::is('admin/pay-per-session*') ? 'active' : '' }}">
            <a href="{{ url('admin/pay-per-session') }}">
                <span class="menu-text">Pay Per Session</span>
            </a>
        </li>


        <li class="{{ Request::is('admin/guides*') ? 'active' : '' }}">
            <a href="{{ url('admin/guides') }}">
                <span class="menu-text">Guides</span>
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
