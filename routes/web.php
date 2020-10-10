<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');
Route::get('/jobs', 'JobController@index');
Route::get('/jobs/list', 'JobController@list')->name('jobs.list');
Route::get('/categories', 'CategoryController@index');
Route::post('/search-job', 'SearchJobController')->name('search.job');
Route::get('/{id}/job-details', 'JobDetailController@index')->name('job-details');

Route::get('profiles/{id}', 'JobSeekersController@show')->name('profile.show');
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('lang', function() {
    //dd(collect(\Illuminate\Support\Facades\File::allFiles(resource_path() . '/lang/en'))->first()->getFilename());
    return collect(\Illuminate\Support\Facades\File::allFiles(resource_path() . '/lang/en'))->map(function($file) {
        return \Illuminate\Support\Facades\Lang::get($file->getBasename(".php"));
    });
   //return \Illuminate\Support\Facades\Lang::get('auth');
});

