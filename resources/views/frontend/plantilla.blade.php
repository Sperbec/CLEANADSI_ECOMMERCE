
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/icons.css">
	<link rel="stylesheet" href="../css/pantallas.css">
	<link rel="stylesheet" href="../css/contenido.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/slide.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="../js/header.js"></script>
    <script src="../js/main.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://kit.fontawesome.com/8597bf876d.js" crossorigin="anonymous"></script>
</head>
<body >
    @yield('header')
    <!-- TOP HEADER -->
    <body>
        <section>
            <div class="wrapper">
                <div class="logo">logo</div>
                <nav>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i> (312 747 26 49)</a>
                    <a href="#"><i class="fa fa-envelope-o"></i> Cleanline@gmail.com</a>
                    <a href="#"><i class="fa fa-map-marker"></i>Salomia Cali Valle</a>
                </nav>
            </div>
        </section>

        
    </body>
    <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-list2"></span>Clean Line</a>
        </div>
    
        <nav>
            <a class="logo-clean">Clean Line</a>
            <ul>
                <li><a href="{{route('inicio')}}"><span class="icon-home3"></span>Home</a></li>
                <li class="submenu"><a href="#"><span class="icon-user"></span>Categorias</a>
                    <ul class="children">
                        <li><a href="{{route('usopp')}}">Aseo General<span class="icon-dot"></span></a></li>
                        <li><a href="{{route('aseopp')}}">Aseo personal<span class="icon-dot"></span></a></li>
                    </ul>
                </li>
            
                <li class="submenu">
                    <a href="#"><span class="icon-earth"></span>Mi Cuenta</a>
                    <ul class="children">
                        <li><a href="">Iniciar Sesion<span class="icon-dot"></span></a></li>
                        <li><a href="">Registrarse <span class="icon-dot"></span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="icon-cart"></span>Carrito</a>
                    <ul class="children">
                        <li><a href="">Ver Contenido<span class="icon-dot"></span></a></li>
                    </ul>
                </li>
                
            </ul>
        </nav>
    </header>
			
    @yield('contenido')
    @yield('footer')
    <footer>
        <div class="contenido-footer">
            <div class="info">
                <ul><p>Contacto</p>
                    <li><i class="fa-brands fa-whatsapp"></i> (312 747 26 49)</li>
                    <li><i class="fa fa-envelope-o"></i> Cleanline@gmail.com</li>
                    <li><i class="fa fa-map-marker"></i>  Salomia Cali Valle</li>
                </ul>

                <ul><p>Categorias</p>
                    <li>Aseo Personal</li>
                    <li>Aseo general</li>
                    <li></li>
                </ul>

                <ul><p>Redes Sociales</p>
                    <li><i class="fa-brands fa-facebook-square"></i>  Facebook</li>
                    <li><i class="fa-brands fa-instagram"></i>  Instagram</li>
                    <li><i class="fa-brands fa-twitter"></i>  twiter</li>
                </ul>
            </div>
            <div class="targetas">
                <ul>
                    <li><i class="fa-brands fa-cc-visa"></i></li>
                    <li><i class="fa-brands fa-cc-amex"></i></li>
                    <li><i class="fa-brands fa-cc-diners-club"></i></li>
                    <li><i class="fa-brands fa-cc-paypal"></i></li>
                    <li><i class="fa-brands fa-cc-mastercard"></i></li>
                    <li><i class="fa-solid fa-credit-card"></i></li>
                </ul>
            </div>

        </div>
    </footer>
    
</body>
</html>