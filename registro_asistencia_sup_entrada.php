<?php

// aqui inicia llamado ala base datos//
include('app/config/config.php');
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
  <?php include('layout/menu.php'); ?>
  <!--Aqui finaliza el encabezado-->


  <title>Usuario Login</title>


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
            <a href="#" class="nav-link"><?php echo ($Id_Cargo == "1" ? "Administrador" : "Operador"); ?></a>
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
              <!-- User image aqui vemos -->
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

        </li>
        </ul>
      </nav>
      <!-- /.navbar -->





      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
          <img src="libreria/recursos/dist/img/loglogruta.png" alt="logoruta" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Control Peajes</span>
        </a>




        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="libreria/recursos/dist/img/loglogruta.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $Nombre ?></a>

            </div>
          </div>

          <!-- Sidebar Menu -->


          <!--Aqui sehace llamado del menu lateral -->
          <?php include('vista_administrador.php'); ?>
          <!--Aqui finaliza el llamado de menu lateral-->

          <!--Aqui sehace llamado del menu lateral -->
          <?php include('vista_supervisor.php'); ?>
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
                  <img src="libreria/recursos/dist/img/loglogruta.png" alt="Logo" style="width: 70px; height: 70px; float: center;">

                  <h1> Registro de Asistencia Entrada </h1>


          </section>
        </center>

        <!-- Main content -->

        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-primary"></div>
            <div class="panel-body">

              <!--AQUI VAMOS INICIAR FORMULARIO DE ASISTENCIA DE ENTRADA-->

              <form action="controller_asistencia.php" method="get">

                <div class="row">

                  <div class="col-md-5 mx-auto">

                    <div class="form-group">
                      <label for="">Cargo</label>
                      <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_cargo">
                        <i class="glyphicon glyphicon-plus">+</i>
                      </button>
                      <select name="cargo" id="" class="form-control">
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

                      <div class="form-group">
                        <label for="">Empresa</label>
                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_empresa">
                          <i class="glyphicon glyphicon-plus">+</i>
                        </button>
                        <select name="empresa" id="" class="form-control">
                          <option value="">Selecciona una Empresa</option>


                          <?php

                          $query_consultaempresa = $pdo->prepare("SELECT * FROM empresa WHERE Id_Estado='1'");
                          $query_consultaempresa->execute();
                          $empresanueva = $query_consultaempresa->fetchAll(PDO::FETCH_ASSOC);


                          foreach ($empresanueva as $empresanueva) {
                            $id_empresa = $empresanueva['Id_Empresa'];
                            $nombre = $empresanueva['Nombre'];

                          ?>


                            <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>
                          <?php

                          }
                          ?>

                        </select>


                      </div>


                    </div>
                    <div class="form-group">
                      <label for="">Identificacion</label>

                      <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_usuarionuevo">
                        <i class="glyphicon glyphicon-plus">+</i>
                      </button>
                      <select name="Identificacion" id="" class="form-control">
                        <option value="">Identificacion</option>


                        <?php

                        $query_consultaid = $pdo->prepare("SELECT * FROM usuario WHERE Id_Estado='1'");
                        $query_consultaid->execute();
                        $idusuarionuevo = $query_consultaid->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($idusuarionuevo as $idusuarionuevo) {
                          $id_usuario = $idusuarionuevo['Id_Usuario'];
                          $nombre = $idusuarionuevo['Nombre'];
                          $apellido = $idusuarionuevo['Apellido'];
                          $pasword = $idusuarionuevo['Password'];
                          $identificacion = $idusuarionuevo['Identificacion'];
                          $cargo = $idusuarionuevo['Cargo'];
                          $empresa = $idusuarionuevo['Empresa'];
                          $estacion = $idusuarionuevo['Estacion'];

                        ?>


                          <option value="<?php echo $identificacion; ?>"><?php echo $identificacion; ?></option>
                        <?php

                        }
                        ?>

                      </select>


                    </div>


                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="tex" class="form-control" name="Nombre">


                    </div>



                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="tex" class="form-control" name="Apellido">
                    </div>

                    <!--inicia en este  campo del formulario de asistencia se configura un modal para agregar cargos-->



                    <!--finaliza en este  campo del formulario de asistencia y se  configura un modal para agregar cargos-->







                    <div class="form-group">
                      <label>Observaciones</label>
                      <input type="tex" class="form-control" name="Observaciones">
                    </div>

                  </div>

                  <!--inicia en este  campo del formulario de asistencia se configura un modal para agregar Estaciones-->




                  <div class="col-md-5 mx-auto"><!--    division del formulario             -->




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


                          <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>
                        <?php

                        }
                        ?>

                      </select>
                    </div>

                    <!--inicia en este  campo del formulario de asistencia se configura un modal para agregar Estaciones-->


                    <div class="form-group">
                      <label>Fecha_hora_entrada</label>
                      <input type="date" class="form-control" name="Fecha_hora_entrada">
                    </div>

                    <!--<div class="form-group">
      <label>Fecha_hora_salida</label>
      <input type="date" class="form-control" name="Fecha_hora_salida">
    </div>-->

                    <div class="form-group">
                      <label>Dinero_Reportado</label>
                      <input type="text" class="form-control" name="Dinero_Reportado">
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

      <!-- /.content-wrapper 

