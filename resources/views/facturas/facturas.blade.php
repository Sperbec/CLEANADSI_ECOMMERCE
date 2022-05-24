@extends('frontend.plantilla')

@section('titulo','Detalle de Compra')

@section('header')

@endsection


@section('contenido')

<table class="table" id="tblfacturas">
  <thead>
      <tr>
          <td class="negrita">ID</td>
          <td class="negrita">Código</td>
          <td class="negrita">Fecha</td>
          <td class="negrita">Nombre</td>
          <td class="negrita">Subtotal</td>
          <td class="negrita">Valor IVA</td>
          <td class="negrita">Costo envío</td>
          <td class="negrita">Total</td>
          <td class="negrita">Acciones</td>
      </tr>
  </thead>
  <tbody>
      @foreach ($factura as $f)
          <tr>
              <td>{{ $f->id_factura }}</td>
              <td>{{ $f->codigo }}</td>
              <td>{{ $f->fecha }}</td>
              <td>{{ $f->nombrecompleto }}</td>
              <td>${{ $f->subtotal }}</td>
              <td>${{ $f->valor_iva }}</td>
              <td>${{ $f->costo_envio }}</td>
              <td>${{ $f->total }}</td>
              <td>

                  <div class="row">

                      <a class="btn btn-secondary opts"
                      href="{{ route('factura.show',  $f->id_factura) }}" data-toggle="tooltip"
                      data-bs-placement="top" title="Ver factura">
                      <i class="fas fa-eye"></i></a>


                  </div>
              </td>
          </tr>
      @endforeach
  </tbody>
</table>
    
    
@endsection

@section('scripts')

@endsection

@section('footer')

@endsection
