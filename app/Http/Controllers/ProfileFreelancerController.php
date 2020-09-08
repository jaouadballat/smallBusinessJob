<?php

namespace App\Http\Controllers;

use App\Services\FreelancerService;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileFreelancerRequest;

class ProfileFreelancerController extends Controller
{

    /**
     * @var FreelancerService
     */
    private $freelancerService;

    public function __construct(FreelancerService $freelancerService)
    {
        $this->freelancerService = $freelancerService;
    }


    public function edit($id)
    {
        $freelancer = $this->freelancerService->findOne($id);
        return view('freelancer.profile.edit', compact('freelancer'));
    }

    public function update(ProfileFreelancerRequest $request)
    {
        $this->freelancerService->edit($request->refactoreRequest());
        return redirect()->route('freelancer.dashboard');
    }
}
