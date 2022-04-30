<!--Utilizar la plantilla maestra en el login-->
@extends('login.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Login')

<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('content')
<div class="box box_login shadow">
    <div class="inside">

        <div class="header">
           <h1>Iniciar sesión</h1>
          <!-- <img class="logo" src="{{url('/static/images/logo.jpg')}}" alt="">-->
        </div>

        {!! Form::open(['url' => '/login']) !!}

        <label for="email">Correo electrónico:</label>
        <div class="input-group">
            <div class="input-group-text">
                <!--Hacer uso del fontawesome-->
                <i class="far fa-envelope-open"></i>
            </div>

            <!--El segundo parámetro se manda en null porque no lleva ningun
            valor por defecto-->
            {!!  Form::email('email', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="password" class="mtop16">Contraseña:</label>
        <div class="input-group">
            <div class="input-group-text">
                <!--Hacer uso del fontawesome-->
                <i class="fas fa-lock"></i>
            </div>
            {!!  Form::password('password', ['id' => 'password', 'class' => 'form-control', 'required']) !!}
            <div class="input-group-append">
                <button id="show_password" class="btn btn-secondary" 
                        type="button" onclick="mostrarPassword()"> 
                    <span class="fa fa-eye-slash icon"></span> </button>
              </div>
        </div>

        {!! Form::submit('Ingresar', ['class' => 'btn btn-success mtop16'])!!}
        {!!  Form::close() !!}

        <div class="footer mtop16">

            <div class="row">
                 <a href="{{url('/register')}}">¿Aún no tienes una cuenta? Regístrate</a>
            </div>

            <div class="row mtop16">
                <a href="{{url('/recover')}}">Recuperar contraseña</a>
            </div>

        </div>
    </div>

</div>
@stop


@section('js')
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

