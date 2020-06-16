<?php


use Illuminate\Support\Facades\Route;


    Route::get('/', 'FreelancerController@dashboard')->name('freelancer.dashboard');
    Route::post('/profile', 'FreelancerProfileController@form')->name('freelancer.profile.form');
    Route::get('/job/list', 'FreelancerController@list')->name('freelancer.list');
    Route::get('/job/{id}', 'FreelancerController@show')->name('freelancer.show');
    Route::post('/job/apply/{id}', 'FreelancerController@apply')->name('freelancer.apply');
