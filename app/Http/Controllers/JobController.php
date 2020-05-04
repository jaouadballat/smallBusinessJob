<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct(JobService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getAllJobs();
    }

    public function list()
    {
        return view('job-list');
    }
}
