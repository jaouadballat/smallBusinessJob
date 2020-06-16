<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileFreelancerController extends Controller
{
    public function form()
    {
        return view('freelancer.profile.form');
    }
}
