<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Parámetro que reemplaza el título-->
    <title>@yield('title')</title>

    <!--Utilizar bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Utilizar css-->
    <link rel="stylesheet" href="{{url('/static/css/login.css')}}">

    <!--Utilizar fontawesome -->
    <script src="https://kit.fontawesome.com/8224604846.js" crossorigin="anonymous"></script>
    

</head>
<body>

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
    @section('content')
    @show


    @section('js')
    @show

    
</body>
</html>