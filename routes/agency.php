<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AgencyController@index')
    ->name('ceo.dashboard');

Route::post('/', 'AgencyController@create')
    ->name('agency.create');

Route::get('/job-list', 'AgencyController@list')
    ->name('agency.jobs');
