<?php


use Illuminate\Support\Facades\Route;


Route::middleware('freelancer')->group(function() {
    Route::get('/', 'FreelancerController@dashboard')->name('freelancer.dashboard');
    Route::get('/job/{id}', 'FreelancerController@show')->name('freelancer.show');
    Route::post('/job/apply/{id}', 'FreelancerController@apply')->name('freelancer.apply');
});
