<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevaGeneracion">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modalCaja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <form id="formCaja">
      <div class="modal-body">
   
      
      <div class="form-group">
    <label for="exampleInputEmail1" class="label">Usuario Creacion</label>
    <input type="text" class="form-control" id="txtUsuario Creacion" name="txtUsuario Creacion" required>
    
    <label for="exampleInputEmail1" class="label">Usuario Actualizacion</label>
    <input type="text" class="form-control" id="txtUsuario Actualizacion" name="txtUsuario Actualizacion" required>

    <label for="exampleInputEmail1" class="label">Fecha Creacion</label>
    <input type="date" class="form-control" id="dateFechaCreacion" name="dateFechaCreacion"
       value="2018-07-22"
       min="2010-01-01" max="2022-12-31" required>

       
       <label for="exampleInputEmail1" class="label">Fecha Actualizacion</label>
       <input type="date" class="form-control" id="datefechaActualizacion" name="datefechaActualizacion"
       value="2018-07-22"
       min="2010-01-01" max="2022-12-31" required>