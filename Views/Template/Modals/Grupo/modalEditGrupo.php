<!-- Modal editar grupo -->
<div class="modal fade" id="modalEditGrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar grupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formNuevoGrupoEdit">
                <div class="modal-body">

                 <!-- etiqueta identificador de grupo -->
                <label for="exampleInputEmail1" style="display: none;" class="label">id</label>
                <input type="text" class="form-control" id="txtIdUsuario" name="txtIdUsuario" style="display: none;">

                 <!-- etiqueta nombre de grupo -->
                 <div class="mb-3">
                        <label for="exampleInputEmail1" class="label">Nombre del grupo:</label>
                        <input type="text" class="form-control" id="txtGrupoEdit" name="txtGrupoEdit" maxlength="20" required>


                            </div>
                            </div>
                            
                            <!-- etiqueta botones -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" icon="Sucess" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-md">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>