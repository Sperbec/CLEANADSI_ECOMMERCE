@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<div class="row">
    <h1>Usuarios</h1>
</div>
@stop

@section('content')
<table class="table table-hover" id="tblusuarios">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Email</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id_usuario }}</td>
                <td>{{ $usuario->nombres }}</td>
                <td>{{ $usuario->apellidos }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    <div class="row">

                        <a class="btn btn-primary opts"
                            href="{{ route('users.edit', $usuario->id_usuario) }}" data-toggle="tooltip"
                            data-bs-placement="top" title="Editar usuario">
                            Asignar rol</a>
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
        $('#tblusuarios').DataTable({
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

<script>
    @if (session('guardado') == 'ok')
           Swal.fire({
           position: 'top-end',
           icon: 'success',
           title: 'Registro guardado con éxito',
           showConfirmButton: false,
           timer: 1500
           })
   @endif
   </script>   
  
@stop
