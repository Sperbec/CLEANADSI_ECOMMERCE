<!--Utilizar la plantilla maestra en el login-->
@extends('frontend.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Login')


<link rel="stylesheet" href="fonts/icomoon/style.css">

<link rel="stylesheet" href="{{url('/static/css/owl.carousel.min.css')}}" href="css/owl.carousel.min.css">


<link rel="stylesheet" href="{{url('/static/css/login.css')}}">


<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('contenido')

{!! Form::open(['url' => '/login']) !!}
<div class="content">
    <div class="section-title">
        <h3 class="title">Iniciar sesión</h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="email">Correo electrónico:</label>
            {!!  Form::email('email', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <label for="password">Contraseña:</label>
            {!!  Form::password('password', ['id' => 'password', 'class' => 'form-control','placeholder' => 'Ingresa tu contraseña', 'required']) !!}
        </div>
    </div>

    <div class="password-show">
        <input id="show_password" class="form-check-input" type="checkbox" onclick="mostrarPassword()">
        <label class="form-check-label" for="show_password">Mostrar contraseña</label>
    </div>
            
{{--                 <div class="col-md-8">
                    <label for="text" class="col-md-12">
                
                    </label>
                </div> --}}

{{--                     <button id="show_password" class="btn btn-secondary" type="button" onclick="mostrarPassword()"> 
                        <span class="fa fa-eye-slash icon"></span></button>
 --}}

        


    <div class="row">
        <div class="col-6 col-md-2"></div>
        <div class="col-6 col-md-8">
            <input type="submit" value="Ingresar" style="margin-top: 20px;" class="btn btn-block btn-primary">
        </div>
    </div>

    <div class="d-flex mb-5 align-items-center" style="margin-top: 20px;">
        <div class="align-items-center">
            <span class="ml-auto"><a href="{{url('/register')}}" class="forgot-pass">¿Aún no tienes una cuenta? Regístrate</a></span> 
         </div>

         <br>

         <div class="align-items-center">
            <span class="ml-auto"><a href="{{url('/recover')}}" class="forgot-pass">Recuperar contraseña</a></span> 
        </div>
    </div>

</div>
{!!  Form::close() !!}
@stop


@section('scripts')
    <script> 
        function mostrarPassword(){
            var cambio = document.getElementById("password");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
            
        } 
        
        $(document).ready(function () {
            //CheckBox mostrar contraseña
            $('#ShowPassword').click(function () {
                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
            });
        });
    </script>

    


@stop

