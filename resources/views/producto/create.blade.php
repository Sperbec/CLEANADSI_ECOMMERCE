@extends('adminlte::page')

@section('title', 'Crear producto')

@section('content_header')


<form method="POST" enctype="multipart/form-data" action="{{ route('productos.store') }}">
    @csrf

<div class="row">
    <div class="col-md-6">
        <h1>Crear producto</h1>
    </div>
    <div class="col-md-6">
        <button id="btnGuardar" type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>
            Guardar</button>
    </div>
</div>
@stop

@section('content')

<div class="row">

    <div class="col-md-6">
        <label for="categoria" class="mtop16">Categoría:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="far fa-id-card"></i>
            </div>
            <select name="categoria" id="categoria" class="form-select" required>
                <option value=''>Seleccione</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label for="nombre_producto">Nombre:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
                {!! Form::text('nombre_producto', null, ['class' => 'form-control', 'required', 'id' => 'nombre_producto']) !!}
            </div>

            @error('nombres_producto')
            <small><span style="color: red">{{$message}}</span></small>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="sku" class="mtop16">SKU:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
                {!! Form::text('sku', null, ['class' => 'form-control', 'required', 'id' => 'sku']) !!}
            </div>
            @error('sku')
            <small><span style="color: red">{{$message}}</span></small>
            @enderror
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label for="precio_producto">Precio:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
                {!! Form::number('precio_producto', null, ['class' => 'form-control', 'required', 'id' => 'precio_producto']) !!}
            </div>

            @error('precio_producto')
            <small><span style="color: red">{{$message}}</span></small>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="cantidad_existencia" class="mtop16">Cantidad en existencia:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
                {!! Form::text('cantidad_existencia', null, ['class' => 'form-control', 'required', 'id' => 'cantidad_existencia']) !!}
            </div>
            @error('cantidad_existencia')
            <small><span style="color: red">{{$message}}</span></small>
            @enderror
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label for="imagen_producto">Imagen:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
                {!! Form::file('imagen_producto', null, ['class' => 'form-control', 'required', 'id' => 'imagen_producto']) !!}
            </div>

            @error('imagen_producto')
            <small><span style="color: red">{{$message}}</span></small>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="descripcion_producto">Descripción:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
                {!! Form::textarea('descripcion_producto', null, ['class' => 'form-control','rows'=> 5,  'required', 'id' => 'descripcion_producto']) !!}
            </div>

            @error('descripcion_producto')
            <small><span style="color: red">{{$message}}</span></small>
            @enderror
        </div>
    </div>



    </form>

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