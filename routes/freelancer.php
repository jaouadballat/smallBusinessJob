<?php


use Illuminate\Support\Facades\Route;


    Route::get('/', 'FreelancerController@dashboard')->name('freelancer.dashboard');
    Route::get('/job/list', 'FreelancerController@list')->name('freelancer.list');
    Route::get('/job/{id}', 'FreelancerController@show')->name('freelancer.show');
    Route::post('/job/apply/{id}', 'FreelancerController@apply')->name('freelancer.apply');
    Route::get('/job/{jobId}/messages', 'MessageController@show')->name('messages.show');
//    Route::post('/job/{jobId}/messages', 'MessageController@send')->name('messages.send');
