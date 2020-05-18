<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchJobRequest;

class SearchJobController extends Controller
{
    public function __invoke(SearchJobRequest $request)
    {
        return redirect()->route('jobs.list', [
            'job_title' => request('job_title'),
            'location' => request('location')
        ]);
    }
}
