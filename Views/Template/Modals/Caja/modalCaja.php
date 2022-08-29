<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCaja">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modalCaja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Caja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <form id="formCaja">
      <div class="modal-body">
      
      <div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>

    
    
    <label for="start">fecha Creacion:</label>

<input type="date" id="dateFechaCreacion" name="dateFechaCreacion"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31" required>

       <label for="start">fecha Actualizacion:</label>

<input type="date" id="datefechaActualizacion" name="datefechaActualizacion"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31" required>
   
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

