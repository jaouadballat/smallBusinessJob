<?php

namespace App\Listeners;

use App\Events\JobEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class JobListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobEvent  $event
     * @return void
     */
    public function handle(JobEvent $event)
    {
        $event->agency->notify(new \App\Notifications\Job($event->freelancer, $event->message));
    }
}
