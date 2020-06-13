<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgencyRequest;
use App\Models\Freelancer;
use App\Models\Job;
use App\Models\Message;
use App\Services\AgencyService;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * @var AgencyService
     */
    private $service;

    public function __construct(AgencyService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        if(auth()->user()->hasRegisterAgency()) {
            return redirect()->back();
        }
        return view('Agency.ceo');
    }

    public function list()
    {
        $jobs = $this->service->jobs();
        return view('Agency.lists', compact('jobs'));
    }

    public function create(AgencyRequest $request)
    {
        $this->service->save($request->storeAgency());
        return redirect()->route('agency.jobs');
    }

    public function edit($id)
    {
        $agency = $this->service->findOne($id);
        return view('Agency.edit-dashboard', compact('agency'));
    }

    public function update(AgencyRequest $request, $id)
    {
        $this->service->update($request->except('company_logo'), $id);
        return redirect()->route('agency.jobs');
    }

    public function freelancers($id)
    {
        $job = Job::find($id);
        $freelancers = $job->freelancers()->get()->unique();
        return view('Agency.freelancer', compact('freelancers', 'job'));
    }

    public function messages($freelancerId, $jobId)
    {
        $freelancer = Freelancer::find($freelancerId);
        return view('agency.messages.lists', compact('freelancer', 'jobId', 'freelancerId'));
    }

    public function send($freelancerId, $jobId)
    {
        Message::create([
           'freelancer_id' => $freelancerId,
           'job_id' => $jobId,
           'from' => auth()->user()->id,
           'message' => \request('body')
        ]);

        return redirect()->back();
    }
}
