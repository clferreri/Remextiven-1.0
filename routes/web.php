<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use GuzzleHttp\Client;

// $cliente = new Client([
//     'base_uri' => 'https://s3.amazonaws.com/dolartoday/',
//     'timeout' => 2.0,
// ]);




Route::view('/', 'Home.Inicio')->name('inicio');

// Route::get('salir', function () {
//     return Auth::logout();
// });

////  REGISTRO   ///////////////////////////////////////////////
// RUTAS DE REGISTRO                                          //
////////////////////////////////////////////////////////////////

//inicio de registro
Route::get('register', 'Auth\RegisterController@index')->name('registro');
Route::get('register/{token}', 'Auth\RegisterController@cargarFormularioReferido');

//cargar form de registro
Route::post('register', 'Auth\RegisterController@cargarFormulario')->name('cargarForm');

//realizar Registro
Route::post('newRegister', 'Auth\RegisterController@crearUsuarioCompleto')->name('registrar');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::view('pruebita', 'Registro.registerConfirmation');

//// ACTIVAR CUENTA ////////////////////////////////////////////////
// RUTA PARA ACTIVAR LA CUENTA EN BASE A UN TOKEN DE ACTIVACION   //
///////////////////////////////////////////////////////////////////
Route::get('accountActivation/{token}', 'Auth\ActivationUserController@ActivarCuenta')->name('activarCuenta');

Route::get('forwardActivationEmail/{email}', 'Auth\ActivationUserController@reenviarMail')->name('reenviarActivacion');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//LOGIN
Route::view('login', 'AdminPanel.Usuarios.Login')->name('login');
Route::view('loginViejo', 'Login.loginUser');
Route::post('login', 'Auth\LoginController@Autenticar')->name('loginUser');
Route::post('logout', function () {
    Auth::logout();
   return redirect('/home');
})->name('logoutUser');
// Route::post('salimos', 'Auth\LoginController@Desconectar')


//Recuperar Contraseña
Route::view('recovery', 'User.RecoveryPassword')->name('RecuperarContraseña');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



/////////////////////////////////////////////////////////////////////////////
//////////////         PANEL DE ADMINISTRACION        //////////////////////
////////////////////////////////////////////////////////////////////////////


//CONTROL DE LOGEADO Y AUTORIZADO A ENTRAR AL PANEL
Route::middleware('panelAdminAutorizado')->group(function () {

    //-- INICIO --//
    Route::get('/admin', 'AdminDashboard\AdminPanelController@index')->name('inicioAdminPanel');
    //------------//


    //-- TRANSFERENCIAS --//
    Route::get('/admin/newTransfer','AdminDashboard\AdminPanelController@AgregarTransferencia')->name('nuevaTransferencia');

    Route::get('/admin/transferInProcess', 'AdminDashboard\AdminPanelController@ListadoEnProceso')->name('transferenciasEnProceso');

    Route::get('/admin/transferTotransfer', 'AdminDashboard\AdminPanelController@ListadoParaTransferir')->name('transferenciasTransferir');

   

    //-------------------//


    //-- CLIENTES --//
    Route::get('/admin/newClient','AdminDashboard\AdminPanelController@AgregarCliente')->name('nuevoCliente');

    Route::get('/admin/checkClient','AdminDashboard\AdminPanelController@VerificarCliente')->name('verificarCliente');
    Route::post('/admin/checkClient/checkOk', 'AdminDashboard\AdminPanelController@VerificacionCliente')->name('verificacionCliente');
    Route::view('/tuya', 'AdminPanel.Clientes.verificado');
    
    Route::get('/admin/visualizePDFTransfer/{id}', 'PDFs\TransferenciaPDFController@abrirPDFAdmin')->name('transferenciaPDFAdmin');


    //------------------//

    //-- EQUIPO REMEXTIVEN --//
    Route::get('/admin/newUser', 'AdminDashboard\AdminPanelController@AgregarUsuario')->name('nuevoUsuarioR');

    //-------------------------//

    //-- SISTEMA --//

    Route::get('/admin/configRate', 'AdminDashboard\AdminPanelController@ConfigurarTasa')->name('configTasas');

    //-----------------//


    //-- SISTEMAS --//

});
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////FIN RUTAS ADMINISTRACION///////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////

Route::view('/home', 'Home.inicio')->name('Inicio');




//Perfil del usuario
Route::get('profile', 'AccountProfile\ProfileController@index')->name('perfilUsuario');

//Modificar datos personales
Route::post('updateProfile', 'AccountProfile\ProfileController@cambiarDatosPersonales')->name('actualizarDatos');

//Modificar foto de perfil
Route::post('changeAvatar', 'AccountProfile\ProfileController@cambiarFotoPerfil')->name('actualizarFoto');

//Agregar Cuenta bancaria
Route::post('AddBankAccount', 'AccountProfile\ProfileController@agregarCuentaBancaria')->name('agregarCuentaBajaDeDinero');

//Borrar una cuenta bancaria
Route::post('DeleteBankAccount', 'AccountProfile\ProfileController@borrarCuentaBancaria')->name('quitarCuentaBancaria');

//Agregar una tarjeta como medio de pago
Route::post('AddCreditCard', 'AccountProfile\ProfileController@agregarMetodoPago')->name('agregarMedioPago');

//Borrar una tarjeta
Route::post('DeleteCreditCard', 'AccountProfile\ProfileController@borrarFormaPago')->name('quitarMedioPago');


//Contacto por cambio de datos sensibles
Route::get('ChangeSensitiveData','AccountProfile\ProfileController@contactoPorDatosSensibles')->name('cambiarDatosSensibles');


//InicioTransferencias
Route::get('DashboardTransfer','UserDashboard\UserDashboardController@index')->name('inicioDashboard');


///////////////////////////////////////////////
/////////////RUTAS ADMINISTRACION//////////////
///////////////////////////////////////////////







Route::view('/ad', 'AdminDashboard\Transferencias\generar');

Route::view('/proce', 'AdminDashboard\Transferencias\enProceso');



Route::view('/email', 'Mails\adminGeneracionCuentaCliente');



Route::get('/pdf','PDFs\transferenciaController@index');
Route::view('/pdfview', 'PDFs\Transferencia');



Route::view('/nuevotema', 'AdminPanel.index');






//VER PDF ONLINE !!NO PONER RESTRICCIONES!!!
Route::get('/transferenciaPDF/{parametro}', 'PDFs\TransferenciaPDFController@abrirPDF')->name('transferenciaPDF');