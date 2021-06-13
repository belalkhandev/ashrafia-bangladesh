<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data = [];

        return view('frontend.index')->with(array_merge($this->data, $data));
    }
}
