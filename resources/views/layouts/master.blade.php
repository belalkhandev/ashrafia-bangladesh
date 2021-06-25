@extends('layouts.base')

@section('base.content')

    @include('partials.header')    
    
    <main class="main-content pt-50 pb-50">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('partials.footer')

@endsection()
