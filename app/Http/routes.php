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

Route::get('/','PublicController@index');

Route::group(['prefix'=>'admin'], function () {
  Route::get('/', 'DashboardController@index');
  Route::get('vendors', 'DashboardController@vendors');
  Route::get('products', 'DashboardController@products');
  Route::get('ingredients', 'DashboardController@ingredients');
});
