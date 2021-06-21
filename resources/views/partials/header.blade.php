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
                                class="user-welcome d-none d-lg-inline-block">Welcome! Stefan Harary</span><a
                                class="toggle-tigger user-thumb" href="#"><em class="ti ti-user"></em></a>
                            <div
                                class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
                                <div class="user-status">
                                    <h6 class="user-status-title">Token balance</h6>
                                    <div class="user-status-balance">12,000,000 <small>TWZ</small></div>
                                </div>
                                <ul class="user-links">
                                    <li><a href="profile.html"><i class="ti ti-id-badge"></i>My Profile</a></li>
                                    <li><a href="#"><i class="ti ti-infinite"></i>Referral</a></li>
                                    <li><a href="activity.html"><i class="ti ti-eye"></i>Activity</a></li>
                                </ul>
                                <ul class="user-links bg-light">
                                    <li><a href="sign-in.html"><i class="ti ti-power-off"></i>Logout</a></li>
                                </ul>
                            </div>
                        </li><!-- .topbar-nav-item -->
                    </ul><!-- .topbar-nav -->
                @endif
            </div>
        </div><!-- .container -->
    </div><!-- .topbar -->
    @include('partials.navigation')
</div><!-- .topbar-wrap -->
