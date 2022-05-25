<!--Utilizar la plantilla maestra en el login-->
@extends('frontend.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Preguntas frecuentes')


<link rel="stylesheet" href="fonts/icomoon/style.css">

<link rel="stylesheet" href="{{url('/static/css/owl.carousel.min.css')}}" href="css/owl.carousel.min.css">

<style>
    .content{
    margin: 0 auto;
    text-align: center;
    border-radius: 10px;
    width: 50%;
    }
</style>

@section('contenido')
<div class="content">
    <div class="section-title">
        <h3 class="title">Preguntas frecuentes</h3>
    </div>
    <p ><strong>COMPRAS:</strong></p>
        <p ><strong>¿Cómo comprar en el sitio web?</strong></p>
        <p >Si aún no tienes una cuenta, primero debes registrarte, luego activas tu cuenta dando clic en el correo que te llegó, después eliges los ítems que te gustaron, llenas tus datos de envío, luego eliges el método de pago y por último finalizas tu pedido. Puedes ver el paso a paso aquí</p> 
        <p  ><strong>¿Cuáles métodos de pago puedo usar para la compra por el sitio web?</strong></p>
        <p >Puedes pagar con tarjeta de crédito, débito y efectivo o pagando contra entrega.</p>
        <p ><strong>¿Puedo cambiar el método de pago de mi pedido?</strong></p>
        <p >No es posible cambiar el método de pago de un pedido, pero si elegiste pago en efectivo o contra entrega, nos puedes escribir al WhatsApp 315-576-86-10 para cancelar el pedido y puedas hacer uno nuevo con el método que prefieras.</p> 
        <p ><strong>ENVÍOS:</strong></p>
        <p ><strong>¿Todos los envíos son gratis?</strong></p>
        <p >No, todos los productos sí tienen costo de envío.</p> 
        <p ><strong>¿Cuánto vale el envío a mi dirección?</strong></p>
        <p >Puedes ver el valor del envío a cada ciudad o municipio antes de finalizar tu compra</p>
        <p ></strong>¿Cuánto tiempo tarda el envío a mi dirección?</strong></p>
        <p >El tiempo de envío tarda dependiendo de la ciudad o municipio en la que estés, aquí puedes ver los días hábiles para cada lugar</p>
        <p ><strong>¿Tienen envíos el mismo día?</strong></p>
        <p >Ya no tenemos domicilios o entregas el mismo día, aquí puedes ver cuánto tarda el envío o escríbenos al WhatsApp 315-576-86-10 y te contamos si tenemos una tienda en tu ciudad.</p> 
        <p ><strong>¿A qué ciudades llegan los pedidos?</strong></p>
        <p >Tenemos envíos a varias ciudades y municipios del país, puedes verlos aquí</p>
        <p ><strong>¿Cuál transportadora traerá mi pedido?</strong></p> 
        <p >Tu pedido lo enviaremos por TCC o Coordinadora dependiendo de la ciudad o municipio en el que estés.</p> 
        <p ><strong>Si llega mi pedido y no estoy en la dirección, ¿qué puedo hacer?</strong></p>
        <p >Puedes escribirnos al WhatsApp 315-576-86-10 y te ayudamos a programar una nueva entrega para tu pedido</p>
        <p ><strong>GENERALES:</strong></p>
        <p ><strong>¿Cómo puedo ser distribuidor u obtener una franquicia?</strong></p>
        <p >Te contamos que en este momento estamos enfocados en darle fuerza a nuestro sitio web y así llegar a los lugares donde no tenemos tienda física, no estamos otorgando franquicias o ventas al por mayor, sin embargo, puedes ver ropa con descuento cada semana en la pestaña del SALE. Puedes comprar y vender nuestra ropa, pero sin usar nuestro nombre y contenido por asuntos de propiedad intelectual</p>
        <p ><strong>¿Cómo puedo ver la que está en la tienda de mi ciudad?</strong></p>
        <p >Puedes ver todo nuestro inventario que tenemos en el sitio web cleanline.com, dando clic en productos, está la opción "ver inventario de productos" ahí puedes ver si los productos que quieres todavía están disponibles</p>
        <p ><strong>Nota:</strong></p>
        <p >Si tienes alguna otra duda o novedad con tu pedido (cambio de dirección, celular o persona quien recibe) puedes escribirnos al WhatsApp 315-576-86-10 y de una te ayudamos.</p>
</p> 
</div>


@stop


@section('scripts')
@stop

