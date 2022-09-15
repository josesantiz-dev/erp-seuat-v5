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
     
      <form id="formEditCaja">
      <div class="modal-body">


<div class="form-group">
    <label for="exampleInputEmail1" class="label">Nombre:</label>
    <input type="text" class="form-control" id="txtNombreEdit" name="txtNombreEdit" required>

    <label for="exampleInputEmail1" class="label">Plantel:</label>
    <div class="input-group mb-3">
        <select class="custom-select" id="txtPlantelEdit" name="txtPlantelEdit" required>
            <?php
            for ($i = 0; $i < count($data['Planteles']); $i++) { ?>
                <option value="<?php echo ($data['Planteles'][$i]['id']) ?>"><?php
                                                                            echo ($data['Planteles'][$i]['nombre_plantel_fisico']);
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

    <label for="exampleInputEmail1" class="label">Sistema Educativo:</label>
    <div class="input-group mb-3">
        <select class="custom-select" id="txtSistemaEduEdit" name="txtSistemaEduEdit" required>
            <?php
            for ($i = 0; $i < count($data['SistemasEdu']); $i++) { ?>
                <option value="<?php echo ($data['SistemasEdu'][$i]['id']) ?>"><?php
                                                                            echo ($data['SistemasEdu'][$i]['nombre_sistema']);
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
        
        
    <label for="exampleInputEmail1" class="label">Usuario atiende:</label>
    <div class="input-group mb-3">
        <select class="custom-select" id="txtUsuariosEdit" name="txtUsuariosEdit" required>
            <?php
            for ($i = 0; $i < count($data['Usuarios']); $i++) { ?>
                <option value="<?php echo ($data['Usuarios'][$i]['id']) ?>"><?php
                                                                            echo ($data['Usuarios'][$i]['nickname']);
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
        <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>

</div>
</div>
</div>