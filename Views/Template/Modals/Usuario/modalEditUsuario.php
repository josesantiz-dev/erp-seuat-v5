<!-- Modal -->
<div class="modal fade" id="modalEditUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id = "formNuevoUsuarioEdit">
      <div class="modal-body">
      <input type="hidden" id="txtIdUsuario" name="txtIdUsuario">
      <div class="mb-3">
    <label for="exampleInputEmail1" class="label">Nombre de usuario</label>
    <input type="text" class="form-control" id="txtNombreUsuarioEdit" name = "txtNombreUsuarioEdit" required>

    <label for="exampleInputEmail1" class="label">Estatus</label>
    <input type="text" class="form-control" id="txtEstatusEdit" name = "txtEstatusEdit" required>

    <label for="exampleInputEmail1" class="label">Imagen</label>
    <input type="text" class="form-control" id="txtImgenEdit" name = "txtImgenEdit" required>

    <label for="exampleInputEmail1" class="label">Rol</label>
    <input type="text" class="form-control" id="txtRolEdit" name = "txtRolEdit" required>

    <label for="exampleInputEmail1" class="label">Persona</label>
    <input type="text" class="form-control" id="txtNombrePersonaEdit" name = "txtNombrePersonaEdit" required>
  </div>
      </div>
      <label for="start">Fecha de conexion</label>
      
<input type="date" id="dateFechaConexionEdit" name="dateFechaConexionEdit"
       value=""
         required>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
      </div>
</form>
    </div>
  </div>
</div>