@extends('frontend.plantilla')

@section('titulo','Carrito de compras')

@section('header')
@endsection

@section('contenido')

<h1> Carrito de Compras</h1>

<main class="contenedor-carrito">
    <table class="lista-carrito">
        <tr>
            <th>Producto</th>
            <th></th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>
        <tr>
            <td><img class="img-card" src="../imagenes/jabon protex.jpg" alt=""></td>
            <td></td>
            <td></td>
            <td>1</td>
        </tr>
    </table>
    <aside>
        <table>
            <tr><h3>Subtotal</h3>
                <td>$ 2.900</td>
            
            <h3>Total</h3>
                <td>$ 2.900</td>
            </tr>
        </table>
    </aside>
</main>

<a href="{{url('/frontend/inicio')}}" type="button" class="btn btn-primary">Seguir comprando</a>

@endsection


@section('footer')
@endsection
