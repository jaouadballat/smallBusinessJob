<?php

namespace App\Http\Controllers;

use App\Helper\JobFilter;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Services\CategoryService;
use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function __construct(JobService $jobService, CategoryService $categoryService)
    {
        $this->jobService = $jobService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->jobService->all();
    }

    public function list(Request $request)
    {

        if($request->ajax()) {
            return JobFilter::apply($request, $this->jobService);
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
        $this->jobService->create($request->all());
        return redirect()->route('agency.jobs');
    }

    public function edit($id)
    {
        $job = $this->jobService->findOne($id);
        $this->authorize('update', $job);

        $categories = $this->categoryService->all();

        return view('job.update', compact(['job', 'categories']));
    }

    public function update(jobRequest $request, $id)
    {
        $this->jobService->update($request->all(), $id);
        return redirect()->route('agency.jobs');
    }
}
