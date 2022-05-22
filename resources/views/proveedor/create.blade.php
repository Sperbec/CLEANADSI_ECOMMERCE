@extends('adminlte::page')

@section('title', 'Crear proveedor')

@section('content_header')
{!! Form::open(['route' => 'proveedores.store']) !!}
    <div class="row">
        <div class="col-md-6">
            <h1>Crear proveedor</h1>
        </div>
        <div class="col-md-6">
            <button id="btnGuardar" type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Guardar</button>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <label for="tipos_proveedores" class="mtop16">Tipo de proveedor:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="far fa-id-card"></i>
                </div>
                <select name="tipos_proveedores" id="tipos_proveedores" class="form-select" required onchange="
                            habilitar(this.value);">
                    <option value=''>Seleccione</option>
                    @foreach ($tipos_proveedores as $tipoproveedor)
                        <option value="{{ $tipoproveedor->id_opcion }}">{{ $tipoproveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="row">
            <h4><br>Datos de proveedor natural:</h4>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="nombres_proveedor">Nombres:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>
                    {!! Form::text('nombres_proveedor', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'nombres_proveedor']) !!}
                </div>

                @error('nombres_proveedor')
                <small>*{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="apellidos_proveedor" class="mtop16">Apellidos:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>
                    {!! Form::text('apellidos_proveedor', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'apellidos_proveedor']) !!}
                </div>
                @error('apellidos_proveedor')
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
                    <select disabled id='tipo_doc_proveedor' name="tipo_doc_proveedor" class="form-select" required>
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
                    {!! Form::number('numero_documento', null, ['class' => 'form-control', 'required', 'id' => 'numero_documento', 'disabled']) !!}
                </div>
                @error ('numero_documento')
                <small>*{{$message}}</small>
                @enderror
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <label for="genero_proveedor" class="mtop16">Género:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-venus-mars"></i>
                    </div>
                    <select disabled id="genero_proveedor" name="genero_proveedor" class="form-select" required>
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
                    {!! Form::date('fecha_nacimiento', null, ['id' => 'fecha_nacimiento', 'class' => 'form-control', 'required', 'disabled','min'=>"1900-01-01", 'max'=>"2021-12-31"]) !!}
                </div>
            </div>
        </div>


        <div class="row">

            <h4><br>Datos de proveedor jurídica:</h4>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="nombre_juridico">Nombre:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fa fa-industry" aria-hidden="true"></i>
                    </div>
                    {!! Form::text('nombre_juridico', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'nombre_juridico']) !!}
                </div>
                @error('nombre_juridico')
                <small>*{{$message}}</small>
                @enderror
            </div>



            <div class="col-md">
                <label for="nit" class="mtop-16">NIT:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-marker"></i>
                    </div>
                    {!! Form::number('nit', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'nit', 'min' => '000000000000000', 'max' => '999999999999999']) !!}
                </div>
                @error('nit')
                <small>*{{$message}}</small>
                @enderror
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <label for="direccion_proveedor">Dirección:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    {!! Form::text('direccion_proveedor', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'direccion_proveedor']) !!}
                </div>
                @error('direccion_proveedor')
                <small>*{{$message}}</small>
                @enderror
            </div>

            <div class="col-md">
                <label for="correo_proveedor" class="mtop-16">Correo electrónico:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </div>
                    {!! Form::email('correo_proveedor', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'correo_proveedor']) !!}
                </div>
                @error('correo_proveedor')
                <small>*{{$message}}</small>
                @enderror
            </div>
        </div>



        <div class="row">
            <div class="col-md-6">
                <label for="contacto_proveedor">Nombre contacto:</label>
                <div class="input-group">
                    <div class="input-group-text">
                     <i class="fas fa-address-book"></i>
                    </div>

                    {!! Form::text('contacto_proveedor', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'contacto_proveedor']) !!}
                </div>
                @error('contacto_proveedor')
                <small>*{{$message}}</small>
                @enderror
            </div>
            
            <div class="col-md">
                <label for="telefono_proveedor" class="mtop-16">Teléfono móvil:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-mobile"></i>
                    </div>
                    {!! Form::number('telefono_proveedor', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'telefono_proveedor', 'min' => '0000000000', 'max' => '9999999999']) !!}
                </div>
                @error('telefono_proveedor')
                <small>*{{$message}}</small>
                @enderror
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

        <!-- Habilitar o deshabilitar campos, dependiendo la selección del tipo de proveedor -->
        <script>
            function habilitar(value) {

                if (value == "") {
                    // Deshabilitamos campos de proveedor natural
                    document.getElementById("nombres_proveedor").disabled = true;
                    document.getElementById("apellidos_proveedor").disabled = true;
                    document.getElementById("tipo_doc_proveedor").disabled = true;
                    document.getElementById("numero_documento").disabled = true;
                    document.getElementById("genero_proveedor").disabled = true;
                    document.getElementById("fecha_nacimiento").disabled = true;
                    // Campos de proveedor jurídica
                    document.getElementById("nombre_juridico").disabled = true;
                    document.getElementById("nit").disabled = true;
                    document.getElementById("direccion_proveedor").disabled = true;
                    document.getElementById("correo_proveedor").disabled = true;
                    document.getElementById("contacto_proveedor").disabled = true;
                    document.getElementById("telefono_proveedor").disabled = true;
                }

                if (value == "20") {
                    // Habilitamos campos de proveedor natural
                    document.getElementById("nombres_proveedor").disabled = false;
                    document.getElementById("apellidos_proveedor").disabled = false;
                    document.getElementById("tipo_doc_proveedor").disabled = false;
                    document.getElementById("numero_documento").disabled = false;
                    document.getElementById("genero_proveedor").disabled = false;
                    document.getElementById("fecha_nacimiento").disabled = false;
                    // Campos de proveedor jurídica
                    document.getElementById("nombre_juridico").disabled = true;
                    document.getElementById("nit").disabled = true;
                    document.getElementById("direccion_proveedor").disabled = true;
                    document.getElementById("correo_proveedor").disabled = true;
                    document.getElementById("contacto_proveedor").disabled = true;
                    document.getElementById("telefono_proveedor").disabled = true;
                } else if (value == "21") {
                    // Deshabilitamos campos de proveedor natural
                    document.getElementById("nombres_proveedor").disabled = true;
                    document.getElementById("apellidos_proveedor").disabled = true;
                    document.getElementById("tipo_doc_proveedor").disabled = true;
                    document.getElementById("numero_documento").disabled = true;
                    document.getElementById("genero_proveedor").disabled = true;
                    document.getElementById("fecha_nacimiento").disabled = true;
                    // Campos de proveedor jurídica
                    document.getElementById("nombre_juridico").disabled = false;
                    document.getElementById("nit").disabled = false;
                    document.getElementById("direccion_proveedor").disabled = false;
                    document.getElementById("correo_proveedor").disabled = false;
                    document.getElementById("contacto_proveedor").disabled = false;
                    document.getElementById("telefono_proveedor").disabled = false;
                }

            }


        </script>

    @stop
