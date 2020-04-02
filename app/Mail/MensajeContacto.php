<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MensajeContacto extends Mailable
{
    use Queueable, SerializesModels;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correo)
    {
        $this->message=$correo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('CorreoContacto');
    }
}
