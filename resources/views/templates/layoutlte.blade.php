<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sgi2.binara.com.ar/vistas/inicio.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Dec 2018 01:10:37 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Prueba Chile</title>

	<!-- Global stylesheets -->
	<!--link href="../../fonts.googleapis.com/css1381.css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"-->
	<link href={{asset("global_assets/css/icons/icomoon/styles.css")}} rel="stylesheet" type="text/css">
	<link href={{asset("assets/css/bootstrap.min.css")}} rel="stylesheet" type="text/css">
	<link href={{asset("assets/css/bootstrap_limitless.min.css")}} rel="stylesheet" type="text/css">
	<link href={{asset("assets/css/layout.min.css")}} rel="stylesheet" type="text/css">
	<link href={{asset("assets/css/components.min.css")}} rel="stylesheet" type="text/css">
	<link href={{asset("assets/css/colors.min.css")}} rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!--mensajria-->
    <link href={{asset("css/sweetalert.css")}} rel="stylesheet" type="text/css">
    <!-- css calendario bootstrap -->
  	<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
  	
	

	

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo">
		<div class="navbar-brand wmin-0 mr-5">
			<!--a href="index.html" class="d-inline-block">
				<img src="{{asset('img/logo.gif')}}" alt="cargando..">
			</a-->
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">

			</ul>
			<!--
			<span class="badge bg-success-400 badge-pill ml-md-3 mr-md-auto">16 orders</span>
			-->

			<ul class="navbar-nav ml-auto">
				<!--
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="global_assets/images/lang/gb.png" class="img-flag mr-2" alt="">
						English
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item english"><img src="global_assets/images/lang/gb.png" class="img-flag" alt=""> English</a>
						<a href="#" class="dropdown-item ukrainian"><img src="global_assets/images/lang/ua.png" class="img-flag" alt=""> Українська</a>
						<a href="#" class="dropdown-item deutsch"><img src="global_assets/images/lang/de.png" class="img-flag" alt=""> Deutsch</a>
						<a href="#" class="dropdown-item espana"><img src="global_assets/images/lang/es.png" class="img-flag" alt=""> España</a>
						<a href="#" class="dropdown-item russian"><img src="global_assets/images/lang/ru.png" class="img-flag" alt=""> Русский</a>
					</div>
				</li>
				-->

				

				<li class="nav-item dropdown dropdown-user">
					<a href="{{url('logout')}}" class="navbar-nav-link d-flex align-items-center ">
						<span>{{ Session::get('nom')}}</span>
					</a>

					

				</li>
			</ul>
		</div>
	</div>
	

    
</nav>
	<!-- /main navbar -->


	<!-- Secondary navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Agence <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Projetos</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Administrativo</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Comercial</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Financiero</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Usuario</a>
	      </li>
	    </ul>
	  </div>
	  <div class="navbar-nav ml-auto">
            
		<div class="dropdown-divider"></div>
		<a href="{{url('logout')}}" class="dropdown-item"><i class="icon-exit3"></i> Finalizar</a>
      </div>

	</nav>
	<!-- /secondary navbar -->


	<!-- Page header -->
	<!--
	<div class="page-header">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-dots mr-2"></i> <span class="font-weight-semibold">Tablero general</span></h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

			<div class="header-elements d-none py-0 mb-3 mb-md-0">
				<div class="breadcrumb">
					<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
					<span class="breadcrumb-item active">Tablero general</span>
				</div>
			</div>
		</div>
	</div>
	-->
	<!-- /page header -->
		

	<!-- Page content -->
	<div class="page-content pt-0">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content" style="background-color: #CDEAE7;">
				@yield('content')
				@include('flash::message')

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						<!--Footer-->
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						<!--
						&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
						-->
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="#" class="navbar-nav-link"><i class="icon-lifebuoy mr-2"></i> Mesa de ayuda</a></li>
						<!--
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
						-->
					</ul>
				</div>
			</div>
			<!-- /footer -->
	<!-- Core JS files -->
	<!--script src={{asset("global_assets/js/main/jquery.min.js")}}></script-->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src={{asset("global_assets/js/main/bootstrap.bundle.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/loaders/blockui.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/ui/slinky.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/ui/ripple.min.js")}}></script>
	<!-- /core JS files -->
	<!-- js calendario bootstrap -->
	<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('js/locales/bootstrap-datepicker.es.min.js')}}"></script>
	<!-- mensajeria -->
    <script src={{asset("js/sweetalert.js")}}></script>
    <!--script generales-->
    <script src={{asset("js/script.js")}}></script>
	<!-- Theme JS files -->
	<script src={{asset("global_assets/js/plugins/visualization/d3/d3.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/visualization/d3/d3_tooltip.js")}}></script>
	<script src={{asset("global_assets/js/plugins/forms/styling/switchery.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/forms/selects/bootstrap_multiselect.js")}}></script>
	<script src={{asset("global_assets/js/plugins/ui/moment/moment.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/pickers/daterangepicker.js")}}></script>

	<script src={{asset("assets/js/app.js")}}></script>
	<script src={{asset("global_assets/js/demo_pages/dashboard.js")}}></script>
	<!-- /theme JS files -->



	<!-- Theme JS files -->
	<script src={{asset("global_assets/js/plugins/forms/inputs/inputmask.js")}}></script>
	<script src={{asset("global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/uploaders/fileinput/fileinput.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/extensions/jquery_ui/interactions.min.js")}}></script>
	<script src={{asset("global_assets/js/plugins/forms/selects/select2.min.js")}}></script>
	<script src={{asset("assets/js/app.js")}}></script>
	
	<script src={{asset("global_assets/js/demo_pages/form_select2.js")}}></script>
	<script src={{asset("global_assets/js/demo_pages/uploader_bootstrap.js")}}></script>

	<script src="{{asset('assets/js/core.js')}}"></script>
	<script src="{{asset('assets/js/4charts.js')}}"></script>
	<script src="{{asset('assets/js/animated.js')}}"></script>
	<script src="{{asset('assets/js/main.js')}}"></script>

	<!-- /theme JS files -->

	
	<!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
</body>

<!-- Mirrored from sgi2.binara.com.ar/vistas/inicio.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Dec 2018 01:11:15 GMT -->
</html>
