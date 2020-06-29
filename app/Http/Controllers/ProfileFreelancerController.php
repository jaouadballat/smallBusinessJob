<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileFreelancerController extends Controller
{
    public function form()
    {
        return view('freelancer.profile.form');
    }

    public function create(Request $request) 
    {
        dd($request->all());
    }
}
