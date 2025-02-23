<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
	<!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/style.css')}}" />

    <title>@yield('titulo')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/bootstrap.min.css')}}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/slick.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/slick-theme.css')}}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/nouislider.min.css')}}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('guia de plantillas/css/font-awesome.min.css')}}">



    <link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/carga.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('guia de plantillas/css/style1.css')}}" />
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	--}} <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://kit.fontawesome.com/8224604846.js" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID')}}&disable-funding=credit,card">
    </script>

    {{-- <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID')}}&currency=USD"></script> --}}

    <link rel="shortcut icon" href="/static/images/logo.png">




    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->
    @yield('header')
</head>

<body>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- HEADER -->
    <div id="contenedor_carga">
        <div id="carga">

        </div>
    </div>
    <header>

        <!-- NAVIGATION -->
        <nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                <div id="responsive-nav">
                    <!-- NAV -->
                    <ul class="main-nav nav navbar-nav">
                        <li id="inicio-nav" class=""><a href="{{route('inicio')}}">Inicio</a></li>



                        <li id="categorias-nav" class="" class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="btn-dropdown-categorias"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorías</a>
                            <div class="dropdown-menu" aria-labelledby="btn-dropdown-categorias">


                                @foreach ($categorias as $categoria)
                                <ul>

                                    <li><a class="dropdown-item"
                                            href="{{route('categoria_front', $categoria -> id_categoria)}}">{{$categoria
											-> nombre}}</a></li>

                                    @endforeach

                                </ul>
                            </div>

						</li>
															{{-- DESPLEGABLE DE OPCIONES DE USUARIO --}}
						@if (Auth::guest())
							<li id="login-nav" class=""><a href="{{url('/login')}}">Iniciar sesión<span class="icon-dot"></span></a></li>
							<li id="register-nav" class=""><a href="{{url('/register')}}">Registrarse <span class="icon-dot"></span></a></li>
						@else



                        <li id="postLog-nav" class="" class="nav-item dropdown">
                            {{-- Para traer el nombre del usuario --}}

                            <a href="#" class="nav-link dropdown-toggle" id="btn-dropdown-usuario"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$usuario->nombres}}
                                {{$usuario->apellidos}}</a>


                            <div class="dropdown-menu" aria-labelledby="btn-dropdown-usuario">
                                <ul>
                                    <li class="dropdown-item"><a href="{{route('micuenta.index')}}">Mi cuenta<span
                                                class="icon-dot"></span></a></li>
                                    <li class="dropdown-item"><a href="{{url('/pedidos')}}">Mis pedidos<span
                                                class="icon-dot"></span></a></li>
                                    <li class="dropdown-item"><a href="{{url('/logout')}}">Cerrar sesión<span
                                                class="icon-dot"></span></a></li>
                                </ul>

                            </div>

                        </li>

                        @endif

						<li id="carrito-nav"><a href="{{route('carrito')}}">Carrito <span class="icon-dot"></span></a></li>

						@if (isset($rol) && $rol != null && $rol ==1)
							<li id="carrito-nav"><a href="{{route('home')}}">Opciones administrador <span class="icon-dot"></span></a></li>				
						@endif	

					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        <!-- MAIN HEADER -->
        <div id="header" style="background-color:  #dfe4ea">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="/" class="logo">
                                <img src="/static/images/logo.png" alt="logo" width="50%">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select" onchange="categorias(this.value);">
                                    <option value="0">Categorias</option>
                                    @foreach ($categorias as $categoria)
                                    <option value="{{$categoria -> id_categoria}}">{{$categoria -> nombre}}</option>
                                    @endforeach
                                </select>
								
								<input class="input searchbar" id="mysearch" type="search" placeholder="Buscar un producto">
								<ul id="showlist" tabindex="1" class="list-group"></ul>
								
							
                        </div>
                    </div>
				</form>
{{-- PRUEBA --}}
{{-- PRUEBA FIN --}}
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Cart -->
                            @php $total = 0 @endphp
                            @foreach((array) session('carrito') as $id => $details)
                            @php $total += $details['precio'] * $details['quantity'] @endphp
                            @endforeach
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart" style="color:black"></i>
                                    <span style="color:black">Carrito</span>
                                    <div class="qty">{{ count((array) session('carrito')) }}</div>
                                </a>
                                @if(isset($carrito))

                                @else

                                <div class="cart-dropdown">
                                    @if(session('carrito'))
                                    @foreach(session('carrito') as $id => $details)
                                    <div class="cart-list">

                                        <div class="product-widget">

                                            <div class="product-img">
                                                <img src="{{ 'http://cleanadsi.com/api/get-img?path='.$details['imagen']}}"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">{{ $details['nombre'] }}</a></h3>
                                                <h4 class="product-price"><span class="qty">{{ $details['quantity']
														}}x</span>$ {{ number_format($details['precio'] )}}</h4>
                                            </div>



                                        </div>


                                    </div>
                                    @endforeach



                                    <div class="cart-summary">
                                        <h5>TOTAL: $ {{ number_format($total) }}</h5>
                                    </div>
                                    <div class="cart-btns text-center">
                                        <a href="{{route('carrito')}}">Ver carrito</a>
                                    </div>
                                    @endif

                                </div>


                                @endif


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
	

    <div class="container">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


    </div>

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
                setTimeout(function () {
                    $('.alert').slideUp();
                }, 10000);

            </script>
        </div>
    </div>
    @endif

    <!-- /SECTION -->
    @yield('contenido')



    <script>
        window.onload = function () {
            var contenedor = document.getElementById('contenedor_carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
        }

    </script>
    @yield('scripts')



    @yield('footer')
    <!-- FOOTER -->
    <div class="col-md-12.5 text-justify">
        <footer id="footer">
            <!-- top footer -->

            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Contáctanos</h3>

                                <ul class="footer-links">
                                    <li><i class="fa fa-phone"></i>315-576-86-10</a></li>
                                    <li><i class="fa fa-map-marker"></i>Calle 56 #1E-142</a></li>
                                    <li><i class="fa fa-envelope-o"></i>Cleanline@cleanadsi.com</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">ayuda</h3>
                                <ul class="footer-links">
                                    <li><a href="{{url('/preguntasfrecuentes')}}">Preguntas frecuentes</a></li>

                                </ul>
                            </div>
                        </div>

                        <div class="clearfix visible-xs"></div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Información</h3>
                                <ul class="footer-links">
                                    <li><a href="{{url('/sobrenosotros')}}">Sobre nosotros</a></li>
                                    <li><a href="{{url('/politicasprivacidad')}}">Política de privacidad</a></li>

                                    <p></p>

                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Redes</h3>
                                <ul class="footer-links">
                                    <li><a target="_blank" href="https://wa.link/r3uu91/"><i
                                                class="fa fa-whatsapp"></i>WhatsApp</a>

                                    </li>

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
                                <!--<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-amex"></i></a></li> -->
                            </ul>
                            <span class="copyright">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());

                                </script> All rights reserved </a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </span>


                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
    </div> <!-- /bottom footer -->
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

