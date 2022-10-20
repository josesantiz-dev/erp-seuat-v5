<!-- Modal -->
<div class="modal fade" id="modalCajaEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <form id="formNuevaCajaEdit">
      <div class="modal-body">

        <!--Linea del id del usuario-->
      <label for="exampleInputEmail1" style="display: none;" class="label">id</label>
      <input type="text" class="form-control" id="txtIdUsuario" name="txtIdUsuario" style="display: none;">

        <!--Linea de nombre del usuario-->
<div class="form-group">
    <label for="exampleInputEmail1" class="label">Nombre:</label>
    <input type="text" class="form-control form-control-sm" id="txtNombreEdit" name="txtNombreEdit" required>

        <!--Linea del plantel-->
    <label for="exampleInputEmail1" class="label">Plantel:</label>
    <div class="input-group mb-3">
        <select class="custom-select custom-select-sm"  id="txtPlantelEdit" name="txtPlantelEdit" required>
            <?php
            for ($i = 0; $i < count($data['Planteles']); $i++) { ?>
                <option value="<?php echo ($data['Planteles'][$i]['id']) ?>"><?php
                                                                            echo ($data['Planteles'][$i]['nombre_plantel_fisico']);
                                                                            ?></option>

            <?php
            }
            ?>

        </select>
    </div>

        <!--Linea del sistema educativo-->
    <label for="exampleInputEmail1" class="label">Sistema Educativo:</label>
    <div class="input-group mb-3">
        <select class="custom-select custom-select-sm" id="txtSistemaEduEdit" name="txtSistemaEduEdit" required>
            <?php
            for ($i = 0; $i < count($data['SistemasEdu']); $i++) { ?>
                <option value="<?php echo ($data['SistemasEdu'][$i]['id']) ?>"><?php
                                                                            echo ($data['SistemasEdu'][$i]['nombre_sistema']);
                                                                            ?></option>

            <?php
            }
            ?>
        </select>
    </div>
        
                <!--Linea de usuario atiende-->
    <label for="exampleInputEmail1" class="label">Usuario atiende:</label>
    <div class="input-group mb-3">
        <select class="custom-select custom-select-sm" id="txtUsuariosEdit" name="txtUsuariosEdit" required>
            <?php
            for ($i = 0; $i < count($data['Usuarios']); $i++) { ?>
                <option value="<?php echo ($data['Usuarios'][$i]['id']) ?>"><?php
                  echo ($data['Usuarios'][$i]['nickname']."/".$data['Usuarios'][$i]['nombre_persona']." ".$data['Usuarios'][$i]['ap_paterno']." ".$data['Usuarios'][$i]['ap_materno']);
                                                                 ?></option>

            <?php
            }
            ?>
        </select>
    </div>
        </div>
        </div>  

                <!--Linea de botones-->              
        <div class="modal-footer">
<button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Cancelar</button>
<button type="submit" class="btn btn-primary btn-md">Guardar</button>
</div>
</form>

</div>
</div>
</div>