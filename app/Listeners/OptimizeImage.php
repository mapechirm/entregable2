<?php

namespace App\Listeners;

use App\Events\ImageSet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeImage implements ShouldQueue
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
     * @param  \App\Events\ImageSet  $event
     * @return void
     */
    public function handle(ImageSet $event)
    {
        $imagen = Image::make(Storage::get("public/" . $event -> videogame -> image))
                    -> widen(400)
                    -> limitColors(255) 
                    -> encode();
                Storage::put(("public/" . $event -> videogame -> image), (string) $imagen);
    }
}
