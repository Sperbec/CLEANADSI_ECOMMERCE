@extends('adminlte::page')

@section('title', 'Editar proveedor')

@section('content_header')
    <h1>Editar proveedores</h1>
@stop

@section('content')
<form action="{{route('proveedores.update', $proveedor->id_proveedor)}}" method="post">
  @csrf
  @method('PUT')
    <div class="mb-3">
      <label class="form-label">Código proveedor: </label>
      <input type="text" class="form-control" disabled value="{{$proveedor->id_proveedor}}" name="codigoproveedor" >
    </div>
    <div class="mb-3">
      <label class="form-label">Nombre proveedor</label>
      <input type="text" class="form-control" value="{{$proveedor->nombre}}"  name="nombreproveedor">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop