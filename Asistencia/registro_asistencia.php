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


  <title>Registro de asistencia</title>


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
                  <img src=".//libreria/recursos/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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


          <!-- INICIO MENU SUPERIOR DERECHO -->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

              <span class="d-none d-md-inline"><?php echo $Nombre . "-" . $Apellido ?></span>

            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image -->
              <li class="user-header bg-primary">
                <img src="../libreria/recursos/dist/img/loglogruta.png" class="img-circle elevation-2" alt="User Image">

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
            <a href="login/controller_cerrar_sesion.php" class="btn btn-default btn-flat">Cerrar Sesion </a>
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
              <img src="../libreria/recursos/dist/img/loglogruta.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $Nombre ?></a>

            </div>
          </div>

          <!--Aqui sehace llamado del menu lateral -->
          <?php include('../layout/menunavegacion.php'); ?>
          <!--Aqui finaliza el llamado de menu lateral-->


        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <center>
          <section class="content-header">

            <div class="container-fluid">
              <div class="row mb-4">
                <div class="col-sm-12">
                  <img src="../libreria/recursos/dist/img/loglogruta.png" alt="Logo" style="width: 70px; height: 70px; float: center;">

                  <h1>REGISTRO DE ASISTENCIA PERSONAL</h1>


          </section>
        </center>
        <!-- Main content -->


        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-heading"></div>
            <div class="panel-body">


              <!--AQUI VAMOS INICIAR FORMULARIO DE ASISTENCIA-->

              <form action="controllorer_asistencia.php" method="get">

                <div class="row">
                  <div class="col-md-5 mx-auto">

                    <div class="form-group">
                      <label>Identificacion</label>
                      <input type="tex" class="form-control" name="Identificacion">
                    </div>


                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="tex" class="form-control" name="">
                    </div>

                    <div class="form-group">
                      <label>Apellidos</label>
                      <input type="tex" class="form-control">
                    </div>

                    <!--inicia en este  campo del formulario de asistencia se configura un modal para agregar cargos-->

                    <div class="form-group">
                      <label for="">Cargo</label>
                      <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_cargo">
                        <i class="glyphicon glyphicon-plus">+</i>
                      </button>
                      <select name="" id="" class="form-control">
                        <option value="">Selecciona un cargo</option>


                        <?php

                        $query_consultacargo = $pdo->prepare("SELECT * FROM cargo WHERE Id_Estado='1'");
                        $query_consultacargo->execute();
                        $cargos = $query_consultacargo->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($cargos as $cargos) {
                          $id_Cargo = $cargos['Id_Cargo'];
                          $nombre = $cargos['Nombre'];

                        ?>


                          <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>
                        <?php

                        }
                        ?>

                      </select>


                    </div>

                    <!--finaliza en este  campo del formulario de asistencia y se  configura un modal para agregar cargos-->



                    <div class="form-group">
                      <label>Observaciones</label>
                      <input type="tex" class="form-control">
                    </div>

                  </div>

                  <!--inicia en este  campo del formulario de asistencia se configura un modal para agregar Estaciones-->

                  <div class="col-md-5 mx-auto">
                    <div class="form-group">
                      <label for="">Estacion</label>
                      <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_estacion">
                        <i class="glyphicon glyphicon-plus">+</i>
                      </button>
                      <select name="" id="" class="form-control">
                        <option value="">Selecciona una Estacion</option>


                        <?php

                        $query_consultaestacion = $pdo->prepare("SELECT * FROM estacion WHERE Id_Estado='1'");
                        $query_consultaestacion->execute();
                        $estaciones = $query_consultaestacion->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($estaciones as $estaciones) {
                          $id_estacion = $estaciones['Id_Estacion'];
                          $nombre = $estaciones['Nombre'];

                        ?>


                          <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>
                        <?php

                        }
                        ?>

                      </select>
                    </div>

                    <!--inicia en este  campo del formulario de asistencia se configura un modal para agregar Estaciones-->


                    <div class="form-group">
                      <label>Fecha_hora_entrada</label>
                      <input type="date" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Fecha_hora_salida</label>
                      <input type="date" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Dinero_Reportado</label>
                      <input type="text" class="form-control">
                    </div>


                    <div class="form-group">
                      <label style="vertical-align: middle;">Firma</label>
                      <canvas id="canvas"></canvas>
                      <input type="hidden" name="firma" id="firma">

                    </div>

                    <div class="row">
                      <div class="col-md-12">

                        <input type="Submit" class="btn btn-success" value="Regsitrar Personal">
                        <a href="" class="btn btn-warning">Cancelar</a>

                        <button type="button" class="btn btn-default " id="limpiar">Limpiar firma</button>
                      </div>
                    </div>

              </form>

              <script>
                $(document).ready(function() {
                  var canvas = document.getElementById('canvas');
                  var signaturePad = new SignaturePad(canvas);

                  // Dibuja la línea recta en el canvas
                  var context = canvas.getContext('2d');
                  context.beginPath();
                  context.moveTo(0, canvas.height / 2);
                  context.lineTo(canvas.width, canvas.height / 2);
                  context.strokeStyle = 'grey';
                  context.lineWidth = 2;
                  context.stroke();

                  // Captura la firma del usuario al enviar el formulario
                  $('form').submit(function() {
                    var firma = signaturePad.toDataURL();
                    $('#firma').val(firma);

                    // Limpia el contenido del canvas cuando se hace clic en el botón "Limpiar firma
                  });
                  $('#limpiar').click(function() {
                    signaturePad.clear();
                  });
                });
              </script>


              <!--<a href='login/controller_cerrar_sesion.php'>Cerrar Sesion </a>-->
              <!--AQUI FINALIZA FORMULARIO DE ASISTENCIA-->
            </div>
          </div>

        </section>

      </div>

      <!-- /.content-wrapper -->

      <!--include('../layout/footer.php') hay que meter este codigo en php-->

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


  <!--FIN PLANTILLA INDEX DE USUARIO-->


<?php

  // echo "<a href='login/controller_cerrar_sesion.php'>Cerrar Sesion </a> ";



} else {
  echo "<script>alert('No existe ninguna sesion activa');</script>";
  header('location:' . $url . '/login');
}

?>

<!-- INICIA MODAL PARA AGREGAR MAS CARGOS  ALA TABLA CARGO DESDE LA VISTA SUPERVISOR-->

<div class="modal fade" id="myModal_cargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_cargo.php" method="get">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Cargos</h4>
        </div>
        <div class="modal-body">

          <div class="row">

            <div class="col-md-12">
              <label>Nuevos Cargos </label>
              <input type="tex" class="form-control" name="Nombre" required>

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

<!-- FINALIZA MODAL PARA AGREGAR MAS CARGOS  ALA TABLA CARGO DESDE LA VISTA SUPERVISOR-->






<!-- INICIA MODAL PARA AGREGAR MAS ESTACIONES  ALA TABLA  ESTACION DESDE LA VISTA SUPERVISOR-->


<div class="modal fade" id="myModal_estacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_estacion.php" method="get">
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