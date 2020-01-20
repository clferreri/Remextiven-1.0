<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Remextiven | Admin panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset("assets/$temaDashboardRemextiven/css/default/app.min.css")}}" rel="stylesheet" />
    <link href="{{ asset("assets/$temaDashboardRemextiven/css/default/theme/green.min.css")}}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" type="text/css" href="{{ asset("css/Inputs/iconoInterno.css") }}">
  <link rel="stylesheet" type="text/css" href="{{ asset("css/Inputs/botones.css") }}">
  <link rel="stylesheet" type="text/css" href="{{ asset("css/Align/alineacion.css") }}">
  <link rel="stylesheet" type="text/css" href="{{ asset("css/Utilidades/modals.css")}}">
  <link rel="stylesheet" href="{{ asset("css/Inputs/estiloLetras.css") }}">
  <link rel="stylesheet" href="{{asset("css/Complementos/Animaciones/animate.css")}}">

  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		  <!--inicio de header-->
          @include('AdminPanel/layouts/header')
          <!--fin de header-->
  
          <!--inicio de aside-->
          @include('AdminPanel/layouts/asaid')
          <!--fin de aside-->
		
		<div id="content" class="content">
			@yield('contenido')
		</div>
        @include('AdminPanel/layouts/footer')
			
	</div>
	
	


    <!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset("assets/$temaDashboardRemextiven/js/app.min.js")}}"></script>
  <script src="{{ asset("assets/$temaDashboardRemextiven/js/theme/default.min.js")}}"></script>

  <script src="{{asset("assets/$temaDashboardRemextiven/plugins/popper/umd/popper.js")}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{asset("assets/$temaDashboardRemextiven/plugins/popper/umd/popper-utils.js")}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript" src="{{asset("js/UtilScripts/alertas.js")}}"></script>

	<!-- ================== END BASE JS ================== -->
    
  @yield('scripts')
</body>
</html>



    