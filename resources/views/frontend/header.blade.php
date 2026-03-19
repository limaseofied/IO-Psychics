<header>
        <div class="header-logo-bar">
            <div class="header-btn">
                {{-- <a href="#">IO Rewards</a> --}}
                <a href="{{ route('plans') }}">Plans & Pricing</a>
                <a href="{{ route('signup') }}">Sign Up</a>
                <a href="{{ route('login') }}">Log In</a>
            </div>
        </div>
        <div class="site-menu-sec">
            <nav class="navigation navigation-desktop">
                <div class="nav-menus-wrapper">
                    <ul class="nav-menu">
                        <li><a href="{{ route('guides') }}">Guides</a></li>
                        <li><a href="{{ route('horoscopes') }}">Horoscopes</a></li>
                        <li>
                            <a href="#" class="has-submenu-link">
                                Tarot
                                <span class="submenu-indicator dropdown-toggle-only d-none d-lg-inline-block">
                                    <span class="submenu-indicator-chevron"></span>
                                </span>
                            </a>
                            <span class="submenu-indicator dropdown-toggle-only d-inline-block d-lg-none">
                                <span class="submenu-indicator-chevron"></span>
                            </span>
                            <ul class="nav-dropdown">
                                <li><a href="{{ route('tarot') }}">Tarot</a></li>
                                <li><a href="{{ route('guides') }}">Connect With Tarot Guides</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('topics') }}">Topics</a></li>
                        <li>
                            <div class="header-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('frontassets/images/website_log.webp')}}" alt="" class="website-logo">
                                </a>
                            </div>
                        </li>
                        <li><a href="{{ route('how.it.works') }}">How It Works</a></li>
                        <li><a href="{{ route('about') }}">About IO</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('free.trial') }}" class="primary-btn1">Unlock Your Free Trial</a></li>
                    </ul>
                </div>
            </nav>

            <div class="site-mobile-menu-sec d-flex d-lg-none">
                <div class="header-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('frontassets/images/website_log.webp')}}" alt="" class="website-logo">
                    </a>
                </div>
                <a href="{{ route('free.trial') }}" class="primary-btn1">Free Trial</a>
                <nav class="navigation navigation-mobile navigation-hidden-init">
                    <div class="nav-header">
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu">
                            <li><a href="{{ route('guides') }}">Guides</a></li>
                            <li><a href="{{ route('horoscopes') }}">Horoscopes</a></li>
                            <li>
                                <a href="#" class="has-submenu-link">
                                    Tarot
                                    <span class="submenu-indicator dropdown-toggle-only d-none d-lg-inline-block">
                                        <span class="submenu-indicator-chevron"></span>
                                    </span>
                                </a>
                                <span class="submenu-indicator dropdown-toggle-only d-inline-block d-lg-none">
                                    <span class="submenu-indicator-chevron"></span>
                                </span>
                                <ul class="nav-dropdown">
                                    <li><a href="{{ route('tarot') }}">Tarot</a></li>
                                    <li><a href="{{ route('guides') }}">Connect With Tarot Guides</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('topics') }}">Topics</a></li>
                            <li>

                            </li>
                            <li><a href="{{ route('how.it.works') }}">How It Works</a></li>
                            <li><a href="{{ route('about') }}">About IO</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="{{ route('free.trial') }}" class="primary-btn1">Unlock Your Free Trial</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>