<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');
Route::get('/jobs', 'JobController@index');
Route::get('/jobs/list', 'JobController@list')->name('jobs.list');
Route::get('/categories', 'CategoryController@index');
Route::post('/search-job', 'SearchJobController')->name('search.job');
Route::get('/{id}/job-details', 'JobDetailController@index')->name('job-details');

Route::get('/freelancer/dashboard', 'FreelancerController@dashboard')->name('freelancer.dashboard')->middleware('freelancer');
Route::get('/freelancer/job/{id}', 'FreelancerController@show')->name('freelancer.show')->middleware('freelancer');
Route::post('/freelancer/job/apply/{id}', 'FreelancerController@apply')->name('freelancer.apply')->middleware('freelancer');

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


