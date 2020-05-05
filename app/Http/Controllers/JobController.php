<?php

namespace App\Http\Controllers;

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
            return JobResource::collection(
                $this->service->withPagination()
            );
        }

        return view('job-list');
    }
}
