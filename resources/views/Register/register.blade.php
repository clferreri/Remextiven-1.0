<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/Inputs/iconoInterno.css">
    <link rel="stylesheet" type="text/css" href="css/Inputs/botones.css">
    <link rel="stylesheet" type="text/css" href="css/Align/alineacion.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 
    <style>

            body{
                background-image: url(img/emprendedor1.jpg);
                background-size: 100% 100%;
                background-attachment:fixed;
                margin: 0;
                font-family: 'Montserrat', sans-serif;
            }

            .cajaRegistro{
                /*ackground-color:rgba(255,255,255, 0.7);*/
                background-color: #fefefe;
                border-radius: 10px;
                margin-top:100px;
                -webkit-box-shadow: 3px 8px 9px rgb(82, 82, 82);
            -moz-box-shadow: 3px 8px 9px rgb(82, 82, 82);
            filter: shadow(color=rgb(82, 82, 82), direction=135, strength=2);
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
                height: 19px;
                margin-top: 1px;
                margin-right: 3px;
            }
            
            .cajaError{
                float: left;
                margin-bottom: -70px;
                margin-top: 5px;
                padding-left: 5%;
                padding-right: 5%;
            }
        </style>
    

</head>
<body>
    <div class="container-fluid" style="width: 100%;">
        @if ($errors->any())
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 alert alert-danger cajaError" role="alert">
                    <center><h6>No se pudo completar el registro</h6></center>
                    <ul style="font-size: 14px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-1"></div>                
            </div>
        @endif
        <div class="row cuerpo">      
                        <div class="d-none d-sm-block col-sm-2 col-lg-4"></div>
                        <div class="col-12 col-sm-8 col-lg-4 cajaRegistro"> <!--BoxRegistro-->
                            <div class="container">
                            <form method="POST" action="{{ route('cargarForm')}}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-12 textoCentrado">
                                            <a class="navbar-brand"  href=" #">
                                                <img src="img/LogoFondoTransparente.png" alt="" class="img-fluid" style="margin-bottom: -10px; margin-left: 15px;" width="350px">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-10">
                                            <label>E-mail</label> 
                                            <div class="form-group grupoConErrores mb-3">                                          
                                                <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/man-user.png" alt="@"/></span>
                                                <input id="txtMail" type="mail" name="email" class="form-control inputIconoInterno" placeholder="E-mail" required>
                                                <div id="validationMail" class="error">
                                                    <img src="img/icons/exclamation.png" alt="¡Error! ">
                                                    <p id="pValidationMail"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                    </div>
        
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-10">
                                            <label>Tipo de Cuenta</label>
                                            <div class="form-group mb-5">
                                                <div class="row">
                                                    <div class="col-1 col-sm-2 col-md-1 col-lg-2"></div>
                                                    <div class="custom-control custom-radio col-4">
                                                        <input type="radio" value="0" class="custom-control-input" id="optPersona" checked name="optTipoCuenta">
                                                        <label class="custom-control-label" for="optPersona" >Personal</label>
                                                    </div>
                                                    <div class="col-1"></div>
                                                    <div class="custom-control custom-radio col-4">
                                                        <input type="radio" value="1" class="custom-control-input" id="optEmpresa" name="optTipoCuenta">
                                                        <label class="custom-control-label" for="optEmpresa">Empresa</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-1"></div>
                                        <div class="col-10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="chkAnuncios" required="">
                                                <label class="custom-control-label" for="chkAnuncios">Acepto los <a href="#">Términos y condiciones</a></label>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                    </div>
        
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <button class="btn btn-success btnCircle col-8 mt-4 mb-4" type="submit">Registrarse</button>
                                        <div class="col-2"></div>
                                    </div>
                                    @if (session('token'))
                                        <input type="text" hidden value="{{ session('token') }}" name="tokenReferencia" />
                                    @else
                                        <input type="text" hidden value="0" name="tokenReferencia"/>
                                    @endif                         
                                </form>
                            </div>
                        </div> <!--Fin BoxRegisto-->
                        <div class="d-none d-sm-block col-sm-2 col-lg-4"></div>
              
            </div> <!--Caja derecha-->
        </div>
        

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/Validations/validaciones.js"></script>

    
</body>
</html>