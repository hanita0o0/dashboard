<?php

namespace App\Listeners;

use App\Events\UserChangeState;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserChangeCity
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
     * @param  UserChangeState  $event
     * @return void
     */
    public function handle(UserChangeState $event)
    {
        //
    }
}
