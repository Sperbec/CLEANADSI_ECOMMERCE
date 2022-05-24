<!--Utilizar la plantilla maestra en el login-->
@extends('frontend.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Registrarse')

<style>
    .content{
        margin: 0 auto;
        text-align: center;
        border-radius: 10px;
        width: 50%;
    }

    .text{
        float: left;
        margin-top: 16px;
    }
</style>

<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('contenido')  

{!!  Form::open(['url' => '/register']) !!}

<div class="content">


    <div class="section-title">
        <h3 class="title">Registrarse</h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="nombres" style="float: left;">Nombres:</label>
            {!!  Form::text('nombres', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <label for="apellidos" class="text">Apellidos:</label>
            {!!  Form::text('apellidos', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="tipo_documento" class="text">Tipo de documento:</label>
            <select name="tipo_documento" class="form-control" required>
                <option value=''>Seleccione</option>
                @foreach($tipos_documentos as $tipodocumento)
                <option value="{{$tipodocumento->id_opcion}}">{{$tipodocumento->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="numero_documento" class="text">Número de documento:</label>
            {!!  Form::number('numero_documento', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="email" class="text">Correo electrónico:</label>
            {!!  Form::email('email', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="col-md-6">
            <label for="password" class="text">Contraseña:</label>
            {!!  Form::password('password', ['class' => 'form-control', 'required']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="genero" class="text">Género:</label>
            <select name="genero" class="form-control" required>
                <option value=''>Seleccione</option>
                @foreach($generos as $genero)
                <option value="{{$genero->id_opcion}}">{{$genero->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="fecha_nacimiento" class="text">Fecha de nacimiento:</label>
            {!!  Form::date('fecha_nacimiento', null, ['id' => 'fecha_nacimiento' ,'class' => 'form-control', 'required']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-6 col-md-2"></div>
        <div class="col-6 col-md-8">
            <input type="submit" value="Registrarse" style="margin-top: 20px;" class="btn btn-block btn-primary">

        </div>
        <div class="col-6 col-md-2"></div>
    </div>

    <div class="d-flex mb-5 align-items-center"  style="margin-top: 20px;">
        <div class="align-items-center">
            <span class="ml-auto"><a href="{{url('/login')}}"class="forgot-pass">Ya tengo una cuenta, ingresar.</a></span> 
         </div>
    </div>


</div>

{!!  Form::close() !!}
@stop

@section('js')
<script>
    $(documet).ready(function(){
        $(#fecha_nacimiento).val(new Date().toDateInputValue());
    })
</script>
    
@stop