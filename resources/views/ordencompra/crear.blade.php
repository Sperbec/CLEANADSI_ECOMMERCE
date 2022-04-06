@extends('adminlte::page')

@section('title', 'Crear orden de compra')

@section('content_header')
    <div class="row">
        <h1>Proveedores</h1>
        <a href="{{ url('') }}" id="btnguardar" class="btn btn-primary btn-sm ml-auto">
            <i class="fas fa-plus"></i> Guardar orden de compra</a>
    </div>
@stop

@section('content')
    <!-- Modal -->
    <div id="miModal" class="modal fade" role="dialog">
        <div class="modal-dialog  modal-lg">
            <!-- Contenido del modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Agregar producto a la orden de compra</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="producto">Producto:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-box-open"></i>
                                </div>
                                <select id="producto" name="producto" class="form-select" required>
                                    <option value=''>Seleccione</option>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="cantidad" class="mtop16">Cantidad a solicitar:</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fa fa-hashtag"></i>
                            </div>
                            {!!  Form::number('cantidad', null, ['id' => 'cantidad', 'class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button id="agregarItem" type="button" class="btn btn-success" data-dismiss="modal">Agregar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-6">
            <label for="proveedores">Proveedor:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="far fa-id-card"></i>
                </div>
                <select name="proveedores" class="form-select" required>
                    <option value=''>Seleccione</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->proveedor }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <label for="fecha_orden">Fecha de la orden: </label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-calendar"></i>
                </div>
                {!! Form::date('fecha_orden', null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
    </div>

    <a class="btn btn-primary mtop16" id="btnAgregar" data-toggle="modal" data-target="#miModal">
        <i class="fas fa-plus"></i> Agregar</a>

    <table class="table" id="table_articulos">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

@stop

@section('footer')
    <div class="row">
        <div class="col-md-4">
            <label for="subtotal">Subtotal:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <!--Hacer uso del fontawesome-->
                    <i class="fas fa-dollar-sign"></i>
                </div>

                <!--El segundo parámetro se manda en null porque no lleva ningun
                valor por defecto-->
                {!! Form::text('subtotal', null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <label for="valor_iva">Valor IVA:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <!--Hacer uso del fontawesome-->
                    <i class="fas fa-dollar-sign"></i>
                </div>

                <!--El segundo parámetro se manda en null porque no lleva ningun
                valor por defecto-->
                {!! Form::text('valor_iva', null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <label for="total">Total:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <!--Hacer uso del fontawesome-->
                    <i class="fas fa-dollar-sign"></i>
                </div>

                <!--El segundo parámetro se manda en null porque no lleva ningun
                valor por defecto-->
                {!! Form::text('total', null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>


    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .mtop16 {
            margin-top: 16px;
        }

        #btnguardar {
            width: 20%;
        }

    </style>

@stop

@section('js')
    <script>
        $("#btnAgregar").on("click", function() {
            document.getElementById("producto").value = ''; 
            document.getElementById("cantidad").value = ""; 
            $("#miModal").modal("show");
        });

        $('#agregarItem').click(function() {
            var selectProduct = document.getElementById('producto');
            text = selectProduct.options[selectProduct.selectedIndex].innerText; 
            var cantidad = $('#cantidad').val();
           
            $('table tbody').append('<tr><td>' + text+ '</td><td>' + cantidad +' </td></tr>');
            $("#miModal").modal('hide');
        });
    </script>
@stop
