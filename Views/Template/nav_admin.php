<body class="hold-transition sidebar-mini">
    <div id="divLoading">
        <div>
            <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
        </div>
    </div>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>-->
            </ul>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <!--<div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search"> 
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>-->
            </form>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="<?php echo media(); ?>/images/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="<?php echo media(); ?>/images/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="<?php echo media(); ?>/images/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge" id="numero_notificaciones">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header" id="titulo_notificaciones">0 Notificaciones</span>
                        <!-- <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a> -->
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i><span id="numero_nuevas_notificaciones"></span>
                            <span class="float-right text-muted text-sm" id="tiempo_ultima_notificacion"></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer" id="ver_todas_notificaciones"></a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>
                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block mt-img-avatar" href="#" data-bs-toggle="dropdown">
                        <img src="<?php echo media(); ?>/images/img/user2-160x160.jpg" height="32" class="img-circle elevation-1" alt="Perfil" /> <span class="text-dark"><?php echo ($_SESSION['nomPersona']) ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Perfil</a>
            <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analyticas</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Configuraci??n & Privacidad</a>
            <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Centro de Ayuda</a>
            <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="<?= base_url(); ?>/logout"><i class="align-middle me-1" data-feather="log-out"></i> Cerrar sesi??n</a>
                    </div>
                </li>
                <!-- Personalizaci??n del tema
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url() ?>" class="brand-link">
                <!--<img src="<?php echo media(); ?>/images/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
                <span class="brand-text font-weight-light">ERP SEUAT</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo media(); ?>/images/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">V??ctor Guzm??n</a>
        </div>
      </div>-->

                <!-- SidebarSearch Form -->
                <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar nav-legacy text-sm nav-compact flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="ml-3 mr-2" data-feather="grid"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/DashboardDirc" class="nav-link active">
                                <i class="ml-3 mr-2" data-feather="grid"></i>
                                <p>
                                    Dashboard Adminitraci??n Educativa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/SeguimientoCajas" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="bar-chart-2"></i>
                                <p>
                                    Prueba
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">
                            <h6>Ingresos y Egresos</h6>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/Ingresos/inscripciones" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="layers"></i>
                                <p>
                                    Inscripciones
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/Ingresos" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="dollar-sign"></i>
                                <p>
                                    Ingresos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/ConsultasIngresosEgresos/consultas" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="pie-chart"></i>
                                <p>
                                    Consultas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/HistorialPagosAlumno/historial" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="corner-right-up"></i>
                                <p>
                                    Historial de pagos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/VentasDia" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="zap"></i>
                                <p>
                                    Ventas del d??a
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/CorteCaja" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="hard-drive"></i>
                                <p>
                                    Corte de caja
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/HistorialCorteCajas" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="activity"></i>
                                <p>
                                    Historial de cortes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>/SeguimientoCajas" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="bar-chart-2"></i>
                                <p>
                                    Seguimiento de cajas
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">
                            <h6>Administraci??n</h6>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ml-3 mr-2" data-feather="settings"></i>
                                <p>
                                    Configuraci??n
                                    <i class="right fas fa-angle-left"></i>
                                    <span class="right badge bg-primary">Nuevo</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="roles" class="nav-link">
                                        <i class="ml-3 mr-2" data-feather="circle"></i>
                                        <p>Roles y permisos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>
        </aside>