
@extends('frontend.plantilla')
@section('titulo','aseo personal')
@section('header')

@endsection

@section('contenido')
<div class="cabezera"><h1>Productos de Aseo Personal</h1></div>
<div class="contenedor-productos">
    <div class="tipo-productos">
        <h2>Tipo de Productos</h2>
        <div class="contenido-categoria">
            <div class="input-checkbox">
                <input type="checkbox" id="category-1">
                Bebés
                    <small>(120)</small>
            </div>
        </div>
        <div class="contenido-categoria">
            <div class="input-checkbox">
                <input type="checkbox" id="category-1">
                Gel Antibacterial
                    <small>(120)</small>
            </div>
        </div>
        <div class="contenido-categoria">
            <div class="input-checkbox">
                <input type="checkbox" id="category-1">
                Jabones y Geles
                    <small>(120)</small>
            </div>
        </div>
        <div class="contenido-categoria">
            <div class="input-checkbox">
                <input type="checkbox" id="category-1">
                Papel Higiénico
                    <small>(120)</small>
            </div>
        </div>
        <div class="contenido-categoria">
            <div class="input-checkbox">
                <input type="checkbox" id="category-1">
                Toallas de manos
                    <small>(120)</small>
            </div>
        </div>
        <div class="contenido-categoria">
            <div class="input-checkbox">
                <input type="checkbox" id="category-1">
                Tocador
                    <small>(120)</small>
            </div>
        </div>
        <!--marcas-->
    
        <div class="marcas">

            <div class="card-marcas">
                <img class="img-producto" src="../imagenes/Colgate-logo-.jpg" alt="">
            </div>
            <div class="card-marcas">
                <img class="img-producto" src="../imagenes/logo-Gillete.jpg" alt="">
            </div>
            <div class="card-marcas">
                <img class="img-producto" src="../imagenes/marca-dersa.jpg" alt="">
            </div>
            <div class="card-marcas">
                <img class="img-producto" src="../imagenes/Ariel-logo.jpg" alt="">
            </div>
            <div class="card-marcas">
                <img class="img-producto" src="../imagenes/fab.jpg" alt="">
            </div>
            <div class="card-marcas">
                <img class="img-producto" src="../imagenes/PEQUENIN.jpg" alt="">
            </div>
            <div class="card-marcas">
                <img class="img-producto" src="../imagenes/logo-johnsons.jpg" alt="">
            </div>
            <div class="card-marcas">
                <img class="img-producto" src="../imagenes/logo-lubriderm.jpg" alt="">
            </div>
            <div class="card-marcas">
                <img class="img-producto" src="../imagenes/old-spice.jpg" alt="">
            </div>
        </div>
        
        
    </div>
    <div class="productos">
        <div id="productos">
            <div>
                <div class="card-producto">
                    <figure>
                        <img class="img-producto" src="../imagenes/detergente.jpg" alt="">
                    </figure>
                    <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
                    <button>Añadir al carrito</button>
                </div>
            </div>
            <div>
                <div class="card-producto">
                    <figure>
                        <img class="img-producto" src="../imagenes/detergente.jpg" alt="">
                    </figure>
                    <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
                    <button>Añadir al carrito</button>
                </div>
            </div>
            <div>
                <div class="card-producto">
                    <figure>
                        <img class="img-producto" src="../imagenes/detergente.jpg" alt="">
                    </figure>
                    <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
                    <button>Añadir al carrito</button>
                </div>
            </div>
            <div>
                <div class="card-producto">
                    <figure>
                        <img class="img-producto" src="../imagenes/detergente.jpg" alt="">
                    </figure>
                    <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
                    <button>Añadir al carrito</button>
                </div>
            </div>
            <div>
                <div class="card-producto">
                    <figure>
                        <img class="img-producto" src="../imagenes/detergente.jpg" alt="">
                    </figure>
                    <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
                    <button>Añadir al carrito</button>
                </div>
            </div>
            <div>
                <div class="card-producto">
                    <figure>
                        <img class="img-producto" src="../imagenes/detergente.jpg" alt="">
                    </figure>
                    <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
                    <button>Añadir al carrito</button>
                </div>
            </div>
            <div>
                <div class="card-producto">
                    <figure>
                        <img class="img-producto" src="../imagenes/detergente.jpg" alt="">
                    </figure>
                    <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
                    <button>Añadir al carrito</button>
                </div>
            </div>
            <div>
                <div class="card-producto">
                    <figure>
                        <img class="img-producto" src="../imagenes/detergente.jpg" alt="">
                    </figure>
                    <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
                    <button>Añadir al carrito</button>
                </div>
            </div>
            <div>
                <div class="card-producto">
                        <figure>
                        <img class="img-producto" src="../imagenes/detergente.jpg" alt="">
                    </figure>
                    <h3>SUAVIZANTE TDA VAINILLA X 5000 CC</h3>
                    <button>Añadir al carrito</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')