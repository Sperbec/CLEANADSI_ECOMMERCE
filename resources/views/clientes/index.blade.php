@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<div class="row">
    <h1>Clientes</h1>
    <a href="{{ url('/clientes/create')}}" class="btn btn-primary btn-sm ml-auto">
        <i class="fas fa-plus"></i> Crear cliente</a>
</div>
@stop

@section('content')
    <table class="table" id="tblclientes">
        <thead>
            <tr>
                <td>id</td>
                <td>nombre</td>
                <td>apellido</td>
          </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
              <tr>
                  <td>{{$cliente->id}}</td>
                  <td>{{$cliente->nombre}}</td>
                  <td>{{$cliente->apellido}}</td>
                  <td>

                   

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
       $('#tblclientes').DataTable({
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