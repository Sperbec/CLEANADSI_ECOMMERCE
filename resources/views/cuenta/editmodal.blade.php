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

                   

                </form>

        </div>
    </div>
</div>
</div>

<script>
     
</script>

