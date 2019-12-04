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
                                <select id="cmbClientes"class="form-control select2bs4" style="width: 100%;">
                                    <option disabled selected="selected">Seleccione un usuario...</option>
                                    @foreach ($usuarios as $usuario)
                                      <option value="{{$usuario->IdUsuario}}">{{$usuario->DatosPersonales->Nombre . ' ' . $usuario->DatosPersonales->PrimerApellido . ' ' . $usuario->DatosPersonales->SegundoApellido}}</option>
                                    @endforeach
                                </select>              
                        </div>
                      <button class="btn btn-success col-12 col-sm-8 col-md-4 h-75 w-100" onclick="location.href='{{route('nuevoCliente')}}';">+ Crear usuario</button>                  
                  </div>
                  <br/>
                  <br/>
                  <label>Datos del Cliente:</label>
                  <div class="row mt-1">                        
                      <div class="col-12 col-sm-4 text-center mb-2"><img id="imgAvatar" class="img-circle" width="120px" src="{{ asset("img/images/avatar.png")}}" alt=""></span></div>
                      <div class="col-12 col-sm-8">
                          <div class="row">
                              <label class="col-3 col-sm-4">Nombre:</label>
                              <p id="txtNombreCliente" class="col-9 col-sm-8">Cristian Ferreri Lorenzo</p>
                          </div>
                          <div class="row">
                              <label class="col-3 col-sm-4">DNI:</label>
                              <p id="txtDNICliente" class="col-9 col-sm-8">Cristian Ferreri Lorenzo</p>    
                          </div> 
                          <div class="row">
                              <label class="col-3 col-sm-4">Correo:</label>
                              <p id="txtCorreoCliente" class="col-9 col-sm-8">Cristian Ferreri Lorenzo</p>    
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
                    <input id="txtMontoEnviar" type="text" class="form-control col-6 col-sm-9 m-0" onkeydown="CalcularMontoRecibir();">
          
                    <a id="banderita" class="dropdown-toggle col-6 col-sm-3 text-center pt-2" data-toggle="dropdown" style="border: 1px solid red;">
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
                  <label>Monto a recibir</label>
                </div>
                <div class="row">   
                    <div class="input-group input-group-lg">
                        <input id="txtMontoRecibir" type="text" class="form-control col-6 col-sm-9 m-0" >
              
                        <a class="col-6 col-sm-3 text-center pt-2">
                            <img class="d-none d-sm-inline-block" style="margin-top: -8px;" src="{{asset("img/images/banderas/Venezuela.png")}}"><span> </span><label class="pt-1"> VES</label>
                        </a>
                        
                  </div>
                </div>
                <br/>
                <div class="row cajaPunteada text-center">
                      <label class="col-11">Tipo de cambio:</label>
                      <label class="col-11">Costo total:(Ya incluido)</label>             
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
                        <select name="" id="" class="form-control col-12 col-sm-7 col-md-5">
                            <option value="">Banco andes</option>
                            <option value="">Banco loco</option>
                          </select>
                          <button class="btn btn-success col-6 col-md-4 ml-2">+ Agregar Cuenta</button>
                    </div>
                    <div class="row mt-5">
                      <div class="col-12"><label>Datos del Beneficiario</label></div>
                    </div>
                    <div class="row mt-3">
                      <label class="col-12 col-md-6 col-lg-2" for="">Beneficiario:</label><p class="col-12 col-md-6 col-lg-4">Tony stark</p>
                      <label class="col-12 col-md-6 col-lg-2" for="">Banco:</label><p class="col-12 col-md-6 col-lg-4">Tony stark</p>
                      <label class="col-12 col-md-6 col-lg-2" for="">Cuenta:</label><p class="col-12 col-md-6 col-lg-4">AHORRO</p>
                      <label class="col-12 col-md-6 col-lg-2" for="">N° Cuenta:</label><p class="col-12 col-md-6 col-lg-4">39403928394839483948394839</p>
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
                    <p class="col-12 col-sm-5 text-right fuente14 semiNegrita"><span style="color:green;"><i class="fas fa-paper-plane"></i></span id="txtTicketMontoEnviar">23000 PES</p>
                  </div>
                  <div class="row">
                      <label class="col-12 col-sm-6 pl-4 fuente12 grisClaro semiNegrita">Monto a Recibir:</label>
                      <p class="col-12 col-sm-5 text-right fuente14 semiNegrita" id="txtTicketMontoRecibir">5.000.000 VES</p>
                  </div>
                  <div class="row">
                      <label class="col-12 col-sm-6 pl-4 fuente12 grisClaro semiNegrita">Vencimiento:</label>
                      <p class="col-12 col-sm-5 text-right fuente14 semiNegrita" id="dtpTicketVencimiento">13/05/2019</p>
                  </div>
                  <div class="row">
                      <label class="col-12 col-sm-6 pl-4 fuente12 grisClaro semiNegrita">Usuario:</label>
                      <p class="col-12 col-sm-5 text-right fuente14 semiNegrita" id="txtTicketCliente">Cristian Ferreri</p>
                  </div>
                  <div class="row">
                      <label class="col-12 col-sm-6 pl-4 fuente12 grisClaro semiNegrita">Documento:</label>
                      <p class="col-12 col-sm-5 text-right fuente14 semiNegrita" id="txtTicketDni">51294519</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row mb-3">
                        <label class="col-12 text-center font-weight-bold">Beneficiario</label>
                    </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">Nombre:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketBeneficiario">Tony Stark</p>
                    </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">Pais:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketPais">Venezuela</p>
                      </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">Banco:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketBanco">Banco Belasco</p>
                    </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">Tipo de Cuenta:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketTipoCuenta">AHORRO</p>
                      </div>
                    <div class="row">
                        <label class="col-12 col-sm-5 pl-4 fuente13 grisClaro semiNegrita">N° de Cuenta:</label>
                        <p class="col-12 col-sm-6 text-right fuente14 semiNegrita" id="txtTicketNumeroCuenta">123456789987456311232145</p>
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


          <div class="panel d-none" style="width:100%;">
              <header class="panel__header">
                <h2 class="panel__title">Información de la trasnferencia</h2>
                <p class="panel__subheading">Valida con el cliente que los datos esten correctos</p>
               </header>
              
              <div class="panel__content">
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
<script type="text/javascript" src="{{asset("js/generalScripts/Ascripts/Dashboard/Transferencias/altaTransferencia.js")}}"></script>
<script>
      const dolar = 1
      const peso = 2
      var moneda = 1
      var cotizacionDolar = 2
      var cotizacionPesos = 4
    $(document).ready(function(){ 
        $('.selectUsuarios').select2();
        var datos = new Array();
        @foreach ($usuarios as $usuario)
          var id = '{{$usuario->IdUsuarioR}}';
          var nuevoDato = {'Nombre': '{{$usuario->DatosPersonales->Nombre . ' ' . $usuario->DatosPersonales->PrimerApellido . ' ' . $usuario->DatosPersonales->SegundoApellido}}', 'Dni': '{{$usuario->DatosPersonales->Documento}}', 'Email': '{{$usuario->Email}}'}
          datos.push(nuevoDato);      
        @endforeach

        sessionStorage.setItem('Clientes', JSON.stringify(datos));
        var usuarios = sessionStorage.getItem('Clientes');
        console.log(usuarios);
    });
    

    function ponerImagen(imagen, simbolo){
      $("#banderita").html('<img class="d-none d-sm-inline-block" style="margin-top: -5px;" src="'+ imagen + '"> <span> </span><label class="pt-1">' + simbolo + '</label>');
    };

    function CalcularMontoRecibir(){
      if(!isNaN(event.key)){
          if(moneda = dolar) {
          $("#txtMontoRecibir").val($("#txtMontoEnviar").val() + event.key * cotizacionDolar);
        }
        else{
          $("#txtMontoRecibir").val($("#txtMontoEnviar").val() * cotizacionPesos);
        }
      }
      else{
        event.preventDefault
      }
      
    };

    function CalcularMontoEnviar(){

    };

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>
@endsection