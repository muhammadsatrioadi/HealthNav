<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginNotification;

class SendLoginNotification
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
    public function handle(Login $event): void
    {
        // Skip email sending when running locally or when mailer is set to 'log'
        if (app()->environment('local') || config('mail.default') === 'log' || config('mail.mailer') === 'log') {
            return;
        }

        Mail::to($event->user->email)->send(new LoginNotification($event->user));
    }
}
