@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <div class="row">
        <h1>Categorías</h1>
        <a href="{{ route('categoria.create') }}" class="btn btn-primary btn-sm ml-auto">
            <i class="fas fa-plus"></i> Crear categoría</a>
    </div>

@stop

@section('content')

    <table class="table table-hover" id="tblcategoria">
        <thead>
            <tr>
                <td>ID</td>
                <td>Código</td>
                <td>Nombre</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id_categoria }}</td>
                    <td>{{ $categoria->categoria }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-primary opts" href="{{ route('categoria.edit', $categoria->id_categoria) }}"
                                data-toggle="tooltip" data-bs-placement="top" title="Editar categoria">
                                <i class="fas fa-edit"></i></a>

                            <form action="{{ route('categoria.destroy', $categoria->id_categoria)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#tblcategoria').DataTable({
                "language": idioma_espanol
            });
        });


        var idioma_espanol = {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
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
