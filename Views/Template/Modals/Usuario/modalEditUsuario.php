<!-- Modal -->
<div class="modal fade" id="modalEditUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id = "formNuevoUsuarioEdit">
      <div class="modal-body">
      <input type="hidden" id="txtIdUsuario" name="txtIdUsuario">
      <div class="mb-3">
    <label for="exampleInputEmail1" class="label">NOMBRE USUARIO</label>
    <input type="text" class="form-control" id="txtNombreUsuarioEdit" name = "txtNombreUsuarioEdit" required>
  </div>
      </div>
      <label for="start">Fecha de Inicio</label>

<input type="date" id="dateFechaInicioEdit" name="dateFechaInicioEdit"
       value=""
         required>

       <label for="start">Fecha Fin</label>

<input type="date" id="dateFechaFinEdit" name="dateFechaFinEdit"
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