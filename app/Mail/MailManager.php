<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailManager extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $videogame;

    public function __construct($videogame)
    {
        $this -> videogame = $videogame; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            -> from('mapechir0005@gmail.com', 'Io')
            -> subject('Videojuego creado en Mancos Anónimos')
            -> view('emails.message', ["videojuego" => $this -> videogame]);
    }
}
