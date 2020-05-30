<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');
Route::get('/jobs', 'JobController@index');
Route::get('/jobs/list', 'JobController@list')->name('jobs.list');
Route::get('/categories', 'CategoryController@index');
Route::post('/search-job', 'SearchJobController')->name('search.job');
Route::get('/{id}/job-details', 'JobDetailController@index')->name('job-details');
Route::get('/freelancer/dashboard', function() {
    return view('freelancer');
})->name('freelancer.dashboard')->middleware('freelancer');

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

