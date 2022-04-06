@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <div class="row">
        <h1>Clientes</h1>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm ml-auto">
            <i class="fas fa-plus"></i> Crear cliente</a>
    </div>

@stop

@section('content')

    <table class="table" id="tblclientes">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id_persona }}</td>
                    <td>{{ $cliente->nombres }}</td>
                    <td>{{ $cliente->apellidos }}</td>
                   
                    <td>
                        <div class="row">
                            <a class="btn btn-primary opts"
                                href="{{ route('clientes.edit', $cliente->id_persona) }}" data-toggle="tooltip"
                                data-bs-placement="top" title="Editar cliente">
                                <i class="fas fa-edit"></i></a>

                            <form action="{{ route('clientes.destroy',$cliente->id_persona) }}"
                                class="formEliminar"  method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" title="Eliminar cliente" type="submit"><i
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#tblclientes').DataTable({
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
