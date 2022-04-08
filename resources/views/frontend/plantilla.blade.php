
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
                <div class="logo">Clean Line</div>
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
            <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
        </div>
    
        <nav>
            <ul>
                <li><a href="{{route('inicio')}}"><i class="fas fa-home"></i> Inicio</a></li>
                <li class="submenu"><a href="#"><i class="fas fa-hands-wash"></i> Aseo Personal</a>
                    <ul class="children">
                        <li><a href="{{route('usopp')}}">Productos Uso Personal<span class="icon-dot"></span></a></li>
                        <li><a href="{{route('aseopp')}}">Accesorios Aseo Personal<span class="icon-dot"></span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-hand-sparkles"></i> Aseo General<span class="caret icon-arrow-down6"></span></a>
                    <ul class="children">
                        <li><a href="{{route('productoslim')}}">Productos de Limpieza<span class="icon-dot"></span></a></li>
                        <li><a href="{{route('accesorioslim')}}">Accesorios de Limpieza <span class="icon-dot"></span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a><i class="fas fa-user"></i></span> Mi Cuenta</a>
                    <ul class="children">
                        <li><a href="{{url('/login')}}">Iniciar sesión<span class="icon-dot"></span></a></li>
                        <li><a href="{{url('/register')}}">Registrarse <span class="icon-dot"></span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-shopping-cart"></i>Carrito</a>
                    <ul class="children">
                        <li><a href="">Ver Contenido<span class="icon-dot"></span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
			
    @yield('contenido')
    @yield('footer')
    
</body>
</html>