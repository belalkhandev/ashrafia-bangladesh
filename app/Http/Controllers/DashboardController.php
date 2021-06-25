<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::whereHas('mureed')->latest()->take(10)->get()
        ];

        return view('dashboard')->with($data);
    }

}
