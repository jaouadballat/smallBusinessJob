<?php

namespace App\Http\Controllers;

use App\Services\FreelancerService;
use Illuminate\Http\Request;

class JobSeekersController extends Controller
{
    private $freelancerService;

    public function __construct(FreelancerService $freelancerService)
    {
        $this->freelancerService = $freelancerService;
    }

    public function show($id)
    {
        $freelancer = $this->freelancerService->findOne($id);
        return view('freelancer.profile.show', compact('freelancer'));
    }
}
