<div id="mdlEditarDatosContacto{{$contacto->id_persona_contacto}}" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Editar datos de contacto</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <form action="{{ route('micuenta.update', $contacto->id_persona_contacto) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <label for="tipoContactoEditar">Tipo de contacto:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-hand-pointer"></i>
                                </div>
                                <select id="tipoContactoEditar" name="tipoContactoEditar" class="form-select" required onchange="
                                    habilitar(this.value);">
                                    <option value=''>Seleccione</option>
                                    @foreach ($tipos_contactos as $tipo_contacto)

                                    <option value="{{ $tipo_contacto->id_opcion}}"
                                        {{ ($tipo_contacto->id_opcion  == $contacto->id_opcion_contacto)
                                            ?'selected': ''}}>{{ $tipo_contacto->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="contactoEditar">Contacto:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="far fa-keyboard"></i>
                                </div>
                                {!! Form::text('contactoEditar', $contacto->valor, ['id' => 'contactoEditar', 'class' => 'form-control','required']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="municipioEditar">Municipio:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <select id="municipioEditar" name="municipioEditar" class="form-select" disabled>
                                    <option value=''>Seleccione</option>
                                    @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id_municipio }}">{{ $municipio->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label for="barrioEditar">Barrio:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-map-marked"></i>
                                </div>
                            <select id="barrioEditar" name="barrioEditar" class="form-select" disabled></select>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button id="btnEditarDatosContacto" type="submit" class="btn btn-success">
                            <i class="fas fa-paper-plane"></i> Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times"></i> Cerrar</button>
                    </div>

                </form>

        </div>
    </div>
</div>
</div>

<script>
     function habilitar(value) {
            if (value == "10") {
                document.getElementById("municipioEditar").disabled = false;
                document.getElementById("barrioEditar").disabled = false;
            }else{
                document.getElementById('municipioEditar').value = '';
                document.getElementById('barrioEditar').value = '';
                document.getElementById("municipioEditar").disabled = true;
                document.getElementById("barrioEditar").disabled = true;
            }
        }
</script>

