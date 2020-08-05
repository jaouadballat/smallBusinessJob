<?php

namespace App\Http\Controllers;

use App\Http\Requests\FreelancerRequest;
use App\Services\FreelancerService;
use App\Services\JobService;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    /**
     * @var JobService
     */
    private $jobService;
    /**
     * @var FreelancerService
     */
    private $freelancerService;

    public function __construct(
        JobService $jobService,
        FreelancerService $freelancerService
    )
    {
        $this->jobService = $jobService;
        $this->freelancerService = $freelancerService;
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

    public function apply(Request $request, $id) {
        $this->freelancerService->applyForJob($request->all(), $id);
        return redirect()->route('freelancer.dashboard');
    }

    public function list()
    {
        $jobs = $this->freelancerService->listOfAppliedJobs();
        return view('freelancer.list', compact('jobs'));
    }

    public function messages($id)
    {
        $messages = $this->freelancerService->getAllMessagesForThisJob($id);

        return view('messages.list')
            ->with(['messages' => $messages, 'jobId' => $id]);
    }

    public function send($id)
    {
        $this->freelancerService->sendMessageToThisJob($id);
        return redirect()->back();
    }

}
