<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Job extends Notification
{
    use Queueable;

    public $message;
    public $freelancer;

    /**
     * Create a new notification instance.
     *
     * @param void
     */
    public function __construct($freelaner, $message)
    {
        $this->message = $message;
        $this->freelancer = $freelaner;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->from($this->freelancer->email)
                ->cc('smallbusiness@job.com')
                ->markdown('mail.job', ['message' => $this->message])
                ->attach(public_path() . '/storage/' . $this->freelancer->resume, [
                    'as' => sprintf('%s.pdf', $this->freelancer->fullName()),
                    'mime' => 'text/pdf',
                ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
