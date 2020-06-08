<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AgencyController@index')
    ->name('ceo.dashboard');

Route::post('/', 'AgencyController@create')
    ->name('agency.create');

Route::get('/job-list', 'AgencyController@list')
    ->name('agency.jobs');

Route::get('/edit/{id}', 'AgencyController@edit')
    ->name('agency.dashboard.update');

Route::put('/edit/{id}', 'AgencyController@update')
    ->name('agency.dashboard.update');

Route::get('/job/messages', 'AgencyController@messages');

Route::get('/user/{user}/job/{job}/messages', 'AgencyController@showMessagesForEachJob')->name('agency.user.messages');

Route::middleware('register.agency')->group(function() {
    Route::get('/job', 'JobController@show')
        ->name('agency.job.create');

    Route::post('/job', 'JobController@create')
        ->name('agency.job.create');

    Route::put('/job/{id}', 'JobController@update')
        ->name('agency.job.update');

    Route::get('/job/{id}', 'JobController@edit')
        ->name('agency.job.update');

    Route::get('/job/{id}/delete', 'JobController@delete')
        ->name('agency.job.delete');
});
