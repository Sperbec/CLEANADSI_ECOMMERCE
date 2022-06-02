@extends('frontend.plantilla')

@section('title', 'Ver pedidos')

<link rel="stylesheet" href="{{url('/static/css/pedidos.css')}}">

@section('contenido')

<div class="content">
    <div class="section-title">
        <h3 class="title">Ver pedido</h3>
    </div>

   
    <div class="row">
        <div class="col-md-6">
            <label class="subtitle">Código:</label>
            <label class="text"> {{$encabezado->codigo}}</label>
        </div>
        <div class="col-md-6">
            <label class="subtitle">Fecha: </label>
            <label class="text">{{$encabezado->fecha}}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label class="subtitle">Subtotal: </label>
            <label class="text">{{$encabezado->subtotal}}</label>
        </div>
        <div class="col-md-6">
            <label class="subtitle">Valor IVA: </label>
            <label class="text">{{$encabezado->valor_iva}}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label class="subtitle">Total: </label>
            <label class="text">{{$encabezado->total}}</label>
        </div>
        <div class="col-md-6">
            <label class="subtitle">Tipo entrega: </label>
            <label class="text">{{$encabezado->tipoentrega}}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label class="subtitle">Comentario: </label>
            <label class="text">{{$encabezado->comentario}}</label>
        </div>
        <div class="col-md-6">
            <label class="subtitle">Estado: </label>
            <label class="text">{{$encabezado->estado}}</label>
        </div>
    </div>

    <br>

</div>

<hr>

<table class="table table-hover" id="tbldetallepedidos">
    <thead>
        <tr>
            <td class="negrita">Código</td>
            <td class="negrita">Nombre</td>
            <td class="negrita">Cantidad</td>
            <td class="negrita">Valor unitario</td>
         
        </tr>
    </thead>
    <tbody>
        @foreach ($detalles as $detalle)
        <tr>
            <td>{{ $detalle->codigo }}</td>
            <td>{{ $detalle->nombre }}</td>
            <td>{{ $detalle->cantidad }}</td>
            <td>{{ $detalle->valorunitario }}</td>
        </tr>
        @endforeach
    </tbody>
</table>



@stop

@section('scripts')

@stop