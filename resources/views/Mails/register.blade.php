<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remextiven</title>

    <!--CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/basicLR.css">

    <!----- GOOGLE FONTS ----->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 
</head>
<body>
    
<div class="bodyDatos">
    dsadsa
</div>
<div class="bodyPageMantaRegistro">
<a class="navbar-brand aLogo" href="#">
                <img src="img/logoRemextiven.png" alt="" width="300px"class="logoSuperior">
        </a> 
    <div class="cajaFijaRegistro">
        <h2>Registro</h2>

        <div class="contenidoCajaFija">
        <form action="{{ route('cargarForm') }}" method="POST" onsubmit="return validarFormulario();">
            @csrf
                <div class="form-group grupo1">
                        <label class="labelLeft">E-mail</label>   
                        <span class="iconoInterno" id="basic-addon1"><img src="img/icons/smallIcons/man-user.png" alt="@"/></span>
                        <input id="txtMail" type="mail" name="email" class="form-control inputIconoInterno" placeholder="E-mail">
                        <div id="validationMail" class="error">
                            <img src="img/icons/exclamation.png" alt="¡Error! ">
                            <p id="pValidationMail"></p>
                        </div>
                </div>

      
                
                <label class="labelLeft">Tipo de cuenta</label>
                <div class="form-group itemsLinear">
                    <div class="custom-control custom-radio margin-right">
                        <input type="radio" value="0" class="custom-control-input" id="optPersona" name="optTipoCuenta">
                        <label class="custom-control-label" for="optPersona">Personal</label>
                    </div>
                    <div class="custom-control custom-radio margin-left">
                        <input type="radio" value="1" class="custom-control-input" id="optEmpresa" name="optTipoCuenta">
                        <label class="custom-control-label" for="optEmpresa">Empresa</label>
                    </div>
                </div>
                <br/>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="chkAnuncios" required="">
                    <label class="custom-control-label" for="chkAnuncios">Acepto los <a href="#">Términos y condiciones</a></label>
                </div>

                <button class="btn btn-success btnCircle mt-4" type="submit">Registrarse</button>
            </form>
        </div>

    </div>
</div>

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/Validations/validaciones.js"></script>
<script type="text/javascript">
    function validarFormulario(){
        var sendForm = true;
        var email = $("#txtMail").val();
        if (!validarMail(email)){
            sendForm = false;
        }

        return sendForm;
    }
</script>

</body>
</html>