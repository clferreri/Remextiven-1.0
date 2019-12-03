<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivacionCuenta extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tokenActivacion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tActivacion)
    {
        $this->tokenActivacion = $tActivacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Accounts@Remextiven.com', 'Remextiven')
                    ->subject('Activacion de cuenta')
                    ->view('Mails.activacionCuenta');
        
    }


}
