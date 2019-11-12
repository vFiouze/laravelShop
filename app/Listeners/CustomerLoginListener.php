<?php

namespace App\Listeners;

use App\Events\CustomerLoginEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\CustomerLoginMail;
use Mail;

class CustomerLoginListener implements ShouldQueue
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
     * @param  CustomerLoginEvent  $event
     * @return void
     */
    public function handle(CustomerLoginEvent $event)
    {
        sleep(20);
        Mail::to($event->user->email)->send(new CustomerLoginMail($event->user));

    }
}
