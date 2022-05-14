@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <div class="row">
        <h1>Categorías</h1>
        
        <a id="btnCrear" data-toggle="modal" data-target="#mdlCrearCategoria" class="btn btn-primary btn-sm ml-auto">
            <i class="fas fa-plus"></i> Crear categoría</a>
    </div>

@stop

@section('content')

@error('codigo_categoria')
<small>*{{$message}}</small>
@enderror
<br>
@error('nombre_categoria')
<small>*{{$message}}</small>
@enderror





@error('nombrecategoria')
<small>*{{$message}}</small>
@enderror

    <!-- Modal de crear categoria-->
    <div id="mdlCrearCategoria" class="modal fade" role="dialog">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Crear categoría</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['route' => 'categoria.store']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <label for="codigo_categoria">Codigo categoría:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="far fa-keyboard"></i>
                                </div>
                                {!! Form::text('codigo_categoria', null, ['id' => 'codigo_categoria', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre_categoria">Nombre categoría:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-keyboard"></i>
                                </div>
                                {!! Form::text('nombre_categoria', null, ['id' => 'nombre_categoria', 'class' => 'form-control', 'required']) !!}
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
                    <td>{{ $categoria->codigo }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <div class="row">
                            <a id="btnEditar" data-toggle="modal"
                                data-target="#mdlEditarCategoria{{ $categoria->id_categoria }}" class="btn btn-primary opts"
                                data-toggle="tooltip" data-bs-placement="top" title="Editar categoria">
                                <i class="fas fa-edit"></i></a>

                            <form class="formEliminar"
                                action="{{ route('categoria.destroy', $categoria->id_categoria) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </div>
                        </form>


                    </td>
                    @include('categoria.editmodal')
                </tr>
            @endforeach
        </tbody>
    </table>

  

@stop

@section('css')

@stop

@section('js')

    <script>
        //Modal de crear categoría
        $("#btnCrear").on("click", function() {
            document.getElementById('codigo_categoria').value = '';
            document.getElementById('nombre_categoria').value = '';
            $("#mdlCrearCategoria").modal("show");
        });

        //Modal de editar categoría
        $("#btnEditar").on("click", function() {
            document.getElementById('codigo_categoria').value = '';
            document.getElementById('nombre_categoria').value = '';
            $("#mdlEditarCategoria").modal("show");
        });


        $(document).ready(function() {
            $('#tblcategoria').DataTable({
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

        @if (session('error') == 'ok')
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No es posible eliminar la categoría porque está relacionada a un producto.'
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
