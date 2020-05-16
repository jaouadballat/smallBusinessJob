<?php

namespace App\Http\Controllers;
    
class SearchJobController extends Controller
{
    public function __invoke()
    {
        request()->validate([
            'job_title' => ['required'],
            'location' => ['required']
        ]);

        return redirect()->route('jobs.list', [
            'job_title' => request('job_title'),
            'location' => request('location')
        ]);
    }
}
