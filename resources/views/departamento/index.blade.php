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

<!-- Modal de crear departamento-->
    <div id="mdlCrearDepartamento" class="modal fade" role="dialog">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Crear departamento</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['route' => 'departamento.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <label for="pais" class="mtop16">País:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-globe-americas"></i>
                                </div>
                                <select id="pais" name="pais" class="form-select" required>
                                    <option value=''>Seleccione</option>
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id_pais }}">{{ $pais->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="codigo">Codigo departamento:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="far fa-keyboard"></i>
                                </div>
                                {!! Form::text('codigo', null, ['id' => 'codigodepartamento', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre">Nombre departamento:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-keyboard"></i>
                                </div>
                                {!! Form::text('nombre', null, ['id' => 'nombredepartamento', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button id="agregarItem" type="submit" class="btn btn-success">
                        <i class="fas fa-paper-plane"></i> Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cerrar</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

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

    </script>
@stop
