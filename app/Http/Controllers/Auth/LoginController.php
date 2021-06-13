<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * find username or email
     *
     * @return string
     */
    public function username()
    {
        if (filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        } else {
            return 'username';
        }
    }

    /**
     * login validtion
     *
     * @return string
     */
    public function loginValidation(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'User id required'
        ]);
    }

    /**
     * attempt login with username or email
     *
     * @return void
     */
    public function login(Request $request)
    {
        $this->loginValidation($request);

        //attempt login with usename or email
        Auth::guard()->attempt([$this->username() => $request->email, 'password' => $request->password]);

        //was any of those correct ?
        if (Auth::guard()->check()) {
            return redirect()->intended('/');
        }

        //Nope, something wrong during authentication
        return redirect()->back()->withErrors([
            'email' => 'Invalid Userid or Password'
        ]);
    }

    //custom-logout
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        return redirect('/login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
