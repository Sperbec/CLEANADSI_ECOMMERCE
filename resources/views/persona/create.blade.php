@extends('adminlte::page')

@section('title', 'Crear cliente')

@section('content_header')

    {!! Form::open(['route' => 'clientes.store']) !!}
    <div class="row">
        <div class="col-md-6">
            <h1>Crear cliente</h1>
        </div>
        <div class="col-md-6">
            <button id="btnGuardar"  type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Guardar</button>
        </div>
    </div>

@stop

@section('content')

    <div class="row">

        <div class="row">
            <div class="col-md-6">
                <label for="nombres_cliente">Nombres:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>
                    {!! Form::text('nombres_cliente', null, ['class' => 'form-control', 'required', 'id' => 'nombres_cliente_persona']) !!}
                   
                </div>
                @error ('nombres_cliente')
                <small><span style="color: red">{{$message}}</span></small>
                @enderror
            </div>
            
            <!--para hacer validaciones en el campo persona o cualquier otro dirigirse a HTTP y entrar en la 
            carpeta request.nota @ error es una directiva de blade y muestra si hay una falla en la validacion
            e imprime un mensaje-->
           
            
            <div class="col-md-6">
                <label for="apellidos_cliente" class="mtop16">Apellidos:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>
                    {!! Form::text('apellidos_cliente', null, ['class' => 'form-control', 'required', 'id' => 'apellidos_cliente_persona']) !!}
                </div>
                @error ('apellidos_cliente')
                <small><span style="color: red">{{$message}}</span></small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="tipo_documento" class="mtop16">Tipo de documento:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="far fa-id-card"></i>
                    </div>
                    <select id='tipo_documento_persona' name="tipo_documento" class="form-select" required>
                        <option value=''>Seleccione</option>
                        @foreach ($tipos_documentos as $tipodocumento)
                            <option value="{{ $tipodocumento->id_opcion }}">{{ $tipodocumento->nombre }}</option>
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

                    {!! Form::number('numero_documento', null, ['class' => 'form-control', 'required', 'id' => 'documento_persona', 'min' => '999', 'max' => '999999999999999']) !!}

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
                    <select id="genero_persona" name="genero" class="form-select" required>
                        <option value=''>Seleccione</option>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id_opcion }}">{{ $genero->nombre }}</option>
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
                    {!! Form::date('calendario', null, ['id' => 'calendario', 'class' => 'form-control',  
                        'min'=>"1900-01-01", 'max'=>"2021-12-31"]) !!}
                        <!-- 'start_date' => 'required|date|after:tomorrow','finish_date' => 'required|date|start_date']) !!} -->
                        <!-- 'start_date' => 'after:tomorrow', 'finish_date' => 'after:start_date'] -->
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
            </div>

        </div>

        {!! Form::close() !!}

    @stop

    @section('css')

        <!-- Para importar bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            #btnGuardar {
                float: right;
            }

        </style>

    @stop

    @section('js')

    @stop
