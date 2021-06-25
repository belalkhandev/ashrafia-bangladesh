<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $data = [
            'users' => User::whereHas('roles', function($q) {
                $q->whereIn('name', ['super_admin', 'admin']);
            })->paginate(10)
        ];

        return view('user-list')->with($data);
    }

    public function mureeds()
    {
        $data = [
            'users' => User::whereHas('mureed')->whereHas('roles', function($q) {
                $q->where('name', 'disciple');
            })->paginate(10)
        ];

        return view('mureeds')->with($data);
    }
}
