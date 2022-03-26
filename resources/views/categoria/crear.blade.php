@extends('adminlte::page')

@section('title', 'Crear categoría')

@section('content_header')
{!!  Form::open(['route' => 'categoria.store']) !!}
@csrf

    <div class="row">
        <h1>Crear categoría</h1>
        <button type="submit" class="btn btn-success btn-sm ml-auto">
            <i class="fas fa-paper-plane"></i> Guardar categoria</button>
    </div>
@stop

@section('content')    
    <div class="row">
        <div class="col-md-6">
            <label for="codigo">Codigo categoría:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="far fa-keyboard"></i>
                </div>
                {!! Form::text('codigo', null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label for="nombre">Nombre categoría:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-keyboard"></i>
                </div>
                {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
    </div>
    {!!  Form::close() !!}     

@stop


@section('css')
@stop

@section('js')
@stop
