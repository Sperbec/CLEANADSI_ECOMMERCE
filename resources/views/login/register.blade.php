<!--Utilizar la plantilla maestra en el login-->
@extends('login.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Registrarse')

<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('content')
<div class="box box_register shadow ">
    <div class="inside">

        {!!  Form::open(['url' => '/register']) !!}

        <h1 class="registarse">Registrarse</h1>
        
        <div class="row">
            <div class="col-md-12">
                <label for="nombres">Nombres:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <!--Hacer uso del fontawesome-->
                        <i class="fas fa-user"></i>
                    </div>

                    <!--El segundo parámetro se manda en null porque no lleva ningun
                    valor por defecto-->
                    {!!  Form::text('nombres', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="apellidos" class="mtop16">Apellidos:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>
                    {!!  Form::text('apellidos', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-6">
                <label for="tipo_documento" class="mtop16" >Tipo de documento:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="far fa-id-card"></i>
                    </div>
                    <select name="tipo_documento" class="form-select" required>
                        <option value=''>Seleccione</option>
                        @foreach($tipos_documentos as $tipodocumento)
                        <option value="{{$tipodocumento->id_opcion}}">{{$tipodocumento->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>  


            <div class="col-md-6">
                <label for="numero_documento" class="mtop16">Número de documento:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="far fa-id-card"></i>
                    </div>
                    {!!  Form::number('numero_documento', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>
        
 
        <div class="row">
            <div class="col-md-6">
                <label for="email" class="mtop16">Correo electrónico:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="far fa-envelope-open"></i>
                    </div>

                    {!!  Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <label for="password" class="mtop16">Contraseña:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </div>
                    {!!  Form::password('password', ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <label for="genero" class="mtop16">Género:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-venus-mars"></i>
                    </div>
                    <select name="genero" class="form-select" required>
                        <option value=''>Seleccione</option>
                        @foreach($generos as $genero)
                        <option value="{{$genero->id_opcion}}">{{$genero->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="mtop16">Fecha de nacimiento:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </div>
                    {!!  Form::date('fecha_nacimiento', null, ['id' => 'fecha_nacimiento' ,'class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="btn-ingresar">
                {!! Form::submit('Registrarse', ['class' => 'btn btn-primary mtop16'])!!}
            </div>
        </div>
        {!!  Form::close() !!}

        <div class="footer mtop16">
            <a href="{{url('/login')}}">Ya tengo una cuenta, Ingresar</a>
        </div>

    </div>

</div>
@stop

@section('js')
<script>
    $(documet).ready(function(){
        $(#fecha_nacimiento).val(new Date().toDateInputValue());
    })
</script>
    
@stop