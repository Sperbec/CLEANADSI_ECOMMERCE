@extends('adminlte::page')

@section('title', 'Ver cliente')

@section('content_header')

    <div class="row">
        <div class="col-md-6">
            <h1>Ver cliente</h1>
        </div>

    </div>

@stop

@section('content')

    <div class="row">

        <div class="row">
            <div class="col-md-6">
                <label for="nombres">Nombres:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>
                    {!! Form::text('nombres', $cliente->nombres, ['class' => 'form-control', 'disabled', 'required', 'id' => 'nombres_persona']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <label for="apellidos" class="mtop16">Apellidos:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>
                    {!! Form::text('apellidos', $cliente->apellidos, ['class' => 'form-control',  'disabled', 'required', 'id' => 'apellidos_persona']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="tipo_documento" class="mtop16">Tipo de documento:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="far fa-id-card"></i>
                    </div>
                    <select disabled id='tipo_documento_persona' name="tipo_documento" class="form-select" required>
                        <option value=''>Seleccione</option>
                        @foreach ($tipos_documentos as $tipodocumento)
                            <option value="{{ $tipodocumento->id_opcion }}"
                                {{ $tipodocumento->id_opcion == $cliente->id_opcion_tipo_documento ? 'selected' : '' }}>
                                {{ $tipodocumento->nombre }}</option>
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
                    {!! Form::number('numero_documento', $cliente->numero_documento, ['class' => 'form-control', 'required', 'disabled', 'id' => 'documento_persona', 'min' => '0000000000', 'max' => '9999999999']) !!}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <label for="tipo_genero" class="mtop16">Género:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-venus-mars"></i>
                    </div>
                    <select disabled id="genero_persona" name="genero" class="form-select" required>
                        <option value=''>Seleccione</option>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id_opcion }}"
                                {{ $genero->id_opcion == $cliente->id_opcion_genero ? 'selected' : '' }}>
                                {{ $genero->nombre }}</option>
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
                    {!! Form::date('calendario', $cliente->natalicio, ['id' => 'calendario', 'class' => 'form-control',  'disabled','required']) !!}
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

                    {!!  Form::email('email', $usuario->email, ['class' => 'form-control', 'required', 'disabled']) !!}
                </div>
            </div>
        </div>

    @stop

    @section('css')
        <!-- Para importar bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    @stop

    @section('js')

    @stop
