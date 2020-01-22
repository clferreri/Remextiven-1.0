<?php

namespace App\Http\Controllers\PDFs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transfer;
use App\Models\TransferLink;
use Barryvdh\DomPDF\Facade as PDF;

class TransferenciaController extends Controller
{
    //
    function index(){
        $tran = Transfer::find(1);
        $pdf = PDF::loadView('PDFs.ListadoTransferir', compact('tran'));
        $pdf->save(storage_path('app/public/ListadoTransferir/'). 'listado.pdf');

        return $pdf->stream('prueba.pdf');

    }


}
