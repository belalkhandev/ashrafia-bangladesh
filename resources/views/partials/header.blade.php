<div class="topbar-wrap">
    <div class="topbar is-sticky">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="topbar-nav d-lg-none">
                    <li class="topbar-nav-item relative"><a class="toggle-nav" href="#">
                            <div class="toggle-icon">
                                <span class="toggle-line"></span>
                                <span class="toggle-line"></span>
                                <span class="toggle-line"></span>
                                <span class="toggle-line"></span>
                            </div>
                        </a>
                    </li><!-- .topbar-nav-item -->
                </ul><!-- .topbar-nav -->
                <a class="topbar-logo" href="index-2.html">
                    <img src="images/logo-light2x.png" srcset="{{ asset('assets/images/anjlogo.png') }}" alt="logo">
                </a>
                @if(Auth::user())
                    <ul class="topbar-nav">
                        <li class="topbar-nav-item relative"><span
                                class="user-welcome d-none d-lg-inline-block">Welcome! {{ Auth::user()->name }}</span><a
                                class="toggle-tigger user-thumb" href="#"><em class="ti ti-user"></em></a>
                            <div
                                class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
                                <ul class="user-links">
                                    <li><a href="profile.html"><i class="ti ti-id-badge"></i>My Profile</a></li>
                                    <li><a href="profile.html"><i class="ti ti-id-badge"></i>Edit Profile</a></li>
                                    <li><a href="#"><i class="ti ti-infinite"></i>Change Password</a></li>
                                    <li><a href="{{ route('logout') }}"><i class="ti ti-power-off"></i>Logout</a></li>
                                </ul>
                            </div>
                        </li><!-- .topbar-nav-item -->
                    </ul><!-- .topbar-nav -->
                @endif
            </div>
        </div><!-- .container -->
    </div><!-- .topbar -->
    @if(!Auth::user())
        @include('partials.navigation')

    @elseif(in_array(Auth::user()->role()->name, ['super_admin', 'admin']))
        @include('partials.dashboard-navigation')

    @elseif(Auth::user()->role()->name === 'disciple')
        @include('partials.user-navigation')
    @endif
</div><!-- .topbar-wrap -->
