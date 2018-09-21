<?php

namespace App\Http\Controllers;

use Auth;
use App\TaxInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        if( Auth::guest() ) {
            return view('login.login');
        }else{
            $scraped = TaxInfo::where('status', '>', 0)->count();
            $properties = TaxInfo::count();
            $progress = round( ((100 / $properties) * $scraped), 2);

            return view('welcome', ['progress' => $progress]);
        }
    }

    public function login(Request $request)
    {

        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $credentials = $request->only('email', 'password');
        $remember = ($request->get('remember-me') == 'remember-me') ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended( route('home') );
        }else{
            return redirect()->back()->withInput($request->all());
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect( route('home') );
    }

}
