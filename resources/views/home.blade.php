@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@stop

@section('content')
<img class="logo" src="{{url('/static/images/logo.png')}}" alt="">

<br>

<div class="texto">
    <p>Productos de aseo</p>
    <p> Todo lo que necesitas para tu hogar y tu cuidado personal.</p>
 </div>

@stop

@section('css')
    <style>

        .logo{
            width: 20%;
            display: block;
            margin: 0px auto;
        }

       

        .texto{
            text-align: center;
            font-size: 2em;
        }
    </style>
@stop

@section('js')
    
@stop