<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userList()
    {
        $data = [
            'users' => User::get()
        ];

        return view('user.users')->with($data);
    }

    public function mureedUserList()
    {
        $data = [
            'users' => User::whereHas('roles', function($q) {
                $q->where('name', 'disciple');
            })->get()
        ];

        return view('user.superusers')->with($data);
    }

    public function superUserList()
    {
        $data = [
            'users' => User::whereHas('roles', function($q) {
                $q->where('name', 'super_admin');
            })->get()
        ];

        return view('user.superusers')->with($data);
    }

    public function adminUserList()
    {
        $data = [
            'users' => User::whereHas('roles', function($q) {
                $q->where('name', 'admin');
            })->get()
        ];

        return view('user.adminusers')->with($data);
    }
}
