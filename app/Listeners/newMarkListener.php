<?php

namespace App\Listeners;

use App\Events\newMark;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class newMarkListener implements ShouldQueue
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
     * @param  newMark  $event
     * @return void
     */
    public function handle(newMark $event)
    {
        dd("hi, mark listener");
    }
}
