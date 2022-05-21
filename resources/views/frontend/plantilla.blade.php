<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>@yield('titulo')</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/bootstrap.min.css')}}"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/slick.css')}}"/>
 		<link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/slick-theme.css')}}"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/nouislider.min.css')}}"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="{{asset('guia de plantillas/css/font-awesome.min.css')}}">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/style.css')}}"/>

 		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 		<!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->
    @yield('header')
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> CleanLine@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Salomia.Cali.Valle</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header"style="background-color:  #dfe4ea">
				<!-- container -->
				<div class="container" >
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">Categorias</option>
										@foreach ($categorias as $categoria)
										<option value="{{$categoria -> id_categoria}}">{{$categoria -> nombre}}</option>
										@endforeach
									</select>
									<input class="input" placeholder="">
									<button class="search-btn">Buscar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart" style="color:black"></i>
										<span style="color:black">Carrito</span>
										<div class="qty">3</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul  class="main-nav nav navbar-nav">
						<li class=""><a href="{{route('inicio')}}">Inicio</a></li>
						
						<li class="active" class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" id="btn-dropdown-categorias" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Categorías</a>
							<div class="dropdown-menu" aria-labelledby="btn-dropdown-categorias">
								
								
								@foreach ($categorias as $categoria)
								<ul>
								
									<li ><a class="dropdown-item" href="{{route('categoria_front', $categoria -> id_categoria)}}">{{$categoria -> nombre}}</a></li>

								@endforeach
								
								</ul>
							</div>

						</li>

						<li class=""><a href="{{url('/login')}}">Iniciar sesión<span class="icon-dot"></span></a></li>
                        <li class=""><a href="{{url('/register')}}">Registrarse <span class="icon-dot"></span></a></li>
						<!--<li><a href="{{route('crear')}}">crear <span class="icon-dot"></span></a></li>-->
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Clean Line</h3>
						<ul class="breadcrumb-tree">
						
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
        @yield('contenido')
		
        @yield('footer')
		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Contact Us</h3>
								
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Salomia.Cali.Valle</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>CleanLine@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">ayuda</h3>
								<ul class="footer-links">
									<li><a href="#">Preguntas Frecuentes</a></li>
									
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3> 
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Politicas y Privacidad</a></li>
									
									<p></p>
									
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">siguenos</h3>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
									<li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
									<li><a href="#"><i class="fa fa-whatsapp"></i>Whatsapp</a></li>
										
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>


						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{asset('guia de plantillas/js/jquery.min.js')}}"></script>
		<script src="{{asset('guia de plantillas/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('guia de plantillas/js/slick.min.js')}}"></script>
		<script src="{{asset('guia de plantillas/js/nouislider.min.js')}}"></script>
		<script src="{{asset('guia de plantillas/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('guia de plantillas/js/main.js')}}"></script>

	</body>
</html>