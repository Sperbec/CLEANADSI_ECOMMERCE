@extends('adminlte::page')

@section('title', 'Consultar ordenes de compra')

@section('content_header')
<h1>Consultar ordenes de compra a proveedor</h1>
@stop

@section('content')
<table class="table" id="tblordenes_compra">
    <thead>
        <tr>
            <td class="negrita">ID</td>
            <td class="negrita">Código</td>
            <td class="negrita">Fecha</td>
            <td class="negrita">Nombre proveedor</td>
            <td class="negrita">Subtotal</td>
            <td class="negrita">Valor IVA</td>
            <td class="negrita">Total</td>
            <td class="negrita">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($ordenes as $orden)
        <tr>
            <td>{{ $orden->id_orden }}</td>
            <td>{{ $orden->codigo }}</td>
            <td>{{ $orden->fecha }}</td>
            <td>{{ $orden->nombre_proveedor }}</td>
            <td>${{ $orden->subtotal }}</td>
            <td>${{ $orden->valor_iva }}</td>
            <td>${{ $orden->total }}</td>
            <td>

                <div class="row">

                    <a class="btn btn-secondary opts" href="{{url('/verOrdenCompra/'.$orden->id_orden)}}"
                        data-toggle="tooltip" data-bs-placement="top" title="Ver factura">
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
            $('#tblordenes_compra').DataTable({
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