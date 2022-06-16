@extends('frontend.plantilla')

@section('titulo','Carrito de Compras')

@section('header')

@endsection

<style>
    .content {
        margin: 0 auto;
        text-align: center;
        border-radius: 10px;
        width: 50%;
    }
</style>


@section('contenido')


<table class="container" id="cart" class=" table table-hover table-condensed">
    @if($carrito != null and count($carrito))
    <thead>
        <div class="section-title text-center">
            <h3 class="title">Mi orden</h3>
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
                    <div class="col-sm-3 "><img src="{{ 'http://cleanadsi.com/api/get-img?path='.$details['imagen']}}" width="100" height="100"
                            class="img-responsive" /></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $details['nombre'] }}</h4>
                    </div>
                </div>
            </td>
            <td class="hidden-xs" data-th="Price">${{ number_format($precio) }}</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity'] }}" width="50px"
                    class="form-control quantity update-cart" onKeyPress="return soloNumeros(event)"/>
            </td>
            <td data-th="Subtotal" class="text-center">${{ number_format($subtotal) }}</td>
            <td class="actions" data-th="">
                <form class="formEliminar" action="{{ route('carrito.eliminar') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$details['id']}}">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong class="order-total">Total<div style="color:#227093"> ${{ number_format($total) }}</div>
                        </strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <div>
                    <a href="{{ url('/') }}" class="btn btn-success"><i class="fa fa-angle-double-left"></i> Continuar
                        comprando</a>
                    <a href="{{route('carrito.compra')}}" class="btn btn-primary"><i class="fa fa-angle-double-right"></i> Ver detalle de la
                        compra</a>

                </div>
            </td>
        </tr>
    </tfoot>
    @else
    <h1 class="text-center">El carrito está vacío</h1>
    <br>
    <div class="content">
        <a href="{{url('/')}}">Continuar comprando</a>
    </div>
    @endif
</table>
@endsection

@section('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    $('.formEliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Seguro de eliminar este registro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });

        function soloNumeros(e){
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }

</script>
@endsection

@section('footer')

@endsection
