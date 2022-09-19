<!-- Modal -->
<div class="modal fade" id="modalCaja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de Caja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="formNuevaCaja">
                <div class="modal-body">

                     <!--Linea de nombre del usuario-->
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="label">Nombre:</label>
                        <input type="text" class="form-control form-control-sm" id="txtNombre" name="txtNombre" required>

                        <!--Linea del plantel-->
                        <label for="exampleInputEmail1" class="label">Plantel:</label>
                        <div class="input-group mb-3">
                            <select class="custom-select custom-select-sm" id="txtPlantel" name="txtPlantel" required>
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
                            <select class="custom-select custom-select-sm" id="txtSistemaEdu" name="txtSistemaEdu" required>
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
                            
                                    <!--Linea del usuario atiende-->
                        <label for="exampleInputEmail1" class="label">Usuario atiende:</label>
                        <div class="input-group mb-3">
                            <select class="custom-select custom-select-sm" id="txtUsuarios" name="txtUsuarios" required>
                                <?php
                                for ($i = 0; $i < count($data['Usuarios']); $i++) { ?>
                                    <option value="<?php echo ($data['Usuarios'][$i]['id']) ?>"><?php
                                                                                                echo ($data['Usuarios'][$i]['nickname']."/".$data['Personas'][$i]['nombre_persona']." ".$data['Personas'][$i]['ap_paterno']." ".$data['Personas'][$i]['ap_materno']);
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
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>