<?php

namespace App\Http\Controllers;

use App\Helper\JobFilter;
use App\Http\Requests\JobRequest;
use App\Services\CategoryService;
use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function __construct(JobService $service, CategoryService $categoryService)
    {
        $this->service = $service;
        $this->categoryService = $categoryService;
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
        $categories = $this->categoryService->all();
        return view('job.create', compact('categories'));
    }

    public function create(JobRequest $request)
    {
        $this->service->create($request->all());
        return redirect()->route('agency.jobs');
    }
}
