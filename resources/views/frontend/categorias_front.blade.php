@extends('frontend.plantilla')

@section('titulo','Aseo Personal')

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
                
                <div class="row">
                    <!-- product -->
                    @foreach($categoria_seleccionada as $pap)
                    <div class="col-md-4 col-xs-6">
                        
                        <div class="product">
                            <div class="product-img">
                                <img src="/imagen/{{$pap->imagen}}" alt="">
                                <div class="product-label">
                                </div>
                            </div>
                            <div class="product-body">
                                
                                <p class="product-category">Aseo Personal</p>
                                <h3 class="product-name"><a href="{{route('detalle',$pap->id_producto)}}">{{$pap->nombre}}</a></h3>
                                <h4 class="product-price">${{number_format($pap->precio)}} </h4>
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
                                <a href="{{route('carrito.añadir',$pap->id_producto)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Añadir al Carrito</button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /product -->
                </div>
                <!-- /store products -->
               
                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing {{$categoria_seleccionada->count()}}-100 products</span>
                    <div class="store-position">
                        {!!$categoria_seleccionada->links()!!}
                        
                        
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