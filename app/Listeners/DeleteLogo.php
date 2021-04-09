<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use App\Events\DeleteBusiness;

class DeleteLogo
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
     * @param  object  $event
     * @return void
     */
    public function handle(DeleteBusiness $event)
    {
        $url = $event->logo_path;
        if($url != "default_business_logo.png"){
            Storage::delete($url);
        }
    }
}
