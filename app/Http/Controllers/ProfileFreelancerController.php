<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFreelancerRequest;

class ProfileFreelancerController extends Controller
{
    public function form()
    {
        return view('freelancer.profile.form');
    }

    public function create(ProfileFreelancerRequest $request) 
    {
        dd($request->refactoreRequest());
    }
}
