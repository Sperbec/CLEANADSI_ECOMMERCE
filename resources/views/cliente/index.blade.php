@extends('adminlte::page')

@section('title', 'usuarios')

@section('content_header')
<div class="row">
    <h1>usuarios</h1>
    <a href="{{ url('/cliente/crear')}}" class="btn btn-primary btn-sm ml-auto">
        <i class="fas fa-plus"></i> Crear cliente</a>
</div>
@stop

@section('content')
    <table class="table" id="tblusuarios">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Email</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
              <tr>
                  <td>{{$usuario->id_usuario}}</td>
                  <td>{{$usuario->name}}</td>
                  <td>{{$usuario->email}}</td>
                  <td>

                    <a class="opts" href="{{ url('/cliente/'.$usuario->id.'/editar')}}" data-toggle="tooltip" 
                        data-bs-placement="top" title="Editar usuario">
                    <i class="fas fa-edit"></i></a>

                    <a class="opts" href="{{ url('/cliente/'.$usuario->id.'/eliminar')}}" data-toggle="tooltip" 
                        data-bs-placement="top" title="Eliminar usuario">
                    <i class="fas fa-trash"></i></a>

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
    $(document).ready(function(){
       $('#tblusuarios').DataTable({
        "language": idioma_espanol
       });
    });

    var idioma_espanol ={
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