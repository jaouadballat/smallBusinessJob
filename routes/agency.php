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

Route::get('/job', 'JobController@show')
    ->name('agency.job.create')
    ->middleware('register.agency');

Route::post('/job', 'JobController@create')
    ->name('agency.job.create')
    ->middleware('register.agency');

Route::put('/job/{id}', 'JobController@update')
    ->name('agency.job.update')
    ->middleware('register.agency');

Route::get('/job/{id}', 'JobController@edit')
    ->name('agency.job.update')
    ->middleware('register.agency');
