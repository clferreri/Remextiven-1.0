<?php

namespace App\Http\Controllers\AdminDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pais;
use App\User;

class AdminPanelController extends Controller
{

    protected function AgregarTransferencia(){
        $usuariosPersonas = User::where('Activo', 1)->where('TipoUsuario', 1)->with('DatosPersona')->get();
        $usuariosEmpresas = User::where('Activo', 1)->where('TipoUsuario', 2)->with('DatosEmpresa')->get();

        return view('AdminDashboard.Transferencias.generar', compact('usuariosPersonas', 'usuariosEmpresas'));
    }


    protected function AgregarCliente(){
        $paises = Pais::where('Activo', 1)->where()->get();

        return view('AdminDashboard.Clientes.nuevoCliente', compact('paises'));
    }
}
