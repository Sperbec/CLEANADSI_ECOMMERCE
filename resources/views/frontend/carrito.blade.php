@extends('frontend.plantilla')

@section('titulo','Carrito de Compras')

@section('header')

@endsection


@section('contenido')


<table id="cart" class=" table table-hover table-condensed">
    @if(count($carrito))
    <thead>
        <div class="section-title text-center">
            <h3 class="title">Mi Orden</h3>
        </div>
        <tr>
            <th style="width:50%">Producto</th>
            <th class="hidden-xs" style="width:10%">Precio</th>
            <th style="width:8%">Cantidad</th>
            <th style="width:22%" class="text-center ">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        
        @php $total = 0 @endphp
        @php $precio = 0 @endphp
        @php $subtotal = 0 @endphp
        @if($carrito)
            @foreach($carrito as $id=> $details)
                @php $total += $details['precio'] * $details['quantity'] @endphp
                @php $precio = $details['precio'] @endphp
                @php $subtotal = $precio * $details['quantity'] @endphp
                <tr data-id="{{ $details['id']}}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 "><img src="{{ $details['imagen'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['nombre'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td class="hidden-xs" data-th="Price">${{ number_format($precio) }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" width="50px" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ number_format($subtotal) }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong class="order-total">Total<div style="color:#227093"> ${{ number_format($total) }}</div></strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <div>
                    <a href="{{route('carrito.compra')}}" class="col-md-2 primary-btn order-submit">Ver Detalle de Compra</a>
                    <a href="{{ url('/') }}" class="btn btn-success"><i class="fa fa-angle-left"></i> Continuar Comprando</a>

                </div> 
            </td>
        </tr>
    </tfoot>
    @else
    <h1 class="text-center">El Carrito Esta Vacio</h1>
    @endif
</table>
@endsection

@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('carrito.update') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Esta seguro de Eliminar Este Producto?")) {
            $.ajax({
                url: '{{ route('carrito.eliminar') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection

@section('footer')

@endsection
