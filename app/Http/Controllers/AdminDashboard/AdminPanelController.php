<?php

namespace App\Http\Controllers\AdminDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pais;
use App\User;

class AdminPanelController extends Controller
{

    protected function AgregarTransferencia(){
        $usuarios = User::where('Activo', 1)->get();

        return view('AdminDashboard.Transferencias.generar', compact('usuarios'));
    }


    protected function AgregarCliente(){
        $paises = Pais::where('Activo', 1)->get();

        return view('AdminDashboard.Clientes.nuevoCliente', compact('paises'));
    }
}
