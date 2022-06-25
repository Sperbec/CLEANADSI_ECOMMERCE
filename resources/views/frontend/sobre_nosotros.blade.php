<!--Utilizar la plantilla maestra en el login-->
@extends('frontend.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Sobre nosotros')


<link rel="stylesheet" href="fonts/icomoon/style.css">

<link rel="stylesheet" href="{{url('/static/css/owl.carousel.min.css')}}" href="css/owl.carousel.min.css">

<style>
    .content {
        margin: 0 auto;
        text-align: center;
        border-radius: 10px;
        width: 50%;
    }
</style>

@section('contenido')
<div class="content">
    <div class="section-title">
        <h3 class="title">Sobre nosotros</h3>
    </div>
    <p><strong>¿Quienes somos?</strong>
        <br>
        <br>
        <strong>ClineLine</strong> <br>
        Distribuimos productos de aseo personal y aseo hogar, de acuerdo a las necesidades de los clientes.
        <br>Creemos firmemente, que el uso de nuestros productos genera experiencias agradables
        al realizar las labores de aseo de forma rápida, eficiente y divertida. 
        </p>
    </p>
    <br>
    <br>
    <br>

</div>
@stop

@section('scripts')
@stop