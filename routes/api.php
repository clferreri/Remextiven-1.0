<?php

use App\Models\PercentGain;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('jugeteando', function () {
    return "todo genial";
});

//-----------------------//
//////// GENERAL //////////
//-----------------------//

//Traigo las ciudades de un pais
Route::post('citysOfCountry', 'CountryAndCity\CiudaController@getCiudades');


Route::get('cotizacionVESRemextiven', function () {
    $client = new GuzzleHttp\Client(['base_uri' => 'https://s3.amazonaws.com/dolartoday/']);
    $response = $client->request('GET', 'data.json');
    $resultado = mb_convert_encoding($response->getBody()->getContents(), 'UTF-8', 'UTF-8');
    $jsonResultado = json_decode($resultado);
    $margen = PercentGain::where('Actual', 1)->first();
    $porcentaje = 1 - $margen->PorcentajeGanancia;
    $vesPorDolar = ($jsonResultado->USD->promedio_real * 0.99) * $porcentaje;

    return number_format($vesPorDolar, 2, '.', '');  
});

Route::get('cotizacionUSDRemextiven', function () {
    $client = new GuzzleHttp\Client(['base_uri' => 'http://api.currencies.zone/v1/quotes/USD/UYU/json?quantity=1&key=2513|yZ2Py95co9QKhMze2aZHFU9ZQh~NTj2d']);
    $response = $client->request('GET', '');
    $resultado = $response->getBody()->getContents();
    $jsonResultado = json_decode($resultado);
    $USDPorPES = $jsonResultado->result->value;

    return number_format($USDPorPES * 1.024, 2);  
});
//-------------------------------------------//

//-----------------------//
//////// Cliente //////////
//-----------------------//

//Creacion de usuario 
Route::post('createClient', 'AjaxControllers\AdminControllers\ClienteController@createCliente');

//Creacion de beneficiario
Route::post('createBeneficiaryAccount', 'AjaxControllers\AdminControllers\BeneficiaryAccountController@createBeneficiaryAccount');

//Traerme los beneficiarios del cliente
Route::post('BeneficiaryAccount', 'AjaxControllers\AdminControllers\BeneficiaryAccountController@getBeneficiaryAccount');

//-------------------------------------------//

//Traigo todas las cuentas Beneficiarias de un cliente
//////////////////////////////////////////////////////////////////////////
// Route::post('updateProfile', 'Profile\ProfileController@cambiarDatosPersonales');

