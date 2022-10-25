<div class="modal fade" id="modal-edit-estado-cuenta" tabindex="-1" role="dialog" aria-labelledby="modalNombrePersonaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar estado de cuenta</h5>
                <button type="button" class="close close-modal-edit-estado-cta" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-modal-edit-estado-cta">
                <input type="hidden" id="id-estado-cta" name="id-estado-cta" value="">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="nombre-servicio">Nombre servicio</label>
                        <input type="text" class="form-control" id="nombre-servicio" placeholder="Nombre del servicio" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fecha-limite-pago">Fecha limite pago</label>
                        <input type="date" class="form-control form-control-sm" id="fecha-limite-pago"
                            name="fecha-limite-pago">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-secondary icono-color-principal btn-inline cerrar-modal-editar-edo-cta" href="#"
                    data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle icono-azul"></i>Cancelar</a>
                <button id="btnActionForm" type="submit" class="btn btn-primary btn-inline">
                    <i class="fa fa-fw fa-lg fa-check-circle icono-azul"></i> Actualizar
                </button>
            </div>
            </form>
        </div>
    </div>
</div>