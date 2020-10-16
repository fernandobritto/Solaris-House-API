<?php

namespace App\Listeners;

use App\Events\StatusProdEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StatusProdListener
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
     * @param  StatusProdEvent  $event
     * @return void
     */
    public function handle(StatusProdEvent $event)
    {
        //
    }
}
