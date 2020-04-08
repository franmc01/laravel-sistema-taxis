<?php

namespace App\Listeners;

use Mail;
use App\Events\UserWasCreated;
use App\Mail\LoginCredentials;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginCredentials
{
    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        // dd($event->user->toArray(),$event->password);
        Mail::to($event->user)->
              send(new LoginCredentials
              ($event->user, $event->password));
    }
}
