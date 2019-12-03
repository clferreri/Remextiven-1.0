<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remextiven</title>

    <!----- GOOGLE FONTS ----->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,600|Roboto:700&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/registerScripts/validacionesRegistroPF.js"></script>

    <style>

        body{
            font-family: 'Montserrat', sans-serif;       
        }
        input[type="number"]::-webkit-outer-spin-button, 
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }

        input{
            margin-bottom: 2px;
        }
        .tipoDatos{
            text-align: left;
            font-size: 15px;
            font-weight: bold; 
        }

        .form-group{
            height: 56px;
            margin-bottom:45px;
        }

        .labelLeft{
            margin-bottom: 4px;
        }

        .agrandar{
            transform: scale(2) !important;
            border: 1 px solid red !important;
        }

        .ultimoInput{
            margin-right: 0px !important;
        }
        
        .lineaCortante{
            width: 200%;

        }

        .caja{
            background-color:rgba(255,255,255, 0.0); 
            border-radius: 20px; 
      }
      
        .cajaSuperior{
            background-color:rgba(255,255,255, 0.5); 
            border-radius: 20px; 
            margin-bottom: 20px;
            margin-top: 20px;
            padding-top: 15px;

        }

        .cajaSuperior h2{
            text-align: center;
        }

        .contenidoCaja{
            width:80%;
            padding: 15px;
            margin:0px auto;
            
        }

      

        .inputIconoInterno {
            padding-left: 2.375rem;
        }

        .iconoInterno{
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.2rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
        .sinFlecha {
            /* for Firefox */
            -moz-appearance: none;
            /* for Chrome */
            -webkit-appearance: none;
            }

            /* For IE10 */
            .sinFlecha::-ms-expand {
            display: none;
            }

        .error{
            display: flex;
            text-align: center;
            justify-content: center;
            margin: 8 auto;
            margin-top: 4px;
            color: #dc3545;
            font-size: 14px;      
        }

        .error img{
            width: 19px;
            height: 20px;
            margin-top: 1px;
            margin-right: 3px;
        }

        


        .inputError{
            border-color: rgb(241, 68, 68);
            box-shadow: 0 1px 1px rgba(240, 73, 73, 0.075)inset, 0 0 8px rgba(240, 73, 73, 0.6);
            outline: 0 none;
        }

        .inputOk{
            border-color: rgb(54, 178, 65);
            box-shadow: 0 1px 1px rgba(66, 189, 77, 0.075)inset, 0 0 8px rgba(70, 200, 84, 0.6);
            outline: 0 none;
        }

        .modalPersonalizado{
            
        }

        .botonDerecho{
            position: absolute;
            z-index: 2;
            display: inline-block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.2rem;
            text-align: center;
            margin-top: -40px;
            right: 0;
            margin-right: 13px;        
        }

        .botonDerecho:hover{
            cursor: pointer;
        }


    </style>
</head>
<body style="background-image: linear-gradient(to bottom right,#ffd959,#ff5d57); background-size: 100% 100%; background-attachment:fixed">
    <form action="{{ route('registrar') }}" method="POST" onsubmit="return validarInputs();">
        <div class="container cajaSuperior">
            <h2>Registro de Persona</h2>
            @csrf
            <input type="text" value="P" name="tpu" hidden/>      
        <div class="container caja">
            <div class="contenidoCaja">

                    <div style="margin-bottom: 22px;"><label class="tipoDatos">Datos de Usuario</label></div>

                <div class="row">
                    <br/>
                    <div class="form-group col-sm-12 col-md-8 col-lg-4">
                        <label class="labelLeft">Email</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/message-envelope.png" alt="@"/></span>
                        @if (isset($email))
                            <input id="txtMail" type="mail" name="email" value="{{ $email }}" class="form-control inputIconoInterno" placeholder="Ingresa un email" required/> 
                        @else
                            <input id="txtMail" type="mail" name="email" value="" class="form-control inputIconoInterno" placeholder="Ingresa un email" required/>
                        @endif
                        <div id="validationMail" class="error">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationMail"></p>
                        </div>
                    </div>   
                    
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Contraseña</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/password.png" alt="@"/></span>
                        <input id="txtPass" type="password" name="password" class="form-control inputIconoInterno" placeholder="Ingresa una contraseña" required/>
                        <span class="botonDerecho ojoCerrado" onclick="mostrarContraseña('txtPass', 'ojoPass');"><img id="ojoPass"src="img/icons/smallIcons/eye-close.png"/></span>
                    </div>
                    
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Confirmar Contraseña</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/password.png" alt="@"/></span>
                        <input id="txtPass2" type="password" name="password_confirmation" class="form-control inputIconoInterno" placeholder="Reingresa la contraseña" required/> 
                        <span class="botonDerecho ojoCerrado" onclick="mostrarContraseña('txtPass2', 'ojoPass2');"><img id="ojoPass2"src="img/icons/smallIcons/eye-close.png"/></span>
                        <div id="validationPass" class="error">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationPass"></p>
                        </div>
                    </div>
                </div>

                

                <hr/>

                <div style="margin-bottom: 22px;"><label class="tipoDatos">Datos personales</label></div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-8 col-lg-4">
                        <label class="labelLeft">Nombre</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/name.png" alt="@"/></span>
                        <input id="txtName" type="text" name="nomb" class="form-control inputIconoInterno" placeholder="Ingresa tu nombre" onkeypress="return soloLetras(event)" maxlength="16" required/>
                        <div id="validationName" class="error">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationName"></p>
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Primer Apellido</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/id-card.png" alt="@"/></span>
                        <input id="txtSurname" type="text" name="ape" class="form-control inputIconoInterno" placeholder="Ingresa tu apellido" onkeypress="return soloLetras(event)" maxlength="16" required/>
                        <div id="validationSurname" class="error">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationSurname"></p>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Segundo Apellido</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/id-card.png" alt="@"/></span>
                        <input id="txtSurname2" type="text" name="ape2" class="form-control inputIconoInterno" placeholder="Ingresa otro apellido" onkeypress="return soloLetras(event)" maxlength="16" required />
                        <div id="validationSurname2" class="error">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationSurname2"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-8 col-lg-4">
                        <label class="labelLeft">Documento</label>
                        <div style="display: flex;">   
                            <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/id-card.png" alt="@"/></span>
                            <input id="txtDni" type="number" name="doc" class="form-control inputIconoInterno" style="width:70%;" onkeypress="return soloNumeros(event)" required/>
                            <select class="form-control" id="cmbDocumento" name="tipDoc" style="width: 31%; margin-left: -2px;">
                                <option>DNI</option>
                                <option>PAS</option>
                            </select>
                        </div>
                        <div id="validationDni" class="error">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationDni"></p>
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Fecha de Nacimiento</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/monthly-calendar.png" alt="@"/></span>
                        <input id="dtpBirthDate" type="date" name="fechaNacimiento" class="form-control inputIconoInterno" required/>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Sexo</label>   
                        <div style="display: flex;">
                            <div class="col-1"></div>
                            <div class="custom-control custom-radio col-4">
                                <input type="radio" class="custom-control-input agrandar" id="optMasculino" name="optSexo" value="Masculino" checked required/>
                                <label class="custom-control-label" for="optMasculino"><img src="img/icons/smallIcons/masculin.png" alt="Masculino"></label>
                            </div>
                            <div class="custom-control custom-radio col-4">
                                <input type="radio" class="custom-control-input" id="optFemenino" value="Femenino" name="optSexo" required>
                                <label class="custom-control-label" for="optFemenino"><img src="img/icons/smallIcons/femenin.png" alt="Femenino"></label>
                            </div>
                            <div class="custom-control custom-radio col-3">
                                <input type="radio" class="custom-control-input" id="optOtro" name="optSexo" value="Otro" required>
                                <label class="custom-control-label" for="optOtro"><img src="img/icons/smallIcons/gender.png" alt="Otro"></label>
                            </div>
                        </div>                    
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Pais</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/earth-sign.png" alt="@"/></span>
                        <select class="form-control inputIconoInterno" name="pais" id="cmbPais" required>
                                <option disabled selected>Seleccione un Pais ...</option>
                                @foreach ($paises as $pais)
                        <option value="{{ $pais->IdPais }}" style="background-image:url({{$pais->ImagenBandera}});">{{$pais->Pais }}</option>
                                @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Ciudad</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/building.png" alt="@"/></span>
                        <select class="form-control inputIconoInterno" name="ciudad" id="cmbCiudad" required>
                                <option  disabled selected>Seleccione una ciudad ...</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Dirección</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/website-home.png" alt="@"/></span>
                        <input id="txtAddress" type="text" name="dir" class="form-control inputIconoInterno" placeholder="Ingresa tu dirección" required/>
                        <div id="validationAddress" class="error">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationAddress"></p>
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label class="labelLeft">Nro Puerta</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/website-home.png" alt="@"/></span>
                        <input id="txtAddressNumber" type="text" name="numPuerta" class="form-control inputIconoInterno" placeholder="Ingresa tu N° puerta" onkeypress="return soloNumeros(event)" maxlength="6" required>
                        <div id="validationAddressNumber" class="error">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationAddressNumber"></p>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label class="labelLeft">Telefono</label>
                            <div style="display: flex;">
                                <select class="form-control sinFlecha" name="codigoTef" id="cmbDocumento" style="width: 34%; margin-right: -10px; appearance:none;">
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->Prefijo }}">{{ $pais->Prefijo }}</option>
                                    @endforeach
                                </select>
                                <div style="width: 75%;">   
                                <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/telephone-call.png" alt="@"/></span>
                                <input id="txtPhone" type="number" class="form-control inputIconoInterno" name="tef" placeholder="Ingrese telefono" style="width:100%;" onkeypress="return soloNumeros(event)" required/>
                                </div>
                            </div>
                            <div id="validationPhone" class="error">
                                <img src="img/icons/exclamation.png" alt="¡Error! ">
                                <p id="pValidationPhone"></p>
                            </div>
                        </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input name="nl" type="checkbox" class="custom-control-input" id="chkNl" value="1"/>
                            <label class="custom-control-label" for="chkNl">Deseo recibir las novedades de Remextiven</label>
                            <input hidden type="number" value="0" id="txtNl"/>
                        </div>
                    </div>  
                </div>
            </div><!--Contenido Caja -->

            <hr/>
            <br/>

            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Enviar</button>
                </div>    
                <div class="col-3">
                </div>              
            </div>
            <br/>
            <br/>
        </div><!--caja-->
        </div>
            <input type="text" value="{{ $idUsuRef }}" name="idReferencia"/>
    </form>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #eeeeee; -webkit-box-shadow: 3px 3px 9px rgb(82, 82, 82); -moz-box-shadow: 2px 2px 5px rgb(82, 82, 82); filter: shadow(color=rgb(82, 82, 82), direction=135, strength=2); border-radius: 8px;">
      <div class="modal-header" style="background-color: #f0765b; color: #ffffff;">
        <h4 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold;">No se pudo completar el registro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"  style="color: white">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 14px;">
        <h6 style="font-weight: bold;">Para completar el registro corrija los siguientes errores:</h6>
        <br/>
        <span id="errores"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/generalScripts/validacionesGenerales.js"></script>
    <script type="text/javascript" src="js/generalScripts/ciudades.js"></script>

</body>
</html>