<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../layout/head.php');
  ?>
  <Style>
    [class*=sidebar-dark-] {
      background-color: #104981;
    }
  </Style>

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index3.html" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contactenos</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../libreria/recursos/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../libreria/recursos/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../libreria/recursos/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="../libreria/recursos/dist/img/loglogruta.png" alt="logoruta" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AppRuta</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../libreria/recursos/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">nombredeusuarioregistrado</a>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../usuarios/index.php" class="nav-link">
                    <i class="far fa-user"></i>
                    <p>Lista de Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../usuarios/create.php" class="nav-link">
                    <i class="far fa-user"></i>
                    <p>Crear Usuario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../principal.php" class="nav-link">
                    <i class="far fa-user"></i>
                    <p>Usuario Logeado</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">LABELS</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Important</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Warning</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Informational</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Creacion de Usuarios</h1>
            </div>


          </div><!-- /.container-fluid -->
      </section>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Creacion de Usuario</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <!--FORMULARIO DE REGISTRO-->

        <div class="card-body">
          <form action="controller_create.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col md-5 mx-auto">
                <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text" class="form-control" name="Nombre" required>
                </div>

                <div class="form-group">
                  <label for="">Apellidos</label>
                  <input type="text" class="form-control" name="Apellido" required>
                </div>

                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" name="Email" required>
                </div>

                <div class="form-group">
                  <label for="">Identificación</label>
                  <input type="text" class="form-control" name="Identificacion" required>
                </div>





              </div>

              <div class="col md-5 mx-auto">

                <div class="form-group">
                  <label for="">Empresa</label>
                  <select class="form-control" name="Empresa" required>
                    <option value="">Selecciona la Empresa </option>
                    <option value="1">Corumar</option>
                    <option value="2">Ani</option>
                    <option value="3">Seracis</option>
                    <option value="4">Condor</option>
                    <option value="5">Iegrupo</option>
                    <option value="6">Prometalicos</option>
                    <option value="7">Supertransporte</option>
                    <option value="8">Brinks</option>
                    <option value="9">Otros</option>


                  </select>
                </div>

                <div class="form-group">
                  <label for="">Estacion</label>
                  <select class="form-control" name="Estacion" required>
                    <option value="">Selecciona la Estacion</option>
                    <option value="1">La Apartada</option>
                    <option value="2">Los Manguitos</option>
                    <option value="3">San Carlos</option>
                    <option value="4">Purgatorio</option>
                    <option value="5">Los cedros</option>
                    <option value="6">Mata de caña</option>
                    <option value="7">Caimanera</option>
                    <option value="8">San Onofre</option>
                    <option value="9">Bascula Manguitos1</option>
                    <option value="10">Bascula Manguitos2</option>
                    <option value="11">Bascula Mata de Caña1</option>
                    <option value="12">Bascula Mata de Caña2</option>
                    <option value="13">Bascula San Onofre1</option>
                    <option value="14">Bascula San Onofre2</option>
                    <option value="15">Otros</option>


                  </select>
                </div>

                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="Password" required>
                </div>



                <div class="form-group">
                  <label for="">Cargo</label>
                  <select class="form-control" name="Cargo" required>
                    <option value="">Selecciona un cargo</option>
                    <option value="1">Analista de sistemas</option>
                    <option value="2">Analista de soporte</option>
                    <option value="3">Auditoría</option>
                    <option value="4">Director</option>
                    <option value="5">Gerente</option>
                    <option value="6">Interventoria</option>
                    <option value="7">Jefe de peaje</option>
                    <option value="8">Recoctor</option>
                    <option value="9">Residente Operativo</option>
                    <option value="10">Servicios Generales</option>
                    <option value="11">Sst</option>
                    <option value="12">Supervisor</option>
                    <option value="13">Tecnico de Pesaje</option>
                    <option value="14">Tecnico de Peaje</option>
                    <option value="15">Vigilante</option>
                    <option value="16">Otros</option>

                  </select>

                </div>


              </div>




            </div>

            <div class="col-md-12">
              <center>
                <a href="" class="btn btn-warning">Cancelar</a>
                <input type="submit" class="btn btn-success" value="Registrar">
              </center>
            </div>

        </div>
        </form>

        <!-- *****fIN FORMULARIO DE REGISTRO USUARIOS***-->

      </div>



      <!-- Main content -->


    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2023 <a href="#">AppRuta</a>.</strong> todos los derechos reservados.

    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="../libreria/recursos/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../libreria/recursos/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../libreria/recursos/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../libreria/recursos/dist/js/demo.js"></script>
</body>

</html>