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
    <input type="text" class="form-control" id="txtNickname" name = "txtNickname" maxlength="20" required>
    <label for="exampleInputEmail1" class="label">Contraseña:</label>
    <input type="text" class="form-control" id="txtPassword" name = "txtPassword" maxlength="20" required>
    <label for="exampleInputEmail1" class="label">Imagen</label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="Imagen" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="Imagen"></label>
  </div>
</div>

    <label for="exampleInputEmail1" class="label">Rol</label>
    <div class="input-group mb-3">
  <select class="custom-select" id="txtRol">
  <?php
    for ($i=0;$i<count($data['roles']);$i++)
    { ?>
      <option value="<?php echo($data['roles'][$i]['id'])?>"><?php 
     echo($data['roles'][$i]['nombre_rol']);
      ?></option> 

    <?php
    } 
    ?>
    <!--<option selected>Seleccionar...</option>
    <option value="1">Administrativo</option>
    <option value="2">Caja</option>
    <option value="3">Maestro</option> -->
  </select> 
</div>
    <label for="exampleInputEmail1" class="label">Persona</label>
    <div class="input-group mb-3">
  <select class="custom-select" id="txtPersona">
  <?php
    for ($i=0;$i<count($data['personas']);$i++)
    { ?>
      <option value="<?php echo($data['personas'][$i]['id'])?>"><?php 
     echo($data['personas'][$i]['nombre_persona']);
      ?></option> 

    <?php
    } 
    ?>
    <!--<option selected>Seleccionar...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option> -->
  </select>
</div>
  
</div>
    

      </div>
 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" icon="Sucess" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
</form>
    </div>
  </div>
</div>
