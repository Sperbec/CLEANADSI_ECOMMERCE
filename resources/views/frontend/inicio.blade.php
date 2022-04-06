@extends('frontend.plantilla')

@section('titulo','inicio')

@section('header')

@endsection

@section('contenido')
<body>
    <div id="contenedor">
        <div class="slider">
            <ul>
                <li><img class="img-slider" src="../imagenes/slider7aseo.jpeg" width=>
                </li>
                <li><img class="img-slider" src="../imagenes/slide-marcas.jpg" width=""></li>
                <li><img class="img-slider" src="../imagenes/pg.png" alt=""></li>
                <li><img class="img-slider" src="../imagenes/slide-aseo.jpg" alt="">
                    
                </li>
            </ul>
        </div>  
        <div id="tabla" class="contenedor-detalle col-lg-12 col-md-12 col-sm-12">
            <div class="filas">
                <div class="col-lg-12">
                    <div class="contenedor-card">
                        <div id="card" class="col-lg-3 col-sm-6 col-xs-12">
                            <figure>
                                <a href="{{route('detalle')}}">
                                    <img  class="img-card" src="../imagenes/detergente.jpg" alt="">
                                </a>
                            </figure>
                            <h1>SUAVIZANTE TDA VAINILLA X 5000 CC</h1>
                            <div class="boton">
                                <span>$ 30.000</span>
                                <button>Añadir al Carrito</button>
                            </div>

                            
                        </div>
            
                        <div id="card" class="col-lg-3 col-sm-6 col-xs-12">
                            <figure>
                                <img class="img-card" src="../imagenes/jabon en polvo.jpg" alt="">
                            </figure>
                            <h1>JABON POLVO ULTREX FLORAL 500 GR</h1>
                            <div class="boton">
                            <span>$ 30.000</span>
                                 <button>Añadir al Carrito</button>
                            </div>
                            
                        </div>
            
                        <div id="card" class="col-lg-3 col-sm-6 col-xs-12">
                            <figure>
                                <img class="img-card" src="../imagenes/alcohol.jpg" alt="">
                            </figure>
                            <h1>SUAVIZANTE TDA VAINILLA X 5000 CC</h1>
                            <div class="boton">
                            <span>$ 30.000</span>
                                 <button>Añadir al Carrito</button>
                            </div>
                            
                        </div>
            
                        <div id="card" class="col-lg-3 col-sm-6 col-xs-12">
                            <figure>
                                <img class="img-card" src="../imagenes/crema dental colgate.jpg" alt="">
                            </figure>
                            <h1>SUAVIZANTE TDA VAINILLA X 5000 CC</h1>
                            <div class="boton">
                            <span>$ 30.000</span>
                                 <button>Añadir al Carrito</button>
                            </div>
                            
                        </div>
                        <div id="card" class="col-lg-3 col-sm-6 col-xs-12">
                            <figure>
                                <img class="img-card" src="../imagenes/papel higienico.jpg" alt="">
                            </figure>
                            <h1>PAPEL SCOTT HD BLANCO PREC X 250 MT-4083</h1>
                            <div class="boton">
                            <span>$ 12.296</span>
                                 <button>Añadir al Carrito</button>
                            </div>
                           
                            
                        </div>
            
                        <div id="card" class="col-lg-3 col-sm-6 col-xs-12">
                            <figure>
                                <img class="img-card" src="../imagenes/jabon protex.jpg" alt="">
                            </figure>
                            <h1>JABON PROTEX LIMPIEZA PROFUNDA X 120</h1>
                            <div class="boton">
                            <span>$ 2.900</span>
                                 <button>Añadir al Carrito</button>
                            </div>
                            
                        </div>
            
                        <div id="card" class="col-lg-3 col-sm-6 col-xs-12">
                            <figure>
                                <img class="img-card" src="../imagenes/cepillo.jpg" alt="">
                            </figure>
                            <h1>CEPILLO MANO TIPO PLANCHA OSBE</h1>
                            <div class="boton">
                            <span>$ 1.567</span>
                                 <button>Añadir al Carrito</button>
                            </div>
                            
                        </div>
            
                        <div id="card" class="col-lg-3 col-sm-6 col-xs-12">
                            <figure>
                                <img class="img-card" src="../imagenes/papelera.jpg" alt="">
                            </figure>
                            <h1>PAPELERA ESTRA PEDAL 10 LT PAPEL CARTON</h1>
                            <div class="boton">
                            <span>$ 47.248</span>
                                 <button>Añadir al Carrito</button>
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>  
        <section>
        <div class="titulo">
          <h1>
            Productos Destacados
         </h1>
        </div>
            <div class="destacados">
                <div class="produc-destacados">
                   <figure>
                        <img class="img-card" src="../imagenes/papelera.jpg" alt="">
                    </figure>
                        <h4>PAPELERA ESTRA PEDAL 10 LT PAPEL CARTON</h4>
                </div>
        
                <div class="produc-destacados">
                   <figure>
                        <img class="img-card" src="../imagenes/cepillo.jpg" alt="">
                    </figure>
                        <h4>CEPILLO MANO TIPO PLANCHA OSBE</h4>
                </div>
        
                <div class="produc-destacados">
                   <figure>
                        <img class="img-card" src="../imagenes/jabon protex.jpg" alt="">
                    </figure>
                        <h4>JABON T. PROTEX LIMPIEZA PROFUNDA X 120</h4>
                </div>
                <div class="produc-destacados">
                   <figure>
                        <img class="img-card" src="../imagenes/papel higienico.jpg" alt="">
                    </figure>
                        <h4>PAPEL SCOTT HD BLANCO PREC X 250 MT-4083</h4>
                </div>
                <div class="produc-destacados">
                    <figure>
                        <img class="img-card" src="../imagenes/jabon en polvo.jpg" alt="">
                    </figure>
                        <h4>JABON POLVO ULTREX FLORAL 500 GR</h4>
                </div>
            
        </section>
        
    </div>
</body>
@endsection
@section('footer')
@stop
