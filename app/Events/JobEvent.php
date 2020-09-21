<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JobEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $freelancer;
    public $agency;
    public $message;


    /**
     * Create a new event instance.
     *
     */
    public function __construct(array $content)
    {
        $this->freelancer = $content['freelancer'];
        $this->agency = $content['agency'];
        $this->message = $content['message'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
