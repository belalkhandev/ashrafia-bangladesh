@extends('layouts.base')

@section('base.content')
    @include('partials.header')

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="error-box">
                            <h1>401</h1>
                            <strong>Access Unauthorized</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include('partials.footer')
@endsection