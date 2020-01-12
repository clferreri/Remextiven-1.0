<?php

namespace App\Traits;

use App\Mail\ConfirmacionTransferencia as MailConfirmacionTransferencia;
use App\Mail\Mail\ConfirmacionTransferencia;
use App\Models\Bank;
use App\Models\BeneficiaryAccount;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\User;

//TRAIT GENERICO PARA USAR CON LOS PDF DE Transferencias
trait TransferenciaPDF
{
    
    /*
    * Genera el PDF con los datos que se le pasan como parametros de la transferencia 
    * y cotizacion de la misma
    *
    * @param $transferencia modelo transferencia
    * @param $cotizacionTrasnferencia modelo cotizacion Transferencia
    * 
    * @return PDF generado
    */
    public static function generarPDF($transferencia, $cotizacionTransferencia){
        // $cliente = User::find($transferencia->IdUsuarioSolicita);
        // $beneficiario = BeneficiaryAccount::find($transferencia->IdCuentaBeneficiaria);
        // $banco = Bank::find($beneficiario->IdBanco);
        $pdf = PDF::loadView('PDFs.Transferencia', compact('transferencia', 'cotizacionTransferencia'));
        $nombreArchivo = "Tr. N°". $transferencia->IdSolicitudTransferencia . ".pdf";
        $pdf->save(storage_path('app/public/Transferencias/'). $nombreArchivo);
        return $pdf;
    }

    /*
    * Abre el pdf solicitado segun el nombre
    *
    * @param $numeroTransferencia es el numero que tiene la transferencia y el nombre del PDF
    * 
    * @return Descarga pdf generado
    */
    public static function abrirPDF($numeroTransferencia){
        $pathPDF = storage_path('app/public/Transferencias/Tr. N°') . $numeroTransferencia . '.pdf';
        return response()->download($pathPDF);
    }


    public static function enviarPorMail($mail, $nombre, $numeroTransferencia){
        Mail::to($mail)->send(new MailConfirmacionTransferencia($nombre, $numeroTransferencia));
    }
    
}