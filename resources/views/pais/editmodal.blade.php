<div id="mdlEditarPais{{$pais->id_pais}}" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Editar país</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                
                <form action="{{ route('pais.update', $pais->id_pais) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <label for="codigo">Codigo país:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="far fa-keyboard"></i>
                                </div>
                                {!! Form::text('codigo', $pais->codigo, ['id' => 'codigopais', 'class' => 'form-control', 'required']) !!}
                               
                            </div>
                           

                           

                        </div>
                       
                        <div class="col-md-6">
                          
                            <label for="nombre">Nombre país:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-keyboard"></i>
                                </div>
                                {!! Form::text('nombre', $pais->nombre, ['id' => 'nombrepais', 'class' => 'form-control', 'required']) !!}
                               
                            </div>
                           
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button id="agregarItem" type="submit" class="btn btn-success">
                    <i class="fas fa-edit"></i> Editar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar</button>
            </div>

            </form>
            
        </div>
    </div>
</div>
</div>