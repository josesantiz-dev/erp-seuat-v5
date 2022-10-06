          <!-- Modal nuevo grupo -->
          <div class="modal fade" id="modalNuevoDocumento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo grupo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <form id="formNuevoDocumento">
          <div class="modal-body">
          <div class="row row-12">

          <!-- Columna para el nombre del documento -->       
          <div class="col-6 col-sm-6">
          <label for="exampleInputEmail1" class="label">Nombre del documento:</label>
          <input type="text" class="form-control form-control-sm" id="nombre-Documento" name="nombre-Documento" maxlength="20" required>
          </div>

          <!-- Columna para el tipo de documento -->
          <div class="col-6 col-sm-6">
          <label for="exampleInputEmail1" class="label">Tipo de documento:</label>
                             <div class="input-group mb-3">
                             <select class="custom-select custom-select-sm" id="tipo-Documento" name="tipo-Documento" >
                                <?php
                                for ($i = 0; $i < count($data['tipoDocumento']); $i++) { ?>
                                    <option value="<?php echo ($data['tipoDocumento'][$i]['id']) ?>"><?php
                                                                                                echo ($data['tipoDocumento'][$i]['nombre_documentos']);
                                                                                                ?></option>

                                <?php
                                }
                                ?>
                            </select>
                            </div>  
                            </div> 

          <!-- Columna para la cantidad de documentos recibidos -->
          <div class="col-6 col-sm-6">
          <label for="exampleInputEmail1" class="label">Cantidad de documentos recibidos:</label>
          <input type="number" class="form-control form-control-sm" id="cantidad-Documentos" name="cantidad-Documentos" maxlength="20" required>
          </div>


          <!-- Columna para los documentos originales -->
          <!-- <div class="col-6 col-sm-6">
          <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="documentos-Originales" name="documentos-Originales">
          <label class="custom-control-label" for="documentos-Originales">Se recibieron documentos orignales</label>    
          </div>
          </div> -->
           
           <!-- Columna para dar un salto en la columna -->
          <div class="col-6 col-sm-6">
          <input type="checkbox" name="documentos-Originales" id="documentos-Originales"> Se recibieron documentos originales
          </div>

           <!-- Columna para agregar documentos extras -->
          <!-- <div class="mb-3">
          <label for="exampleInputEmail1"  class="label">Documentos extras</label> 
          <button type="submit" style='width:150px; height:30px' class="btn btn-primary btn-sm">+ Agregar</button>
          </div> -->
          </div>
          </div>
                        

          <!-- etiqueta botones -->
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" icon="Sucess" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
          </form>
          </div>
          </div>
          </div>