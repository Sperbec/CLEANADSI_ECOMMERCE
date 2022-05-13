@extends('frontend.plantilla')

@section('titulo','Crear')

@section('header')

@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear Producto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('inicio') }}"> Volver</a>
        </div>
    </div>
</div>
     

     
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
<div class="row">
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
          <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
        </div>
      </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Sku:</strong>
        <input type="text" name="sku" class="form-control" placeholder="sku">
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
        <input type="text" name="cantidad_existencia" class="form-control" placeholder="Stock">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Id categoria:</strong>
          <input type="text" name="id_categoria" class="form-control" placeholder="id categoria">
      </div>
    </div>
    
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">crear</button>
      </div>
</div>
</form>

@endsection

@section('footer')

@endsection