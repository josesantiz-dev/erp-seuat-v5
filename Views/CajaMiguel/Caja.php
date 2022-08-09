<?php
  headerAdmin($data);
  getModal('CajaMiguel/modalNuevaGeneracion', $data);
?>
<div id="contentAjax"></div>
<div class="wrapper">
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h1 class="m-0">  <?= $data['page_title'] ?>