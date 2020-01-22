<?php

namespace App\Http\Controllers\PDFs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransferLink;

class TransferenciaPDFController extends Controller
{
    function abrirPDF($parametro){
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
}
