@extends('adminlte::page')

@section('title', 'Municipios')

@section('content_header')

<div class="row">
    <div class="col-md-6">
        <h1>Municipios</h1>
    </div>
    <div class="col-md-6">
        <a id="btnCrear" data-toggle="modal" data-target="#mdlCrearMunicipio" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear municipio</a>
    </div>
</div>

@stop

@section('content')

<!-- Modal de crear municipio-->
<div id="mdlCrearMunicipio" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Crear municipio</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                {!! Form::open(['route' => 'municipio.store']) !!}

                <div class="row">
                    <div class="col-md-6">
                        <label for="departamento" class="mtop16">Departamento:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-search-location"></i>
                            </div>
                            <select id="departamento" name="departamento" class="form-select" required>
                                <option value=''>Seleccione</option>
                                @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id_departamento }}">{{ $departamento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="codigo">Codigo municipio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </div>
                            {!! Form::text('codigo', null, ['id' => 'codigomunicipio', 'class' => 'form-control',
                            'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nombre">Nombre municipio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            {!! Form::text('nombre', null, ['id' => 'nombremunicipio', 'class' => 'form-control',
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


<!-- Modal de editar municipio-->
<div id="mdlEditarMunicipio" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Editar municipio</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="codigomunicipioeditar">Codigo municipio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </div>
                            {!! Form::text('codigomunicipioeditar', null, ['id' => 'codigomunicipioeditar',
                            'class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nombremunicipioeditar">Nombre municipio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            {!! Form::text('nombremunicipioeditar',null, ['id' => 'nombremunicipioeditar', 'class'
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
        <label for="selectedDepartamento" class="mtop16">Departamento:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-search-location"></i>
            </div>
            <select id="selectedDepartamento" name="selectedDepartamento" class="form-select" onchange="changePais()">
                <option value=''>Seleccione</option>
                @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id_departamento }}">{{ $departamento->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<br>

<table class="table" id="tblmunicipios">
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
        var idmunicipio = null;

        function changePais(){
            fetch('obtenermunicipios',{
                    method : 'POST',
                    body: JSON.stringify({texto : document.getElementById('selectedDepartamento').value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    $("#tblmunicipios .editable").empty();
                    for (let i in data.lista) {
                        $('table tbody').append(
                        '<tr class="editable"><td>' + data.lista[i].id_municipio+
                        '</td><td>' + data.lista[i].codigo +
                        '</td><td>' + data.lista[i].nombre +'</td><td>'+
                        '<a onclick="cargarDatosEditar('+data.lista[i].id_municipio+')" class="btn btn-primary"><i class="fas fa-edit"></i></a>'+
                        '<a onclick="eliminarMunicipio('+data.lista[i].id_municipio+')" class="btn btn-danger"><i class="fas fa-trash"></i></a>'+'</tr>');
                    }

                }).catch(error => console.error(error));

        }

        function cargarDatosEditar(idmunicipio){
            fetch('getMunicipioById',{
                    method : 'POST',
                    body: JSON.stringify({id :idmunicipio}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    document.getElementById('codigomunicipioeditar').value = data.municipio.codigo;
                    document.getElementById('nombremunicipioeditar').value = data.municipio.nombre;
                    this.idmunicipio = idmunicipio;
                    $("#mdlEditarMunicipio").modal("show");
                }).catch(error => console.error(error));

        }

        function actualizarRegistro(){
            fetch('updateMunicipio',{
                    method : 'POST',
                    body: JSON.stringify({
                        id : this.idmunicipio,
                        codigo:  document.getElementById('codigomunicipioeditar').value,
                        nombre:  document.getElementById('nombremunicipioeditar').value}),
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
                    $("#mdlEditarMunicipio").modal("hide");
                    changePais();
                }).catch(error => console.error(error));
        }

        function eliminarMunicipio(idmunicipio){
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
                   console.log(idmunicipio);
                   fetch('eliminarMunicipio',{
                    method : 'POST',
                    body: JSON.stringify({id :idmunicipio}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    if(data.success){
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Registro eliminado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    }else{
                        Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No es posible eliminar el municipio porque está relacionado a un barrio.'
                        })
                    }
                    changePais();
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
