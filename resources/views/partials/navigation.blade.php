<div class="dashboard-navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mureed.list') }}">
                                <i class="fas fa-users"></i>
                                <span>Mureeds</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.list') }}">
                                <i class="fas fa-user-shield"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('notification.list') }}">
                                <i class="far fa-bell"></i>
                                <span>Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.profile', Auth::user()->id) }}">
                                <i class="fas fa-user"></i>
                                <span>My Profile ({{ Auth::user()->name }})</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-key"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>