@extends('adminlte::page')

@section('title', 'Crear orden de compra')

@section('content_header')


@stop

@section('content')
<form action="{{url('/guardarOrdenCompra')}}" method="post" style="padding-top: 25px">
    @csrf

    <div class="row">
    
        <div class="col-md-6">
            <h2>Crear orden de compra</h2>
        </div>
        <div class="col-md-6">
            <button  type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-paper-plane"></i> Guardar</button>
        </div>
    </div>

    <div id="miModal" class="modal fade" role="dialog">
        <div class="modal-dialog  modal-lg">
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
                                <select id="producto"  class="form-select" required>
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
                <select id="proveedores" name="proveedores" class="form-select" required>
                    <option value=''>Seleccione</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->proveedor }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    <a class="btn btn-primary mtop16" id="btnAgregar" >
        <i class="fas fa-plus"></i> Agregar</a>

    <table class="table" id="table_articulos">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio unitario</th>
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
                    <i class="fas fa-dollar-sign"></i>
                </div>

                {!! Form::text('subtotal', null, [ 'id'=>'subtotal', 'class' => 'form-control', 'readonly']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <label for="valor_iva">Valor IVA:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                {!! Form::text('valor_iva', null, ['id'=>'valor_iva', 'class' => 'form-control',  'readonly']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <label for="total">Total:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </div>

                {!! Form::text('total', null, ['id'=>'total', 'class' => 'form-control', 'readonly']) !!}
            </div>
        </div>


    </div>

</form>

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .mtop16 {
            margin-top: 16px;
        }

        #btnGuardar {
            float: right;
        }

    </style>

@stop

@section('js')
    <script>
        
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var contador = 0;
        var subtotal = 0.0;
        var iva = 0.0 ;

        $("#btnAgregar").on("click", function() {

            var selectProveedor = document.getElementById('proveedores');
            text = selectProveedor.options[selectProveedor.selectedIndex].innerText;

            if(text === 'Seleccione'){
                alert("Seleccione un proveedor");
            }else{
                document.getElementById("producto").value = '';
                document.getElementById("cantidad").value = "";
                $("#miModal").modal("show");
            }

        });


        $('#agregarItem').click(function() {

            var selectProduct = document.getElementById('producto');
            text = selectProduct.options[selectProduct.selectedIndex].innerText;
            var cantidad = $('#cantidad').val();

    
            if(contador === 0){
                contador = 1;
            }else{
                contador= contador +1;
            }

            if(cantidad === '' || text === 'Seleccione' ){
                alert("Seleccione un producto y digite la cantidad");
            }else{
                fetch('../obtenerproducto',{
                    method : 'POST',
                    body: JSON.stringify({texto : selectProduct.options[selectProduct.selectedIndex].value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": document.head.querySelector("[name~=csrf-token][content]").content
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{

                    if( document.getElementById('subtotal').value == null){
                        subtotal = data.producto.precio * cantidad;
                        document.getElementById('subtotal').value = subtotal;

                    }else{
                        subtotal = subtotal + data.producto.precio * cantidad;
                        document.getElementById('subtotal').value = subtotal;

                    }

                    iva = (subtotal) * 0.19;
                    document.getElementById('valor_iva').value = iva;
                    document.getElementById('total').value = subtotal + iva;
                    

                    $('table tbody').append('<tr><td> <input style="border: 0; background-color:transparent;" readonly type="number" name="idproductotbl'+contador+'" value="'+selectProduct.options[selectProduct.selectedIndex].value+
                    '"></td><td> <input style="border: 0; background-color:transparent;"  readonly type="text" name="nombreproductotbl'+contador+'" value="'+text+
                    '"></td><td> <input style="border: 0; background-color:transparent;"  readonly type="number" name="cantidadproductotbl'+contador+'" value="'+cantidad+
                    '"></td><td> <input style="border: 0; background-color:transparent;"  readonly type="number" name="precio" value="'+data.producto.precio+
                    '"></td><td> <input  type="hidden" id="contador" name="contador" value="'+contador+'">'+
                    '<input  class="btn btn-danger" type="button" value="Eliminar" onclick="deleteRow(this, '+cantidad+', '+selectProduct.options[selectProduct.selectedIndex].value+')">'+'</tr>');

                     $("#miModal").modal('hide');

                   
                }).catch(error => console.error(error));

               

            }
            
        });

        function deleteRow(id,cantidad, value){
            var i=id.parentNode.parentNode.rowIndex
            document.getElementById('table_articulos').deleteRow(i)

            fetch('../obtenerproducto',{
                    method : 'POST',
                    body: JSON.stringify({texto : value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": document.head.querySelector("[name~=csrf-token][content]").content
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                
                    if( document.getElementById('subtotal').value != null){
                        subtotal = subtotal - data.producto.precio * cantidad;
                        document.getElementById('subtotal').value = subtotal;

                        iva = (subtotal) * 0.19;
                        document.getElementById('valor_iva').value = iva;
                        document.getElementById('total').value = subtotal + iva;
                    }
                   
                }).catch(error => console.error(error));
        }

        @if ( session('guardado') == 'ok')
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Registro guardado con éxito',
            showConfirmButton: false,
            timer: 1500
            })
        @endif


        
    </script>
@stop
