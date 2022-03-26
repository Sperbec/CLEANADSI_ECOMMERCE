@extends('adminlte::page')

@section('title', 'Crear cliente')

@section('content_header')
    <h1>C cliente</h1>
@stop

@section('content')
<form action="{{ url('/cliente/guardar')}}" method="post">
  @csrf

    <div class="mb-3">
      <label class="form-label">Nombre: </label>
      <input type="text" class="form-control" name="name" >
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email">
    </div>

    <div class="mb-3">
      <label class="form-label">Contraseña</label>
      <input type="password" class="form-control" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop