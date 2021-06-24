<div class="navbar">
    <div class="container">
        <div class="navbar-innr">
            <ul class="navbar-menu">
                <li>
                    <a href="{{ route('fr.home') }}">
                        <em class="ikon ikon-dashboard"></em>
                        Dashboard
                    </a>
                </li>
                <li class="has-dropdown">
                    <a href="#" class="drop-toggle">
                        <em class="ikon ikon-dashboard"></em>
                        Users
                    </a>
                    <ul class="navbar-dropdown">
                        <li><a href="{{ route('user.list') }}">All User</a></li>
                        <li><a href="{{ route('mureed.user.list') }}">Mureeds</a></li>
                        <li><a href="{{ route('super.user.list') }}">Super admins</a></li>
                        <li><a href="{{ route('admin.user.list') }}">Admins</a></li>
                        <li><a href="{{ route('fr.register') }}">Add new</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.html">
                        <em class="ikon ikon-dashboard"></em>
                        Notifications
                    </a>
                </li>
                <li>
                    <a href="index.html">
                        <em class="ikon ikon-user"></em>
                        My Profile
                    </a>
                </li>
                <li>
                    <a href="index.html">
                        <em class="ikon ikon-dashboard"></em>
                        Logout
                    </a>
                </li>
            </ul>
        </div><!-- .navbar-innr -->
    </div><!-- .container -->
</div><!-- .navbar -->
