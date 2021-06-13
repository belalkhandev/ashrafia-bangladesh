{{-- navigation area --}}
<nav class="main-menu">
    <ul>
        <li><a href="{{ route('fr.home') }}">Home</a></li>
        <li><a href="{{ route('fr.information') }}">Information</a></li>
        @if (!Auth::user())
        <li><a href="#">Login</a></li>
        <li><a href="#">Register</a></li>
        @endif
    </ul>
</nav>
