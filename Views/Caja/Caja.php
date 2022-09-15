<?php
  headerAdmin($data);
  getModal('Caja/modalCaja', $data);
 getModal('Caja/modalCajaEdit', $data);
?>
<div id="contentAjax"></div>
<div class="wrapper">
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h1 class="m-0">  <?= $data['page_title'] ?>

            </h1>
          </div>
          <div class="col-sm-5">
          <ol class="breadcrumb float-sm-right btn-block">
                            <button type="button" id="btn-NuevaCaja"
                                class="btn btn-inline btn-primary btn-sm btn-block" data-toggle="modal"
                                data-target="#modalCaja">
                                <i class="fa fa-plus-circle fa-md"></i> Nuevo</button>
                        </ol>
            </ol>
          </div>
        </div>
      </div>
    </div>


    <div class="content">
      <div class="container-fluid">
        <div class="row ">
        <div class="col-lg-12">


<div class="card">
  <div class="card-body">
    <h3 class="card-title">Listado de cajas </h3>
    <p class="card-text">
    <table id="tableCajas" class="table table-bordered table-striped table-hover table-sm">
      <thead>
      <tr>
        <th width="7%">#</th>
        <th width>Nombre caja</th>
        <th width="15%">Plantel</th>
        <th width="15%">Nombre usuario</th>
        <th width="15%">Estatus</th>
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

<?php footerAdmin($data); ?>