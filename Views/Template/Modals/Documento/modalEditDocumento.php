<!-- Modal editar documento -->
<div class="modal fade" id="modalEditDocumento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formNuevoDocumentoEdit">
                <div class="modal-body">

                 <!-- etiqueta identificador de grupo -->
                <label for="exampleInputEmail1" style="display: none;" class="label">id</label>
                <input type="text" class="form-control" id="txtIdUsuario" name="txtIdUsuario" style="display: none;">

                 <!-- etiqueta nombre de grupo -->
                 <div class="mb-3">
                        <label for="exampleInputEmail1" class="label">Nombre del documento:</label>
                        <input type="text" class="form-control form-control-sm" id="nombre-Documento-Edit" name="nombre-Documento-Edit" maxlength="40" required>
                            
                            
                            
                             <!-- etiqueta Rol -->
                             <label for="exampleInputEmail1" class="label">Tipo de documento:</label>
                             <div class="input-group mb-3">
                             <select class="custom-select custom-select-sm" id="tipo-Documento-Edit" name="tipo-Documento-Edit" >
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
                            
                             <!-- etiqueta nombre de grupo -->
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="label">Cantidad de documentos recibidos:</label>
                        <input type="number" class="form-control form-control-sm" id="cantidad-Documentos-Edit" name="cantidad-Documentos-Edit" required>       
                            </div>

                             <!-- etiqueta nombre de grupo -->
                             <div class="custom-control custom-checkbox">
                             <input type="checkbox" class="custom-control-input" id="documento-Original-Edit" name="documento-Original-Edit">
                             <label class="custom-control-label" for="documento-Original-Edit">Se recibieron documentos originales</label>                           
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