<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacionTransferencia extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $nombreCompleto;
    public $adjunto;
    public $nombreAdjunto;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombreCompleto, $numeroTransferencia)
    {
        $this->nombreCompleto = $nombreCompleto;
        $this->nombreAdjunto = "Tr. N°" . $numeroTransferencia . ".pdf";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Accounts@Remextiven.com', 'Remextiven')
                    ->subject('Transferencia Generada')
                    ->attach(storage_path('app/public/Transferencias/') . $this->nombreAdjunto)
                    ->view('Mails.nuevaTransferencia');
    }
}
