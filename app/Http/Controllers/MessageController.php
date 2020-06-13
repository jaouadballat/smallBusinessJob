<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
    }

    public function list($id)
    {
        $freelancer = auth()->user()->freelancer;
        $messages = $freelancer->messages()->where('job_id', $id)->get();
        return view('messages.list')
                ->with(['messages' => $messages, 'jobId' => $id]);
    }

    public function send($id)
    {
        $user = auth()->user();
        $freelancer = $user->freelancer;

        $freelancer->messages()->create([
            'from' => $user->id,
            'job_id' => $id,
            'message' => request('body')
        ]);
        return redirect()->back();
    }
}
