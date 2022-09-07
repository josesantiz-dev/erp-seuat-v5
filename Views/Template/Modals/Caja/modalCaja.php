<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCaja">
  Launch demo modal
</button>

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
   
      
      <div class="form-group">
    <label for="exampleInputEmail1" class="label">Nombre</label>
    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
    
    <label for="exampleInputEmail1" class="label">Atiende</label>
    <input type="number" class="form-control" id="txtAtiende" name="txtid_usuario_atiende" required>

    <label for="exampleInputEmail1" class="label">Plantel</label>
    <input type="text" class="form-control" id="txtPlantel" name="txtnombre_plantel_fisico" required>

    <label for="exampleInputEmail1" class="label">Sistema Educativo</label>
    <input type="text" class="form-control" id="Sistema Educativo" name="txtnombre_sistema" required>

   
   <label for="exampleInputEmail1" class="label">Fecha Creacion</label>
    <input type="date" class="form-control" id="dateFechaCreacion" name="dateFechaCreacion"
       value="2018-07-22"
       min="2010-01-01" max="2022-12-31" required>

       
       <label for="exampleInputEmail1" class="label">Fecha Actualizacion</label>
       <input type="date" class="form-control" id="datefechaActualizacion" name="datefechaActualizacion"
       value="2018-07-22"
       min="2010-01-01" max="2022-12-31" required>
 
 
    
  
  
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

