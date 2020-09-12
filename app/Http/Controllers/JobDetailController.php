<?php

namespace App\Http\Controllers;

use App\Services\JobService;

class JobDetailController extends Controller
{
    public function __construct(JobService $service)
    {
        $this->service = $service;
    }

    public function index($id)
    {
        $job = $this->service->findOne($id);
        $freelancer = auth()->user() ? auth()->user()->freelancer : null;
        return view('job-details', compact('job', 'freelancer'));
    }
}
