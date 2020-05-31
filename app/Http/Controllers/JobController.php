<?php

namespace App\Http\Controllers;

use App\Helper\JobFilter;
use App\Http\Requests\JobRequest;
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

    public function show()
    {
        return view('job.create');
    }

    public function create(JobRequest $request)
    {
        $request['agency_id'] = $request->user()->agency->id;
        $this->service->save($request->all());
        return redirect()->route('agency.jobs');
    }
}
