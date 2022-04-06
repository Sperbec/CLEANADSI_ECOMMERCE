<!--Utilizar la plantilla maestra en el login-->
@extends('login.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Recuperar contraseña')

<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('content')
<div class="box box_login shadow">
    <div class="inside">

        <div class="header">
           <h1>Recuperar contraseña</h1>
          <!-- <img class="logo" src="{{url('/static/images/logo.jpg')}}" alt="">-->
        </div>

        {!! Form::open(['url' => '/reset']) !!}

        <label for="email">Correo electrónico:</label>
        <div class="input-group">
            <div class="input-group-text">
                <!--Hacer uso del fontawesome-->
                <i class="far fa-envelope-open"></i>
            </div>

            <!--El segundo parámetro se manda en null porque no lleva ningun
            valor por defecto-->
            {!!  Form::email('email', $email, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="cod_recuperacion" class="mtop16">Código de recuperación:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="far fa-id-card"></i>
            </div>

            <!--El segundo parámetro se manda en null porque no lleva ningun
            valor por defecto-->
            {!!  Form::number('cod_recuperacion', null, ['class' => 'form-control', 'required']) !!}
        </div>

        {!! Form::submit('Enviar mi contraseña', ['class' => 'btn btn-success mtop16'])!!}
        {!!  Form::close() !!}

        <div class="footer mtop16">

            <div class="row">
                 <a href="{{url('/register')}}">¿Aún no tienes una cuenta? Regístrate</a>
            </div>

            <div class="row mtop16">
                <a href="{{url('/login')}}">Ingresar a mi cuenta</a>
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

