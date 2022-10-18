<!-- Modal nuevo grupo -->
<div class="modal fade" id="modalNuevoGrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo grupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formNuevoGrupo">
                <div class="modal-body">

                 <!-- etiqueta Nombre de usuario -->
                 <div class="mb-3">
                        <label for="exampleInputEmail1" class="label">Nombre del grupo:</label>
                        <input type="text" class="form-control" id="txtgrupo" name="txtgrupo" maxlength="20" required>


                            </div>
                            </div>
                            
                            <!-- etiqueta botones -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" icon="Sucess" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-xs">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>