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
        <strong>ClineLine</strong> estamos avalados por <strong>INVIMA</strong> para la producción y distribución de
        productos de aseo y desinfección. Además, estamos certificados bajo la norma <strong>ICONTEC ISO 9001: 2015
            (Sistema de Gestión de Calidad)</strong>; y de igual forma, los productos TDA, fabricados por nuestra
        empresa, cumplen la normatividad del <strong>Sistema de Gestión de Seguridad y Salud en el Trabajo (SG-SST) y
            Sistema Globalmente Armonizado (SGA)</strong>.
        Contamos con Sedes, puntos de venta y ejecutivos comerciales en las ciudades de Cali en el valle del cauca
    <p><strong>CleanLine</strong></p>
    </p>
    <br>
    <br>
    <br>

</div>
@stop

@section('scripts')
@stop