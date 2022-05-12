@extends('adminlte::page')

@section('title', 'Mi cuenta')

@section('content_header')
<div class="row">
    <h1>Mi cuenta</h1>
</div>

@stop

@section('content')

<!-- Modal editar datos personales-->
<div id="mdlEditarDatosPersonales" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Editar datos personales</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <form action="{{route('micuenta.update', $usuario->id_usuario)}}" method="post">
                    @csrf
                    @method('PUT')


                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombres">Nombres:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="far fa-keyboard"></i>
                                </div>
                                {!! Form::text('nombres', $usuario->nombres, ['id' => 'nombres', 'class' =>
                                'form-control','required']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="apellidos">Apellidos:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-keyboard"></i>
                                </div>
                                {!! Form::text('apellidos', $usuario->apellidos, ['id' => 'apellidos', 'class' =>
                                'form-control',
                                'required']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Correo:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="far fa-envelope-open"></i>
                                </div>
                                {!! Form::text('email', $usuario->email, ['id' => 'email', 'class' => 'form-control',
                                'required']) !!}
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button id="btnEditarInfoPersonal" type="submit" class="btn btn-success">
                    <i class="fas fa-edit"></i> Editar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal editar contraseña-->
<div id="mdlCambiarContraseña" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Cambiar contraseña</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('changePassword', $usuario->id_usuario) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="contraseniaactual" class="mtop16">Contraseña actual:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                                {!! Form::password('contraseniaactual', ['id' => 'contraseniaactual', 'class' =>
                                'form-control', 'required', 'minlength' => '8']) !!}
                                <div class="input-group-append">
                                    <button id="show_passwordA" class="btn btn-secondary" type="button"
                                        onclick="mostrarPasswordA()">
                                        <span class="fa fa-eye-slash iconA"></span> </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="contrasenianueva" class="mtop16">Contraseña nueva:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                                {!! Form::password('contrasenianueva', ['id' => 'contrasenianueva', 'class' =>
                                'form-control', 'required', 'minlength' => '8']) !!}
                                <div class="input-group-append">
                                    <button id="show_passwordN" class="btn btn-secondary" type="button"
                                        onclick="mostrarPasswordN()">
                                        <span class="fa fa-eye-slash iconN"></span> </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="confirmacioncontrasenia" class="mtop16">Confirmación nueva contraseña:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                                {!! Form::password('confirmacioncontrasenia', ['id' => 'confirmacioncontrasenia',
                                'class' => 'form-control', 'required', 'minlength' => '8']) !!}
                                <div class="input-group-append">
                                    <button id="show_passwordCN" class="btn btn-secondary" type="button"
                                        onclick="mostrarPasswordCN()">
                                        <span class="fa fa-eye-slash iconCN"></span> </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="btnGuardarCambioContrase" type="submit" class="btn btn-success">
                            <i class="fas fa-lock"></i> Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times"></i> Cerrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal datos de contacto-->
<div id="mdlAgregarDatosContacto" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Agregar datos de contacto</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('datosContacto', $usuario->id_usuario) }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <label for="tipocontacto">Tipo de contacto:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-hand-pointer"></i>
                                </div>
                                <select id="tipocontacto" name="tipocontacto" class="form-select" required onchange="
                                    habilitar(this.value);">
                                    <option value=''>Seleccione</option>
                                    @foreach ($tipos_contactos as $tipo_contacto)
                                    <option value="{{ $tipo_contacto->id_opcion }}">{{ $tipo_contacto->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="contacto">Contacto:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="far fa-keyboard"></i>
                                </div>
                                {!! Form::text('contacto', null, ['id' => 'contacto', 'class' =>
                                'form-control','required']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="municipio">Municipio:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <select id="municipio" name="municipio" class="form-select" disabled>
                                    <option value=''>Seleccione</option>
                                    @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id_municipio }}">{{ $municipio->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label for="barrio">Barrio:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-map-marked"></i>
                                </div>
                                <select id="barrio" name="barrio" class="form-select" disabled></select>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button id="btnGuardarDatosContacto" type="submit" class="btn btn-success">
                            <i class="fas fa-paper-plane"></i> Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times"></i> Cerrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal editar de contacto-->
<div id="mdlEditarDatosContacto" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Editar datos de contacto</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">


                <div class="row">
                    <div class="col-md-12">
                        <label for="tipoContactoEditar">Tipo de contacto:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-hand-pointer"></i>
                            </div>
                            <select id="tipoContactoEditar" name="tipoContactoEditar" class="form-select" required
                                onchange="
                                    habilitar(this.value);">
                                <option value=''>Seleccione</option>
                                @foreach ($tipos_contactos as $tipo_contacto)
                                <option value="{{ $tipo_contacto->id_opcion }}">{{ $tipo_contacto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="contactoEditar">Contacto:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </div>
                            {!! Form::text('contactoEditar', null, ['id' => 'contactoEditar', 'class' =>
                            'form-control','required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="municipioEditar">Municipio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <select id="municipioEditar" name="municipioEditar" class="form-select" disabled onchange="changeMunicipioEditar()">
                                <option value=''>Seleccione</option>
                                @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id_municipio }}">{{ $municipio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="barrioEditar">Barrio:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-map-marked"></i>
                            </div>
                            <select id="barrioEditar" name="barrioEditar" class="form-select" disabled></select>
                        </div>
                    </div>

                </div>


                <div class="modal-footer">
                    <button onclick="actualizarRegistro()" id="btnEditarDatosContacto" type="submit"
                        class="btn btn-success">
                        <i class="fas fa-edit"></i> Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cerrar</button>
                </div>


            </div>
        </div>
    </div>
</div>





<h4>Información de la cuenta</h4>
<hr>
<h5>Datos personales</h5>
<div class="row">
    <div class="col-md-6">
        <label>{{$usuario->nombres}} {{$usuario->apellidos}}</label>
    </div>
    <div class="col-md-6">
        <label>{{$usuario->email}}</label>
    </div>
</div>


<div>
    <a id="btnEditarDatosPersonales" data-toggle="modal" data-target="#mdlEditarDatosPersonales"
        class="btn btn-primary ">
        <i class="fas fa-edit"></i> Editar</a>

    <a id="btnCambiarContraseña" data-toggle="modal" data-target="#mdlCambiarContraseña" class="btn btn-secondary ">
        <i class="fas fa-lock"></i> Cambiar contraseña</a>
</div>

<br>
<h4>Datos de contacto</h4>
<hr>
<a id="btnAgregarDatosContacto" data-toggle="modal" data-target="#mdlAgregarDatosContacto" class="btn btn-primary">
    <i class="fas fa-plus"></i> Agregar datos de contacto</a>

<br><br>

<table class="table table-hover" id="tbldatoscontacto">
    <thead>
        <tr>
            <td class="negrita">Opcion contacto</td>
            <td class="negrita">Valor</td>
            <td class="negrita">Barrio</td>
            <td class="negrita">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos_contacto as $contacto)
        <tr>
            <td>{{ $contacto->opcioncontacto }}</td>
            <td>{{ $contacto->valor }}</td>
            <td>{{ $contacto->nombrebarrio }}</td>
            <td>
                <div class="row">

                    <div class="col-md-3">
                        <a id="btnEditar" onclick="cargarDatosEditar('{{$contacto->id_persona_contacto}}')"
                            class="btn btn-primary opts" data-toggle="tooltip" data-bs-placement="top"
                            title="Editar datos de contacto">
                            <i class="fas fa-edit"></i></a>
                    </div>
                    <div class="col-md-2">
                        <form class="formEliminar"
                            action="{{ route('micuenta.destroy', $contacto->id_persona_contacto) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<style>
    .negrita {
        font-weight: bold;
    }
</style>

<!-- Para importar bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@stop

@section('js')
<script>
    var idpersonacontacto = null;
    var idbarrio =null;
        $(document).ready(function() {
            $('#tbldatoscontacto').DataTable({
                "language": idioma_espanol,
                pageLength : 5,
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, "Todos"]]
            });
        });

        function cargarDatosEditar(idpersonacontacto){
            fetch('getPersonaContactoById',{
                    method : 'POST',
                    body: JSON.stringify({id :idpersonacontacto}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    document.getElementById('tipoContactoEditar').value = data.personacontacto.id_opcion_contacto;
                    document.getElementById('contactoEditar').value = data.personacontacto.valor;

                    if(data.personacontacto.id_opcion_contacto == 10){
                        document.getElementById("municipioEditar").disabled = false;
                        document.getElementById("barrioEditar").disabled = false;
                        document.getElementById('municipioEditar').value = data.municipio;
                        changeMunicipioEditar();
                        this.idbarrio = data.personacontacto.id_barrio;
                    }else{
                        document.getElementById('municipioEditar').value = '';
                        document.getElementById('barrioEditar').value = '';
                        document.getElementById("municipioEditar").disabled = true;
                        document.getElementById("barrioEditar").disabled = true;
                        this.idbarrio = null;
                    }

                    this.idpersonacontacto = idpersonacontacto;
                    $("#mdlEditarDatosContacto").modal("show");
                }).catch(error => console.error(error));
        }

        function actualizarRegistro(){
            console.log('Actualizar');
        }


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



        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

        document.getElementById('municipio').addEventListener('change',(e)=>{
            fetch('obtenerbarrios',{
                method : 'POST',
                body: JSON.stringify({texto : document.getElementById('municipio').value}),
                headers:{
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response =>{
                return response.json()
            }).then( data =>{
                var opciones ="<option value=''>Seleccione</option>";
                for (let i in data.lista) {
                opciones+= '<option value="'+data.lista[i].id_barrio+'">'+data.lista[i].nombre+'</option>';
                }
                document.getElementById("barrio").innerHTML = opciones;
            }).catch(error =>console.error(error));
        })

        function changeMunicipioEditar(){
            fetch('obtenerbarrios',{
                method : 'POST',
                body: JSON.stringify({texto : document.getElementById('municipioEditar').value}),
                headers:{
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response =>{
                return response.json()
            }).then( data =>{
                var opciones ="<option value=''>Seleccione</option>";
                for (let i in data.lista) {
                    opciones+= '<option value="'+data.lista[i].id_barrio+'">'+data.lista[i].nombre+'</option>';
                }
                document.getElementById("barrioEditar").innerHTML = opciones;

                if(this.idbarrio != null){
                    document.getElementById('barrioEditar').value = this.idbarrio;
                }

            }).catch(error =>console.error(error));
        }


        @if ( session('editado') == 'ok' )
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Registro editado con éxito',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

        //Modal de cambiar contraseña
        $("#btnCambiarContraseña").on("click", function() {
            document.getElementById('contraseniaactual').value = '';
            document.getElementById('contrasenianueva').value = '';
            document.getElementById('confirmacioncontrasenia').value = '';
            $("#mdlCambiarContraseña").modal("show");
        });

        //Modal de datos de contacto
        $("#btnAgregarDatosContacto").on("click", function() {
            document.getElementById('tipocontacto').value = '';
            document.getElementById('contacto').value = '';
            document.getElementById('municipio').value = '';
            document.getElementById('barrio').value = '';
            $("#mdlAgregarDatosContacto").modal("show");
        });


        function mostrarPasswordA(){
            var cambio = document.getElementById("contraseniaactual");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.iconA').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.iconA').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }

        }

        function mostrarPasswordN(){
            var cambio = document.getElementById("contrasenianueva");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.iconN').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.iconN').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }

        }

        function mostrarPasswordCN(){
            var cambio = document.getElementById("confirmacioncontrasenia");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.iconCN').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.iconCN').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }

        }

        @if (session('errorContraseñaActual') == 'ok' || session('errorConfirmacionContraseñas') == 'ok' )
            Swal.fire({
            icon: 'error',
            title: 'Error',
            @if (session('errorContraseñaActual') == 'ok')
                text: 'No es posible cambiar la contraseña. Su contraseña actual no es correcta.'
            @endif

            @if (session('errorConfirmacionContraseñas') == 'ok')
                text: 'No es posible cambiar la contraseña. Las contraseñas no coinciden.'
            @endif

            })
        @endif

        @if (session('editado') == 'ok')
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Contraseña editada con éxito',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

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

        function habilitar(value) {
            if (value == "10") {
                document.getElementById("municipio").disabled = false;
                document.getElementById("barrio").disabled = false;
            }else{
                document.getElementById('municipio').value = '';
                document.getElementById('barrio').value = '';
                document.getElementById("municipio").disabled = true;
                document.getElementById("barrio").disabled = true;
            }
        }

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