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
          <!-- <div class="col-12 col-sm-6"> -->
          
        <!-- ./row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Datos de la convocatoria</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Seleccion de materias disponibles</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <label for="exampleInputEmail1" class="label">Nombre de la convocatoria:</label>
                        <input type="text" class="form-control" id="nombreConvocatoria" name="nombreConvocatoria" required>
                        
                        <div class="row">
                        <div class="col-4 col-sm-3">
                        <label for="exampleInputEmail1" class="label">Plantel:</label>
                        <select class="custom-select" id="nombrePlantel" name="nombrePlantel">
                          <option value="">Seleccione...</option>
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

                        <div class="col-4 col-sm-3">
                        <label for="exampleInputEmail1" class="label">Nivel de estudios:</label>
                        <select class="custom-select" id="nivelEstudios" name="nivelEstudios" onchange="obtenerCarrera(value)">
                          <option value="value1">Seleccione...</option>
                        <?php
                        for ($i = 0; $i < count($data['Escolaridad']); $i++) { ?>
                        <option value="<?php echo ($data['Escolaridad'][$i]['id']) ?>"><?php
                                                                                    echo ($data['Escolaridad'][$i]['nombre_nivel_educativo']);                                                                                           
                                                                                    ?></option>

                        <?php
                        }
                        ?>
                        </select>
                        </div>

                        <div class="col-4 col-md-3">
                        <label for="exampleInputEmail1" class="label">Plan de estudios:</label>
                        <select class="custom-select" id="planEstudios" name="planEstudios">
                          <option value="">Seleccione...</option>
                        <!-- <?php
                        for ($i = 0; $i < count($data['planEstudios']); $i++) { ?>
                        <option value="<?php echo ($data['planEstudios'][$i]['id']) ?>"><?php
                                                                                    echo ($data['planEstudios'][$i]['nombre_carrera']);                                                                                           
                                                                                    ?></option>

                        <?php
                        }
                        ?> -->
                        </select>
                        </div>

                        <div class="col-4 col-md-3">
                        <label for="exampleInputEmail1" class="label">Periodo de convocatoria:</label>
                        <select class="custom-select" id="periodoConvocatoria" name="periodoConvocatoria">
                          <option value="">Seleccione...</option>
                        <!-- <?php
                        for ($i = 0; $i < count($data['Periodos']); $i++) { ?>
                        <option value="<?php echo ($data['Periodos'][$i]['id']) ?>"><?php
                                                                                    echo ($data['Periodos'][$i]['nombre_periodo']);                                                                                           
                                                                                    ?></option>

                        <?php
                        }
                        ?> -->
                        </select>
                        </div>

                        <div class="col-4 col-md-6">
                        <label for="exampleInputEmail1" class="label">Fecha de incio de la convocatoria:</label>
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
                        </div>

                        <div class="col-4 col-md-6">
                        <label for="exampleInputEmail1" class="label">Fecha fin de la convocatoria:</label>
                        <input type="date" class="form-control" id="fechaCierre" name="fechaCierre" required>
                        </div>
                        </div>
                        </div>
                    
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    
                    
                        </div>
                        </div>
                        <div class="card" onclick="obtenerMaterias();">
                            <div class="header">Materias</div>
                            <div class="card-body">
                                <p class="card-text">Materias en checkbox</p>
                                <div id="materias"></div>
                            </div>
                        </div>


                  </div>
                </div>
              </div>
              </div> 
              </div> 
              </div> 
              </div> 
              </div> 
              </div> 
              </div> 
              </div>     
              </div> 
              </div>    