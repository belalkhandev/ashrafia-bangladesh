@extends('layouts.base')

@section('base.content')

    @include('partials.header')

    <main class="page-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('partials.footer')

@endsection()