<footer class="main-footer">
<div class="float-right d-none d-sm-block">
<b>Version</b> 1.0.0
</div>
<strong>Copyright &copy; 2023 <a href="#">AppRuta</a>.</strong> todos los derechos reservados.

</footer>-->


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







<!-- INICIA MODAL PARA AGREGAR MAS usuarios  ALA TABLA  usuarios  DESDE LA VISTA SUPERVISOR-->


<div class="modal fade" id="myModal_usuarionuevo" tabindex="-1" role="dialog" aria-labelledby="myModal_usuarionuevo">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_usuario_nuevo.php" method="get">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Usuario Nuevo</h4>
        </div>
        <div class="modal-body">

          <div class="row">

            <div class="col-md-12">
              <label>Identificacion</label>
              <input type="tex" class="form-control" name="Identificacion" required>



              <label>Nombre </label>
              <input type="tex" class="form-control" name="Nombre" required>

              <label>Apellido </label>
              <input type="tex" class="form-control" name="Apellido" required>

              <label>Email </label>
              <input type="tex" class="form-control" name="Email" required>


              <label>Password </label>
              <input type="Password" class="form-control" name="Password" required>


              <label for="">Cargooooo</label>
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


                  <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>
                <?php

                }
                ?>

              </select>

              <label for="">Empresaaaaaaaa</label>
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


                  <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>
                <?php

                }
                ?>

              </select>


              <label for="">Estacionnnnnnn</label>
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


                          <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>
                        <?php

                        }
                        ?>

                      </select>

            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-primary" value="Guardar usuario">
        </div>
      </div>
    </form>
  </div>
</div>

<!-- FINALIZA MODAL PARA AGREGAR usuario nuevo ALA TABLA  usuario DESDE LA VISTA SUPERVISOR-->


<!-- INICIA MODAL PARA AGREGAR MAS empresa  ALA TABLA  empresa  DESDE LA VISTA SUPERVISOR-->


<div class="modal fade" id="myModal_empresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_empresa.php" method="get">
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

<!--<a href='login/controller_cerrar_sesion.php'>Cerrar Sesion </a>-->

</div>
</div>

</section>


</div>
<!-- /.content-wrapper -->

<?php include('layout/footer.php') ?>


<!-- Control Sidebar menu superior  derecho aplicaciones-->

<!--<aside class="control-sidebar control-sidebar-dark">-->
<!-- Control sidebar content goes here -->
<!--</aside>-->

<!-- /.control-sidebar superior  derecho    aplicaciones-->


</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="libreria/recursos/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="libreria/recursos/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="libreria/recursos/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="libreria/recursos/dist/js/demo.js"></script>
</body>

</html>


<!--FIN PLANTILLA INDEX DE USUARIO-->