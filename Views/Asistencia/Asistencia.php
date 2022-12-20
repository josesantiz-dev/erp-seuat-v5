<?php
headerAdmin($data);
getModal("Asiatencia/modalNuevaAsistencia", $data);
getModal("Asistencia/modalEditAsistencia", $data);
?>
<div id="contentAjax"></div>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-7">
                        <h1 class="m-0"> <?= $data['page_tag'] ?>

                        </h1>
                    </div>
                    <div class="col-sm-5">
                        <ol class="breadcrumb float-sm-right btn-block">
                            <button type="button" id="btnNuevaAsistencia" onclick="openModal();" class="btn btn-inline btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modalNuevaAsistencia">
                                <i class="fa fa-plus-circle fa-md"></i> Nueva Asistencia</button>
                            <!--<button type="button" onclick="openModal();" class="btn btn-inline btn-primary btn-sm btn-block" data-toggle="modal" data-target="#ModalFormRol"><i class="fa fa-plus-circle fa-md"></i> Nuevo</button>-->
                            <!--<li class="breadcrumb-item"><i class="fa fa-home fa-md"></i><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?= base_url(); ?>/roles"><?= $data['page_title'] ?></a></li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Listado de asistencias</h3>
                                <p class="card-text">
                                <table id="tableasistencias" class="table table-bordered table-striped table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="20%">Grado y grupo</th>
                                            <th width="12%">Materia</th>
                                            <th width="12%">Hora</th>
                                            <th width="12%">Asistencia</th>
                                            <th width="10%">Fecha de asistencia</th>
                                            <th width="10%">estatus</th>
                                            <th width="15%">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                                </p>
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