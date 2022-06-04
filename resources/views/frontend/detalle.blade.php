@extends('frontend.plantilla')

@section('titulo','Detalle de Producto')

@section('header')

@endsection

@section('contenido')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            
<!-- Product main img -->
<div class="col-md-5 col-md-push-2">
    <div id="product-main-img">
        <div class="product-preview">
            <img src="{{ '/static/images/productos/'.$producto->imagen}}"  alt="">
        </div>
    </div>
</div>
<!-- /Product main img -->
            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="{{ '/static/images/productos/'.$producto->imagen}}"  height="180px" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <img src="" alt="">
                    <h2 class="product-name">{{$producto->nombre}}</h2>
                    
                    <div>
                        <h3 class="product-price">${{number_format($producto->precio)}}</h3>
                        <span class="product-available">Cantidad disponible : {{$producto->cantidad_existencia}}</span>
                    </div>
                    
                    <div class="add-to-cart">
                        <a href="{{route('carrito.añadir',$producto->id_producto)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Añadir al Carrito</button></a>
                    </div>

                   
                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Descripción</a></li>
                        
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{$producto->descripcion}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection

@section('footer')
@endsection