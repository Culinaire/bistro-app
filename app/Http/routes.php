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

Route::get('/',['as'=>'home', function () { return view('site.index'); }]);

Route::auth();

/**
 * Application Routes
 */
Route::group(['prefix'=> 'app', 'middleware'=>'auth'], function () {

  Route::get('/', 'DashboardController@index');
  Route::get('settings', 'DashboardController@settings');
  Route::get('profile', 'DashboardController@profile');

  Route::get('recipes/import', 'RecipesController@import');
  Route::get('recipes/scan', 'RecipesController@scan');

  Route::group(['prefix'=>'recipes'], function () {

    Route::get('/', [
      'as'=> 'app.recipes.index',
      'uses' => 'RecipesController@index'
    ]);

    Route::get('create', [
      'as' => 'recipes.create',
      'uses' => 'RecipesController@create'
    ]);

    Route::post('create', [
      'as' => 'recipes.store',
      'uses' => 'RecipesController@store'
    ]);

    /**
     * Batch Recipe Routes
     */
    Route::group(['prefix'=>'batch'], function () {

      Route::get('import', [
        'as'=> 'recipes.batch.import',
        'uses' => 'BatchRecipesController@import'
      ]);
      Route::get('importyaml', [
        'as'=> 'recipes.batch.importyaml',
        'uses' => 'BatchRecipesController@importFromYaml'
      ]);
      Route::get('export', [
        'as'=> 'recipes.batch.export',
        'uses' => 'BatchRecipesController@saveToYaml'
      ]);
    });

    Route::resource('batch', 'BatchRecipesController');

    /**
     * Build Recipe Routes
     */
    Route::group(['prefix'=>'build'], function () {
      Route::get('import', [
        'as'=> 'recipes.build.import',
        'uses' => 'BuildRecipesController@import'
      ]);
      Route::get('importyaml', [
        'as'=> 'recipes.build.importyaml',
        'uses' => 'BuildRecipesController@importFromYaml'
      ]);
      Route::get('export', [
        'as'=> 'recipes.build.export',
        'uses' => 'BuildRecipesController@saveToYaml'
      ]);
    });

    Route::resource('build', 'BuildRecipesController');


  });
});
