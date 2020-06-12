<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
    }

    public function list()
    {
        $freelancer = auth()->user()->freelancer;
        $messages = $freelancer->messages()->get();
        return view('messages.list')
                ->with(['messages' => $messages]);
    }
}
