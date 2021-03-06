@extends('frontend.layouts.master')

@section('content')
    {{-- page title --}}
    @include('frontend.partials._page_title')

    <section class="log-reg-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="login-wrap">
                        <div class="login-header text-center">
                            <h2>Login</h2>
                        </div>
                        <div class="login-body">
                            {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                                @csrf
                                <div class="login-form">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="username" class="form-control" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="password" class="form-control">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-submit-group">
                                        <button class="btn submit-btn btn-success " type="submit">Login</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="login-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
