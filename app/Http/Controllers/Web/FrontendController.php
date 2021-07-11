<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $data = [];

        if(Auth::user() && Auth::user()->hasRoles(['super_admin', 'admin'])) {
            return redirect()->route('dashboard');
        }

        return view('index')->with($data);
    }

    public function information()
    {
        $data = [];

        if(Auth::user() && Auth::user()->hasRoles(['super_admin', 'admin'])) {
            return redirect()->route('dashboard');
        }

        return view('information')->with($data);
    }

    public function contact()
    {
        $data = [];

        if(Auth::user() && Auth::user()->hasRoles(['super_admin', 'admin'])) {
            return redirect()->route('dashboard');
        }

        return view('contact')->with($data);
    }

    public function switchLang($locale){
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
