<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{

    public function show()
    {
        return view('contact');
    }

    public function contactUs(ContactUsRequest $request)
    {
        // need to validate request

        Mail::to(env('APP_EMAIL'))->send(new ContactUs($request->validated()));
        return view('ThankYou');
    }
}
