@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <div class="row">
        <h1>Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm ml-auto">
            <i class="fas fa-plus"></i> Crear proveedor</a>
    </div>

@stop

@section('content')

    <table class="table" id="tblproveedores">
        <thead>
            <tr>
                <td class="negrita">ID</td>
                <td class="negrita">NIT</td>
                <td class="negrita">Nombre</td>
                <td class="negrita">Tipo de proveedor</td>
                <td class="negrita">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id_proveedor }}</td>
                    <td>{{ $proveedor->documento }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->tipopersona }}</td>
                    <td>

                        <div class="row">

                            <a class="btn btn-secondary opts"
                            href="{{ route('proveedores.show', $proveedor->id_proveedor) }}" data-toggle="tooltip"
                            data-bs-placement="top" title="Ver proveedor">
                            <i class="fas fa-eye"></i></a>

                            <a class="btn btn-primary opts"
                                href="{{ route('proveedores.edit', $proveedor->id_proveedor) }}" data-toggle="tooltip"
                                data-bs-placement="top" title="Editar proveedor">
                                <i class="fas fa-edit"></i></a>

                            <form action="{{ route('proveedores.destroy', $proveedor->id_proveedor) }}"
                                class="formEliminar" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" title="Eliminar proveedor" type="submit"><i
                                        class="fas fa-trash"></i></button>
                            </form>
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
            $('#tblproveedores').DataTable({
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

        @if (session('eliminado') == 'ok' || session('editado') == 'ok' || session('guardado') == 'ok')
            Swal.fire({
            position: 'top-end',
            icon: 'success',

            @if (session('eliminado') == 'ok')
                title: 'Registro eliminado con éxito',
            @endif

            @if (session('editado') == 'ok')
                title: 'Registro editado con éxito',
            @endif

            @if (session('guardado') == 'ok')
                title: 'Registro guardado con éxito',
            @endif

            showConfirmButton: false,
            timer: 1500
            })
        @endif

        $('.formEliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Seguro de eliminar este registro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });

        @if (session('error') == 'ok')
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No es posible eliminar el proveedor porque tiene una orden de compra pendiente.'
            })
        @endif

    </script>

@stop
