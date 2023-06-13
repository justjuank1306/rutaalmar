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

  $query_sesion = $pdo->prepare("SELECT * FROM usuario WHERE Identificacion ='$identificacion_sesion' AND Id_Estado = '1' ");
  $query_sesion->execute();
  $sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);


  foreach ($sesion_usuarios as $sesion_usuario) {
    $id_sesion = $sesion_usuario['Id_Usuario'];
    $Nombre    = $sesion_usuario['Nombre'];
    $Apellido    = $sesion_usuario['Apellido'];
    $Email    = $sesion_usuario['Email'];
    $Password    = $sesion_usuario['Password'];
    $Identificacion    = $sesion_usuario['Identificacion'];
    $Id_Cargo    = $sesion_usuario['Id_Cargo'];
    $Id_Empresa    = $sesion_usuario['Id_Empresa'];
    $Id_Estacion    = $sesion_usuario['Id_Estacion'];
    $Id_Estado    = $sesion_usuario['Id_Estado'];
    $Fecha_Creacion    = $sesion_usuario['Fecha_Creacion'];
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
            <a href="../../index3.html" class="nav-link">Inicio</a>
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

          <!-- INICIO MENU SUPERIOR DERECHO -->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

              <span class="d-none d-md-inline"><?php echo $Nombre . "-" . $Apellido ?></span>

            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image usuario create-->
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
          <span class="brand-text font-weight-light">AppRuta</span>
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
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_empresa">
          <i class="glyphicon glyphicon-plus">+</i>
        </button>
        <select name="Empresa" id="" class="form-control">
          <option value="">Selecciona una Empresa</option>


          <?php

          $query_consultaempresa = $pdo->prepare("SELECT * FROM empresa WHERE Id_Estado='1'");
          $query_consultaempresa->execute();
          $empresanueva = $query_consultaempresa->fetchAll(PDO::FETCH_ASSOC);


          foreach ($empresanueva as $empresanueva) {
            $id_empresa = $empresanueva['Id_Empresa'];
            $nombre = $empresanueva['Nombre'];

          ?>


            <option value="<?php echo $Id_Empresa; ?>"><?php echo $nombre; ?></option>
          <?php

          }
          ?>

        </select> 
                  </div>

                  <div class="form-group">
                    <label for="">Estacion</label>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_estacion">
        <i class="glyphicon glyphicon-plus">+</i>
      </button>
      <select name="Estacion" id="" class="form-control">
        <option value="">Selecciona una Estacion</option>


        <?php

        $query_consultaestacion = $pdo->prepare("SELECT * FROM estacion WHERE Id_Estado='1'");
        $query_consultaestacion->execute();
        $estaciones = $query_consultaestacion->fetchAll(PDO::FETCH_ASSOC);


        foreach ($estaciones as $estaciones) {
          $id_estacion = $estaciones['Id_Estacion'];
          $nombre = $estaciones['Nombre'];

        ?>


          <option value="<?php echo $id_estacion; ?>"><?php echo $nombre; ?></option>
        <?php

        }
        ?>

      </select>
                  </div>

                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="Password" required>
                  </div>



                  <div class="form-group">
                    <label for="">Cargo</label>
<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_cargo">
        <i class="glyphicon glyphicon-plus">+</i>
      </button>
      <select name="Cargo" id="" class="form-control">
        <option value="">Selecciona un cargo</option>


        <?php

        $query_consultacargo = $pdo->prepare("SELECT * FROM cargo WHERE Id_Estado='1'");
        $query_consultacargo->execute();
        $cargos = $query_consultacargo->fetchAll(PDO::FETCH_ASSOC);


        foreach ($cargos as $cargos) {
          $id_Cargo = $cargos['Id_Cargo'];
          $nombre = $cargos['Nombre'];

        ?>


          <option value="<?php echo $id_Cargo; ?>"><?php echo $nombre; ?></option>
        <?php

        }
        ?>

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

<?php

  // echo "<a href='login/controller_cerrar_sesion.php'>Cerrar Sesion </a> ";



} else {
  echo "<script>alert('No existe ninguna sesion activa');</script>";
  header('location:' . $url . '/login');
}

?>



<!-- INICIA MODAL PARA AGREGAR MAS CARGOS  ALA TABLA CARGO DESDE LA VISTA ADMIN-->

<div class="modal fade" id="myModal_cargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<form action="controller_nuevo_cargo.php" method="post">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Cargos</h4>
</div>
<div class="modal-body">

<div class="row">

<div class="col-md-12">
<label>Nuevos Cargos </label>
<input type="tex" class="form-control" name="Nombre" placeholder="Digite el nuevo cargo" required>

</div>

</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
<input type="submit" class="btn btn-primary" value="Guardar Cargo">
</div>
</div>
</form>
</div>
</div>

<!-- FINALIZA MODAL PARA AGREGAR MAS CARGOS  ALA TABLA CARGO DESDE LA VISTA ADMIN-->

<!-- INICIA MODAL PARA AGREGAR MAS ESTACIONES  ALA TABLA  ESTACION DESDE LA VISTA SUPERVISOR-->


<div class="modal fade" id="myModal_estacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<form action="controller_nuevo_estacion.php" method="post">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Estacion</h4>
</div>
<div class="modal-body">

<div class="row">

<div class="col-md-12">
<label>Nueva Estación </label>
<input type="tex" class="form-control" name="Nombre" required>

</div>

</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
<input type="submit" class="btn btn-primary" value="Guardar Estacion">
</div>
</div>
</form>
</div>
</div>

<!-- FINALIZA MODAL PARA AGREGAR MAS ESTACIONES  ALA TABLA  ESTACION DESDE LA VISTA SUPERVISOR-->

<!-- INICIA MODAL PARA AGREGAR MAS empresa  ALA TABLA  empresa  DESDE LA VISTA SUPERVISOR-->


<div class="modal fade" id="myModal_empresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<form action="controller_nuevo_empresa.php" method="post">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Empresa</h4>
</div>
<div class="modal-body">

<div class="row">

<div class="col-md-12">
<label>Nueva Empresa </label>
<input type="tex" class="form-control" name="Nombre" required>

</div>

</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
<input type="submit" class="btn btn-primary" value="Guardar Empresa">
</div>
</div>
</form>
</div>
</div>

<!-- FINALIZA MODAL PARA AGREGAR empresa nuevo ALA TABLA  empresa DESDE LA VISTA SUPERVISOR-->