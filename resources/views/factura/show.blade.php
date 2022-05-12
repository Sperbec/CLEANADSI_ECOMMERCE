@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <div class="row">
        <h1>Ver detalle de la factura {{$encabezado->codigo}}</h1>
        <a href="{{url('/imprimirfactura/'.$encabezado->id_factura)}}" class="btn btn-primary btn-sm ml-auto">
            <i class="fas fa-print"></i> Imprimir factura</a>
    </div>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-6">
        <label>Fecha: {{$encabezado->fecha}}</label>
    </div>
    <div class="col-md-6">
        <label>Facturado a: {{$encabezado->nombrecompleto}}</label>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <label>Subtotal: ${{$encabezado->subtotal}}</label>
    </div>
    <div class="col-md-6">
        <label>Valor IVA: ${{$encabezado->valor_iva}}</label>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label>Costo de envío: ${{$encabezado->costo_envio}}</label>
    </div>
    <div class="col-md-6">
        <label>Total: ${{$encabezado->total}}</label>
    </div>
</div>

<br>
<hr>

<table class="table table-hover" id="tblDetalleFactura">
    <thead>
        <tr>
            <td class="negrita">ID</td>
            <td class="negrita">Nombre producto</td>
            <td class="negrita">SKU</td>
            <td class="negrita">Cantidad</td>
            <td class="negrita">Precio unitario</td>
            <td class="negrita">Subtotal</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($detalles as $detalle)
        <tr>
            <td>{{ $detalle->id_detalle_factura }}</td>
            <td>{{ $detalle->nombre }}</td>
            <td>{{ $detalle->sku }}</td>
            <td>{{ $detalle->cantidad }}</td>
            <td>${{ $detalle->precio }}</td>
            <td>${{ $detalle->subtotal }}</td>

        </tr>
        @endforeach
    </tbody>
</table>


@stop

@section('css')
<style>
     .negrita {
        font-weight: bold;
    }
</style>
@stop

@section('js')

    <script>
    $(document).ready(function() {
        $('#tblDetalleFactura').DataTable({
            "language": idioma_espanol
        });
    });


    var idioma_espanol = {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }

    }
</script>
@stop
