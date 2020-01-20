<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Remextiven</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset("assets/$temaDashboardRemextiven/css/default/app.min.css")}}" rel="stylesheet" />
	<link href="{{ asset("assets/$temaDashboardRemextiven/css/default/theme/green.min.css")}}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		
		<!-- begin login -->
		<div class="login login-with-news-feed">
			<!-- begin news-feed -->
			<div class="news-feed">
            <div class="news-image" style="background-image: url({{asset('img/login-bg-9.jpg')}})"></div>
				<div class="news-caption">
					<h4 class="caption-title"><b>Remextiven</b> App</h4>
					<p>
						La mejor forma de enviar tu dinero
					</p>
				</div>
			</div>
			<!-- end news-feed -->
			<!-- begin right-content -->
			<div id="cajita" class="right-content">
			
				<!-- begin login-header -->
				<div class="login-header">
					<div class="brand">
						<img class="col-12 p-0 mb-5" src="{{ asset('img/LogoFondoTransparente.png')}}" alt="">
						<small>Bienvenido, inicia sesión</small>
					</div>			
				</div>
				<!-- end login-header -->
				<!-- begin login-content -->
				<div class="login-content">
					<form action="{{ route('loginUser')}}" method="POST" class="margin-bottom-0">
						@csrf
						<div class="form-group m-b-15">
							<input type="text" name="email" class="form-control form-control-lg" placeholder="Email" required />
						</div>
						<div class="form-group m-b-15">
							<input data-toggle="password" name="password" data-placement="after" class="form-control form-control-lg" type="password" value="" placeholder="Contraseña" required />
						</div>
						@if ($errors->any())
							<div id="errorLogin" class="text-red mb-1">						
									{!! $errors->first() !!}							
							</div>
							
							<script>
								window.setTimeout(function() {
									$("#errorLogin").fadeTo(500, 0).slideUp(500, function(){
										$(this).remove(); 
									});
								}, 8000);
							</script>  
						@endif
						<div class="checkbox checkbox-css m-b-30">
							<input type="checkbox" id="remember_me_checkbox" value="" />
							<label for="remember_me_checkbox">
							Recordarme
							</label>
						</div>
						
						<div class="login-buttons text-center">
                            <button type="submit" class="btn btn-success btn-block btn-lg mb-2">Iniciar <i class="fa fa-sign-in-alt ml-2 fa-lg"></i>
							</button>
                            <a href="#">Olvidé mi contraseña</a>
						</div>
						<div class="m-t-20 m-b-40 p-b-40 text-inverse text-center">
							¿Eres nuevo? Entra <a href="#">aqui</a> para registrarte.
                        </div>
                        <div class=" text-inverse">
							
						</div>
						<hr />
						<p class="text-center text-grey-darker mb-0">
                            Al continuar, estarás aceptando nuestros <a href="#">Términos y condiciones</a> <br/>
							&copy; Remextiven 2020
						</p>
					</form>
				</div>
				<!-- end login-content -->
			</div>
			<!-- end right-container -->
		</div>
		<!-- end login -->
	
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset("assets/$temaDashboardRemextiven/js/app.min.js")}}"></script>
	<script src="{{ asset("assets/$temaDashboardRemextiven/js/theme/default.min.js")}}"></script>
	<script src="{{ asset("assets/$temaDashboardRemextiven/plugins/bootstrap-show-password/dist/bootstrap-show-password.js") }}"></script>
	<!-- ================== END BASE JS ================== -->
	

</body>
</html>