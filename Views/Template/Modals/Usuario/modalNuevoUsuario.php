<!-- Modal -->
<div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id = "formNuevoUsuario">
      <div class="modal-body">
      <div class="mb-3">
    <label for="exampleInputEmail1" class="label">Nombre de usuario:</label>
    <input type="text" class="form-control" id="txtNickname" name = "txtNickname" required>
    <label for="exampleInputEmail1" class="label">Contraseña:</label>
    <input type="text" class="form-control" id="txtPassword" name = "txtPassword" required>
    <label for="exampleInputEmail1" class="label">Imagen</label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01"></label>
  </div>
</div>

    <label for="exampleInputEmail1" class="label">Rol</label>
    <input type="text" class="form-control" id="txtRol" name = "txtRol" required>
    <label for="exampleInputEmail1" class="label">Persona</label>
    <input type="text" class="form-control" id="txtPersona" name = "txtPersona" required>
    <label for="text">Fecha de conexion</label>
</div>
    <input type="date" id="dateFechaConexion" name="dateFechaConexion"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31" required>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" icon="Sucess" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
</form>
    </div>
  </div>
</div>
