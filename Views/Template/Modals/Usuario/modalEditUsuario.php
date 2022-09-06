<!-- Modal para editar registro de usuarios -->

<div class="modal fade" id="modalEditUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id = "formNuevoUsuarioEdit">
      <div class="modal-body">
      <label for="exampleInputEmail1" style="display: none;" class="label">id</label>
      <input type="text" class="form-control" id="txtIdUsuario" name="txtIdUsuario" style="display: none;">
    <!-- etiqueta personas -->
      <label for="exampleInputEmail1" class="label">Persona:</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="txtNombrePersonaEdit" name="txtNombrePersonaEdit">
                                <?php
                                for ($i = 0; $i < count($data['personas']); $i++) { ?>
                                    <option value="<?php echo ($data['personas'][$i]['id']) ?>"><?php
                                                                                                echo ($data['personas'][$i]['nombre_persona']." ".$data['personas'][$i]['ap_paterno']." ".$data['personas'][$i]['ap_materno']);                                                                                           
                                                                                                ?></option>

                                <?php
                                }
                                ?>
                            </select>
                            </div>
                    <!-- etiqueta Nombre de usuario -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="label">Nombre de usuario:</label>
                        <input type="text" class="form-control" id="txtNicknameEdit" name="txtNicknameEdit" maxlength="20" required>
                    <!-- etiqueta Pass -->
                        <label for="exampleInputEmail1" class="label">Contraseña:</label>
                        <input disabled="text" class="form-control" id="password" name="password" placeholder="********" required>
                    <!-- etiqueta pass actualizacion -->
                        <label for="exampleInputEmail1" class="label">Contraseña nueva:</label>
                        <div class="input-group mb-3">
          <input type="password" id="txtPasswordEdit" name="txtPasswordEdit" class="form-control" maxlength="20" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="far fa-eye mr-2" id="togglePassEdit" style="color:#045FB4"></i>
            </div>
          </div>
        </div>     
                    <!-- etiqueta Imagen -->
                         <label for="exampleInputEmail1" class="label">Imagen:</label>
                        <div class="form-group col-md-20">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-primary  float-right" onclick="buscarImagenUsuarioEdit()" id="btnBuscarImagenUsuarioEdit">Buscar Imagen</a>
                                    </div>
                                </div>
                                <div class="form-group card-body text-center" id="huhshu" style="position:static;">
                                    <span class="img-div">
                                        <img src="<?php echo media(); ?>/images/img/logo-empty.png" id="profileDisplayUsuarioEdit" style="max-width:300px;">
                                    </span>
                                    <input type="file" name="profileImageUsuarioEdit" onChange="displayImageUsuarioEdit(this)" id="profileImageUsuarioEdit" class="form-control" style="display: none;" accept=".png,.jpg,.jpeg,.svg,.PNG,.JPG,.JPEG">
                                </div>
                            </div>
                        </div> 

                        <!-- etiqueta Rol -->
                        <label for="exampleInputEmail1" class="label">Rol:</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="txtRolEdit" name="txtRolEdit">
                                <?php
                                for ($i = 0; $i < count($data['roles']); $i++) { ?>
                                    <option value="<?php echo ($data['roles'][$i]['id']) ?>"><?php
                                                                                                echo ($data['roles'][$i]['nombre_rol']);
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
                        
                    </div>

                </div>
                <!-- etiqueta Botones  -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" icon="Sucess" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>