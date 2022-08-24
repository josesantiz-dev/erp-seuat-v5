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
    <div class="form-group col-md-20">
    <div class="card">
    <div class="card-header row">
    <div class="col-md-1">                                                       
    </div>
    <div class="col-md-7">
    <a href="#" class="btn btn-primary  float-right" onclick="buscarImagenUsuario()" id="btnBuscarImagenUsuario">Buscar Imagen</a>
    </div>
    </div>
    <div class="form-group card-body text-center" id="huhshu" style="position:static;" >
    <span class="img-div">
    <img src="<?php echo media();?>/images/img/logo-empty.png" id="ImagenUsuario" style="max-width:250px;">
    </span>
    <input type="file" name="fileUsuario" onChange="ImagenUsuario(this)" id="fileUsuario" class="form-control" style="display: none;"
    accept=".png,.jpg,.jpeg,.svg,.PNG,.JPG,.JPEG">
    </div>
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
  <!--  <option selected>Seleccionar...</option>
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
   <!-- <option selected>Seleccionar...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option> -->
  </select>
</div>
  
</div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
      </div>
</form>
    </div>
  </div>
</div>