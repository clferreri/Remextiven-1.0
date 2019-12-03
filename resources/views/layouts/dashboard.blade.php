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

    <!--SCRIPTS BOOSTRAP JS-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Scripts para VUE.js -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Css-->
    <link rel="stylesheet" type="text/css" href="css/Inputs/botones.css">
    <link rel="stylesheet" type="text/css" href="css/Align/alineacion.css">
    <link rel="stylesheet" type="text/css" href="css/Inputs/estiloLetras.css">
    <link rel="stylesheet" type="text/css" href="css/Utilidades/modals.css">
    <link rel="stylesheet" type="text/css" href="css/Utilidades/alerts.css">
    <link rel="stylesheet" type="text/css" href="css/ContainerMessage/errores.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-confirm.min.css">
    <link rel="stylesheet" href="css/Utilidades/MenuVerticalMobil.css">
    <link rel="stylesheet" href="css/all.min.css">

    


    <!--FONT-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet"> 
    <style>
    .cajita{
        border: 1px solid red;
    }
    </style>
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 mr-auto" href="#"><img src="img/LogoFondoTransparente.png" width="200px"></a>
                <button id="btnMenu" class="navbar-toggler align-self-start" type="button">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="listaUsuario titulo" style="margin-top: -4px; margin-bottom: -4px;">
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
              
                <div class="col-12 col-sm-8 col-md-4 collapse bg-light navbar-collapse menuMobil d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end p-lg-0 mt-lg-0 p-0" style="margin-left: -16px; border: 1px solid orchid;" id="menuVertical">
                    <div class="container-fluid">
                        <div class="row">
                            <h2 class="col-10">hola</h2>
                            <span id="btnCerrarMenu" class="m-auto col-2 text-right"><i class="fas fa-arrow-left fa-lg"></i></span>
                        </div>
                        <div class="row">
                            <h2 class="col-10">hola</h2>
                            <span id="btnCerrarMenu" class="m-auto col-2 text-right"><i class="fas fa-arrow-left fa-lg"></i></span>
                        </div>
                    </div>    
                    
                    
                    <ul class="navbar-nav d-lg-none align-self-stretch col-12">
                    <li class="nav-item">
                        <div class="row p-3 col-12" style="border: 1px solid green;">
                            <h2 class="mr-5" style="border:1px solid red;">Menú</h2>
                            <span id="btnCerrarMenu" class="m-auto" style="width: 100%; border: 1px solid orange;"><i class="fas fa-arrow-left fa-lg"></i></span>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                  </ul>
                </div>
              </nav>
        
    <div class="container" id="app">
        @yield('contenido')
    <div>

    <script src="js/Complementos/MenuVerticalMobil.js"></script>
</body>
</html>