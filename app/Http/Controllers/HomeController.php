<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        if( Auth::guest() ) {
            return view('login.login');
        }else{
            return view('home');
        }
    }

}
