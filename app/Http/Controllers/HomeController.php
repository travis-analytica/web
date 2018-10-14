<?php

namespace App\Http\Controllers;

use Auth;
use App\TaxInfo;
use Illuminate\Http\Request;
use \App\Http\Controllers\TaxInfoController;

class HomeController extends Controller
{

    public function index()
    {
        if( Auth::guest() ) {
            return view('login.login');
        }else{

            $latestBatch = TaxInfoController::getLatestBatchNumber();
            $parcelsInBatch = TaxInfo::where('batch_id', $latestBatch)->count();
            $scrapedParcels = TaxInfo::where('batch_id', $latestBatch)->where('status', '!=', 0)->count();
            $data['percentScraped'] = round( (100 / $parcelsInBatch) * $scrapedParcels , 2);
            $data['latestBatch'] = $latestBatch;

            return view('welcome', $data);
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
