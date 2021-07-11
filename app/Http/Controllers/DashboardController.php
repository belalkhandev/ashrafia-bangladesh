<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::user()->hasRoles(['super_admin', 'admin'])) {
            return redirect()->route('fr.home');
        }

        $data = [
            'users' => User::whereHas('mureed')->where('is_active', 1)->latest()->take(10)->get(),
            'notifications' => Notification::where('is_active', 1)->latest()->take(5)->get()
        ];

        return view('dashboard')->with($data);
    }

}