{{-- <script>
	function navbarActive() {
    document.getElementById("inicio-nav").classList.add ("active");

}
$( document ).ready(navbarActive());
</script> --}}
<script src="{{asset('search/js/search.js')}}" type="module"></script>

<script>
    $(document).ready(function () {

            var path = $(location).attr('pathname');
            /* console.log(path); */
            if (path == "/") {
                document.getElementById("inicio-nav").classList.add("active");
            };
            if (path == "/frontend/inicio") {
                document.getElementById("inicio-nav").classList.add("active");
            };
            if (path == "/frontend/categoria/" || path == "/frontend/categoria/1" || path ==
                "/frontend/categoria/2") {
                document.getElementById("categorias-nav").classList.add("active");
            };
            if (path == "/login") {
                document.getElementById("login-nav").classList.add("active");
            };
            if (path == "/register") {
                document.getElementById("register-nav").classList.add("active");
            };
            /* OPCIONES PARA CUANDO ESTÁ LOGEADO */
            if (path == "/") {
                document.getElementById("faltafalta").classList.add("active");
            };
            /*  */
            if (path == "/frontend/carrito") {

                document.getElementById("carrito-nav").classList.add("active");
            };

            if (path == "/micuenta" || path == "/pedidos") {

                document.getElementById("postLog-nav").classList.add("active");
            };
        }

    );

    function categorias(value) {
        window.location = "/frontend/categoria/" + value;
    }

</script>

</html>
