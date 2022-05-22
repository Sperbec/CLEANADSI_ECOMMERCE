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
                    <label for="nombres_proveedor">Nombres:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        {!! Form::text('nombres_proveedor', $proveedor->nombres, ['class' => 'form-control', 'required', 'id' => 'nombres_proveedor']) !!}
                    </div>
                    @error ('nombres_proveedor')
                    <small>*{{$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="apellidos_proveedor" class="mtop16">Apellidos:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        {!! Form::text('apellidos_proveedor', $proveedor->apellidos, ['class' => 'form-control', 'required', 'id' => 'apellidos_proveedor']) !!}
                    </div>
                    @error ('apellidos_proveedor')
                    <small>*{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="tipo_doc_proveedor" class="mtop16">Tipo de documento:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="far fa-id-card"></i>
                        </div>
                        <select id='tipo_doc_proveedor' name="tipo_doc_proveedor" class="form-select" required>
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
                        {!! Form::number('numero_documento', $proveedor->documento, ['class' => 'form-control', 'required', 'id' => 'numero_documento']) !!}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="genero_proveedor" class="mtop16">Género:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-venus-mars"></i>
                        </div>
                        <select id="genero_proveedor" name="genero_proveedor" class="form-select" required>
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
                        {!! Form::date('fecha_nacimiento', $proveedor->natalicio, ['id' => 'fecha_nacimiento', 'class' => 'form-control', 'required']) !!}
                    </div>
                </div>
            </div>
        @endif


        @if ($proveedor->id_opcion_persona === 21)
            <div class="row">
                <div class="col-md-6">
                    <label for="nombre_juridico">Nombre:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa fa-industry" aria-hidden="true"></i>
                        </div>
                        {!! Form::text('nombre_juridico', $proveedor->nombres, ['class' => 'form-control', 'required', 'id' => 'nombre_juridico']) !!}
                    </div>
                </div>



                <div class="col-md">
                    <label for="nit" class="mtop-16">NIT:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-marker"></i>
                        </div>
                        {!! Form::number('nit', $proveedor->documento, ['class' => 'form-control', 'required', 'id' => 'nit']) !!}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="direccion_proveedor">Dirección:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        {!! Form::text('direccion_proveedor', $proveedor->direccion, ['class' => 'form-control', 'required', 'id' => 'direccion_proveedor']) !!}
                    </div>
                </div>

                <div class="col-md">
                    <label for="correo_proveedor" class="mtop-16">Correo electrónico:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                        {!! Form::email('correo_proveedor', $proveedor->correo_electronico, ['class' => 'form-control', 'required', 'id' => 'correo_proveedor']) !!}
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <label for="contacto_proveedor">Nombre contacto:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-address-book"></i>
                        </div>
                        {!! Form::text('contacto_proveedor', $proveedor->contacto, ['class' => 'form-control', 'required', 'id' => 'contacto_proveedor']) !!}
                    </div>
                </div>



                <div class="col-md">
                    <label for="telefono_proveedor" class="mtop-16">Teléfono móvil:</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="fas fa-mobile"></i>
                        </div>
                        {!! Form::number('telefono_proveedor', $proveedor->telefono_movil, ['class' => 'form-control', 'required', 'id' => 'telefono_proveedor']) !!}
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
