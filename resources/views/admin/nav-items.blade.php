<!-- Notifications Dropdown -->
<li>
    <a class="dropdown-toggle" data-toggle="dropdown" title="Help" href="#">
        <i class="icon fa fa-warning"></i>
    </a>
    <ul class="pull-right dropdown-menu dropdown-arrow dropdown-notifications">
        <li>
            <a href="#">
                <div class="clearfix">
                    <div class="notification-icon">
                        <i class="fa fa-phone bg-themeprimary white"></i>
                    </div>
                    <div class="notification-body">
                        <span class="title">Skype meeting with Patty</span>
                        <span class="description">01:00 pm</span>
                    </div>
                </div>
            </a>
        </li>

        
        <!-- More notifications -->
    </ul>
</li>

<!-- Messages Dropdown -->
<li>
    <a class="wave in dropdown-toggle" data-toggle="dropdown" title="Messages" href="#">
        <i class="icon fa fa-envelope"></i>
        <span class="badge">3</span>
    </a>
    <ul class="pull-right dropdown-menu dropdown-arrow dropdown-messages">
        <li>
            <a href="#">
                <img src="{{ asset('assets/img/avatars/divyia.jpg') }}" class="message-avatar" alt="Divyia Austin">
                <div class="message">
                    <span class="message-sender">Divyia Austin</span>
                    <span class="message-time">2 minutes ago</span>
                    <span class="message-subject">Here's the recipe for apple pie</span>
                </div>
            </a>
        </li>
        <!-- More messages -->
    </ul>
</li>

<!-- Tasks Dropdown, Profile, etc. -->
 <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="{{ asset('assets/img/avatars/adam-jansen.jpg')}}">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span>{{ $admin->name }}</span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a>{{ $admin->name }}</a></li>
                                    <li class="email"><a>{{ $admin->email }}</a></li>
                                   
                                    <li class="dropdown-footer">

                                         <a href="{{ route('admin.profile.edit') }}">
                                            <i class="fa fa-user"></i> Edit Profile
                                        </a> <br> 

                                        <a href="{{ route('admin.profile.changepassword') }}">
                                            <i class="fa fa-user"></i> Change Password
                                        </a> <br> 

                                        <a href="#" 
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Sign out
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>