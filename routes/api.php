<?php

use Illuminate\Http\Request;

Route::namespace('Api')->group(function () {

// Banners
    Route::get('banners', 'BannerController@index');
    Route::get('banners/{page}', 'BannerController@page');
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

// Testimonies
    Route::get('testimonies', 'TestimonyController@index');
    Route::get('testimony/{id}', 'TestimonyController@show');
    Route::post('testimony', 'TestimonyController@store');
    Route::put('testimony', 'TestimonyController@store');
    Route::delete('testimony/{id}', 'TestimonyController@destroy');

// Newsletters
    Route::get('newsletters', 'NewsletterController@index');
    Route::post('newsletter', 'NewsletterController@store');

// Candidates
    Route::get('candidates', 'CandidateController@index');
    Route::get('candidate/{id}', 'CandidateController@show');
    Route::post('candidate', 'CandidateController@store');
    Route::put('candidate', 'CandidateController@store');
    Route::delete('candidate/{id}', 'CandidateController@destroy');

// States
    Route::get('states', 'StateController@index');
    Route::get('state/{id}', 'StateController@show');

// Cities
    Route::get('cities', 'CityController@index');
    Route::get('cities/state/{id}', 'CityController@state');
    Route::get('city/{id}', 'CityController@show');

// Contacts
    Route::get('contacts', 'ContactController@index');
    Route::get('contact/{id}', 'ContactController@show');
    Route::post('contact', 'ContactController@store');
    Route::delete('contact/{id}', 'ContactController@destroy');

// Ombuds
    Route::get('ombuds', 'OmbudController@index');
    Route::get('ombud/{id}', 'OmbudController@show');
    Route::post('ombud', 'OmbudController@store');
    Route::delete('ombud/{id}', 'OmbudController@destroy');

// Budgets
    Route::get('budgets', 'BudgetController@index');
    Route::get('budget/{id}', 'BudgetController@show');
    Route::post('budget', 'BudgetController@store');
    Route::delete('budget/{id}', 'BudgetController@destroy');

// Contents
    Route::get('contents', 'ContentController@index');
    Route::get('content/{id}', 'ContentController@show');
    Route::post('content', 'ContentController@store');
    Route::put('content', 'ContentController@store');
    Route::delete('content/{id}', 'ContentController@destroy');

});