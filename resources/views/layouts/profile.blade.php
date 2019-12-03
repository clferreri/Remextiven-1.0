<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Remextiven</title>

    <!--ToastR-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!--Confirm-->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!--Fontawesome-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">



    <!--Boostrap-->
    <link rel="stylesheet" type="text/css" href="css/Complementos/Boostrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/Complementos/Boostrap/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/Complementos/Boostrap/bootstrap-reboot.min.css">

    <!--JQUERY-->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="css/Inputs/botones.css">
    <link rel="stylesheet" type="text/css" href="css/Align/alineacion.css">
    <link rel="stylesheet" type="text/css" href="css/Inputs/estiloLetras.css">
    <link rel="stylesheet" type="text/css" href="css/Utilidades/modals.css">
    <link rel="stylesheet" type="text/css" href="css/Utilidades/alerts.css">
    <link rel="stylesheet" type="text/css" href="css/ContainerMessage/errores.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-confirm.min.css">

    


    <!--FONT-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet"> 
    
    <style type="text/css">
        body {
            background-image: url("img/FondoRemextiven.jpg");
            background-size: 100%;
            background-attachment:fixed;
            font-family: 'Roboto', sans-serif;
        }

        .titulo{
            font-family: 'Montserrat', sans-serif !important;
        }
        .robot{
            font-family: 'Roboto', sans-serif !important;
        }

        .caja{
            background-color: rgba(245, 245, 245, 1);
            border-radius: 25px;

            -webkit-box-shadow: 2px 5px 9px rgb(82, 82, 82);
            -moz-box-shadow: 2px 5px 9px rgb(82, 82, 82);
            filter: shadow(color=rgb(82, 82, 82), direction=135, strength=2);
        }

        .headModalPerfil{           
            border-radius:15px 15px 2px 2px !important;
            background-image: linear-gradient(to right, #0eb24a, #10cf56);
        }

        .modalDatos{
            border-radius: 20px !important;
        }

        .barraTitulo{
            width: 100%;
            background-image: linear-gradient(to right, #0eb24a, #10cf56);
            height: 170px;
            margin-bottom: -106px;  
            padding-top:15px;    
        }

        .modal-notify .modal-header {
            border-radius: 3px 3px 0 0;
        }
        .modal-notify .modal-content {
            border-radius: 3px;
        }

        input[type=”file”]#avatarInput {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
            }

        label[for="avatarInput"] {
        font-size: 12px;
        font-weight: 600;
        color: #fff;
        background-color: #106BA0;
        display: inline-block;
        transition: all .5s;
        cursor: pointer;
        padding: 15px 40px !important;
        text-transform: uppercase;
        width: fit-content;
        text-align: center;
        }

        .datosSensibles{
            color:dimgrey;
        }

        .contenedorDeImagen{
            display: inline-block;
         position: relative;
            width: 220px;
            height: 220px;
            overflow: hidden;
            border-radius: 50%;
        }
        

    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="img/LogoFondoTransparente.png" width="250px" class="d-inline-block align-top" alt="">
        </a>
        <ul class="listaUsuario titulo">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img id="imgAvatar" class="ml-3 avatar" src="{!!  Auth::user()->getImagen() !!}"/> <span class="ml-1">&nbsp;</span> {{ Auth::user()->getNombreCompleto() }} <span class="caret"></span>
                    </a>

                <div class="dropdown-menu dropdown-menu-right contListaUsuario" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">
                        {{ __('Profile') }} <img class="ml-2" style="margin-top: -3px;" src="img/icons/mediumIcons/profileLink.png" width="24px"/>
                    </a>
                    <a class="dropdown-item" style="color: #10cf56" href="#">
                        {{ __('Shared') }} <img class="ml-2" src="img/icons/mediumIcons/sharedLink.png" width="24px"/>
                    </a>  
                    <hr style="margin-top: 2px; margin-bottom: 0px;"/>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }} <img class="ml-2" src="img/icons/mediumIcons/logout.png" width="24px"/>
                    </a>   
                
                </div>
            </li>
        </ul>
    </nav>
<form id="logout-form" action="{{ route('logoutUser') }}" method="POST">
    @csrf
    </form>
    <div class="barraTitulo">
        <div class="container">
            <h3 class="ml-3 titulo" style="color:white; font-weight: bold;">Mi Perfil</h3>
        </div>
    </div>
    <main>
        @yield('contenido')
    </main>

    <!--Scripts Boostrap-->
    <script type="text/javascript" src="js/Complementos/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/Complementos/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <!--Script toastr-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    <!--Scripts jconfirm-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!--Scripts fontAwesome-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/all.js"></script>   
    
    <!--Scripts locales-->
    <script type="text/javascript" src="js/generalScripts/ciudades.js"></script>
    <script type="text/javascript" src="js/generalScripts/validacionesGenerales.js"></script>
    <script type="text/javascript" src="js/profileScripts/validacionesModificacionPerfil.js"></script>
    <script type="text/javascript" src="js/generalScripts/erroresInputs.js"></script>
    <script type="text/javascript" src="js/UtilScripts/modals.js"></script>
    <script type="text/javascript" src="js/generalScripts/Ascripts/cuentasBancarias.js"></script>
    <script type="text/javascript" src="js/generalScripts/Ascripts/mediosDePago.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                placement: 'right',
                html: true
            });   
        });

        $("#avatarInput").change(function(e) {
      addImage(e); 
     });
     

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#previaImg').attr("src",result);
     }

    $("#btnCancelImagen").click(function(){
        $("#previaImg").attr("src", $("#imgAvatar").attr('src'))
    });


    $("#btnCancelImagenX").click(function(){
        $("#previaImg").attr("src", $("#imgAvatar").attr('src'))
    });
    


                
                

            //     var nombreArchivo = $(this).val().split('\\').pop();
            
            // $("#lblAvatar").html(nombreArchivo);
            
           
        

    </script>
</body>
</html>