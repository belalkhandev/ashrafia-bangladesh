<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $data = [];

        if(Auth::user() && Auth::user()->hasRoles(['super_admin', 'admin'])) {
            return redirect()->route('dashboard');
        }

        return view('index')->with(array_merge($this->data, $data));
    }
}
