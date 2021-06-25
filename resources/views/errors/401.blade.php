@extends('layouts.base')

@section('base.content')
    @include('partials.header')

        <main class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="error-box">
                            <h1>401</h1>
                            <strong>UnAuthorized Access</strong>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    @include('partials.footer')
@endsection