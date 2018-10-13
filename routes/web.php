<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    [
        'as' => 'home',
        'uses' => 'HomeController@index',
    ]
);

Route::post(
    'login',
    [
        'as' => 'login',
        'uses' => 'HomeController@login',
    ]
);

/*
|--------------------------------------------------------------------------
| Auth Protected Routes
|--------------------------------------------------------------------------
|
| These routes are only accessible when a user is logged in
|
*/
Route::group(['middleware' => ['auth']], function() {


Route::get(
    'logout',
    [
        'as' => 'logout',
        'uses' => 'HomeController@logout',
    ]
);

Route::resource('case', 'CaseController');
Route::post(
    'case/{id}/status/store',
    [
        'as'   => 'case.status.store',
        'uses' => 'CaseController@storeStatus',
    ]
);
Route::post(
    'case/{id}/notes/store',
    [
        'as'   => 'case.note.store',
        'uses' => 'CaseController@storeNote',
    ]
);


Route::get(
    'tax-info',
    [
        'as' => 'tax-info.index',
        'uses' => 'TaxInfoController@index',
    ]
);
Route::get(
    'tax-info/export',
    [
        'as'   => 'tax-info.export',
        'uses' => 'TaxInfoController@export',
    ]
);

Route::get(
    'tax-info/upload',
    [
        'as'   => 'tax-info.parcel-id.upload',
        'uses' => 'TaxInfoController@upload',
    ]
);

Route::post(
    'tax-info/store',
    [
        'as'   => 'tax-info.parcel-id.store',
        'uses' => 'TaxInfoController@store',
    ]
);


}); /* End of middleware:auth group */
