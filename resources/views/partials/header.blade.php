<!-- header -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo text-center">
                    <a href="{{ route('fr.home') }}">
                        <img src="{{ asset('assets/images/app_logo.png') }}" alt="">
                        <h2>{{ __('lang.logo_name') }}</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user() && Auth::user()->hasRoles(['super_admin', 'admin']))
        @include('partials.navigation')
        @else
        @include('partials.user-navigation')
    @endif
</header>
<!-- /header -->
