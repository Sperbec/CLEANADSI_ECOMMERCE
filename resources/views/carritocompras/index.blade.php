@extends('frontend.plantilla')

@section('titulo','Carrito de compras')

@section('header')
@endsection

@section('contenido')

<h1>No tienes productos agregados a tu carrito de compras</h1>
<a href="{{url('/frontend/inicio')}}" type="button" class="btn btn-primary">Seguir comprando</a>

@endsection

@section('css')
 <!-- Para importar bootstrap -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@stop

@section('footer')
@stop
