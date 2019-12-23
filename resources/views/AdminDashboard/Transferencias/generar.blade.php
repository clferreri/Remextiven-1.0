@extends('AdminDashboard/layouts/layout')

@section('styles')
<link rel="stylesheet" href="{{ asset("css/Utilidades/wizards.css")}}">
<link rel="stylesheet" href="{{ asset("assets/$temaDashboard/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{ asset("assets/$temaDashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endsection

@section('contenidoHeader')
    
@endsection


@section('menu-transferencias')
  menu-open
@endsection

@section('link-transferencias')
  active
@endsection

@section('link-transferencias-generar')
  active
@endsection

@section('contenido')
<div class="container-fluid">

  <!-- Modal Cuentas Bancarias -->
<div class="modal fade" id="modalAgregarCuentaBancaria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class></div>
            <div class="col-2"></div>
            <div class="col-8 titleModal titleGreen" style="margin-top: -30px;">
                <h4 class="modal-title text-center">Agregar Beneficiario</h4>  
            </div>          
            <div class="col-1"></div> 
            <button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
              <div class="row mt-1">
                  <div class="col-12 col-md-6 mb-4">
                    <label for="">Nombre Titular</label>
                    <input class="form-control" type="text" id="txtBeneficiarioNombre">
                  </div>
                  <div class="col-12 col-md-6 mb-2 mb-4">
                    <label for="">Apellido Titular</label>
                    <input class="form-control" type="text" id="txtBeneficiarioApellido">
                  </div>

                  <div class="col-12 col-md-6 mb-2 mb-4">
                    <label for="">Documento</label>
                    <input class="form-control" type="text" id="txtBeneficiarioDocumento">
                  </div>
                  <div class="col-12 col-md-6 mb-2 mb-4">
                    <label for="">Tipo documento</label>
                    <select class="form-control" name="" id="cmbBeneficiarioTipoDocumento">
                      <option value="DNI">DNI</option>
                      <option value="PAS">PASAPORTE</option>
                    </select>
                  </div>

                  <div class="col-12 col-md-6 mb-4">
                      <label for="">Banco</label>
                      <select class="form-control" id="cmbBeneficiarioBanco">
                          <option value="0">Seleccione un Banco...</option>
                          @foreach ($bancos as $banco)
                              <option value="{{$banco->idBanco}}"> {{$banco->Banco}} </option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                      <label for="">Tipo de Cuenta</label>
                      <select class="form-control" id="cmbBeneficiarioTipoCuenta">
                          <option value="0">Seleccione el tipo...</option>
                          <option value="Ahorro">AHORRO</option>
                          <option value="Corriente">CORRIENTE</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6 mb-2 mb-4">
                        <label for="">Numero de Cuenta</label>
                        <input class="form-control" type="text" id="txtBeneficiarioNumeroCuenta">
                      </div>
                      <div class="col-12 col-md-6 mb-2 mb-4">
                        <label for="">Alias</label>
                        <input class="form-control" type="text" id="txtBeneficiarioAlias">
                      </div>
                 
              </div>
              <div class="row mt-4 mb-3">
                  <button type="button" class="btn btn-danger btnCircle col-4 m-auto" data-dismiss="modal" onclick="limpiarModalCuentaBancaria();">Cancelar</button>
                  <button id="btnAgregarCuenta" type="button" class="btn btn-success btnCircle col-4 m-auto" onclick="altaBeneficiario();">Agregar</button>
              </div>      
          </div>
      </div>
    </div>
  </div><!--Fin Modal Agregar Cuenta Bancaria-->

  <div class="row">
    <div id="wizard" class="wizard col-12 col-md-10">
    <div class="wizard__content">
      <header class="wizard__header d-none d-md-block">
        <div class="wizard__header-overlay"></div>
        
        <div class="wizard__header-content">
          <h1 class="wizard__title" >Generar Transferencia</h1>
          <p class="wizard__subheading"> <span></span> </p>
        </div>
        
        <div class="wizard__steps">
          <nav class="steps">
          <div class="step">
            <div class="step__content">
              <p class="step__number"><i class="fas fa-user"></i></p>
              <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
              </svg>

              <div class="lines">
                <div class="line -start">
                </div>

                <div class="line -background">
                </div>

                <div class="line -progress">
                </div>
              </div>  
            </div>
          </div>

          <div class="step">
                <div class="step__content">
                  <p class="step__number"><i class="fas fa-money-bill-wave"></i></p>
                  <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                  </svg>
    
                  <div class="lines">
                    <div class="line -background">
                    </div>
    
                    <div class="line -progress">
                    </div>
                  </div> 
                </div>
              </div>

              <div class="step">
                    <div class="step__content">
                      <p class="step__number"><i class="fas fa-university"></i></p>
                      <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                      </svg>
        
                      <div class="lines">
                        <div class="line -background">
                        </div>
        
                        <div class="line -progress">
                        </div>
                      </div> 
                    </div>
                  </div>

          <div class="step">
            <div class="step__content">
              <p class="step__number"><i class="fas fa-receipt"></i></p>
              <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
              </svg>

              <div class="lines">
                <div class="line -background">
                </div>

                <div class="line -progress">
                </div>
              </div> 
            </div>
          </div>

          <div class="step">
            <div class="step__content">
              <p class="step__number"><i class="fas fa-cash-register"></i></p>
              <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
              </svg>

              <div class="lines">
                <div class="line -background">
                </div>

                <div class="line -progress">
                </div>
              </div> 
            </div>
          </div>
        </nav>
        </div>
      </header>
      
      
      <div class="panels">
        <div class="panel" style="width:100%;">
            <header class="panel__header">
              <h2 class="panel__title">¿Quien realizara el envio?</h2>
              <p class="panel__subheading">Seleccione un usuario del sistema o genere uno</p>
            </header>
            <div class="panel__content">
                <div class="container-fluid">
                        <label for="cmbUsuarios">Cliente:</label>
                    <div class="row">                        
                        <div class="form-group col-12 col-md-7">
                                <select id="cmbClientes" class="form-control select2bs4" style="width: 100%;">
                                    <option value="0" disabled selected="selected">Seleccione un usuario...</option>
                                    @foreach ($usuariosPersonas as $usuario)
                                      <option value="{{$usuario->IdUsuarioR}}">{{$usuario->DatosPersona->Nombre . ' ' . $usuario->DatosPersona->PrimerApellido . ' ' . $usuario->DatosPersona->SegundoApellido . ' - ' . $usuario->DatosPersona->Documento }}</option>
                                    @endforeach
                                </select>              
                        </div>
                      <button class="btn btn-success col-12 col-sm-8 col-md-4 col-xl-3 h-75 w-100" onclick="location.href='{{route('nuevoCliente')}}';">+ Crear usuario</button>                  
                  </div>
                  <br/>
                  <br/>
                  <label>Datos del Cliente:</label>
                  <div class="row mt-1">                        
                      <div class="col-12 col-sm-4 text-center mb-2"><img id="imgAvatar" class="img-circle" width="120px" src="{{ asset("img/images/avatar.png")}}" alt=""></span></div>
                      <div class="col-12 col-sm-8">
                          <div class="row">
                              <label class="col-3 col-sm-4">Nombre:</label>
                              <p id="txtNombreCliente" class="col-9 col-sm-8">Nombre del cliente</p>
                          </div>
                          <div class="row">
                              <label class="col-3 col-sm-4">DNI:</label>
                              <p id="txtDNICliente" class="col-9 col-sm-8">Documento del cliente</p>    
                          </div> 
                          <div class="row">
                              <label class="col-3 col-sm-4">Correo:</label>
                              <p id=" " class="col-9 col-sm-8">Correo del cliente</p>    
                          </div>       
                      </div>                   
                  </div>
                </div>                       
            </div>   
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <!-- / .panel -->

        <div class="panel d-none" style="width:100%;">
          <header class="panel__header">
            <h2 class="panel__title">¿Cuanto piensa enviar?</h2>
            <p class="panel__subheading">Coloque el monto a enviar o a recibir.</p>
          </header>
          <div class="panel__content">
            <div class="container-fluid">
                <div class="row">                        
                    <label>Monto a enviar</label>
                </div> 
                <div class="row">   
                <div class="input-group input-group-lg">
                    <input id="txtMontoEnviar" type="text" class="form-control col-6 col-sm-9 m-0" onkeyup="CalcularMontoRecibir();">
          
                    <a id="banderita" class="dropdown-toggle col-6 col-sm-3 text-center pt-2" data-toggle="dropdown" style="border: 1px solid gray;">
                        <img class="d-none d-sm-inline-block" style="margin-top: -8px; margin-left:-5px;" src="{{asset("img/images/banderas/EstadosUnidos.png")}}"><span> </span><label class="pt-1"> USD</label>
                    </a>
                    
                    <ul class="dropdown-menu">
                      <li class="dropdown-item" onclick='ponerImagen("{{asset("img/images/banderas/EstadosUnidos.png")}}","USD");'><img src="{{asset("img/images/banderas/EstadosUnidos.png")}}"> USD</li>
                      <li class="dropdown-item" onclick='ponerImagen("{{asset("img/images/banderas/Uruguay.png")}}","PES" );'><img src="{{asset("img/images/banderas/Uruguay.png")}}"> $</li>
                    </ul>
              </div>
            </div>
                <br/>   
                <div class="row">
                  <label class="d-none d-sm-block">Monto a recibir / Monto a recibir Banesco</label>
                  <label class="d-sm-none">Monto a recibir</label>
                </div>
                <div class="row">   
                    <div class="input-group input-group-lg">

                        <input id="txtMontoRecibir" type="text" class="form-control col-6 col-sm-4 m-0" >
                        <input id="txtMontoRecibirBanesco" readonly type="text" class="form-control col-6 col-sm-5 m-0 d-none d-sm-block" >
              
                        <a class="col-6 col-sm-3 text-center pt-2">
                            <img class="d-none d-sm-inline-block" style="margin-top: -8px;" src="{{asset("img/images/banderas/Venezuela.png")}}"><span> </span><label class="pt-1"> VES</label>
                        </a>
                        
                  </div>
                </div>
                <br/>
                <br/>
                <div class="row text-center mt-1 pt-2" style="border-style: solid; border-width: 3px; border-radius:5px;">
                      <div class="col-12 col-sm-4 mb-2">
                        <label class="col-12">Tasa de cambio</label><span class="col-12" id="txtCambioVES"></span>
                      </div>
                      <div class="col-12 col-sm-4 mb-2">
                        <label class="col-12">Tasa Banesco</label> <span class="col-12" id="txtCambioVESBanesco"> </span>
                      </div>
                      <div class="col-12 col-sm-4 mb-2">
                        <label class="col-12">Tasa Dolar</label> <span class="col-12" id="txtCambioUSD"> </span>
                      </div>
                      <button class="btn btn-success col-12 m-auto">Actualizar</button>               
                </div>
                <div class="row cajaPunteada text-center mt-1">
                    
                </div>
                <br/>
                <label class=" col-12 text-center">Margen</label>
                <div class="col-12 col-md-4 m-auto">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" id="chkEditarMargen" onclick="HabilitarModificarMargen();">
                        </span>
                      </div>
                      <select disabled id="cmbMargen" class="form-control text-center">
                        <option value="1" disabled>Seleccione un margen...</option>
                        @foreach ($porcentajesGanancia as $porcentaje)
                          @if ($porcentaje->Actual)
                            <option selected value="{{$porcentaje->PorcentajeGanancia}}">{{$porcentaje->TextoGanancia}}</option>
                            
                          @else
                            <option value="{{$porcentaje->PorcentajeGanancia}}">{{$porcentaje->TextoGanancia}}</option>
                          @endif                
                        @endforeach                    
                      </select>
                    </div>
                      @foreach ($porcentajesGanancia as $porcentaje)
                          @if ($porcentaje->Actual)
                            <input id="txtMargenActual" type="text" value="{{$porcentaje->PorcentajeGanancia}}" hidden/>
                          @endif                
                      @endforeach  
                    
                    <!-- /input-group -->
                  </div>           
            </div>
          </div>                         
        </div>

        <div class="panel d-none" style="width: 100%;">
                <header class="panel__header">
                   <h2 class="panel__title">Beneficiario</h2>
                   <p class="panel__subheading">Indica o agrega la cuenta a la que se realizara el deposito</p>
                </header>
                <div class="panel__content">
                  <div class="container-fluid">
                    <div class="row">
                        <select id="cmbBeneficiario" class="form-control col-12 col-sm-7 col-md-5 mb-2">
                          <option value="0">Seleccione un Beneficiario</option>
                          </select>
                          <button class="btn btn-success col-12 col-md-4 h-75 w-100" onclick="$('#modalAgregarCuentaBancaria').modal('show')">+ Agregar Cuenta</button>
                    </div>
                    <div class="row mt-5">
                      <div class="col-12"><label>Datos del Beneficiario</label></div>
                    </div>
                    <div class="row mt-3">
                      <label class="col-12 col-md-6 col-lg-2" for="">Beneficiario:</label><p id="txtDatosBeneficiarioNombre" class="col-12 col-lg-4 centrarMobile">Steven Valentin Ladera</p>
                      <label class="col-12 col-md-6 col-lg-2" for="">Banco:</label><p id="txtDatosBeneficiarioBanco" class="col-12 col-md-6 col-lg-4 centrarMobile">Mi abuela linda</p>
                      <label class="col-12 col-md-6 col-lg-2" for="">Cuenta:</label><p id="txtDatosBeneficiarioCuenta" class="col-12 col-md-6 col-lg-4 centrarMobile">AHORRO</p>
                      <label class="col-12 col-md-6 col-lg-2" for="">N° Cuenta:</label><p id="txtDatosBeneficiarioNumero" class="col-12 col-md-6 col-lg-4 centrarMobile">39403928394839483948394839</p>
                    </div>
                  </div>               
                </div>
             </div>

        <div class="panel d-none" style="width:100%;">
          <header class="panel__header">
            <h2 class="panel__title">Información de la trasnferencia</h2>
            <p class="panel__subheading">Valida con el cliente que los datos esten correctos</p>
           </header>
          
          <div class="panel__content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-6 cajaTransaccion">
                  <div class="row mb-3">
                    <label class="col-12 text-center font-weight-bold">Transacción</label>
                  </div>
                  <div class="row">
                    <label class="col-12 col-sm-6 pl-4 fuente12 grisClaro semiNegrita">Monto a Enviar:</label>
                    <p id="txtTicketMontoEnviar" class="col-12 col-sm-5 text-right fuente14 semiNegrita">-   PES</p>
                  </div>
                  <div class="row">
                      <label class="col-12 col-sm-6 pl-4 fuente12 grisClaro semiNegrita">Monto a Recibir:</label>
                      <p class="col-12 col-sm-5 text-right fuente14 semiNegrita" id="txtTicketMontoRecibir">-  VES</p>
                  </div>
                  <div class="row">
                      <label class="col-12 col-sm-6 pl-4 fuente12 grisClaro semiNegrita">Vencimiento:</label>
                      <p class="col-12 col-sm-5 text-right fuente14 semiNegrita" id="dtpTicketVencimiento">-</p>
                  </div>
                  <div class="row">
                      <label class="col-12 col-sm-6 pl-4 fuente12 grisClaro semiNegrita">Usuario:</label>
                      <p class="col-12 col-sm-5 text-right fuente14 semiNegrita" id="txtTicketCliente">-</p>
                  </div>
                  <div class="row">
                      <label class="col-12 col-sm-6 pl-4 fuente12 grisClaro semiNegrita">Documento:</label>
                      <p class="col-12 col-sm-5 text-right fuente14 semiNegrita" id="txtTicketDni">-</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row mb-3">
                        <label class="col-12 text-center font-weight-bold">Beneficiario</label>
                    </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">Nombre:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketBeneficiario">-</p>
                    </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">Pais:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketPais">Venezuela</p>
                      </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">Banco:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketBanco">-</p>
                    </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">Tipo Cuenta:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketTipoCuenta">-</p>
                      </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">N° Cuenta:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketNumeroCuenta">-</p>
                    </div>
                </div>
              </div>
              <br/>
              <hr/>
          
              <div class="row">
                <label class="col-12 text-center" style="margin-bottom: 0px;">Propósito:</label>
                <div class="col-12 text-center">
                  <select class="col-3 text-center form-control m-auto" name="propositoEnvio" id="cmbPropositoEnvio">
                    <option value="1">Remesas</option>
                    <option value="2">Viajes</option>
                    <option value="3">Donación</option>
                    <option value="4">Tratamiento Médico</option>
                    <option value="5">Hotel</option>
                    <option value="6">Estudios</option>
                    <option value="7">Préstamo</option>
                    <option value="8">Servicios</option>
                    <option value="9">Importación</option>
                    <option value="10">Otros</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel d-none" style="width:100%;">
          <header class="panel__header">
            <h2 class="panel__title">Medio de pago</h2>
            <p class="panel__subheading">Selecciona como abonara el cliente</p>
           </header>
          
          <div class="panel__content">
              <div class="container-fluid">
                  <div class="row text-center mb-4">
                    @php
                     $contador = 0
                    @endphp
                    @foreach ($mediosDePago as $medioPago)
                      @php
                        $contador = $contador +1    
                      @endphp
                      <div class="card col-12 col-md-6 col-xl-3 text-center m-auto" style=" justify-content:center;">
                        <img class="img-fluid" src="{{asset($medioPago->UrlImagen)}}" alt="">
                        <div class="card-body">
                          <p class="card-text">{{$medioPago->Descripcion}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{$medioPago->TextoCosto}}</li>
                          <li class="list-group-item"><input type="radio" name="optMedioPago" id="optSantander" value="{{$medioPago->IdMedioPago}}"></li>
                        </ul>
                      </div>

                      @if ($contador == 3 || $contador == 6)
                      </div>
                      <div class="row text-center">
                      @endif
                    @endforeach
                    
                    

                    {{-- <div class="card col-12 col-md-6 col-xl-3 text-center m-auto" style="width: 18rem; justify-content:center;">
                        <img class="img-fluid" src="{{asset("img/images/metodosDePago/prex.png")}}" alt="">
                      <div class="card-body">
                        <p class="card-text">Trensferencia <br/>Prex a Prex</p>
                      </div>
                      <ul for="optPrex" class="list-group list-group-flush">
                          <li class="list-group-item">Costo de 9 UYU</li>
                          <li class="list-group-item"><input type="radio" name="optMedioPago" id="optPrex"></li>
                        </ul>
                    </div>

                    <div class="card col-12 col-md-6 col-xl-3 text-center m-auto" style="width: 18rem; justify-content:center;">
                        <img class="img-fluid" src="{{asset("img/images/metodosDePago/abitab.png")}}" alt="">
                      <div class="card-body">
                        <p class="card-text">Giro Abitab</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item">Costo de 100 UYU</li>
                          <li class="list-group-item"><input type="radio" name="optMedioPago" id="optAbitab"></li>
                        </ul>
                    </div> --}}
                  </div>

              </div>
          </div>
      </div>

      </div>

      <div class="wizard__footer">
      <button class="button previous">Atras</button>
      <button class="button next">Siguiente</button>
    </div>
    </div>
    
    <h1 class="wizard__congrats-message d-none">
      Congratulations, you are now in a world of pain and suffering!
    </h1>
  </div>
</div> <!-- /.row -->
</div>
  
@endsection


@section('scripts')
<script src="{{asset("js/UtilScripts/wizards.js")}}"></script>
<!-- Select2 -->
<script src="{{asset("assets/$temaDashboard/plugins/select2/js/select2.full.min.js")}}"></script>
<!-- Custom Controls -->
<script src="{{asset("assets/$temaDashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js")}}"></script>
<script type="text/javascript" src="{{asset("js/generalScripts/Ascripts/cuentaBeneficiaria.js")}}"></script>
<script type="text/javascript" src="{{asset("js/generalScripts/Ascripts/Dashboard/Transferencias/altaTransferencia.js")}}"></script>

<script>

    $(document).ready(function(){ 
        $('.selectUsuarios').select2();
        var datos = new Array();
        @foreach ($usuariosPersonas as $usuario)
         
          var nuevoDato = {'Nombre': '{{$usuario->DatosPersona->Nombre . ' ' . $usuario->DatosPersona->PrimerApellido . ' ' . $usuario->DatosPersona->SegundoApellido}}', 'Dni': '{{$usuario->DatosPersona->Documento}}', 'Email': '{{$usuario->Email}}'}
          datos.push(nuevoDato);      
        @endforeach

        sessionStorage.setItem('Clientes', JSON.stringify(datos));
       
    });
    function CalcularMontoEnviar(){

    };

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>
@endsection