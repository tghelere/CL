<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->group(function () {

// Banners

    Route::get('banners', 'BannerController@index');
    
    // Route::get('banners/{page}', 'BannerController@');

    Route::get('banner/{id}', 'BannerController@show');

    Route::post('banner', 'BannerController@store');

    Route::put('banner', 'BannerController@store');

    Route::delete('banner/{id}', 'BannerController@destroy');

// Solutions
   
    // Route::get('solutions', 'SolutionsController@index');    

    // Route::get('solution/{id}', 'SolutionsController@show');

    // Route::post('solution', 'SolutionsController@store');

    // Route::put('solution', 'SolutionsController@store');

    // Route::delete('solution/{id}', 'SolutionsController@destroy');


// slug
// title
// description
// thumb



// Services

    // Route::get('banners', 'BannerController@index');    

    // Route::get('banner/{id}', 'BannerController@show');

    // Route::post('banner', 'BannerController@store');

    // Route::put('banner', 'BannerController@store');

    // Route::delete('banner/{id}', 'BannerController@destroy');

});