<?php

namespace App\Listeners;

use App\Events\ApplyToJobEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ApplyToJobListner
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
     * @param  ApplyToJobEvent  $event
     * @return void
     */
    public function handle(ApplyToJobEvent $event)
    {
        $event->agency
            ->notify(
                (new \App\Notifications\Job($event->freelancer, $event->job, $event->message))
                    ->delay(now()->addSeconds(10))
            );
    }
}
