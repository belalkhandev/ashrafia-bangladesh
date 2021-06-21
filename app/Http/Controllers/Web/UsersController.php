<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function register()
    {
        $data = [];

        return view('register')->with($data);
    }
}
