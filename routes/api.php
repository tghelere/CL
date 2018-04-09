<?php

use Illuminate\Http\Request;

Route::namespace('Api')->group(function () {

// Banners
    Route::get('banners', 'BannerController@index');
    // Route::get('banners/{page}', 'BannerController@page');
    Route::get('banner/{id}', 'BannerController@show');
    Route::post('banner', 'BannerController@store');
    Route::put('banner', 'BannerController@store');
    Route::delete('banner/{id}', 'BannerController@destroy');

// Services
    Route::get('services', 'ServiceController@index');    
    Route::get('service/{id}', 'ServiceController@show');
    Route::post('service', 'ServiceController@store');
    Route::put('service', 'ServiceController@store');
    Route::delete('service/{id}', 'ServiceController@destroy');

// Solutions
    Route::get('solutions', 'SolutionController@index');
    Route::get('solution/{id}', 'SolutionController@show');
    Route::post('solution', 'SolutionController@store');
    Route::put('solution', 'SolutionController@store');
    Route::delete('solution/{id}', 'SolutionController@destroy');

});