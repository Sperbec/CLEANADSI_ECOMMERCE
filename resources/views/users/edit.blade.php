@extends('adminlte::page')

@section('title', 'Asignar rol')

@section('content_header')
<div class="row">
    <h1>Asignar un rol</h1>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre</p>
        <p class="form-control">{{$usuario->nombres}}</p>

        <h2 class="h5">Listado de roles</h2>

        {!! Form::model($usuario, ['route' => ['users.update', $usuario->id_usuario], 'method' => 'put']) !!}
            @foreach ($roles as $role)
            <div>
                <label>
                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                    {{$role->name}}
                </label>
            </div>
            @endforeach

            {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}

        {!! Form::close() !!}



    </div>
</div>
@stop

@section('css')


@stop

@section('js')
 
@stop