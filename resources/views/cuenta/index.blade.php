@extends('frontend.plantilla')

@section('title', 'Mi cuenta')

<link rel="stylesheet" href="{{url('/static/css/micuenta.css')}}">


@section('contenido')
@error('nombres_cuenta')
<small><span style="color: red">{{$message}}</span></small>
<br>
@enderror

@error('apellidos_cuenta')
<small><span style="color: red">{{$message}}</span></small>
@enderror

@error('email_cuenta')
<small><span style="color: red">{{$message}}</span></small>
@enderror

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
                            <label for="nombres_cuenta" style="float: left;">Nombres:</label>
                            {!! Form::text('nombres_cuenta', $usuario->nombres, ['id' => 'nombres_cuenta', 'class' =>
                            'form-control','required']) !!}
                        </div>

                        <div class="col-md-6">
                            <label for="apellidos_cuenta" style="float: left;">Apellidos:</label>
                            {!! Form::text('apellidos_cuenta', $usuario->apellidos, ['id' => 'apellidos_cuenta', 'class'
                            =>
                            'form-control',
                            'required']) !!}
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="tipo_documento" style="float: left;">Tipo de documento:</label>
                            <select id='tipo_documento' name="tipo_documento" class="form-control" required>
                                <option value=''>Seleccione</option>
                                @foreach ($tipos_documentos as $tipodocumento)
                                <option value="{{ $tipodocumento->id_opcion }}" {{$tipodocumento->id_opcion ==
                                    $usuario->id_opcion_tipo_documento ? 'selected' : '' }}>
                                    {{$tipodocumento->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="numero_documento" style="float: left;">Número de documento:</label>
                            {!! Form::number('numero_documento', $usuario->numero_documento,
                            ['class' => 'form-control', 'required', 'id' => 'numero_documento', 'min' => '0000000000',
                            'max' => '9999999999']) !!}
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="tipo_genero" style="float: left;">Género:</label>
                            <select id="tipo_genero" name="tipo_genero" class="form-control" required>
                                <option value=''>Seleccione</option>
                                @foreach ($generos as $genero)
                                <option value="{{ $genero->id_opcion }}" {{ $genero->id_opcion ==
                                    $usuario->id_opcion_genero ? 'selected' : '' }}>
                                    {{ $genero->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_nacimiento" style="float: left;">Fecha de nacimiento:</label>
                            {!! Form::date('fecha_nacimiento', $usuario->natalicio, ['id' => 'fecha_nacimiento', 'class'
                            => 'form-control', 'required']) !!}
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="email_cuenta" style="float: left;">Correo principal:</label>
                            {!! Form::text('email_cuenta', $usuario->email, ['id' => 'email_cuenta', 'class' =>
                            'form-control',
                            'required']) !!}
                        </div>

                    </div>


                    <hr>

                    <div class="row" style="height: 20px">
                        <div class="col-md-6">
                        </div>

                        <div class="col-md-6" style="text-align: right">
                            <button id="btnEditarInfoPersonal" type="submit" class="btn btn-success">
                                <i class="fas fa-edit"></i> Editar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cerrar</button>
                        </div>
                    </div>

                </form>
            </div>
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
                            {!! Form::password('contraseniaactual', ['id' => 'contraseniaactual', 'class' =>
                            'form-control', 'required', 'minlength' => '8']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="contraseniaactual" class="mtop16">Contraseña nueva:</label>
                            {!! Form::password('contrasenianueva', ['id' => 'contrasenianueva', 'class' =>
                            'form-control', 'required', 'minlength' => '8']) !!}
                        </div>

                        <div class="col-md-6">
                            <label for="contraseniaactual" class="mtop16">Confirmar contraseña:</label>
                            {!! Form::password('confirmacioncontrasenia', ['id' => 'confirmacioncontrasenia',
                            'class' => 'form-control', 'required', 'minlength' => '8']) !!}
                        </div>
                    </div>

                    <br>
                    <div class="password-show">
                        <input id="show_password" class="form-check-input" type="checkbox" onclick="mostrarPassword()">
                        <label class="form-check-label" for="show_password">Mostrar contraseñas</label>
                    </div>


                    <hr>

                    <div class="row" style="height: 20px">
                        <div class="col-md-6">
                        </div>

                        <div class="col-md-6" style="text-align: right">
                            <button id="btnGuardarCambioContrasenia" type="submit" class="btn btn-success">
                                <i class="fas fa-lock"></i> Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cerrar</button>
                        </div>
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
                        <div class="col-md-6">
                            <label for="tipocontacto" >Tipo de contacto:</label>
                            <select id="tipocontacto" name="tipocontacto" class="form-control" required onchange="
                                    habilitar(this.value);">
                                <option value=''>Seleccione</option>
                                @foreach ($tipos_contactos as $tipo_contacto)
                                <option value="{{ $tipo_contacto->id_opcion }}">{{ $tipo_contacto->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <label for="contacto">Contacto:</label>
                            {!! Form::text('contacto', null, ['id' => 'contacto', 'class' =>
                            'form-control','required']) !!}
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <label for="municipio" >Municipio:</label>
                            <select id="municipio" name="municipio" class="form-control" disabled onchange="
                                changeMunicipio(this.value);">
                                <option value=''>Seleccione</option>
                                @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id_municipio }}">{{ $municipio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="barrio" >Barrio:</label>
                            <select id="barrio" name="barrio" class="form-control" disabled></select>
                        </div>

                    </div>


                    <hr>

                    <div class="row" style="height: 20px">
                        <div class="col-md-6">
                        </div>

                        <div class="col-md-6" style="text-align: right">
                            <button id="btnGuardarDatosContacto" type="submit" class="btn btn-success">
                                <i class="fas fa-paper-plane"></i> Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cerrar</button>
                        </div>
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

                <form action="{{route('updatePersonaContacto')}}" method="post">
                    @csrf

                    <input id="hiddenidpersonacontacto" name="hiddenidpersonacontacto" type="hidden">


                    <div class="row">
                        <div class="col-md-6">
                            <label for="tipoContactoEditar" >Tipo de contacto:</label>
                            <select id="tipoContactoEditar" name="tipoContactoEditar" class="form-control" required 
                                onchange="changeTipoContactoEditar(this.value);">
                                <option value=''>Seleccione</option>
                                @foreach ($tipos_contactos as $tipo_contacto)
                                    <option value="{{ $tipo_contacto->id_opcion }}">{{ $tipo_contacto->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="contactoEditar">Contacto:</label>
                            {!! Form::text('contactoEditar', null, ['id' => 'contactoEditar', 'class' =>
                            'form-control','required']) !!}
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <label for="municipioEditar">Municipio:</label>
                            <select id="municipioEditar" name="municipioEditar" class="form-control" disabled onchange="
                                changeMunicipioEditar()">
                                <option value=''>Seleccione</option>
                                @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id_municipio }}">{{ $municipio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="barrioEditar">Barrio:</label>
                            <select id="barrioEditar" name="barrioEditar" class="form-control" disabled></select>
                        </div>

                    </div>

                    <hr>

                    <div class="row" style="height: 20px">
                        <div class="col-md-6">
                        </div>

                        <div class="col-md-6" style="text-align: right">
                            <button id="btnEditarDatosContacto" type="submit" class="btn btn-success">
                                <i class="fas fa-edit"></i> Editar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fas fa-times"></i> Cerrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>




<div class="content">
    <div class="section-title">
        <h3 class="title">Mi cuenta</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3 class="subtitle">Información de la cuenta</h3>
        </div>
        <div class="col-md-6">

            <a id="btnEditarDatosPersonales" data-toggle="modal" data-target="#mdlEditarDatosPersonales"
                class="btn btn-primary ">
                <i class="fas fa-edit"></i> Editar</a>

            <a id="btnCambiarContraseña" data-toggle="modal" data-target="#mdlCambiarContraseña"
                class="btn btn-primary ">
                <i class="fas fa-lock"></i> Cambiar contraseña</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label class="subtitle">Nombres y apellidos:</label>
            <label class="text"> {{$usuario->nombres}} {{$usuario->apellidos}}</label>
        </div>
        <div class="col-md-6">
            <label class="subtitle">Correo principal: </label>
            <label class="text">{{$usuario->email}}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label class="subtitle">{{$usuario->tipodocumento}}: </label>
            <label class="text">{{$usuario->numero_documento}}</label>
        </div>
        <div class="col-md-6">
            <label class="subtitle">Género: </label>
            <label class="text">{{$usuario->tipogenero}}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label class="subtitle">Fecha nacimiento: </label>
            <label class="text">{{$usuario->natalicio}}</label>
        </div>
    </div>


    <br>

   
    

</div>

<div class="row">
    <div class="col-md-6">
        <h3 class="subtitle">Datos de contacto</h3>
    </div>

    <div class="col-md-6">
        <a id="btnAgregarDatosContacto" data-toggle="modal" data-target="#mdlAgregarDatosContacto"
            class="btn btn-primary">
            <i class="fas fa-plus"></i> Agregar datos de contacto</a>
    </div>
</div>

<hr>



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


@section('scripts')
<script type="text/javascript">

    window.CSRF_TOKEN = '{{ csrf_token() }}';

    var idpersonacontacto = null;
    var idbarrio =null;

    function mostrarPassword(){
        var contraseniaactual = document.getElementById("contraseniaactual");
        var contrasenianueva = document.getElementById("contrasenianueva");
        var confirmacioncontrasenia = document.getElementById("confirmacioncontrasenia");


        if(contraseniaactual.type == "password" || contrasenianueva.type == "password" || confirmacioncontrasenia.type == "password"){
            contraseniaactual.type = "text";
            contrasenianueva.type = "text";
            confirmacioncontrasenia.type = "text";
        }else{
            contraseniaactual.type = "password";
            contrasenianueva.type = "password";
            confirmacioncontrasenia.type = "password";
        }
            
    } 

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

    function changeMunicipio(value) {
        fetch('obtenerbarrios',{
            method : 'POST',
            body: JSON.stringify({texto : document.getElementById('municipio').value}),
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
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
    }

    function cargarDatosEditar(idpersonacontacto){
        fetch('getPersonaContactoById',{
                method : 'POST',
                body: JSON.stringify({id :idpersonacontacto}),
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.CSRF_TOKEN
                }
            }).then(response =>{
                return response.json()
            }).then( data =>{
                document.getElementById('hiddenidpersonacontacto').value = idpersonacontacto;
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

    function changeMunicipioEditar(){
        fetch('obtenerbarrios',{
            method : 'POST',
            body: JSON.stringify({texto : document.getElementById('municipioEditar').value}),
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
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

    function changeTipoContactoEditar(value){
        if(document.getElementById('tipoContactoEditar').value == 10){
            document.getElementById("municipioEditar").disabled = false;
            document.getElementById("barrioEditar").disabled = false;
        }else{
            document.getElementById('municipioEditar').value = '';
            document.getElementById('barrioEditar').value = '';
            document.getElementById("municipioEditar").disabled = true;
            document.getElementById("barrioEditar").disabled = true;
        }
    }

     //Modal de datos de contacto
     $("#btnAgregarDatosContacto").on("click", function() {
        document.getElementById('tipocontacto').value = '';
        document.getElementById('contacto').value = '';
        document.getElementById('municipio').value = '';
        document.getElementById('barrio').value = '';
       
    });

    //Modal de cambiar contraseña
    $("#btnCambiarContraseña").on("click", function() {
        document.getElementById('contraseniaactual').value = '';
        document.getElementById('contrasenianueva').value = '';
        document.getElementById('confirmacioncontrasenia').value = '';
    });

</script>

@stop