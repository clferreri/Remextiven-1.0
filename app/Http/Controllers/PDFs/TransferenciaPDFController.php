<?php

namespace App\Http\Controllers\PDFs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transfer;
use App\Models\TransferLink;

class TransferenciaPDFController extends Controller
{
    protected function abrirPDF($parametro){
        $link = TransferLink::where('Parametro', $parametro)->first();
        if( $link != null){
            if ( $link->Activo == 1){
                $nombrePDF = $link->Transferencia;
                $path = storage_path('app/public/Transferencias/') . $nombrePDF;
                return response()->download($path);
            }
            else{
               
            }
            
        }       
    }

    protected function abrirPDFAdmin($id){
        $transferencia = Transfer::find($id);
            if ( $transferencia != null ){
                $nombrePDF = 'Tr. N°' . $transferencia->IdSolicitudTransferencia . '.pdf';
                $path = storage_path('app/public/Transferencias/') . $nombrePDF;
                return response()->file($path);
            }
            else{
               
            }
                  
    }
}
