@extends('adminlte::page')

@section('title', 'Detalle de factura')

@section('content_header')

<form action="{{url('/updateFactura')}}" method="post">
    @csrf

    <div class="row">
        <h1>Ver detalle de la factura {{$encabezado->codigo}}</h1>

        <button id="btnEditar" type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Actualizar estado</button>

        <a target="_blank" href="{{url('/imprimirfactura/'.$encabezado->id_factura)}}" class="btn btn-primary btn-sm ml-auto">
            <i class="fas fa-print"></i> Imprimir factura</a>
    </div>
<hr>
@stop

@section('content')

<input type="hidden" value="{{$encabezado->id_factura}}" name="id_factura">

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
        <label>Total: ${{$encabezado->total}}</label>
    </div>

    <div class="col-md-6">
        <label>Estado:</label>
        <select name="estado" id="estado" class="form-select" required >
            <option value=''>Seleccione</option>
            <option value="1" {{$encabezado->estado == 1 ? 'selected' : ''}}>Pendiente por despachar</option>
            <option value="2" {{$encabezado->estado == 2 ? 'selected' : ''}}>Despachado</option>
            <option value="3" {{$encabezado->estado == 3 ? 'selected' : ''}}>Finalizado</option>
            <option value="4" {{$encabezado->estado == 4 ? 'selected' : ''}}>Anulado</option>
        </select>
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
</form>

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

    var estado = document.getElementById('estado');
    if(estado.value != null && estado.value == 2 || estado.value == 3 || estado.value == 4 ){
        document.getElementById("estado").disabled = true;
        document.getElementById("btnEditar").disabled = true;
    }else{
        document.getElementById("estado").disabled = false;
        document.getElementById("btnEditar").disabled = false;
    }

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
