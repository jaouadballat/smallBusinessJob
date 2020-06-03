<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    /**
     * @var JobService
     */
    private $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function dashboard()
    {
        return view('freelancer.dashboard');
    }

    public function show($id)
    {
        $job = $this->jobService->findOne($id);
        return view('freelancer.apply', compact('job'));
    }

    public function apply(Request $request) {
        dd($request->all());
    }
}
