<!--Utilizar la plantilla maestra en el login-->
@extends('frontend.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Login')



<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('contenido')
<h1 style="text-align: center">Iniciar sesión</h1>

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

