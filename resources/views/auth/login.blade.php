<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- vendors -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
    <!-- main styles-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>

<!-- login container -->
<div class="login-container">
    <!-- login content -->
    <div class="login-content">
        <!-- login header -->
        <div class="login-header mb-30 pt-15">
            <div class="logo">
                <img src="{{ asset('assets/images/app_logo.png') }}" alt="" width="90px">
                <h3>{{ __('lang.logo_name') }}</h3>
                <p>{{ __('lang.login_account') }}</p>
            </div>
        </div>
        <!-- login body -->
        <div class="login-body">
            {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="username" placeholder="{{ __('lang.user_id') }}" class="form-control" value="{{ old('username') }}">
                    </div>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" name="password" placeholder="*********" class="form-control">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-controls mb-15">
                    <div class="form-control-item">
                        <label>
                            <input type="checkbox" name="remember_me" >
                            <span>Remember me</span>
                        </label>
                    </div>
                    {{-- <div class="form-control-item">
                        <i class="fas fa-lock"></i>
                        <a href="#">Forgot Password?</a>
                    </div> --}}
                </div>
                <div class="form-submit-control mt-30">
                    <button class="btn btn-primary w-100" type="submit">{{ __('lang.login') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- login footer -->
        <div class="login-footer text-center mt-25">
            <p>{{ __('lang.no_account') }} <a href="{{ route('fr.register') }}">{{ __('reg.register_now') }}</a></p>
        </div>
    </div>
</div>

<!-- scripts -->
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.j') }}s"></script>
</body>
</html>
