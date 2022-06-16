@extends('frontend.plantilla')

@section('titulo','Detalle de Compra')

@section('header')

@endsection


@section('contenido')

<div class=" table-responsive">
    <h2 class=" text-center">Datos del pedido</h2>
    <hr>
    <table class=" col-md-6 table table-striped table-hover tabled-bordered">
        <tr class="">
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        @php $total = 0 @endphp
        @php $subtotal = 0 @endphp
        @php $precios = 0 @endphp
        @foreach (session('carrito') as $detalle=>$d)

        @php $precio = $d['precio'] @endphp
        @php $subtotal = $d['precio'] * $d['quantity'] @endphp
        @php $precios = $d['precio'] @endphp
        @php $nombre = $d['nombre'] @endphp
        @php $total += $subtotal @endphp
        <tr>
            <td>{{$nombre}}</td>
            <td>{{number_format($precio) }}</td>
            <td>{{$d['quantity']}}</td>
            <td>{{number_format($subtotal)}}</td>

        </tr>
        @endforeach
        <tfoot>
            <tr class="text-right">
                <td>
                    <h3>
                        <div>
                            Total de la compra $ {{number_format($total)}}
                        </div>
                    </h3>

                </td>

            </tr>
            <tr>
                <td colspan="5" class="text-center">

                </td>
            </tr>
        </tfoot>

    </table>

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-7">
                    <!-- Shiping Details -->
                    <div class="shiping-details">
                        <div class="section-title">
                            <h3 class="title">Datos de facturación</h3>
                       </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="shiping-address">
                            <form action="{{route('factura.crear')}}" method="post">
                                @csrf
                                @foreach (session('carrito') as $detalle=>$d)
                                

                                @endforeach
                                <div class="Opcion Entrega">
                                    <div class="form-group">
                                        <select name="opcion_entregas" id="opcion_entregas" class="form-select" required >
                                            <option value='' >Seleccione método de envío</option>
                                            @foreach ($opcion_entregas as $opcion_entrega)
                                            <option  value="{{ $opcion_entrega->id_opcion }}">{{ $opcion_entrega->nombre
                                                }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="opcion_pagos" id="opcion_pagos" class="form-select" required onchange="
                                        mostrar(this.value);">
                                            <option  value=''>Seleccione forma de pago</option>
                                            @foreach ($opcion_pagos as $opcion_pago)
                                            <option value="{{ $opcion_pago->id_opcion }}">{{ $opcion_pago->nombre }}
                                                
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    

                                </div>
                        </div>
                    </div>
                    <!-- /Shiping Details -->

                    <!-- Order notes -->
                    <div class="order-notes">
                        <textarea name="comentario" class="input" placeholder="Comentario"></textarea>
                    </div>
                    <!-- /Order notes -->

                </div>


            </div>
            <!-- /row -->
        </div>

        
        <!-- /container -->
        <div class="text-center" style="display: none">
            <button class="btn btn-primary" type="submit" > Pagar en Efectivo</button>
            
        </div>
        <div class="text-center" id="paypal-button-container" ></div>
    </div>
    <!-- /SECTION -->
</div>

{{-- {{dd(value)}} --}}

@endsection

@section('scripts')
<script>
    function mostrar(value)
    {
        if (value ='' ) {
            document.getElementById('paypal-button-container').style.display = 'none';
             /* style.display = 'none' */
        } 
    }
</script>
<script>
    
    paypal.Buttons({
   createOrder: function(data, actions) {
       return actions.order.create({
           // ...
           purchase_units: [{
               amount: {
                   value: {{$total 
               }}}
           }],
       });
   },
   onApprove: function(data, actions) {
       // ...
   }
}).render('#paypal-button-container');
</script>
@endsection

@section('footer')

@endsection