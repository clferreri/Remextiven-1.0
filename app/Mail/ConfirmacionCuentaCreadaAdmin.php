<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacionCuentaCreadaAdmin extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $nombreCompleto;
    public $email;
    public $contraseña;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombreCompleto, $email, $contra)
    {
        $this->nombreCompleto = $nombreCompleto;
        $this->email = $email;
        $this->contraseña = $contra;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Accounts@Remextiven.com', 'Remextiven')
                    ->subject('Alta como cliente')
                    ->view('Mails.adminGeneracionCuentaCliente');
    }
}
