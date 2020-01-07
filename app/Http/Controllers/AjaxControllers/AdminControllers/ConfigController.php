<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PercentGain;
use App\Models\RateConfig;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    protected function UpdateRate(Request $request){
        $datos = $request->all();
        if ($this->ValidateNewRate($datos)){
            $rate = $this->newRate($datos);         
            return response($rate->toJson());
        }
    }

    protected function UpdateMargen(Request $request){
        $margenActualizar = PercentGain::where('IdMargen', $request->idMargen)->first();
        $margenAnterior = PercentGain::where('Actual', 1)->first();
        if ($margenActualizar == null){
            return response('Margen no valido', 500);
        }
        else{
            PercentGain::where('Actual', 1)->update(['Actual' => 0]);
            $margenActualizar->Actual = 1;
            $margenActualizar->save();

            $tasa = RateConfig::where('Fecha', Carbon::today()->toDateString())
                ->orderBy('created_at', 'desc')->first();
            
            if ($tasa != null){
                $margen = 1 - $margenActualizar->PorcentajeGanancia;
                $tasa->TasaBanescoUSD = round(($tasa->USDVES * $margen),2);
                $tasa->TasaBanescoUYU = round(($tasa->UYUVES * $margen),2);
                $tasa->TasaOtroUSD = round(($tasa->USDVES * ($margen - 0.02)),2);
                $tasa->TasaOtroUYU =  round(($tasa->UYUVES * ($margen - 0.02)),2);
                $tasa->save();
                return response($tasa, 200);
            }
            return response($tasa, 200);
        }     
    }


    private function ValidateNewRate($datos){
        return Validator::make($datos, [
            'COPXUSD' => ['required', 'numeric'],
            'COPXVES' => ['required', 'numeric'],
            'UYUXUSD' => ['required', 'numeric'],
        ])->validate();
    }

    private function newRate($datos){
        //DIVIDO EL LA CANTIDAD DE PESOS COLOMBIANOS POR 1 DOLAR SOBRE LA CANTIDAD DE PESOS DE UN DOLAR
        $COPXUYU = $datos['COPXUSD'] / $datos['UYUXUSD']; 

        //DIVIDO LA CANTIDAD DE PESCOLOMBIANOS POR UYU SOBRE LOS COLOMBIANOS QUE ME SALE UN VES
        $VESXUYU = $COPXUYU / $datos['COPXVES'];

        //DIVIDO LA CANTIDAD DE PESCOLOMBIANOS POR DOLAR SOBRE LA CANTIDAD DE PESCOLOBMIANOS QUE ME SALE UN VES
        $VESXUSD = $datos['COPXUSD'] / $datos['COPXVES'];

        $margenGanancia = PercentGain::where('Actual', 1)->first();
        //OBTENGO EL MARGEN A COBRAR SEGUN EL COLOCADO (EJ: 90%)
        $margen = 1 - $margenGanancia->PorcentajeGanancia;

        return RateConfig::create([
            'USDCOP' => $datos['COPXUSD'],
            'UYUCOP' => round($COPXUYU,2),
            'VESCOP' => $datos['COPXVES'],
            'USDVES' => round($VESXUSD,2),
            'UYUVES' => round($VESXUYU,2),
            'USDUYU' => $datos['UYUXUSD'],
            'TasaBanescoUSD' => round(($VESXUSD * $margen),2),
            'TasaOtroUSD' => round(($VESXUSD * ($margen - 0.02)),2),
            'TasaBanescoUYU' =>round(($VESXUYU * $margen),2),
            'TasaOtroUYU' => round(($VESXUYU * ($margen - 0.02)),2),
            'IdUsuarioCarga' => 1,
            'Fecha' => Carbon::today()->toDateString(),
        ]);
    }

}
