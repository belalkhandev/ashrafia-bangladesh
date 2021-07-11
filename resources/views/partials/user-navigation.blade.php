<div class="dashboard-navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar">
                    <ul>
                        <li>
                            <a href="{{ route('fr.home') }}">
                                <i class="fas fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        @if(Auth::user())                        
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
                        @endif                                            
                        <li>
                            <a href="{{ route('fr.contact') }}">
                                <i class="fas fa-envelope"></i>
                                <span>{{ __('lang.contact_us') }}</span>
                            </a>  
                        </li>

                        @if(!Auth::user())
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>{{ __('lang.login') }}</span>
                                </a> 
                            </li>
                            <li>
                                <a href="{{ route('fr.register') }}">
                                    <i class="fas fa-user-plus"></i>
                                    <span>{{ __('lang.register') }}</span>
                                </a> 
                            </li>
                        @elseif(Auth::user()->hasRole('disciple'))
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('lang.logout') }} ({{ Auth::user()->name }})
                                </a>
                            </li>
                        @endif

                        @if (App()->getLocale() === 'en')
                            <li>
                                <a href="/locale/bn">
                                    <i class="fas fa-language"></i>
                                    <span>বাংলা</span>
                                </a> 
                            @else
                            <li>
                                <a href="/locale/en">
                                    <i class="fas fa-language"></i>
                                    <span>Eng</span>
                                </a> 
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>