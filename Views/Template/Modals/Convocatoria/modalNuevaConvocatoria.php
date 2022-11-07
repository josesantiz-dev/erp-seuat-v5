<!-- Modal nuevo grupo -->
<div class="modal fade" id="modalNuevaConvocatoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Convocatoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formNuevaConvocatoria">
                <div class="modal-body">
                    <div class="container-fluid">
                    <div class="row">

                 <!-- etiqueta Nombre de usuario -->
                 <div class="col-md-12">
                        <label for="exampleInputEmail1" class="label">Nombre de la convocatoria:</label>
                        <input type="text" class="form-control" id="nombreConvocatoria" name="nombreConvocatoria" required>
</div>
</div>
                        
                                <div class="row">
                                <div class="col-4 ml-auto">
                                <label for="exampleInputEmail1" class="label">Plantel:</label>
                                <select class="custom-select" id="nombrePlantel" name="nombrePlantel">
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

<div class="col-4 col-md-4">
                                <label for="exampleInputEmail1" class="label">Nivel de estudios:</label>
                                <select class="custom-select" id="nivelEstudios" name="nivelEstudios">
                                <?php
                                for ($i = 0; $i < count($data['Escolaridad']); $i++) { ?>
                                    <option value="<?php echo ($data['Escolaridad'][$i]['id']) ?>"><?php
                                                                                                echo ($data['Escolaridad'][$i]['nombre_escolaridad']);                                                                                           
                                                                                                ?></option>

                                <?php
                                }
                                ?>
  </select>
</div>

<div class="col-4 col-md-4">
                                <label for="exampleInputEmail1" class="label">Plan de estudios:</label>
                                <select class="custom-select" id="planEstudios" name="planEstudios">
                                <?php
                                for ($i = 0; $i < count($data['planEstudios']); $i++) { ?>
                                    <option value="<?php echo ($data['planEstudios'][$i]['id']) ?>"><?php
                                                                                                echo ($data['planEstudios'][$i]['nombre_carrera']);                                                                                           
                                                                                                ?></option>

                                <?php
                                }
                                ?>
                                <option value="1">Ninguno</option>
  </select>
</div>

<div class="col-4 col-md-4">
                                <label for="exampleInputEmail1" class="label">Periodo de la convocatoria:</label>
                                <select class="custom-select" id="periodoConvocatoria" name="periodoConvocatoria">
                                <?php
                                for ($i = 0; $i < count($data['Periodos']); $i++) { ?>
                                    <option value="<?php echo ($data['Periodos'][$i]['id']) ?>"><?php
                                                                                                echo ($data['Periodos'][$i]['nombre_periodo']);                                                                                           
                                                                                                ?></option>

                                <?php
                                }
                                ?>
  </select>
</div>

<div class="col-4 col-md-4">
                                <label for="exampleInputEmail1" class="label">Fecha de incio de la convocatoria:</label>
                        <input type="text" class="form-control" id="fechaInicio" name="fechaInicio" required>
</div>

<div class="col-4 col-md-4">
                                <label for="exampleInputEmail1" class="label">Fecha de cierre de la convocatoria:</label>
                        <input type="text" class="form-control" id="fechaCierre" name="fechaCierre" required>
</div>
</div>
                                                            
                                                        <hr color="white"/>


<div class="col-12 col-md-12">
                                <label for="exampleInputEmail1" class="label">Seleccionar materias disponibles en la convocatoria:</label>


                             <!-- etiqueta botones -->
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" icon="Sucess" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-xs">Guardar cambios</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
                            </div>
                            </div>
