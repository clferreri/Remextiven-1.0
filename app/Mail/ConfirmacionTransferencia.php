<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacionTransferencia extends Mailable
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
    public function __construct($nombreCompleto, $pdf, $numeroTransferencia)
    {
        $this->nombreCompleto = $nombreCompleto;
        $this->adjunto = $pdf;
        $this->nombreAdjunto = "Transferencia N°" . $numeroTransferencia . ".pdf";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Accounts@Remextiven.com', 'Remextiven')
                    ->subject('Se genero la Transferencia')
                    ->attachData($this->adjunto, $this->nombreAdjunto, ['mime' => 'application/pdf',])
                    ->view('Mails.nuevaTransferencia');
    }
}
