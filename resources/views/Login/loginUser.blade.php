<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remextiven</title>
     
    <!--CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/Inputs/iconoInterno.css">
    <link rel="stylesheet" type="text/css" href="css/Inputs/botones.css">
    <link rel="stylesheet" type="text/css" href="css/Align/alineacion.css">

    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 
    <style type="text/css">

        body{
            background-image: url("img/fondo.jpg");
            background-size: 100% 100%; 
            background-attachment:fixed;
            padding-top: 35px;
            font-family: 'Montserrat', sans-serif;
            
        }

        .cajaLogin{
            background-color: rgba(255,255,255, 0.7);
            border-radius: 8px;


            /*SOMBREADO*/
            -webkit-box-shadow: 3px 8px 9px rgb(82, 82, 82);
            -moz-box-shadow: 3px 8px 9px rgb(82, 82, 82);
            filter: shadow(color=rgb(82, 82, 82), direction=135, strength=2);
        }

        .cajaLogo{
            background-color: #c1c1c1;
            border-radius: 6px;


            /*SOMBREADO*/
    -webkit-box-shadow: 4px 5px 9px rgb(82, 82, 82);
    -moz-box-shadow: 4px 5px 9px rgb(82, 82, 82);
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

#pTerminos{
    font-size: 13px;
}

    </style>

    </head>
<body>
    <div class="container-fluid">          
        <div class="row">
            <div class="col-sm-1 col-md-2 col-lg-4"></div>
            <div class="col-sm-10 col-md-8 col-lg-4 cajaLogin" style="margin-top: 3%;">
                <div class="row mt-5">                 
                    <div class="col-12 textoCentrado">
                        <a class="navbar-brand"  href="#">
                                <img src="img/LogoFondoTransparente.png" style="margin-left: 10px;" class="img-fluid" alt="" width="330px">
                        </a>
                    </div>
                </div>

                    <div class="textoCentrado">
                        <h2>Bienvenido, inicia sesión</h2>
                    <p>¿Eres nuevo?  <a href="{{ route('registro')}}">Regístrate</a></p>
                    </div>  
                <div class="container">
                    <form method="POST" action="{{ route('loginUser') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                    <label>Correo</label>
                                    <div class="form-group grupoConErrores">
                                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/man-user.png" alt="@"/></span>
                                        <input type="mail" name="email" id="txtMail" class="form-control inputIconoInterno" placeholder="Ingresa tu Usuario" value="{{ old('email') }}">
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
                                    <label>Contraseña</label>
                                    <div class="form-group grupoConErrores">
                                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/key.png" alt="@"/></span>
                                        <input id="txtPass" name="password" type="password" class="form-control inputIconoInterno" placeholder="Ingresa tu Usuario">
                                        <div id="validationPass" class="error">
                                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                                            <p id="pValidationPass">Debe ingresar un mail valido</p>
                                        </div>
                                    </div>    
                            </div>
                            <div class="col-1"></div>
                            @if ($errors->any())
                            <div class="alert alert-danger col-12 col-sm-11 m-auto textoCentrado">
                                    <div class="row">
                                        <div class="col-2" style="display: flex; align-items: center;">
                                            <img src="img/icons/triangle.png" class="m-auto img-fluid"/>
                                        </div>
                                        <div class="col-10" style="text-align: left;">
                                            {!! $errors->first() !!}
                                        </div>
                                    </div>
                                     
                                 </div>
                                 <script>
                                     window.setTimeout(function() {
                                         $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                             $(this).remove(); 
                                         });
                                     }, 8000);
                                 </script>                 
                            @endif
                            
                        </div>
                        <div class="row">
                            <div class="col-xs-1 col-sm-2"></div>
                            <button class="btn btn-success btnCircle col-xs-10 col-sm-8 mt-3" type="submit">Iniciar Sesion</button>
                                                             
                            <div class="col-xs-1 col-sm-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-12 textoCentrado"><p><a href="#">Olvidé mi contraseña</a></p> </div>
                                                                
                          
                            <div class="col-3"></div>
                        </div>                                          
                    </form>
                </div>
                
                <hr class="lineaCortante"/>
                <p id="pTerminos" class="textoCentrado">Al continuar, estarás aceptando nuestros <a href="#">Términos y condiciones</a></p> 

            </div> <!--Final caja login-->
            <div class="col-sm-1 col-md-2 col-lg-4"></div>
        </div>

    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/Validations/validaciones.js"></script>
</body>
</html>