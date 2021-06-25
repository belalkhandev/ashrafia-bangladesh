<!-- header -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="logo">
                    <a href="{{ route('fr.home') }}">
                        <h2>AnjumanEAshrafia Bangladesh</h2>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <nav class="mainmenu">
                    <ul>
                        @if(!Auth::user())
                            <li><a href="{{ route('fr.home') }}">Home</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li class="auth-link login-link"><a href="{{ route('login') }}">Login</a></li>
                            <li class="auth-link register-link"><a href="{{ route('fr.register') }}">Register</a></li>
                        @else
                        @if(Auth::user()->hasRole('disciple'))
                            <li><a href="{{ route('fr.home') }}">Home</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">My Profile ({{ Auth::user()->name }})</a></li>
                        @endif
                        <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- /header -->
