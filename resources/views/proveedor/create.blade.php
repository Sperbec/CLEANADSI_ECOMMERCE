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
            <label for="tipos_personas" class="mtop16">Tipo de persona:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="far fa-id-card"></i>
                </div>
                <select name="tipos_personas" id="tipos_personas" class="form-select" onchange="
                            habilitar(this.value);">
                    <option value=''>Seleccione</option>
                    @foreach ($tipos_personas as $tipopersona)
                        <option value="{{ $tipopersona->id_opcion }}">{{ $tipopersona->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="row">
            <h4><br>Datos de persona natural:</h4>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="nombres">Nombres:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>
                    {!! Form::text('nombres', null, ['class' => 'form-control', 'required', '', 'id' => 'nombres_persona']) !!}
                </div>

                @error('nombres')
                <small>*{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="apellidos" class="mtop16">Apellidos:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-user"></i>
                    </div>
                    {!! Form::text('apellidos', null, ['class' => 'form-control', 'required', '', 'id' => 'apellidos_persona']) !!}
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
                    {!! Form::number('numero_documento', null, ['class' => 'form-control', 'required', 'id' => 'documento_persona', '', 'min' => '999', 'max' => '9999999999']) !!}
                </div>
                @error ('numero_documento')
                <small>*{{$message}}</small>
                @enderror
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
                    {!! Form::date('calendario', null, ['id' => 'calendario', 'class' => 'form-control', 'required', 'disabled','min'=>"1900-01-01", 'max'=>"2021-12-31"]) !!}
                </div>
            </div>
        </div>


        <div class="row">

            <h4><br>Datos de persona jurídica:</h4>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="nombre">Nombre:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fa fa-industry" aria-hidden="true"></i>
                    </div>
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'nombre_proveedor']) !!}
                </div>
            </div>



            <div class="col-md">
                <label for="nit" class="mtop-16">NIT:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-marker"></i>
                    </div>
                    {!! Form::number('nit', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'nit', 'min' => '000000000000000', 'max' => '999999999999999']) !!}
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
                    {!! Form::text('direccion', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'direccion']) !!}
                </div>
            </div>

            <div class="col-md">
                <label for="correo" class="mtop-16">Correo electrónico:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </div>
                    {!! Form::email('correo', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'correo_electronico']) !!}
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6">
                <label for="contacto">Nombre contacto:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <!--Hacer uso del fontawesome-->
                        <i class="fas fa-address-book"></i>
                    </div>

                    <!--El segundo parámetro se manda en null porque no lleva ningun
                              valor por defecto-->
                    {!! Form::text('contacto', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'contacto']) !!}
                </div>
            </div>



            <div class="col-md">
                <label for="telefono" class="mtop-16">Teléfono móvil:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-mobile"></i>
                    </div>
                    {!! Form::number('telefono_movil', null, ['class' => 'form-control', 'required', 'disabled', 'id' => 'telefono_movil', 'min' => '0000000000', 'max' => '9999999999']) !!}
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

        <!-- Habilitar o deshabilitar campos, dependiendo la selección del tipo de persona -->
        <script>
            function habilitar(value) {

                if (value == "") {
                    // Deshabilitamos campos de persona natural
                    document.getElementById("nombres_persona").disabled = true;
                    document.getElementById("apellidos_persona").disabled = true;
                    document.getElementById("tipo_documento_persona").disabled = true;
                    document.getElementById("documento_persona").disabled = true;
                    document.getElementById("genero_persona").disabled = true;
                    document.getElementById("calendario").disabled = true;
                    // Campos de persona jurídica
                    document.getElementById("nombre_proveedor").disabled = true;
                    document.getElementById("nit").disabled = true;
                    document.getElementById("direccion").disabled = true;
                    document.getElementById("correo_electronico").disabled = true;
                    document.getElementById("contacto").disabled = true;
                    document.getElementById("telefono_movil").disabled = true;
                }

                if (value == "20") {
                    // Habilitamos campos de persona natural
                    document.getElementById("nombres_persona").disabled = false;
                    document.getElementById("apellidos_persona").disabled = false;
                    document.getElementById("tipo_documento_persona").disabled = false;
                    document.getElementById("documento_persona").disabled = false;
                    document.getElementById("genero_persona").disabled = false;
                    document.getElementById("calendario").disabled = false;
                    // Campos de persona jurídica
                    document.getElementById("nombre_proveedor").disabled = true;
                    document.getElementById("nit").disabled = true;
                    document.getElementById("direccion").disabled = true;
                    document.getElementById("correo_electronico").disabled = true;
                    document.getElementById("contacto").disabled = true;
                    document.getElementById("telefono_movil").disabled = true;
                } else if (value == "21") {
                    // Deshabilitamos campos de persona natural
                    document.getElementById("nombres_persona").disabled = true;
                    document.getElementById("apellidos_persona").disabled = true;
                    document.getElementById("tipo_documento_persona").disabled = true;
                    document.getElementById("documento_persona").disabled = true;
                    document.getElementById("genero_persona").disabled = true;
                    document.getElementById("calendario").disabled = true;
                    // Campos de persona jurídica
                    document.getElementById("nombre_proveedor").disabled = false;
                    document.getElementById("nit").disabled = false;
                    document.getElementById("direccion").disabled = false;
                    document.getElementById("correo_electronico").disabled = false;
                    document.getElementById("contacto").disabled = false;
                    document.getElementById("telefono_movil").disabled = false;
                }

            }


        </script>

    @stop
