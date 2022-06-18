@extends('frontend.plantilla')

@section('titulo','Cleanline')

@section('header')

@endsection

@section('contenido')

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Productos disponibles</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @foreach ($producto as $nvp)
                                <div class="product">
                                        <div class="product-img">
                                            <img src="{{ 'http://cleanadsi.com/api/get-img?path='.$nvp->imagen}}" >
                                        </div>
                                    <div class="product-body">

                                        <h3 class="product-name"><a href="{{route('detalle',$nvp->id_producto)}}">{{$nvp->nombre}}</a></h3>
                                        <h4 class="product-price">${{number_format($nvp->precio)}}</h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{route('carrito.añadir',$nvp->id_producto)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Añadir al Carrito</button></a>
                                    </div>

                                </div>
                                @endforeach
                                <!-- /product -->
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>


@endsection

@section('javascrits')
<script type="text/javascript">
    $(".cart-dropdown").hide();
</script>

{{-- SCRIPT PARA LA PANTALLA EN LA QUE SE ENCUENTRA ACTUALMENTE --}}

<script>
    $( document ).ready(navbarActive());
</script>

@endsection

@section('footer')

@endsection
