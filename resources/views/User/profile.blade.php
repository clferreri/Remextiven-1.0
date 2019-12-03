@extends('layouts.profile')


@section('contenido')
@if($errors->any())
    <div class="container">
        <div class="alert alert-danger alert alertDangerWithIconFlotante" role="alert">
            <img class="mr-3" src="img/icons/messageIcons/error.png" alt="error"/>
                @foreach ($errors->all() as $error)
                    {!! $error . '<br/>' !!}                   
                @endforeach  
                <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(400, function(){
                            $(this).remove(); 
                        });
                    }, 8000);
                </script>   
        </div>
    </div>
@endif
<div class="container">
    <div class="row">     
        <div class="caja col-12 mb-5">
            <div class="d-flex justify-content-left">
                <nav>
                <ul class="nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link titulo" id="infoPersonal-tab" data-toggle="tab" href="#infoPersonal" role="tab" aria-controls="infoPersonal" aria-selected="true"><img src="img/icons/mediumIcons/profile.png" width="20px"/> Información Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link titulo" id="cuentaBancaria-tab" data-toggle="tab" href="#cuentaBancaria" role="tab" aria-controls="cuentaBancaria" aria-selected="false"><img src="img/icons/mediumIcons/bank.png" width="20px"/> Cuenta Bancaria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link titulo" id="mediosPagos-tab" data-toggle="tab" href="#mediosPagos" role="tab" aria-controls="mediosPagos" aria-selected="false"><img src="img/icons/mediumIcons/cards.png" width="25px"/> Medios de Pago</a>
                        </li>
                </ul>
            </nav>
           
            </div>
            <hr style="margin-top:0;"/>
            <div class="tab-content">
                    <div class="tab-pane active fade show" id="infoPersonal" role="tabpanel" aria-labelledby="infoPersonal-tab">
                        <div class="container pl-5 pt-2"> 
                                    
                                <div class="row">
                                        <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Tipo de cuenta:</label></div><div class="col-6 col-md-3"><p class="negrita">Personal</p></div>
                                    <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Email:</label></div><div class="col-6 col-md-3"><p class="negrita">{{ Auth::user()->Email }}</p></div>
                                </div>
                            @if (Auth::user()->soyPersona())

                            <div class="row">
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Nombre:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->Nombre}}</p></div>
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Apellidos:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->PrimerApellido . "  " . $persona->SegundoApellido }}</p></div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Tipo de Documento:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->TipoDocumento}}</p></div>
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>N° de Documento:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->Documento}}</p></div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Fecha de Nacimiento:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->FechaNacimiento}}</p></div>
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Sexo:</label></div><div class="col-6 col-md-3"><p class="negrita">{{ $persona->Sexo }}</p></div>
                            </div>

                            <div class="row">
                            <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Pais de Residencia:</label></div><div class="col-6 col-md-3"><p class="negrita">{{ Auth::user()->getNombrePais($persona->IdPais) }}</p></div>
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Ciudad:</label></div><div class="col-6 col-md-3"><p class="negrita">{{ Auth::user()->getNombreCiudad($persona->IdCiudad) }}</p></div>
                            </div>

                            
                            @else
                                
                            <div class="row">
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Razon Social:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->RazonSocial}}</p></div>
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Nombre Fantasia:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->NombreFantasia }}</p></div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Forma Juridica:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->FormaJuridica}}</p></div>
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>N° de IT:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->IdTributaria}}</p></div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Fecha de Conformacion:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->FechaConformacion}}</p></div>
                            </div>

                            <div class="row">
                            <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Pais de Conformacion:</label></div><div class="col-6 col-md-3"><p class="negrita"></p></div>
                                <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Ciudad:</label></div><div class="col-6 col-md-3"><p class="negrita"></p></div>
                            </div>
                            
                            @endif

                            <div class="row">
                                    <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Direccion:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->Direccion . " " . $persona->NumeroPuerta}}</p></div>
                                    <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Codigo Postal:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->CodigoPostal}}</p></div>
                                    </div>
        
                                    <div class="row">
                                        <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Telefono:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->Telefono}}</p></div>
                                        <div class="col-6 col-md-2" style="padding-left: 0px;"><label>Otro telefono:</label></div><div class="col-6 col-md-3"><p class="negrita">{{$persona->Telefono2}}</p></div>
                                    </div>
        
                                   <br/>
        
                                    <div class="row">
                                        <button class="col-6 col-md-2 btnCircle btn btn-info ml-3" data-toggle="modal" data-target="#modalEditarPerfil">Editar Perfil</button>  
                                        <button class="col-6 col-md-2 btnCircle btn btn-info ml-3" data-toggle="modal" data-target="#modalFoto">Cambiar foto</button> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-9 m-auto">
                                            <p class="datosSensibles">
                                                Por seguridad, algunos datos no son modificables desde "Editar perfil". Para modificarlos, <a href="#">contáctanos</a>.                                    
                                            </p>
                                        </div>
                                    </div>
        

                            
                        </div>
                    </div><!--IP-->

                    <div class="tab-pane fade" id="cuentaBancaria" role="tabpanel" aria-labelledby="cuentaBancaria-tab">
                        <div class="container">
                            <span id="tablaCuentasBancarias"> 
                                @if (!$cuentaBancaria->isEmpty())
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Banco</th>
                                            <th scope="col">Tipo de Cuenta</th>
                                            <th scope="col">N° de cuenta</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        
                                        @foreach ($cuentaBancaria as $cuenta)
                                            <tr>
                                                <th scope="row">{{$cuenta->IdCuentaBancaria}}</th>
                                                <td>{{$cuenta->getNombreBanco()}}</td>
                                                <td>{{ $cuenta->TipoCuenta }}</td>
                                                <td>{{ $cuenta->NumeroCuenta }}</td>
                                                <td><div class="btnIconDelete" onclick="borrarCuentaBancaria({{$cuenta->IdCuentaBancaria}})"><img src="img/icons/mediumIcons/trash.png" alt="Borrar"/></div></td>
                                            </tr>
                                            
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                @else
                                <br/>
                                <h4 class="text-center">Aún no ha ingresado cuentas bancarias</h4>
                                @endif                                
                            </span>
                                                                   
                                    
                              
                            <br/>
                            <div class="container">
                                <div class="row">
                                    <div class="col-8"></div>
                                    <button class="btn btnCircle col-3 btn-success" data-toggle="modal" data-target="#modalAgregarCuentaBancaria">Agregar cuenta bancaria</button>
                                </div>
                            </div>

                            
                        </div>                       
                    </div><!--CB-->

                    <div class="tab-pane fade" id="mediosPagos" role="tabpanel" aria-labelledby="mediosPagos-tab">
                        <span id="tablaMediosDePago">
                        @if (!$mediosDePago->isEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titular</th>
                                    <th scope="col">Numero Tarjeta</th>
                                    <th scope="col">Vencimiento</th>
                                    <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($mediosDePago as $tarjeta)
                                        <tr>
                                            <th scope="row">{{$tarjeta->IdTarjeta}}</th>
                                            <td>{{$tarjeta->NombreTitular}}</td>
                                            <td>{{$tarjeta->getNumero()}}</td>
                                            <td>{{ $tarjeta->Vencimiento }}</td>
                                            <td><div class="btnIconDelete" onclick="borrarTarjeta({{$tarjeta->IdTarjeta}})"><img src="img/icons/mediumIcons/trash.png" alt="Borrar"/></div></td>
                                        </tr>                                 
                                    @endforeach
                                </tbody>
                            </table>
                                    <br/>
                            @else
                            <h4> no hay medios de pago</h4>
                            <br/>
                            @endif   
                        </span>
                    <div class="container">
                        <div class="row">
                            <div class="col-8"></div>
                            <button class="btn btnCircle btn-success col-3" data-toggle="modal" data-target="#modalAgregarTarjetaCredito">Agregar metodo de pago</button>
                        </div>
                    </div>                                                                                                             
                </div>
            </div>
        </div> <!--Caja-->

    </div><!--ROW-->
</div><!--CONTAINER-->

<!-- Modal Informacion Personal -->
<div class="modal fade bd-example-modal-lg" id="modalEditarPerfil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <br/>
    <br/>
    <div class="modal-dialog modal-lg cajaModal">
        <div class="modal-content container">
            <div class="modal-header">
                <div class></div>
                <div class="col-2"></div>
                <div class="col-8 titleModal titleGreen" style="margin-top: -30px;">
                    <h4 class="modal-title text-center">Editar Datos Personales</h4>  
                </div>          
                <div class="col-1"></div> 
                <button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('actualizarDatos') }}" method="POST" onsubmit="return validarModificacionPerfil();" style="margin-top: -10px;">
                    @csrf
                    <br/>
                    <div class="row">
                        <div class="col-12 col-sm-5 m-auto">
                            <label style="margin-bottom: -5px;">Pais de residencia</label>
                            <br/>
                            <select class="form-control" id="cmbPais" name="pais" required>     
                                <option disabled selected>Seleccione un Pais ...</option>  
                                @foreach ($paises as $pais)
                                    @if ($pais->IdPais == $persona->IdPais)
                                        <option value="{{ $pais->IdPais }}" selected>{{ $pais->Pais }}</option>
                                    @else
                                        <option value="{{ $pais->IdPais }}">{{ $pais->Pais }}</option>
                                    @endif                       
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-5 m-auto">
                            <label style="margin-bottom: -5px;">Ciudad</label>
                            <br/>
                            <select class="form-control inputIconoInterno" name="ciudad" id="cmbCiudad" required>
                                <option  disabled>Seleccione una ciudad ...</option>
                                @foreach ($ciudades as $ciudad)
                                    @if ($ciudad->IdCiudad == $persona->IdCiudad)
                                        <option value="{{ $ciudad->IdCiudad }}" selected>{{ $ciudad->Ciudad }}</option>
                                    @else
                                        <option value="{{ $ciudad->IdCiudad }}">{{ $ciudad->Ciudad }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4 mb-4">
                        <div class="form-group col-12 col-sm-5 m-auto">
                            <label style="margin-bottom: -5px;">Dirección</label>
                            <br/>
                            <input type="text" class="form-control" value="{{ $persona->Direccion }}" name="dir" id="txtDir" required/>
                            <div id="validationtxtDir" class="containerError">
                                <img src="img/icons/exclamation.png" alt="¡Error! ">
                                <p id="pValidationtxtDir"></p>
                            </div>
                        </div>
                        <div class="form-group col-12 col-sm-5 m-auto">
                            <label style="margin-bottom: -5px;">Numero de puerta</label>
                            <br/>
                            <input type="text" class="form-control" value="{{ $persona->NumeroPuerta }}" name="numPuerta" id="txtNumPuerta" required onkeydown="escribirSoloNumeros(event);"/>
                            <div id="validationtxtNumPuerta" class="containerError">
                                <img src="img/icons/exclamation.png" alt="¡Error! ">
                                <p id="pValidationtxtNumPuerta"></p>
                            </div>
                        </div>                     
                    </div>         
                    

                    <div class="row mt-4">
                        <div class="form-group col-12 col-sm-5 m-auto">
                            <label style="margin-bottom: -5px;">Codigo Postal</label>
                            <br/>
                            <input type="text" class="form-control" value="{{ $persona->CodigoPostal }}" name="codigoPostal" id="txtCodigoPostal" onkeydown="escribirSoloNumeros(event);"/>
                            <div id="validationtxtCodigoPostal" class="containerError">
                                <img src="img/icons/exclamation.png" alt="¡Error! ">
                                <p id="pValidationtxtCodigoPostal">error en la direccion</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 m-auto">
                        </div>
                    </div>


                    <div class="row mt-4 mb-2">
                        <div class="form-group col-12 col-sm-5 m-auto">
                            <label style="margin-bottom: -5px;">Telefono</label>
                            <br/>
                            <input type="text" class="form-control" value="{{ str_after($persona->Telefono, '-') }}" name="tel" id="txtTel" required onkeydown="escribirSoloNumeros(event);"/> 
                            <div id="validationtxtTel" class="containerError">
                                <img src="img/icons/exclamation.png" alt="¡Error! ">
                                <p id="pValidationtxtTel">error en la direccion</p>
                            </div>
                        </div>
                        <div class="form-group col-12 col-sm-5 m-auto">
                            <label style="margin-bottom: -5px;">Otro Telefono</label>
                            <br/>
                            <input type="text" class="form-control" value="{{ $persona->Telefono2 }}" name="tel2" id="txtTel2" onkeydown="escribirSoloNumeros(event);"/>
                            <div id="validationtxtTel2" class="containerError">
                                <img src="img/icons/exclamation.png" alt="¡Error! ">
                                <p id="pValidationtxtTel2">error en la direccion</p>
                            </div>
                        </div>
                    </div>

                    <br/>

                    <div class="row mt-4 mb-4">
                        <button class="col-6 m-auto btn btn-success btnCircle">Guardar</button>
                    </div>
                </form>
            </div>
        </div><!--Modal Content-->
    </div>
  </div><!--Fin Modal Editar Perfil-->


  <!--MODAL FOTO DE PERFIL-->
<div class="modal fade bd-example-modal-sm" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class></div>
                <div class="col-2"></div>
                <div class="col-8 titleModal titleGreen" style="margin-top: -30px;">
                    <h4 class="modal-title text-center">Cambiar foto</h4>  
                </div>          
                <button type="button" class="close col-1 text-left" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="ml-2"></div>
                
            </div>
            <form action="{{ route('actualizarFoto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <div class="contenedorDeImagen">
                        <img id="previaImg" src="{!!  Auth::user()->getImagen() !!}" class="img-fluid" style="width: auto; height: 100%;"/>
                    </div>
                    <label class="mt-1" for="avatarInput" id="lblAvatar" style="width:100%;">Cargar imagen</label>
                    <input type="file" name="avatar" id="avatarInput" accept="image/jpeg, image/png" hidden/>
                    <p class="datosSensibles" style="font-size: 13px !important; margin-bottom: -10px;">Peso máximo permitido 1 MB</p>          
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCancelImagen" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div><!--FIN MODAL FOTO DE PERFIL-->


<!-- Modal Cuentas Bancarias -->
<div class="modal fade" id="modalAgregarCuentaBancaria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top:10%;" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <div class></div>
                <div class="col-2"></div>
                <div class="col-8 titleModal titleGreen" style="margin-top: -30px;">
                    <h4 class="modal-title text-center">Agregar cuenta</h4>  
                </div>          
                <div class="col-1"></div> 
                <button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                  <div class="row mt-1">
                      <div class="col-8 m-auto">
                        <label style="margin-bottom: -5px;">Banco</label>
                        <br/>
                        <select class="form-control" id="cmbBanco">
                            <option value="0">Seleccione un Banco...</option>
                            @foreach ($bancos as $banco)
                                <option value="{{$banco->idBanco}}"> {{$banco->Banco}} </option>
                            @endforeach
                        </select>
                      </div>
                  </div>
    
                  <div class="row mt-4">
                      <div class="col-8 m-auto">
                        <label style="margin-bottom: -5px;">Tipo de cuenta</label>
                        <br/>
                        <select class="form-control" id="cmbTipoCuenta">
                          <option value="0">Seleccione tipo de cuenta...</option>
                          <option value="Ahorro">AHORRO</option>
                          <option value="Corriente">CORRIENTE</option>
                        </select>
                      </div>
                  </div>
    
                  <div class="row mt-4 mb-5">
                      <div class="form-group col-8 m-auto">
                        <label style="margin-bottom: -5px;">N° de cuenta</label>
                        <br/>
                        <input type="text" id="txtNumeroCuenta" class="form-control" required onkeydown="escribirSoloNumeros(event);"/>
                        <div id="validationtxtNumeroCuenta" class="containerError">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationtxtNumeroCuenta">error en la direccion</p>
                        </div>
                      </div>
                  </div>
                  <div class="row mt-4 mb-3">
                      <button type="button" class="btn btn-danger btnCircle col-4 m-auto" data-dismiss="modal" onclick="limpiarModalCuentaBancaria();">Cancelar</button>
                      <button id="btnAgregarCuenta"type="button" class="btn btn-success btnCircle col-4 m-auto">Agregar</button>
                  </div>      
              </div>
          </div>
        </div>
      </div><!--Fin Modal Agregar Cuenta Bancaria-->


<!-- Modal Tarjetas Credito -->
<div class="modal fade" id="modalAgregarTarjetaCredito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top:10%;" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <div class></div>
                <div class="col-2"></div>
                <div class="col-8 titleModal titleGreen" style="margin-top: -30px;">
                    <h4 class="modal-title text-center">Agregar Tarjeta</h4>  
                </div>          
                <div class="col-1"></div> 
                <button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                  <div class="row mt-1">
                      <div class="col-8 m-auto">
                        <label style="margin-bottom: -5px;">Titular</label>
                        <br/>
                        <input type="text" class="form-control" id="txtTitular"/>
                      </div>
                  </div>
    
                  <div class="row mt-4">
                      <div class="col-8 m-auto">
                        <label style="margin-bottom: -5px;">Numero de tarjeta</label>
                        <br/>
                        <input type="text" class="form-control" id="txtNumeroTarjeta" maxlength="20"/>
                      </div>
                  </div>
    
                  <div class="row mt-4">
                      <div class="col-2"></div>
                      <div class="form-group col-7">
                        <label style="margin-bottom: -5px;">Fecha vencimiento</label>
                        <br/>
                        <input type="date" class="form-control" id="dtpFechaVencimiento"/>                     
                      </div>
                  </div>
                  <div class="row mt-2 mb-3">
                      <button type="button" class="btn btn-danger btnCircle col-4 m-auto" data-dismiss="modal">Cancelar</button>
                      <button id="btnAgregarMedioPago" type="button" class="btn btn-success btnCircle col-4 m-auto">Agregar</button>
                  </div>      
              </div>
          </div>
        </div>
      </div><!--Fin Modal Agregar Metodo de Pago-->







  <!-- Modal aviso de fallo perfil -->
<div class="modal fade" id="modalFalloValidacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #eeeeee; -webkit-box-shadow: 3px 3px 9px rgb(82, 82, 82); -moz-box-shadow: 2px 2px 5px rgb(82, 82, 82); filter: shadow(color=rgb(82, 82, 82), direction=135, strength=2); border-radius: 8px;">
            <div class="modal-header" style="background-color: #f0765b; color: #ffffff;">
                <h4 class="modal-title" id="titleModalFallo" style="font-weight: bold;">No se pudo aplicar los cambios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"  style="color: white">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size: 14px;">
                <h6 style="font-weight: bold;" id="subTitleModalFallo">Para actualizar los datos corrija los siguientes errores:</h6>
                <br/>
                <span id="messageModalFallo"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div><!--fin modal-->


<!--LOADING-->
<div style="margin-top:16%;" class="modal fade bd-example-modal-sm" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <img src="img/gifs/load.gif" width="30px" alt="Cargando">
        </div>
    </div>
    </div>

@endsection