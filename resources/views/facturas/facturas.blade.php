@extends('frontend.plantilla')

@section('titulo','Detalle de Compra')

@section('header')

@endsection


@section('contenido')

<form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
<div class="row">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Codigo:</strong>
          <input type="text" name="codigo" class="form-control" placeholder="Codigo">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nombre:</strong>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Descripcion:</strong>
        <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripcion"></textarea>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Imagen:</strong>
        <input type="file" name="imagen" class="form-control" placeholder="imagen">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Precio:</strong>
          <input type="text" name="precio" class="form-control" placeholder="Precio">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Estado:</strong>
          <input type="text" name="estado" class="form-control" placeholder="Estado">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Stock:</strong>
        <input type="text" name="cantidadproducto" class="form-control" placeholder="Stock">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Garantia:</strong>
          <input type="text" name="garantia" class="form-control" placeholder="Garantia">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Tiempo de Garantia:</strong>
        <input type="text" name="tiempogarantia" class="form-control" placeholder="Tiempo de Garantia">
      </div>
    </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">crear</button>
      </div>
</div>
</form>
    facturas
@endsection

@section('scripts')

@endsection

@section('footer')

@endsection
