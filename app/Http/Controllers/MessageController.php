<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show($jobId)
    {
        $messages = Message::where('user_id', auth()->id())
            ->where('job_id', $jobId)->get();
        return view('messages.show', compact('messages', 'jobId'));
    }

    public function send($jobId)
    {
        auth()->user()->messages()->create([
           'job_id' => $jobId,
           'body' => \request('body')
       ]);

        return redirect()->back();
    }
}
