<?php
    headerAdmin($data);
    getModal('ConsultasIngresosEgresos/modalBuscarAlumno',$data);
    getModal('ConsultasIngresosEgresos/modalEditarEstadoCuenta',$data);
?>
<div id="contentAjax"></div>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2">
                    <div>
                        <h1 class="m-0">  <?= $data['page_title'] ?></h1><br>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" style="background-color:#FFF !important" id="txtNombrealumno" class="form-control" placeholder="Matricula o RFC">
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" id="btnBuscar" class="form-control btn btn-primary">Buscar</button>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" id="btnBuscarAlumno"class="form-control btn btn-primary" data-toggle="modal" data-target="#ModalBuscarAlumno">Buscar por nombre</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
            <div class="card-text">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 row">
                                    <div class="col-12 card_dato_cta">
                                        <div class="row mb-5">
                                            <div class="overlay-wrapper" id="loading-datos">
                                                <div class="overlay">
                                                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                                </div>    
                                            </div>
                                            <!--Datos del Alumno-->
                                            <div class="col-md-6">
                                                <div class="card p-2 h-100" >
                                                    <div class="card-body">
                                                        <div class="border-bottom border-gray-light pb-3 mb-3 row">
                                                            <div class="col-md-2 text-center">                                                          
                                                                <img id="imgSexo" src="" width="60" height="60" loading="lazy" alt="???" class="rounded-circle me-3">
                                                            </div>
                                                            <div class="col-md-10 text-center">
                                                                <h2 id="nomAlumEdoCta"></h2>
                                                                <div class="row">
                                                                    <a href="" class="col-md-6 mb-1 fs-6 text-gray">
                                                                        <i class="fas fa-phone-alt text-primary fa-xs"></i><br><span id="telCelAlumno"></span>
                                                                    </a>
                                                                    <a href="" class="col-md-6 mb-1 fs-6 text-gray">
                                                                        <i class="fa fa-envelope text-primary"></i><br><span id="emailAlumno"></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul>
                                                            <li class="mb-1">
                                                                <h3 class="h6 me-4 d-inline-block"><b>Sexo: </b></h3>
                                                                <span id="sexoAlumno" class="text-muted"></span>
                                                            </li>
                                                            <li class="mb-1">
                                                                <h3 class="h6 me-4 d-inline-block"><b>Direcci??n: </b></h3>
                                                                <span id="domicilioAlumno" class="text-muted"></span>
                                                            </li>
                                                            <li class="mb-1">
                                                                <h3 class="h6 fw-semi-bold me-4 d-inline-block"><b>Carrera: </b></h3>
                                                                <span id="carreraAlumno" class="text-gray"></span>
                                                            </li>
                                                            <li class="mb-1">
                                                                <h3 class="h6 fw-semi-bold me-4 d-inline-block"><b>Grado y Grupo: </b></h3>
                                                                <span id="nombreSalon" class="text-gray"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Cuenta-->
                                            <div class="col-md-6">
                                                <div class="card p-2 h-100">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 text-center">
                                                                <p class="text-gray mb-2">Saldo total</p>
                                                                <h3 class="fw-semi-bold"><b><span id="totalSaldo"></span></b></h3>
                                                            </div>
                                                            <div class="col-sm-6 text-center">
                                                                    <p class="text-gray mb-1">Saldo en colegiaturas</p>
                                                                    <h5 class="fw-semi-bold"><span id="saldoColegiaturas"></span></h5>
                                                                </div>                                            
                                                                <div class="col-sm-6 text-center">
                                                                    <p class="text-gray mb-1">Saldo en Servicios</p>
                                                                    <h5 class="fw-semi-bold"><span id="saldoServicios"></span></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr color="white"/>
                                                             <div class="md-4">
                                                                <div class="col-md-12 form-group text-align: center;"><button id="btnVerEdoCta" class="form-control btn btn-primary">Ver estado de cuenta</button></div>
                                                                <div class="col-md-12 form-group text-align: center;"><button class="form-control btn btn-secondary" id="btnImprimirEdoCta">Imprimir</button></div>
                                                            </div>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                 </div>                             
                                <div class="card-text" style="overflow-x: auto;white-space: nowrap;">
                                    <table id="tableEstadoCuenta" class="table table-bordered table-striped table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Concepto</th>
                                                <th>C??digo servicio</th>
                                                <th>Cargo</th>
                                                <th>Abono</th>
                                                <th>Saldo</th>
                                                <th>Fecha limite</th>
                                                <th>Pagado en:</th>
                                                <th>Referencia</th>
                                                <th>Tipo comprobante</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
<?php footerAdmin($data); ?>


