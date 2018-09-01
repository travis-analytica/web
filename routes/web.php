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

Route::get(
    'logout',
    [
        'as' => 'logout',
        'uses' => 'HomeController@logout',
    ]
);

Route::resource('case', 'CaseController');
Route::post(
    'case/{id}/notes/store',
    [
        'as'   => 'case.note.store',
        'uses' => 'CaseController@storeNote',
    ]
);


Route::get(
    'delinquency',
    [
        'as' => 'delinquency.index',
        'uses' => 'DelinquencyController@index',
    ]
);
Route::get(
    'delinquency/export',
    [
        'as'   => 'delinquency.export',
        'uses' => 'DelinquencyController@export',
    ]
);
