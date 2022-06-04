@extends('adminlte::page')

@section('title', 'Editar producto')

@section('content_header')
<form enctype="multipart/form-data" action="{{ route('productos.update', $producto->id_producto) }}" method="post">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6">
            <h1>Editar producto</h1>
        </div>
        <div class="col-md-6">
            <button id="btnEditar" type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Editar</button>
        </div>
    </div>

    @stop

    @section('content')

    <img src="{{ '/static/images/productos/'.$producto->imagen}}" width="20%">


    <div class="row">

        <div class="col-md-6">
            <label for="categoria" class="mtop16">Categoría:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-align-justify"></i>
                </div>
                <select name="categoria" id="categoria" class="form-select" required>
                    <option value=''>Seleccione</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}"
                        {{ ($categoria->id_categoria  == $producto->id_categoria)
                            ?'selected': ''}}>{{ $categoria->nombre }}</option>
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
                    {!! Form::text('nombre_producto', $producto->nombre, ['class' => 'form-control', 'required', 'id' =>
                    'nombre_producto']) !!}
                </div>

                @error('nombres_producto')
                <small><span style="color: red">{{$message}}</span></small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="sku" class="mtop16">SKU:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fab fa-product-hunt"></i>
                    </div>
                    {!! Form::text('sku', $producto->sku, ['class' => 'form-control', 'required', 'id' => 'sku']) !!}
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
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    {!! Form::number('precio_producto', $producto->precio, ['class' => 'form-control', 'required', 'id' =>
                    'precio_producto']) !!}
                </div>

                @error('precio_producto')
                <small><span style="color: red">{{$message}}</span></small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="cantidad_existencia" class="mtop16">Cantidad en existencia:</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="fas fa-sort-amount-up-alt"></i>
                    </div>
                    {!! Form::text('cantidad_existencia', $producto->cantidad_existencia, ['class' => 'form-control', 'required', 'id' =>
                    'cantidad_existencia']) !!}
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
                        <i class="fas fa-link"></i>
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
                        <i class="fas fa-align-justify"></i>
                    </div>
                    {!! Form::textarea('descripcion_producto', $producto->descripcion, ['class' => 'form-control','rows'=> 5, 'required',
                    'id' => 'descripcion_producto']) !!}
                </div>

                @error('descripcion_producto')
                <small><span style="color: red">{{$message}}</span></small>
                @enderror
            </div>
        </div>


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