@extends('frontend.plantilla')

@section('title', 'Mis pedidos')

<style>
    .content {
        margin: 0 auto;
        text-align: center;
        border-radius: 10px;
        width: 50%;
    }

    .negrita{
        font-weight: bold; 
    }

</style>


@section('contenido')

<div class="content">
    <div class="section-title">
        <h3 class="title">Mis pedidos</h3>
    </div>
</div>



<table class="table table-hover" id="tblpedidos">
    <thead>
        <tr>
            <td class="negrita">Código</td>
            <td class="negrita">Fecha</td>
            <td class="negrita">Total</td>
            <td class="negrita">Estado</td>
            <td class="negrita">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->codigo }}</td>
            <td>{{ $pedido->fecha }}</td>
            <td>{{ $pedido->total }}</td>
            <td>{{ $pedido->estado }}</td>
            <td>
                <div class="row">

                    <div class="col-md-3">
                        <a id="btnVer"  class="btn btn-primary opts"  data-bs-placement="top"
                            title="Ver pedido">
                            <i class="fas fa-eye"></i></a>
                    </div>
                    
                </div>
              
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@stop

@section('scripts')

@stop