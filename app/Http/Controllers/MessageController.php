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

    public function show($jobId)
    {
        $messages = $this->messageService->allMessagesWithThisJob($jobId);
        return view('messages.show', compact('messages', 'jobId'));
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
