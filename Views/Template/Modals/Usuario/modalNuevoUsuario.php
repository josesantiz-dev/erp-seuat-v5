<!-- Modal nuevo usuario -->
<div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formNuevoUsuario">
                <div class="modal-body">
               <!-- etiqueta personas -->
                <label for="exampleInputEmail1" class="label">Persona:</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="txtNombrePersona" name="txtNombrePersona">
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
                        <input type="text" class="form-control" id="txtNickname" name="txtNickname" maxlength="20" required>
                            <!-- etiqueta Pass -->
                        <label for="exampleInputEmail1" class="label">Contraseña:</label>
                        <div class="input-group mb-3">
          <input type="password" id="txtPassword" name="txtPassword" class="form-control" maxlength="20" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="far fa-eye mr-2" id="togglePass" style="color:#045FB4"></i>
            </div>
          </div>
        </div>     
                        <!-- etiqueta Imagen -->
                        <label for="exampleInputEmail1" class="label">Imagen</label>
                        <div class="form-group col-md-12">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-primary  float-right" onclick="buscarImagenUsuario()" id="btnBuscarImagenUsuario">Buscar Imagen</a>
                                    </div>
                                </div>
                                <div class="form-group card-body text-center" id="huhshu" style="position:static;">
                                    <span class="img-div">
                                        <img src="<?php echo media(); ?>/images/img/logo-empty.png" id="profileDisplayUsuario" style="max-width:300px;">
                                    </span>
                                    <input type="file" name="profileImageUsuario" onChange="displayImageUsuario(this)" id="profileImageUsuario" class="form-control" style="display: none;" accept=".png,.jpg,.jpeg,.svg,.PNG,.JPG,.JPEG">
                                </div>
                            </div>
                        </div>
                        <!-- etiqueta rol -->
                        <label for="exampleInputEmail1" class="label">Rol:</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="txtRol" name="txtRol">
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
                            <!-- etiqueta botones -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" icon="Sucess" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-xs">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>