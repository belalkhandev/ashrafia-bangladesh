<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //user register
    public function register(Request $request)
    {
        //set validation rules
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required'
        ];

        //set validation custom message
        $messages = [
            'username.required' => 'User ID is required'
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules, $messages);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        //register new user
        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->password = app('hash')->make($request->input('password'));
        $user->otp = rand(111111, 999999);

        if ($user->save()) {
            //assign role
            $user->attachRole(Role::where('name', 'disciple')->first());
            //register as murids

            //create token
            $token = $user->createToken('ashrafia')->accessToken;

            return response()->json([
                'status' => true,
                'message' => 'You have registered successfully',
                'user' => $user,
                'roler' => $user->role()->name,
                'token' => $token
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Failed to register',
        ]);
    }

    // login
    public function login(Request $request)
    {
        //set validation rules
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        //set validation custom message
        $messages = [
            'username.required' => 'User ID is required'
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        $credentials = $request->only('username', 'password');

        if ($authorized = Auth::guard()->attempt($credentials)) {
            $token = Auth::guard()->user()->createToken($authorized)->accessToken;

            return response()->json([
                'status' => true,
                'message' => 'Logged in successfully',
                'user' => Auth::guard()->user(),
                'role' => Auth::guard()->user()->role()->name,
                'token' => $token
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to login, Invalid credentials'
            ]);
        }
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        if ($this->guard()->user()) {
            return response()->json([
                'status' => true,
                'user' => $this->guard()->user(),
                'message' => 'Authorized'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Unauthorized'
        ], 401);
    }

     /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $token = $this->guard()->user()->token();
        if ($token->revoke()) {
            return response()->json([
                'status' => true,
                'message' => 'You have been successfully logged out!'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Failed to logout!'
        ]);

    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard('api');
    }
}
