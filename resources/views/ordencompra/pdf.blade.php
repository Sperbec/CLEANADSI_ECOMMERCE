

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Orden de compra {{$encabezado->codigo}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>

    .negrita {
        font-weight: bold;
    }

    .logo{
        width: 20%;
        display: block;
        margin: 0px auto;
    }

    h2{
        vertical-align: text-top;
    }

  </style>
</head>
<body>

    <div class="row text-center" style="margin-bottom: 2rem;">
        <div class="col-xs-6">
            <img class="logo" src="./static/images/logo.png" alt="Logotipo">
        </div>
        <div class="col-xs-6">
            <h2>Orden de compra - {{$encabezado->codigo}}</h2>
        </div>
    </div>

<div class="row">
    <div class="col-md-6">
        <label class="negrita">Fecha: </label>
        <label>{{$encabezado->fecha}}</label>
    </div>
    <div class="col-md-6">
        <label class="negrita">Proveedor: </label>
        <label>{{$encabezado->nombre_proveedor}}</label>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <label class="negrita">Subtotal: </label>
        <label> ${{$encabezado->subtotal}}</label>
    </div>
    <div class="col-md-6">
        <label class="negrita">Valor IVA:</label>
        <label> ${{$encabezado->valor_iva}}</label>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label class="negrita">Total:</label>
        <label >${{$encabezado->total}}</label>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label>Comentario: {{$encabezado->comentario}}</label>
    </div>
</div>

<br>


<table class="table table-hover" id="tblDetalleOrdenCompra">
    <thead>
        <tr>
            <td class="negrita">Nombre producto</td>
            <td class="negrita">SKU</td>
            <td class="negrita text-right">Cantidad</td>
            <td class="negrita text-right">Precio</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($detalles as $detalle)
        <tr>
            <td>{{ $detalle->nombre }}</td>
            <td>{{ $detalle->sku }}</td>
            <td   class="text-right">{{ $detalle->cantidad }}</td>
            <td   class="text-right">${{ $detalle->precio }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3"  class="negrita text-right">Subtotal</td>
            <td class="negrita text-right">${{$encabezado->subtotal}}</td>
        </tr>

        <tr>
            <td colspan="3"  class="negrita text-right">IVA</td>
            <td class="negrita text-right">${{$encabezado->valor_iva}}</td>
        </tr>

        <tr>
            <td colspan="3"  class="negrita text-right">Total</td>
            <td class="negrita text-right">${{$encabezado->total}}</td>
        </tr>

    </tbody>
</table>

</body>
</html>
