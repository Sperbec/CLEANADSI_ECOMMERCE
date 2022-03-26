@extends('adminlte::page')

@section('title', 'Editar categoría')

@section('content_header')
<form action="{{route('categoria.update', $categoria->id_categoria)}}" method="post">
@csrf
@method('PUT')

    <div class="row">
        <h1>Editar categoría</h1>
        <button type="submit" class="btn btn-success btn-sm ml-auto">
            <i class="fas fa-paper-plane"></i> Editar categoria</button>
    </div>
@stop

@section('content')    
    <div class="row">
        <div class="col-md-6">
            <label for="codigo">Codigo categoría:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
                {!! Form::text('codigo', $categoria->codigo, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label for="nombre">Nombre categoría:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
                {!! Form::text('nombre', $categoria->nombre, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
    </div>

</form> 

@stop

@section('css')
@stop

@section('js')
@stop
