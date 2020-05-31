<?php

namespace App\Http\Controllers;

use App\Helper\JobFilter;
use App\Http\Resources\Job as JobResource;
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
        return $this->service->all();
    }

    public function list(Request $request)
    {

        if($request->ajax()) {
            return JobFilter::apply($request, $this->service);
        }

        return view('job-list');
    }

    public function create()
    {
        return view('job.create');
    }
}
