<?php

namespace App\Http\Controllers\AdminDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Pais;
use App\Models\PaymentMethod;
use App\Models\PercentGain;
use App\Models\Position;
use App\Models\RateConfig;
use App\Models\Transfer;
use App\Models\UserRol;
use App\Traits\ManejadorDeArchivos;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{

    protected function index(){
        return view('AdminPanel.index');
    }

    protected function AgregarTransferencia(){
        $usuariosPersonas = User::where('Activo', 1)->where('TipoUsuario', "1")->with('DatosPersona')->get();
        //$usuariosEmpresas = User::where('Activo', 1)->where('TipoUsuario', "2")->with('DatosEmpresa')->get();
        $bancos = Bank::join('Paises', 'BancosR.IdPais', '=', 'Paises.IdPais')->where('BancosR.Activo', 1)->where('Paises.Pais', 'Venezuela')->get();
        $porcentajesGanancia = PercentGain::all();
        $mediosDePago = PaymentMethod::where('Activo', 1)->where('PagoCliente', 1)->get();
        $tasa = RateConfig::where('Fecha', Carbon::today()->toDateString())
                ->orderBy('created_at', 'desc')->first();
        return view('AdminPanel.Transferencias.generarTransferencia', compact('usuariosPersonas', 'bancos', 'porcentajesGanancia', 'mediosDePago', 'tasa'));
    }

    protected function ListadoEnProceso(){
        $transferencias = Transfer::whereIn('IdEstadoTransferencia', [1,2,3])->get();
        $completados = Transfer::where('FechaFinalizada', Carbon::today()->toDateString())->count();
        $pendientes = $transferencias->count();
        $atrasados = Transfer::where('FechaSolicitada','!=', Carbon::today()->toDateString())->count();
        $totales = Transfer::where('FechaSolicitada', Carbon::today()->toDateString())->orWhereIn('IdEstadoTransferencia',[1,2,3])->count();
       
        return view('AdminPanel.Transferencias.listadoEnProceso', compact('transferencias', 'completados', 'pendientes', 'atrasados', 'totales'));
    }

    protected function ListadoParaTransferir(){
        return view('AdminPanel.Transferencias.listadoVerificadas');
    }



    //---------------------------------------  CLIENTES  --------------------------------------------//



    protected function AgregarCliente(){
        $paises = Pais::where('Activo', 1)->get();

        return view('AdminPanel.Clientes.nuevoCliente', compact('paises'));
    }

    protected function VerificarCliente(){
        $usuariosPersonas = User::where('Activo', 1)->where('Verificado', 0)->where('TipoUsuario', 1)->with('DatosPersona')->get();
        return view('AdminPanel.Clientes.verificarCliente', compact('usuariosPersonas'));
    }

    protected function VerificacionCliente(Request $request){
        $datos = $request->all();
        $usu = User::where('IdUsuarioR', $datos['cliente'])->first();
        if ($usu != null){
            ManejadorDeArchivos::CrearCarpetaVerificacion($datos['cliente']);
            ManejadorDeArchivos::AlmacenarArchivosVerificacion($datos['cliente'], $datos['imagenes']);
            $usu->Verificado = 1;
            $usu->save();
        }

        $nombre = $usu->getNombreCompleto();
        
        

        return view('AdminPanel.Clientes.verificado', compact('nombre'));
    }


    //---------------------------------------  USUARIOS  ---------------------------------------------//

    protected function AgregarUsuario(){
        $roles = UserRol::where('Activo', 1)->where('SoloEmpleado', 1)->get();
        $cargos = Position::where('Activo', 1)->where('SoloAdmin', 0)->get();
        $paises = Pais::where('Activo', 1)->get();

        return view('AdminPanel.EquipoRemextiven.generarUsuario', compact('roles', 'cargos', 'paises'));
    }


    protected function ConfigurarTasa(){
        $tasa = RateConfig::where('Fecha', Carbon::today()->toDateString())
                ->orderBy('created_at', 'desc')->first();
        $margenesGanancia = PercentGain::all();
        return view('AdminPanel.Config.tasas', compact('tasa', 'margenesGanancia')); 
       }
}
