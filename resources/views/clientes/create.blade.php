@extends('adminlte::page')

@section('title', 'Crear cliente')

@section('content_header')
    <h1>ingrese los datos del cliente</h1>
@stop

@section('content')
<form action="{{ url('/clientes/guardar')}}" method="post">
  @csrf

    <div class="mb-3">
      <label class="form-label">id: </label>
      <input type="text" class="form-control" name="name" >
    </div>

    <div class="mb-3">
      <label class="form-label">nombre</label>
      <input type="nombre" class="form-control" name="nombre">
    </div>

    <div class="mb-3">
      <label class="form-label">apellido</label>
      <input type="apellido" class="form-control" name="apellido">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop