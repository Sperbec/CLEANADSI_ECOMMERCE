@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <div class="row">
        <h1>Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm ml-auto">
            <i class="fas fa-plus"></i> Crear producto</a>
    </div>

@stop

@section('content')

    <table class="table" id="tblproductos">
        <thead>
            <tr>
                <td class="negrita">ID</td>
                <td class="negrita">Nombre</td>
                <td class="negrita">SKU</td>
                <td class="negrita">Precio</td>
                <td class="negrita">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id_producto }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->sku }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>

                        <div class="row">

                            <a class="btn btn-secondary opts"
                            href="{{ route('productos.show', $producto->id_producto) }}" data-toggle="tooltip"
                            data-bs-placement="top" title="Ver producto">
                            <i class="fas fa-eye"></i></a>

                            <a class="btn btn-primary opts"
                                href="{{ route('productos.edit', $producto->id_producto) }}" data-toggle="tooltip"
                                data-bs-placement="top" title="Editar producto">
                                <i class="fas fa-edit"></i></a>

                            <form action="{{ route('productos.destroy', $producto->id_producto) }}"
                                class="formEliminar" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" title="Eliminar producto" type="submit"><i
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
            $('#tblproductos').DataTable({
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

    </script>

@stop
