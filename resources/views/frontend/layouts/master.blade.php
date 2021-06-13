@extends('frontend.layouts.base')

@section('content.base')

    @include('frontend.partials._header')

    <main class="main-content">
        @yield('content')
    </main>

    @include('frontend.partials._footer')

@endsection()
