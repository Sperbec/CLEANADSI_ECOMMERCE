<!--Utilizar la plantilla maestra en el login-->
@extends('frontend.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Login')


<link rel="stylesheet" href="fonts/icomoon/style.css">

<link rel="stylesheet" href="{{url('/static/css/owl.carousel.min.css')}}" href="css/owl.carousel.min.css">


<link rel="stylesheet" href="{{url('/static/css/login.css')}}">



<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('contenido')

<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="/static/images/logo.png" alt="Image" class="img-fluid" width="50%">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Iniciar sesión</h3>
            </div>
           
            {!! Form::open(['url' => '/login']) !!}
            <label for="username">Correo electrónico</label>
            <div class="row">
                <div class="form-group first">
                    {!!  Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
          
            <label for="password">Contraseña</label>
                <div class="row">
                    <div class="form-group last  col-md-9">
                        {!!  Form::password('password', ['id' => 'password', 'class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="col-md-3">
                        <button id="show_password" class="btn btn-secondary" type="button" onclick="mostrarPassword()"> 
                            <span class="fa fa-eye-slash icon"></span></button>
                    </div>
                </div>
            
            <div class="row">
                <input type="submit" value="Iniciar sesión" class="btn btn-block btn-primary">
            </div>

            <br>


            <div class="d-flex mb-5 align-items-center">
                <div class="align-items-center">
                    <span class="ml-auto"><a href="{{url('/register')}}"class="forgot-pass">¿Aún no tienes una cuenta? Regístrate</a></span> 
                 </div>

                 <br>

                 <div class="align-items-center">
                    <span class="ml-auto"><a href="{{url('/recover')}}" class="forgot-pass">Recuperar contraseña</a></span> 
                </div>
            </div>

        
            {!!  Form::close() !!}


            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

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

