@extends('layouts.base')

@section('base.content')
    @include('partials.header')

        <main class="main-content pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="error-box pt-70">
                            <img src="{{ asset('assets/images/404.svg') }}" alt="">
                            <div class="mb-20"></div>
                            <h3>Access Denied</h3>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    @include('partials.footer')
@endsection
