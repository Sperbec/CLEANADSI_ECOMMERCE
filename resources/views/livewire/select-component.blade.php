<div>
    <div class="row">
        <div class="col-md-6">
            <label for="pais" class="mtop16">País:</label>
            <div class="input-group">
                <div class="input-group-text">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <select id="pais" name="pais" class="form-select" wire:model="selectedPais">
                    <option value=''>Seleccione</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id_pais }}">{{ $pais->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <br>

    <table class="table table-hover" id="tbldepartamento">
        <thead>
            <tr>
                <td>ID</td>
                <td>Código</td>
                <td>Nombre</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @if (!is_null($departamentos))
                @foreach ($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->id_departamento }}</td>
                        <td>{{ $departamento->codigo }}</td>
                        <td>{{ $departamento->nombre }}</td>
                        <td>
                            <div class="row">
                                <a id="btnEditar" data-toggle="modal"
                                    data-target="#mdlEditarDepartamento{{ $departamento->id_departamento }}"
                                    class="btn btn-primary opts" data-toggle="tooltip" data-bs-placement="top"
                                    title="Editar departamento">
                                    <i class="fas fa-edit"></i></a>

                                <form class="formEliminar"
                                    action="{{ route('departamento.destroy', $departamento->id_departamento) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            </div>
                            </form>

                        </td>
                        @include('departamento.editmodal')
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $('.formEliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Seguro de eliminar este registro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });
    </script>

</div>
