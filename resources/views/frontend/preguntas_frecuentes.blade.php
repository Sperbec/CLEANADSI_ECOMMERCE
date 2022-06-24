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
        <p >Si aún no tienes una cuenta, primero debes registrarte, luego inicias sesión y eliges los ítems que te gustaron, llenas tus datos de envío, luego eliges el método de pago y por último finalizas tu pedido.</p> 
        <p  ><strong>¿Cuáles métodos de pago puedo usar para la compra por el sitio web?</strong></p>
        <p >Puedes pagar en efectivo o por medio de PayPal.</p>
        <p ><strong>¿Puedo cambiar el método de pago de mi pedido?</strong></p>
        <p >No es posible cambiar el método de pago de un pedido, pero si elegiste pago en efectivo , nos puedes escribir al WhatsApp 315-576-86-10 para cancelar el pedido y puedas hacer uno nuevo con el método que prefieras.</p> 

        <br>
        <p><strong>ENVÍOS:</strong></p>
        <p><strong>¿Todos los envíos son gratis?</strong></p>
        <p>Sí, todos los envíos son gratis.</p> 
        <p><strong>¿Cuánto tiempo tarda el envío a mi dirección?</strong></p>
        <p>El tiempo para realizar la entrega del pedido son 3 días hábiles.</p>
        <p><strong>¿Tienen envíos el mismo día?</strong></p>
        <p>Siempre se progrma de un día para otro.</p> 
        <p><strong>¿A qué ciudades llegan los pedidos?</strong></p>
        <p>Tenemos envíos a cualquier barrio de la ciudad de Cali.</p>
        <p><strong>¿Cuál transportadora traerá mi pedido?</strong></p> 
        <p>Tu pedido lo enviaremos por TCC o Coordinadora.</p> 
        <p><strong>Si llega mi pedido y no estoy en la dirección, ¿Qué puedo hacer?</strong></p>
        <p>Puedes escribirnos al WhatsApp 315-576-86-10 y te ayudamos a programar una nueva entrega para tu pedido</p>

        <br>
        
        <p ><strong>GENERALES:</strong></p>
        <p ><strong>¿Cómo puedo ver los productos disponibles?</strong></p>
        <p >Puedes ver todo nuestro inventario que tenemos en el sitio web cleanline.com, dando clic en Inicio verás cada uno de los productos y ademas podrás observar un detalle del producto haciendo clic sobre su nombre.</p>
        <p ><strong>Nota:</strong></p>
        <p >Si tienes alguna otra duda o novedad con tu pedido (cambio de dirección, celular o persona quien recibe) puedes escribirnos al WhatsApp 315-576-86-10 y de una te ayudamos.</p>
</p> 

</div>
<br>
<br>
<br>


@stop


@section('scripts')
@stop

