<?php


use Illuminate\Support\Facades\Route;


    Route::get('/', 'FreelancerController@dashboard')->name('freelancer.dashboard');
    Route::get('/job/list', 'FreelancerController@list')->name('freelancer.list');
    Route::get('/job/{id}', 'FreelancerController@show')->name('freelancer.show');
    Route::post('/job/apply/{id}', 'FreelancerController@apply')->name('freelancer.apply');
    Route::get('/job/{id}/messages', 'FreelancerController@messages')->name('job.messages');
    Route::post('/job/{id}/messages', 'FreelancerController@send')->name('messages.send');

    Route::get('/profile', 'ProfileFreelancerController@form')->name('freelancer.profile.form');

