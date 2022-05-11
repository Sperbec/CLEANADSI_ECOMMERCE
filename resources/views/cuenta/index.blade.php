@extends('adminlte::page')

@section('title', 'Mi cuenta')

@section('content_header')
<div class="row">
    <h1>Mi cuenta</h1>
</div>

@stop

@section('content')

<!-- Modal editar datos contacto-->
<div id="mdlEditarDatosContacto" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Editar datos de contacto</h3>
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
                            {!! Form::text('nombres', $usuario->nombres, ['id' => 'nombres', 'class' => 'form-control','required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="apellidos">Apellidos:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            {!! Form::text('apellidos', $usuario->apellidos, ['id' => 'apellidos', 'class' => 'form-control',
                            'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="email">Correo:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            {!! Form::text('email',  $usuario->email, ['id' => 'email', 'class' => 'form-control',
                            'required']) !!}
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button id="agregarItem" type="submit" class="btn btn-success">
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

                <form action="" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <label for="contraseñaactual">Contraseña actual:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </div>
                            {!! Form::password('contraseñaactual', null, ['id' => 'contraseñaactual', 'class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="contraseñanueva">Contraseña nueva:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="far fa-keyboard"></i>
                            </div>
                            {!! Form::password('contraseñanueva', null, ['id' => 'contraseñanueva', 'class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="confirmacioncontraseña">Confirmar nueva contraseña:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            {!! Form::password('confirmacioncontraseña',null, ['id' => 'confirmacioncontraseña', 'class' => 'form-control',
                            'required']) !!}
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button id="agregarItem" type="submit" class="btn btn-success">
                    <i class="fas fa-lock"></i> Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar</button>
            </div>

             </form>
        </div>
    </div>
</div>



<h4>Información de la cuenta</h4>
<hr>
<h5>Datos de contacto</h5>
<label>{{$usuario->nombres}} {{$usuario->apellidos}}</label><br>
<label>{{$usuario->email}}</label><br>
<div>
    <a id="btnEditarDatosContacto" data-toggle="modal" data-target="#mdlEditarDatosContacto" class="btn btn-primary ">
        <i class="fas fa-edit"></i> Editar</a>

    <a id="btnCambiarContraseña" data-toggle="modal" data-target="#mdlCambiarContraseña" class="btn btn-secondary ">
            <i class="fas fa-lock"></i> Cambiar contraseña</a>
    

</div>

<br><br>


<h4>Libreta de direcciones</h4>
<hr>


<div>
    <h5>Dirección de envío predeterminada</h5>
    <label>{{$usuario->nombres}} {{$usuario->apellidos}}</label><br>

    @if ($usuario->numerotelefono != '')
    <label>{{$usuario->numerotelefono}}</label><br>
    @endif

    @if ($usuario->direccion != '')
    <label>{{$usuario->direccion}}</label><br>
    @endif

    @if ($usuario->ciudad != '')
    <label>{{$usuario->ciudad}}</label><br>
    @endif

    @if ($usuario->pais != '')
    <label>{{$usuario->pais}}</label><br>
    @endif

    <a class="btn btn-primary opts" href="" data-toggle="tooltip" data-bs-placement="top" title="Cambiar contraseña">
        <i class="fas fa-edit"></i> Editar datos de contacto</a>
</div>


@stop

@section('css')

@stop

@section('js')
<script>
     @if ( session('editado') == 'ok' )
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Registro editado con éxito',
            showConfirmButton: false,
            timer: 1500
            })
    @endif
</script>
@stop