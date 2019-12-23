<?php

namespace App\Http\Controllers\PDFs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class TransferenciaController extends Controller
{
    function index(){
        $pdf = PDF::loadView('PDFs.Transferencia');


        return $pdf->stream('prueba.pdf');
    }
}
