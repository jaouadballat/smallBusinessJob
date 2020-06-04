<?php


use Illuminate\Support\Facades\Route;

Route::get('/', 'FreelancerController@dashboard')->name('freelancer.dashboard')->middleware('freelancer');
Route::get('/job/{id}', 'FreelancerController@show')->name('freelancer.show')->middleware('freelancer');
Route::post('/job/apply/{id}', 'FreelancerController@apply')->name('freelancer.apply')->middleware('freelancer');

