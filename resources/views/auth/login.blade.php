@extends('layouts.master')

@section('content')
    <section class="log-reg-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 offset-sm-3 offset-md-4">
                    <div class="login-wrap">
                        <div class="login-header text-center">
                            <h2>Login</h2>
                        </div>
                        <div class="login-body">
                            {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                                @csrf
                                <div class="login-form">
                                    <div class="form-group">
                                        <input type="text" name="username" placeholder="Username" class="form-control" value="{{ old('username') }}">
                                        @error('username')
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
                        <div class="login-footer">
                            <p>Have no account? <a href="{{ route('fr.register') }}">Register Now</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
