<!--Utilizar la plantilla maestra en el login-->
@extends('frontend.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Recuperar contraseña')

<link rel="stylesheet" href="{{url('/static/css/login.css')}}">

<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('contenido')


{!! Form::open(['url' => '/recover']) !!}

<div class="content">


    <div class="section-title">
        <h3 class="title">Recuperar contraseña</h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="email" style="float: left;">Correo electrónico:</label>
            {!!  Form::email('email', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>


    <div class="row">
        <div class="col-6 col-md-2"></div>
        <div class="col-6 col-md-8">
            <input type="submit" value="Recuperar contraseña" style="margin-top: 20px;" class="btn btn-block btn-primary">
        </div>
    </div>

    <div class="d-flex mb-5 align-items-center" style="margin-top: 20px;">
        <div class="align-items-center">
            <span class="ml-auto"><a href="{{url('/register')}}" class="forgot-pass">¿Aún no tienes una cuenta? Regístrate</a></span> 
         </div>

         <br>

         <div class="align-items-center">
            <span class="ml-auto"><a href="{{url('/login')}}" class="forgot-pass">Ingresar a mi cuenta</a></span> 
        </div>
    </div>


    

</div>
{!!  Form::close() !!}

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
