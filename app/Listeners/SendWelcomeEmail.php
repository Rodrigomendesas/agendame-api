<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        Mail::to($user->email)
        ->send(new WelcomeMail($user));
    }
}
