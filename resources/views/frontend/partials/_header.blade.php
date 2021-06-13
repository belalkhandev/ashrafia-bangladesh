<!-- header area -->
<header id="header" class="header-area">
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="{{ route('fr.home') }}">
                    {{-- <img src="{{ asset('frontend/assets/img/logo/logo-red.png') }}" alt="site-logo"> --}}
                    <h2>Anjumane Ashrafia Bangladesh</h2>
                </a>
            </div>
            @include('frontend.partials._navigation')
        </div>
    </div>
</header>
