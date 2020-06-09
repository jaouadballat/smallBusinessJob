<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    /**
     * @var MessageService
     */
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function show($job, $user)
    {
        $messages = $this->messageService->allMessagesWithThisJob($job, $user);
        return view('messages.show', compact('messages', 'job'));
    }

    public function send($jobId)
    {
        $this->messageService->create([
            'job_id' => $jobId,
            'body' => \request('body')
        ]);

        return redirect()->back();
    }
}
