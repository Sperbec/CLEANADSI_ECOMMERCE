@extends('adminlte::page')

@section('title', 'Editar proveedor')

@section('content_header')
    <form action="{{ route('proveedores.update', $proveedor->id_proveedor) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <h1>Editar proveedor</h1>
            </div>
            <div class="col-md-6">
                <button id="btnEditar" type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Editar</button>
            </div>
        </div>

    @stop

    @section('content')

        @if ($proveedor->id_opcion_persona === 20)

            <div class="row">
                <div class="col-md-6">
                    <label for="nombres">Nombres:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        {!! Form::text('nombres', $proveedor->nombres, ['class' => 'form-control', 'required', 'id' => 'nombres_persona']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="apellidos" class="mtop16">Apellidos:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        {!! Form::text('apellidos', $proveedor->apellidos, ['class' => 'form-control', 'required', 'id' => 'apellidos_persona']) !!}
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
                        <select id='tipo_documento_persona' name="tipo_documento" class="form-select" required>
                          <option value=''>Seleccione</option>
                          @foreach ($tipos_documentos as $tipodocumento)     
                          <option value="{{ $tipodocumento->id_opcion }}" 
                              {{ ($tipodocumento->id_opcion  == $proveedor->id_opcion_tipo_documento)
                                  ?'selected': ''}}>{{ $tipodocumento->nombre }}</option>
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
                        {!! Form::number('numero_documento', $proveedor->documento, ['class' => 'form-control', 'required', 'id' => 'documento_persona', 'min' => '0000000000', 'max' => '9999999999']) !!}
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
                          <option value="{{ $genero->id_opcion }}" 
                              {{ ($genero->id_opcion  == $proveedor->id_opcion_genero)
                                  ?'selected': ''}}>{{ $genero->nombre }}</option>
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
                        {!! Form::date('calendario', $proveedor->natalicio, ['id' => 'calendario', 'class' => 'form-control', 'required']) !!}
                    </div>
                </div>
            </div>
        @endif


        @if ($proveedor->id_opcion_persona === 21)
            <div class="row">
                <div class="col-md-6">
                    <label for="nombre">Nombre:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa fa-industry" aria-hidden="true"></i>
                        </div>
                        {!! Form::text('nombre', $proveedor->nombres, ['class' => 'form-control', 'required', 'id' => 'nombre_proveedor']) !!}
                    </div>
                </div>



                <div class="col-md">
                    <label for="nit" class="mtop-16">NIT:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-marker"></i>
                        </div>
                        {!! Form::number('nit', $proveedor->documento, ['class' => 'form-control', 'required', 'id' => 'nit', 'min' => '000000000000000', 'max' => '999999999999999']) !!}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="direccion">Dirección:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        {!! Form::text('direccion', $proveedor->direccion, ['class' => 'form-control', 'required', 'id' => 'direccion']) !!}
                    </div>
                </div>

                <div class="col-md">
                    <label for="correo" class="mtop-16">Correo electrónico:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                        {!! Form::email('correo', $proveedor->correo_electronico, ['class' => 'form-control', 'required', 'id' => 'correo_electronico']) !!}
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <label for="contacto">Nombre contacto:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-address-book"></i>
                        </div>
                        {!! Form::text('contacto', $proveedor->contacto, ['class' => 'form-control', 'required', 'id' => 'contacto']) !!}
                    </div>
                </div>



                <div class="col-md">
                    <label for="telefono" class="mtop-16">Teléfono móvil:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-mobile"></i>
                        </div>
                        {!! Form::number('telefono_movil', $proveedor->telefono_movil, ['class' => 'form-control', 'required', 'id' => 'telefono_movil', 'min' => '0000000000', 'max' => '9999999999']) !!}
                    </div>
                </div>
            </div>
        @endif


    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        #btnEditar {
            float: right;
        }

    </style>

@stop

@section('js')

@stop
