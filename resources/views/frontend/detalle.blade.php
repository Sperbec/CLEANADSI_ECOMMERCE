
@extends('frontend.plantilla')
@section('titulo','detelle')
@section('header')

@endsection

@section('contenido')
<div class="cabezera"><h1>Detalles</h1></div>
<div class="contenedor-detalle">
    <div class="filas">
        <section id="imagen" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <img class="col-lg-12 col-md-12 col-sm-12 col-xs-12" src="../imagenes/detergente.jpg" alt="">
        </section>
        <section id="info" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
            <br>
            <h1>$ 32.062 </h1>
            <br>
            <p>TDA Suavizante de telas deja sus prendas con más aroma, más frescura y una sensación de suavidad irresistible. Sus agentes acondicionadores disminuye la aparición de arrugas y facilita el planchado. Sus aromas frescos y suaves permanecen por más tiempo. Aroma a Vainilla.
                Contenido: 5000 cc</p>
                <br>
                <div id="contador">
                    1
                </div>
                <button>Añadir al Carrito</button>

        </section>
    </div>
</div>


@endsection

@section('footer')