<?php

namespace App\Http\Controllers\CountryAndCity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Pais;

class CiudaController extends Controller
{
    /*
                @ GET CIUDADES @
        Obtiene todas las ciudades de un Pais

        param $request -> Id del Pais que se desea obtener las ciudades
    */
    protected function getCiudades(Request $request){
        $ciudades = Ciudad::where('IdPais', $request->pais)->where('Activo', 1)->select('IdCiudad', 'Ciudad')->orderBy('Ciudad')->get(); 
        return $ciudades->toJson();
    }





}
