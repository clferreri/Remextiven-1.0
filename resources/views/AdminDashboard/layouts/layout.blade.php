<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Remextiven | Admin panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("assets/$temaDashboard/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset("assets/$temaDashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
  <!-- estilo -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset("assets/$temaDashboard/dist/css/temaDashboard.min.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/Inputs/iconoInterno.css">
  <link rel="stylesheet" type="text/css" href="css/Inputs/botones.css">
  <link rel="stylesheet" type="text/css" href="css/Align/alineacion.css">
  <link rel="stylesheet" type="text/css" href="{{ asset("css/Utilidades/modals.css")}}">
  <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="css/Inputs/estiloLetras.css">


  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!--inicio de header-->
        @include('AdminDashboard/layouts/header')
        <!--fin de header-->

        <!--inicio de aside-->
        @include('AdminDashboard/layouts/asaid')
        <!--fin de aside-->

            <div class="content-wrapper">
                    <div class="modal fade" id="mantaLoading" tabindex="5" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
                        <div class="modal-dialog modal-dialog-centered" style="justify-content:center;" role="document">
                            <img width="150" src="{{ asset('img/Spin-1s-200px.svg') }}"/>
                        </div>
                    </div>              
                <section class="content-header">
                    @yield('contenidoHeader')
                </section>
                <section class="content">
                    @yield('contenido')
                </section>
            </div>
    </div>
    <!-- ./wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> En proceso
        </div>
        <strong>Copyright &copy; 2019.</strong> All rights reserved.
    </footer>

    <!-- jQuery -->
<script src="{{asset("assets/$temaDashboard/plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/$temaDashboard/plugins/popper/umd/popper.js")}}"></script>
<script src="{{asset("assets/$temaDashboard/plugins/popper/umd/popper-utils.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- overlayScrollbars -->
<script src="{{asset("assets/$temaDashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>

<script src="{{asset("assets/$temaDashboard/dist/js/temaDashboard.min.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="{{asset("js/UtilScripts/alertas.js")}}"></script>

<script src="{{asset("assets/$temaDashboard/dist/js/demo.js")}}"></script>
@yield('scripts')
</body>
</html>



    