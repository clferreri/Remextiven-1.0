<?php

namespace App\Http\Controllers\AdminDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Pais;
use App\Models\PaymentMethod;
use App\Models\PercentGain;
use App\Models\Transfer;
use App\User;
use GuzzleHttp\Client;

class AdminPanelController extends Controller
{

    protected function AgregarTransferencia(){
        $usuariosPersonas = User::where('Activo', 1)->where('TipoUsuario', "1")->with('DatosPersona')->get();
        //$usuariosEmpresas = User::where('Activo', 1)->where('TipoUsuario', "2")->with('DatosEmpresa')->get();
        $bancos = Bank::join('Paises', 'BancosR.IdPais', '=', 'Paises.IdPais')->where('BancosR.Activo', 1)->where('Paises.Pais', 'Venezuela')->get();
        $porcentajesGanancia = PercentGain::all();
        $mediosDePago = PaymentMethod::where('Activo', 1)->where('PagoCliente', 1)->get();
        return view('AdminDashboard.Transferencias.generar', compact('usuariosPersonas', 'bancos', 'porcentajesGanancia', 'mediosDePago'));
    }

    protected function ListadoTransferencias(){
        $transferencias = Transfer::whereIn('IdEstadoTransferencia', [1,2,3])->get();
        return view('AdminDashboard.Transferencias.enProceso', compact('transferencias'));
    }


    protected function AgregarCliente(){
        $paises = Pais::where('Activo', 1)->get();

        return view('AdminDashboard.Clientes.nuevoCliente', compact('paises'));
    }


}
