@extends('adminlte::page')

@section('title', 'Ver producto')

@section('content_header')

<div class="row">
    <div class="col-md-6">
        <h1>Ver producto</h1>
    </div>

</div>

@stop

@section('content')


<img src="{{ '/static/images/productos/'.$producto->imagen}}" width="20%" >


<div class="row">
    <div class="col-md-6">
        <label for="nombre_categoria">Categoría:</label>
        <div class="input-group">
            <div class="input-group-text">
                
                <i class="fas fa-align-justify"></i> 
            </div>
            {!! Form::text('nombre_categoria', $categoria->nombre, ['class' => 'form-control', 'required', 'disabled',
            'id' => 'nombre_categoria']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="nombre_producto">Nombre:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            {!! Form::text('nombre_producto', $producto->nombre, ['class' => 'form-control', 'required', 'disabled',
            'id' => 'nombre_producto']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <label for="sku">SKU:</label>
        <div class="input-group">
            <div class="input-group-text">
                
                <i class="fab fa-product-hunt"></i>
            </div>
            {!! Form::text('sku', $producto->sku, ['class' => 'form-control', 'required', 'disabled',
            'id' => 'sku']) !!}
        </div>
    </div>

</div>


<div class="row">
    <div class="col-md-6">
        <label for="precio_producto">Precio:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-dollar-sign"></i>
            </div>
            {!! Form::number('precio_producto', $producto->precio, ['class' => 'form-control', 'required', 'disabled', 'id' => 'precio_producto']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <label for="cantidad_existencia" class="mtop16">Cantidad en existencia:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-sort-amount-up-alt"></i>
            </div>
            {!! Form::text('cantidad_existencia', $producto->cantidad_existencia, ['class' => 'form-control', 'required','disabled', 'id' => 'cantidad_existencia']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label for="descripcion_producto">Descripción:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-align-justify"></i>   
            </div>
            {!! Form::textarea('descripcion_producto', $producto->descripcion, ['class' => 'form-control','rows'=> 5,  'required','disabled', 'id' => 'descripcion_producto']) !!}
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@stop

@section('js')

@stop