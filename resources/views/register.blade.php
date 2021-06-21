@extends('frontend.layouts.master')

@section('content')
    {{-- page title --}}
    @include('frontend.partials._page_title')
    
    <section class="log-reg-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="login-wrap">
                        <div class="login-header text-center">
                            <h2>Login</h2>
                        </div>
                        <div class="login-body">
                            {!! Form::open(['route' => 'frontend.login', 'method' => 'POST']) !!}
                                @csrf
                                <div class="login-form">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Enter email or username" class="form-control" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Enter password" class="form-control">
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
                <div class="col-md-6">
                    <div class="register-wrap">
                        <div class="register-header">
                            <h2>Create New Account</h2>
                        </div>
                        <div class="register-body">
                            {!! Form::open(['route' => 'frontend.register', 'method' => 'POST']) !!}
                                @csrf
                                <div class="register-form">
                                    <div class="user-role">
                                        <div class="form-group">
                                            <label class="radio-container">
                                                <input type="radio" name="role" class="radio-input" value="employee" checked>
                                                <div class="radio-wrap"></div>
                                                <span>Candidate</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="radio-container">
                                                <input type="radio" name="role" class="radio-input" value="employer">
                                                <div class="radio-wrap"></div>
                                                <span>Employer</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="first_name" placeholder="First name" class="form-control">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="last_name" placeholder="Last name" class="form-control">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email" class="form-control">
                                        <span class="text-danger"></span>                                  
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" placeholder="Username" class="form-control">
                                        <span class="text-danger"></span>                                      
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" placeholder="Confirm password" class="form-control">
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-submit-group">
                                        <button class="btn submit-btn btn-danger" type="submit" onclick="submit_form(this, event)">Register</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="register-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection