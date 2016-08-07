<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('site.index');
});


Route::auth();

Route::group(['prefix'=> 'app', 'middleware'=>'auth'], function () {

  Route::get('/', [
    'as' => 'dashboard',
    'uses' => 'DashboardController@index'
  ]);

  Route::get('settings', [
    'as' => 'settings',
    'uses' => 'DashboardController@settings'
  ]);

  Route::get('profile', [
    'as'=>'profile',
    'uses' => 'DashboardController@profile'
  ]);

});
