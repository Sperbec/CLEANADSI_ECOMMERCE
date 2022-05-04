@extends('adminlte::page')

@section('title', 'Barrios')

@section('content_header')

<div class="row">
    <div class="col-md-6">
        <h1>Barrios</h1>
    </div>
    <div class="col-md-6">
        <a id="btnCrear" data-toggle="modal" data-target="#mdlCrearBarrio" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear barrio</a>
    </div>
</div>

@stop

@section('content')

<!-- Modal de crear barrio-->
<div id="mdlCrearBarrio" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Crear barrio</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                {!! Form::open(['route' => 'barrio.store']) !!}

                <div class="row">
                    <div class="col-md-6">
                        <label for="municipio" class="mtop16">Municipio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <select id="municipio" name="municipio" class="form-select" required>
                                <option value=''>Seleccione</option>
                                @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id_municipio }}">{{ $municipio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="codigo">Codigo barrio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </div>
                            {!! Form::text('codigo', null, ['id' => 'codigobarrio', 'class' => 'form-control',
                            'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nombre">Nombre barrio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            {!! Form::text('nombre', null, ['id' => 'nombrebarrio', 'class' => 'form-control',
                            'required']) !!}
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


<!-- Modal de editar barrio-->
<div id="mdlEditarBarrio" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Editar barrio</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="codigobarrioeditar">Codigo barrio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </div>
                            {!! Form::text('codigobarrioeditar', null, ['id' => 'codigobarrioeditar',
                            'class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nombrebarrioeditar">Nombre municipio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            {!! Form::text('nombrebarrioeditar',null, ['id' => 'nombrebarrioeditar', 'class'
                            => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button onclick="actualizarRegistro()" id="editarItem" class="btn btn-success">
                    <i class="fas fa-edit"></i> Editar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="selectedMunicipio" class="mtop16">Municipio:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <select id="selectedMunicipio" name="selectedMunicipio" class="form-select" onchange="changeMunicipio()">
                <option value=''>Seleccione</option>
                @foreach ($municipios as $municipio)
                <option value="{{ $municipio->id_municipio }}">{{ $municipio->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<br>

<table class="table" id="tblbarrios">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>


@stop

@section('css')

<!-- Para importar bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
    #btnCrear {
        float: right;
    }
</style>
@stop

@section('js')
<script>
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var idbarrio = null;

        function changeMunicipio(){
            fetch('obtenerbarrios',{
                    method : 'POST',
                    body: JSON.stringify({texto : document.getElementById('selectedMunicipio').value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    $("#tblbarrios .editable").empty();
                    for (let i in data.lista) {
                        $('table tbody').append(
                        '<tr class="editable"><td>' + data.lista[i].id_barrio+ 
                        '</td><td>' + data.lista[i].codigo + 
                        '</td><td>' + data.lista[i].nombre +'</td><td>'+ 
                        '<a onclick="cargarDatosEditar('+data.lista[i].id_barrio+')" class="btn btn-primary"><i class="fas fa-edit"></i></a>'+
                        '<a onclick="eliminarBarrio('+data.lista[i].id_barrio+')" class="btn btn-danger"><i class="fas fa-trash"></i></a>'+'</tr>');
                    }
                   
                }).catch(error => console.error(error));
            
        }

        function cargarDatosEditar(idbarrio){
            fetch('getBarrioById',{
                    method : 'POST',
                    body: JSON.stringify({id :idbarrio}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    document.getElementById('codigobarrioeditar').value = data.barrio.codigo;
                    document.getElementById('nombrebarrioeditar').value = data.barrio.nombre;
                    this.idbarrio = idbarrio;
                    $("#mdlEditarBarrio").modal("show");
                }).catch(error => console.error(error));
          
        }

        function actualizarRegistro(){
            fetch('updateBarrio',{
                    method : 'POST',
                    body: JSON.stringify({
                        id : this.idbarrio,
                        codigo:  document.getElementById('codigobarrioeditar').value,
                        nombre:  document.getElementById('nombrebarrioeditar').value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro editado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $("#mdlEditarBarrio").modal("hide");
                    changeMunicipio();
                }).catch(error => console.error(error));
        }

        function eliminarBarrio(idbarrio){
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
                   fetch('eliminarBarrio',{
                    method : 'POST',
                    body: JSON.stringify({id :idbarrio}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro eliminado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    changeMunicipio();
                }).catch(error => console.error(error));
                }
            })
               
        }

        @if ( session('guardado') == 'ok')
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