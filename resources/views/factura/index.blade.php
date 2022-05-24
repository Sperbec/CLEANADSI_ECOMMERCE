@extends('adminlte::page')

@section('title', 'Facturas')

@section('content_header')
    <div class="row">
        <h1>Facturas</h1>
    </div>

@stop

@section('content')
<table class="table" id="tblfacturas">
    <thead>
        <tr>
            <td class="negrita">ID</td>
            <td class="negrita">Código</td>
            <td class="negrita">Fecha</td>
            <td class="negrita">Nombre</td>
            <td class="negrita">Subtotal</td>
            <td class="negrita">Valor IVA</td>
            <td class="negrita">Costo envío</td>
            <td class="negrita">Total</td>
            <td class="negrita">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($facturas as $factura)
            <tr>
                <td>{{ $factura->id_factura }}</td>
                <td>{{ $factura->codigo }}</td>
                <td>{{ $factura->fecha }}</td>
                <td>{{ $factura->nombrecompleto }}</td>
                <td>${{ $factura->subtotal }}</td>
                <td>${{ $factura->valor_iva }}</td>
                <td>${{ $factura->costo_envio }}</td>
                <td>${{ $factura->total }}</td>
                <td>

                    <div class="row">

                        <a class="btn btn-secondary opts"
                        href="{{ route('factura.show',  $factura->id_factura) }}" data-toggle="tooltip"
                        data-bs-placement="top" title="Ver factura">
                        <i class="fas fa-eye"></i></a>


                    </div>
                </td>
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
            $('#tblfacturas').DataTable({
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
