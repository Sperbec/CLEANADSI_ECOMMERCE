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
                            {!! Form::text('codigo', null, ['id' => 'codigodepartamento', 'class' => 'form-control',
                            'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nombre">Nombre departamento:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            {!! Form::text('nombre', null, ['id' => 'nombredepartamento', 'class' => 'form-control',
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



<div id="mdlEditarDepartamento" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Editar departamento</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">




                <div class="row">
                    <div class="col-md-6">
                        <label for="codigodepartamentoeditar">Codigo departamento:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </div>
                            {!! Form::text('codigodepartamentoeditar', null, ['id' => 'codigodepartamentoeditar',
                            'class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nombredepartamentoeditar">Nombre departamento:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            {!! Form::text('nombredepartamentoeditar',null, ['id' => 'nombredepartamentoeditar', 'class'
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
        <label for="selectedPais" class="mtop16">País:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-globe-americas"></i>
            </div>
            <select id="selectedPais" name="selectedPais" class="form-select" onchange="changePais()">
                <option value=''>Seleccione</option>
                @foreach ($paises as $pais)
                <option value="{{ $pais->id_pais }}">{{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<br>

<table class="table" id="tbldepartamentos">
    <thead>
        <tr>
            <th scope="col">ID</th>
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
        var iddepartamento = null;

        function changePais(){
            
            fetch('obtenerdepartamentos',{
                    method : 'POST',
                    body: JSON.stringify({texto : document.getElementById('selectedPais').value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    $("#tbldepartamentos .editable").empty();
                    for (let i in data.lista) {
                        $('table tbody').append(
                        '<tr class="editable"><td>' + data.lista[i].id_departamento+ 
                        '</td><td>' + data.lista[i].nombre +'</td><td>'+ 
                        '<a onclick="cargarDatosEditar('+data.lista[i].id_departamento+')" class="btn btn-primary"><i class="fas fa-edit"></i></a>'+
                        '<a class="btn btn-danger"><i class="fas fa-trash"></i></a>'+'</tr>');
                    }
                   
                }).catch(error => console.error(error));
            
        }

       

        function cargarDatosEditar(iddepartamento){
            fetch('getDepartamentoById',{
                    method : 'POST',
                    body: JSON.stringify({id :iddepartamento}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    document.getElementById('codigodepartamentoeditar').value = data.departamento.codigo;
                    document.getElementById('nombredepartamentoeditar').value = data.departamento.nombre;
                    this.iddepartamento = iddepartamento;
                    $("#mdlEditarDepartamento").modal("show");
                }).catch(error => console.error(error));
          
        }

        function actualizarRegistro(){
            console.log(this.iddepartamento);
            fetch('update',{
                    method : 'POST',
                    body: JSON.stringify({
                        id : this.iddepartamento,
                        codigo:  document.getElementById('codigodepartamentoeditar').value,
                        nombre:  document.getElementById('nombredepartamentoeditar').value}),
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
                    $("#mdlEditarDepartamento").modal("hide");
                    changePais();
                }).catch(error => console.error(error));
        }
        
    
        @if (session('eliminado') == 'ok'  || session('guardado') == 'ok')
            Swal.fire({
            position: 'top-end',
            icon: 'success',
        
            @if (session('eliminado') == 'ok')
                title: 'Registro eliminado con éxito',
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