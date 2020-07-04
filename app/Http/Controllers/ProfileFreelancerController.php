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

    public function form()
    {
        return view('freelancer.profile.form');
    }

    public function create(ProfileFreelancerRequest $request)
    {
        $this->freelancerService->create($request->refactoreRequest());
        return redirect()->route('freelancer.dashboard');

    }
}
