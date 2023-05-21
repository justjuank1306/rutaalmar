<?php

// aqui inicia llamado ala base datos//
include('../app/config/config.php');
// aqui finaliza el llamado de la base datos


// Inicia codigo es para mantetene una sesion activa des//
session_start();
if (isset($_SESSION['u_usuario'])) {

  //echo "<script>alert('Existe una sesion activa');</script>";
  //echo "<script>alert('Ingreso correcto Bienvenido');</script>";
  // finaliza e codigo es para mantetene una sesion activa des//


  // con este codigo capturamos elinciiao de sesion de un usuario//
  $identificacion_sesion = $_SESSION['u_usuario'];

  $query_sesion = $pdo->prepare("SELECT
  TbUsuario.Id_Usuario,
  TbUsuario.Nombre,
  TbUsuario.Apellido,
  TbUsuario.Email,
  TbUsuario.Password,
  TbUsuario.Identificacion,
  TbCargo.Nombre Cargo,
  TbEmpresa.Nombre Empresa,
  TbEstacion.Nombre Estacion,
  TbEstado.Nombre Estado,
  TbUsuario.Fecha_Creacion,
  TbUsuario.Id_Cargo
  FROM usuario TbUsuario 
  JOIN cargo TbCargo ON TbUsuario.Id_cargo = TbCargo.Id_cargo 
  JOIN empresa TbEmpresa ON TbUsuario.Id_Empresa = TbEmpresa.Id_Empresa
  JOIN estacion TbEstacion on TbUsuario.Id_Estacion = TbEstacion.Id_Estacion
  JOIN estado TbEstado on TbUsuario.Id_Estado = TbEstado.Id_Estado
  WHERE TbUsuario.Identificacion ='$identificacion_sesion' AND TbUsuario.Id_Estado = '1' ");
  $query_sesion->execute();
  $sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);


  foreach ($sesion_usuarios as $sesion_usuario) {
    $id_sesion = $sesion_usuario['Id_Usuario'];
    $Nombre    = $sesion_usuario['Nombre'];
    $Apellido    = $sesion_usuario['Apellido'];
    $Email    = $sesion_usuario['Email'];
    $Password    = $sesion_usuario['Password'];
    $Identificacion    = $sesion_usuario['Identificacion'];
    $Cargo    = $sesion_usuario['Cargo'];
    $Empresa    = $sesion_usuario['Empresa'];
    $Estacion    = $sesion_usuario['Estacion'];
    $Estado    = $sesion_usuario['Estado'];
    $Fecha_Creacion    = $sesion_usuario['Fecha_Creacion'];
    $Id_Cargo    = $sesion_usuario['Id_Cargo'];
  }

?>

  <!-- finaliza codigo capturamos elinciiao de sesion de un usuario-->


  <!--Aqui Inicia en encabezado -->
  <?php include('../layout/head.php'); ?>
  <!--Aqui finaliza el encabezado-->


  <title>Lista de usuarios </title>


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
            <a href="#" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link"><?php if ($Id_Cargo == "1") echo ("Administrador") ?></a>
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
          <!-- INICIO MENU SUPERIOR DERECHO -->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

              <span class="d-none d-md-inline"><?php echo $Nombre . "-" . $Apellido ?></span>

            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image esto es index usuarios -->
              <li class="user-header bg-primary">
                <img src="libreria/recursos/dist/img/loglogruta.png" class="img-circle elevation-2" alt="User Image">

                <p>
                  <span class="d-none d-md-inline"><?php echo $Nombre . "-" . $Apellido ?></span>
                  <small><span class="d-none d-md-inline"><?php echo  $Identificacion ?></span></small>
                </p>
              </li>


              <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <!--<a href="#" class="btn btn-default btn-flat">Perfil</a>-->
            <a href="../login/controller_cerrar_sesion.php" class="btn btn-default btn-flat">Cerrar Sesion </a>
          </li>
        </ul>
        </li>
        <!-- FIN MENU SUPERIOR DERECHO -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">

        </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
          <img src="../libreria/recursos/dist/img/loglogruta.png" alt="logoruta" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Ruta al Mar</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="../libreria/recursos/dist/img/loglogruta.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $Nombre ?></a>

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

              <li class="nav-header">LIBROS DE ASISTENCIA</li>
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
                <h1>Lista de Usuarios</h1>

        </section>
        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-heading">listado de Usuarios</div>
            <div class="panel-body">
              <table class="table table-bordered table-hover table-condensed">
                <th>Nro</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Password</th>
                <th>Identificacion</th>
                <th>Cargo</th>
                <th>Empresa</th>
                <th>Estacion</th>
                <th>Estado</th>
                <th>Fecha_Creacion</th>
                <?php
                $contador_usuario = 0;
                $query_usuarios = $pdo->prepare("SELECT
                TbUsuario.Id_Usuario,
                TbUsuario.Nombre,
                TbUsuario.Apellido,
                TbUsuario.Email,
                TbUsuario.Password,
                TbUsuario.Identificacion,
                TbCargo.Nombre Cargo,
                TbEmpresa.Nombre Empresa,
                TbEstacion.Nombre Estacion,
                TbEstado.Nombre Estado,
                TbUsuario.Fecha_Creacion
                FROM usuario TbUsuario 
                JOIN cargo TbCargo ON TbUsuario.Id_cargo = TbCargo.Id_cargo 
                JOIN empresa TbEmpresa ON TbUsuario.Id_Empresa = TbEmpresa.Id_Empresa
                JOIN estacion TbEstacion on TbUsuario.Id_Estacion = TbEstacion.Id_Estacion
                JOIN estado TbEstado on TbUsuario.Id_Estado = TbEstado.Id_Estado");
                $query_usuarios->execute();
                $usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

                foreach ($usuarios as $usuario) {
                  $Id_Usuario = $usuario['Id_Usuario'];
                  $Nombre = $usuario['Nombre'];
                  $Apellido = $usuario['Apellido'];
                  $Email = $usuario['Email'];
                  $Password = $usuario['Password'];
                  $Identificacion = $usuario['Identificacion'];
                  $Cargo = $usuario['Cargo'];
                  $Empresa = $usuario['Empresa'];
                  $Estacion = $usuario['Estacion'];
                  $Estado = $usuario['Estado'];
                  $Fecha_Creacion = $usuario['Fecha_Creacion'];
                  $contador_usuario = $contador_usuario + 1;
                ?>
                  <tr>
                    <td>
                      <center><?php echo $contador_usuario ?></center>
                    </td>
                    <td><?php echo $Nombre ?></td>
                    <td><?php echo $Apellido ?></td>
                    <td><?php echo $Email ?></td>
                    <td><?php echo $Password ?></td>
                    <td><?php echo $Identificacion ?></td>
                    <td><?php echo $Cargo ?></td>
                    <td><?php echo $Empresa ?></td>
                    <td><?php echo $Estacion ?></td>
                    <td><?php echo $Estado ?></td>
                    <td><?php echo $Fecha_Creacion ?></td>
                  </tr>

                <?php
                }
                ?>



              </table>
            </div>
          </div>

        </section>

      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2023 <a href="#">AppRuta</a>.</strong> todos los derechos reservados.
        <style>
          .main-footer {
            background-color: #91c0f2;
            border-top: 1px solid #dee2e6;
            color: #869099;
            padding: 1rem;
          }
        </style>
      </footer>
      <!-- Control Sidebar -->

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
    <!-- Ad -->
    <script src="../libreria/recursos/dist/js/demo.js"></script>
  </body>

  </html>

<?php

  // echo "<a href='login/controller_cerrar_sesion.php'>Cerrar Sesion </a> ";



} else {
  echo "<script>alert('No existe ninguna sesion activa');</script>";
  header('location:' . $url . '/login');
}

?>