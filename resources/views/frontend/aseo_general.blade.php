@extends('frontend.plantilla')

@section('titulo','Aseo General')

@section('header')

@endsection

@section('contenido')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            

            <!-- STORE -->
            <div id="store" class="col-md-12">
               

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    @foreach($producto_aseo_general as $pag)
                    <div class="col-md-4 col-xs-6">
                        
                        <div class="product">
                            <div class="product-img">
                                <img src="/imagen/{{$pag->imagen}}" alt="">
                                <div class="product-label">
                                </div>
                            </div>
                            <div class="product-body">
                                
                                <p class="product-category">Aseo General</p>
                                <h3 class="product-name"><a href="{{route('detalle',$pag->id_producto)}}">{{$pag->nombre}}</a></h3>
                                <h4 class="product-price">${{number_format($pag->precio)}} </h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Añadir al Carrito</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /product -->
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    
                    <div class="store-position">
                        {!!$producto_aseo_general->links()!!}
                    </div>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection

@section('footer')
@endsection