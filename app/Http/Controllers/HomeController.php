<?php

namespace App\Http\Controllers;

use Auth;
use App\TaxInfo;
use Illuminate\Http\Request;
use \App\Http\Controllers\TaxInfoController;

class HomeController extends Controller
{
    /**
     * Display a site homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::guest() ) {
            return view( 'login.login' );
        }else{

            $latestBatch = TaxInfoController::getLatestBatchNumber();
            $parcelsInBatch = TaxInfo::where('batch_id', $latestBatch)->count();
            $scrapedParcels = TaxInfo::where('batch_id', $latestBatch)->where('status', '!=', 0)->count();
            $percentScraped = round( (100 / $parcelsInBatch) * $scrapedParcels , 2);
            $latestBatch = $latestBatch;

            return view( 'welcome', compact('percentScraped', 'latestBatch') );
        }
    }

    /**
     * Attempt to create a user session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * End the current user session
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect( route('home') );
    }

}
