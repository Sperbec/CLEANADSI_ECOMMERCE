<!DOCTYPE html>
<html lang="es">
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
     <link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/style1.css')}}"/>
{{-- 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
--}}		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    

</head>
<body>

    <header>
        <div class="row">
            <h1>Iniciar sesión</h1>
        </div>
    </header>

    <!--Condicional que muestra un mensaje utilizando la clase alerta-->
    @if(Session::has('message'))
        <div class="container">
            <div class="alert alert-{{Session::get('typealert')}}" style="display:none;">
                {{Session::get('message')}}
                @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>  
                    @endforeach
                </ul>
                @endif
                <!--Efecto de animación-->
                <script>
                    $('.alert').slideDown();
                    setTimeout(function(){ $('.alert').slideUp();}, 10000);
                </script>
            </div>         
        </div>
    @endif


     <!--Mostrar sección de contenido-->
    @section('contenido')
    @show

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


    @section('js')
    @show

    
</body>
</html>