<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmacionTransferencia;
use App\Models\Bank;
use App\Models\BeneficiaryAccount;
use App\Models\PercentGain;
use App\Models\RateConfig;
use App\Models\Transfer;
use App\Models\TransferLink;
use App\Models\TransferQuotation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Traits\TransferenciaPDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TransferController extends Controller
{
    
    public function createTransfer(Request $request){
        $datos = $request->all();
        if ($this->ValidarTransferencia($datos) && $this->ValidarCotizacionTransferencia($datos)){
            $transferencia = $this->AltaTransferenciaAdmin($datos);
            $cotizacionTransferencia = $this->AltaCotizacionAdmin($transferencia, $datos);
            $pdf = TransferenciaPDF::generarPDF($transferencia, $cotizacionTransferencia);  
            $link =
            $usuario = $transferencia->UsuarioTransferencia;
            $nombre =""; $telefono =""; $numTel ="";
            $esCelular = false;
            if ($usuario->TipoUsuario == 1){
                $numTel = $usuario->DatosPersona->Celular();
                $nombre = $usuario->DatosPersona->PrimerNombre . ' ' . $usuario->DatosPersona->PrimerApellido;
                $telefono = $usuario->DatosPersona->Pais->Prefijo . $numTel;
            }
            else{
                $nombre = $usuario->DatosEmpresa->NombreFantasia;
                $numTel = $usuario->DatosEmpresa->Celular();
                $telefono = $usuario->DatosEmpresa->Pais->Prefio . $numTel;
            }

            //Enviamos el PDF generado por Mail al cliente
            TransferenciaPDF::enviarPorMail($usuario->Email, $nombre, $transferencia->IdSolicitudTransferencia);
            //Generamos un link para compartir por whatssap y que pueda acceder en todo momento a su recibo
            $link = $this->GenerarLink($transferencia->IdSolicitudTransferencia);  

            $urlTransferencia = route('transferenciaPDF', ['parametro' => $link->Parametro]);

            $urlWhat ="#";
            if ($numTel != ""){
                $esCelular = true;
                $urlWhat = "https://api.whatsapp.com/send?phone=" . $telefono . "&text=Estimado " . $nombre . ",%0D%0ASe genero la transferencia N° " . $transferencia->IdSolicitudTransferencia . " a su nombre. %0D%0A%0D%0APuede acceder al recibo de dicha transferencia mediante el siguiente link: " . route('transferenciaPDF', ['parametro' => $link->Parametro]) . "%0D%0A%0D%0ASaludos de parte del equipo de Remextiven.";
            }       
            return response()->json(['respuesta' => 'Transferencia generada correctamente', 'nombre' => $nombre, 'url' => $urlTransferencia, 'urlMensaje' => $urlWhat, 'esCelu' => $esCelular, 'transferencia' => $transferencia->IdSolicitudTransferencia], 200);
        }
        return response()->json(['respuesta' => 'Error al generar la transferencia.'], 500);
    }

    private function CargarCotizacionTransferencia(){

    }


    private function ValidarTransferencia($datos){
        return Validator::make($datos, [
            'idUsuario' => ['required', 'exists:UsuariosR,IdUsuarioR'],
            'idTipoTransferencia' => ['required', 'exists:TipossolicitudTransferencia,IdTipo'],
            'idBeneficiario' => ['required', 'exists:CuentasBeneficiarios,IdCuenta'],
            'idMedioPago' => ['required', 'exists:MediosDePago,IdMedioPago'],
        ])->validate();
        
    }

    private function ValidarCotizacionTransferencia($datos){
        return Validator::make($datos, [
            'montoEnviar' => ['required', 'numeric'], 
            'idMoneda' => ['required','numeric', 'exists:Monedas,IdMoneda'], 
        ])->validate();
    }

    private function AltaTransferenciaAdmin($datos){
        return Transfer::create([
            'IdUsuarioSolicita' => $datos['idUsuario'],
            'IdEstadoTransferencia' => 1,
            'IdTipoTransferencia' => $datos['idTipoTransferencia'],
            'IdMedioPago' => $datos['idMedioPago'],
            'IdCuentaBeneficiaria' => $datos['idBeneficiario'],
            'FechaSolicitada' => Carbon::today()
        ]);
    }

    private function AltaCotizacionAdmin($transferencia, $datos){
        $cuentaBeneficiaria = BeneficiaryAccount::where('IdCuenta', $transferencia->IdCuentaBeneficiaria)->first();
        $tasa = RateConfig::where('Fecha', Carbon::today()->toDateString())
        ->orderBy('created_at', 'desc')->first();
        $montoRecibir = null;
        $cambio = null; $cotizacionVES = null; $comision = null;
        $margen = PercentGain::where('Actual', 1)->first();
        if ($tasa != null){
            $cambio = $tasa->USDUYU;

            if ($cuentaBeneficiaria->IdBanco == Bank::where('Banco', 'BANESCO BANCO UNIVERSAL')->first()->IdBanco){
                //Si la moneda es pesos (1 es pesos)
                if ($datos['idMoneda'] == 1){
                    $cotizacionVES = $tasa->TasaBanescoUYU;                 
                }
                else{
                    $cotizacionVES = $tasa->TasaBanescoUSD;
                }
            }
            else{
                if ($datos['idMoneda'] == 1){
                    $cotizacionVES = $tasa->TasaOtroUYU;                 
                }
                else{
                    $cotizacionVES = $tasa->TasaOtroUSD;
                }
            }
            $montoRecibir = round($cotizacionVES * $datos['montoEnviar'], 2);
            $comision = $this->CalcularComision($margen->PorcentajeGanancia, $datos['montoEnviar']);
        }
        
        
        return TransferQuotation::create([
            'IdSolicitudTransferencia' => $transferencia->IdSolicitudTransferencia,
            'IdMoneda' => $datos['idMoneda'],
            'MontoEnviar' => $datos['montoEnviar'],
            'MontoRecibir' => $montoRecibir,           
            'Cambio' => $cambio,
            'CotizacionVES' => $cotizacionVES,
            'MargenGanancia' => trim($margen->TextoGanancia, '%'),
            'ComisionEstimada' => $comision
        ]);
    }

    protected function AbrirPDF(Request $request){
        $id = $request->idTransferencia;

        $pathPDF = storage_path('app\public\Transferencias\Tr. N°') . $id . '.pdf';
        return response()->file($pathPDF);
    }

    private function CalcularComision($margenGanancia, $montoEnviar){
        $ganancia = round($montoEnviar * $margenGanancia,2);
        return $ganancia;
    }

    private function GenerarLink($idTransferencia){
        return TransferLink::create([
            'Parametro' => Str::random(6) . $idTransferencia,
            'Transferencia' => "Tr. N°" . $idTransferencia . ".pdf",
            'IdTransferencia' => $idTransferencia,
            'Activo' => 1,
        ]);
    }


}
