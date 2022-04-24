@extends('adminlte::page')

@section('title', 'Departamentos')

@section('content_header')

    <div class="row">
        <div class="col-md-6">
            <h1>Departamentos</h1>
        </div>
        <div class="col-md-6">
            <a id="btnCrear" data-toggle="modal" data-target="#mdlCrearDepartamento" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear departamento</a>
        </div>
    </div>

    @livewireStyles
@stop

@section('content')
    @livewire('select-component')
    @livewireScripts
@stop

@section('css')

    <style>
        #btnCrear {
            float: right;
        }

    </style>
@stop

@section('js')
    <script>
        
       //Modal de crear país
       $("#btnCrear").on("click", function() {
            document.getElementById('codigodepartamento').value = '';
            document.getElementById('nombredepartamento').value = '';
            $("#mdlCrearDepartamento").modal("show");
        });

        //Modal de editar país
        $("#btnEditar").on("click", function() {
            document.getElementById('codigodepartamento').value = '';
            document.getElementById('nombredepartamento').value = '';
            $("#mdlEditarDepartamento").modal("show");
        });

    </script>
@stop
