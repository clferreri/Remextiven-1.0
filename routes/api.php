<?php

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

