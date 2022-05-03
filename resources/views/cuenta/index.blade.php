@extends('adminlte::page')

@section('title', 'Mi cuenta')

@section('content_header')
<div class="row">
    <h1>Mi cuenta</h1>
</div>

@stop

@section('content')
<h4>Información de la cuenta</h4>
<hr>
<h5>Datos de contacto</h5>
<label>{{$usuario->nombre}}</label><br>
<label>{{$usuario->email}}</label><br>
<div>
    <a class="btn btn-primary opts"
    href="" data-toggle="tooltip"
    data-bs-placement="top" title="Editar datos">
    <i class="fas fa-edit"></i> Editar</a>

    <a class="btn btn-secondary opts"
    href="" data-toggle="tooltip"
    data-bs-placement="top" title="Cambiar contraseña">
    <i class="fas fa-lock"></i> Cambiar contraseña</a>

</div>

<br><br>


<h4>Libreta de direcciones</h4>
<hr>


<div>
    <h5>Dirección de envío predeterminada</h5>
    <label>{{$usuario->nombre}}</label><br>

    @if ($usuario->numerotelefono != '')
        <label>{{$usuario->numerotelefono}}</label><br>    
    @endif

    @if ($usuario->direccion != '')
        <label>{{$usuario->direccion}}</label><br>
    @endif

    @if ($usuario->ciudad != '')
        <label>{{$usuario->ciudad}}</label><br>
    @endif
    
    @if ($usuario->pais != '')
        <label>{{$usuario->pais}}</label><br>
    @endif
    
    <a class="btn btn-primary opts"
    href="" data-toggle="tooltip"
    data-bs-placement="top" title="Cambiar contraseña">
    <i class="fas fa-edit"></i> Editar datos de contacto</a>
</div>


@stop

@section('css')

@stop

@section('js')

@stop