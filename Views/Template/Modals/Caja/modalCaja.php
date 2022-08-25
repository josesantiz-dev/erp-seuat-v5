<div class="modal fade" id="ModalFormCaja" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header headerUpdaded">
                <h5 class="modal-title" id="titleModalEdit">Cajas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-secondary">
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre caja</th>
                                            <th>Fecha Creacion</th>
                                            <th>Fecha Actualizacion</th>
                                            <th>Estatus</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody id="tableCajas">
                                    </tbody>
                                </table>    
                                <div id="alertSinCaja" class="col-12">
                                </div>     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline-secondary icono-color-principal btn-inline" href="#" data-dismiss="modal" id="dimissModalEdit"><i class="fa fa-fw fa-lg fa-times-circle icono-azul"></i>Cancelar</a>
                </div>   
            </form> 
        </div>
    </div>
</div>