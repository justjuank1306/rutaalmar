<?php 
// aqui inicia llamado ala base datos//
include('app/config/config.php');
date_default_timezone_set("America/Bogota");

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
  TbUsuario.Id_Cargo,
  TbFirma.Id_Firma,
  TbUsuario.Id_Estacion
  FROM usuario TbUsuario 
  JOIN cargo TbCargo ON TbUsuario.Id_cargo = TbCargo.Id_cargo 
  JOIN empresa TbEmpresa ON TbUsuario.Id_Empresa = TbEmpresa.Id_Empresa
  JOIN firma TbFirma ON TbFirma.Id_Firma = TbUsuario.Id_Firma 
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
    $Id_Firma    = $sesion_usuario['Id_Firma'];
    $Id_Estacion    = $sesion_usuario['Id_Estacion'];
  }


?>

  <!-- finaliza codigo capturamos elinciiao de sesion de un usuario-->

  <!--Aqui Inicia en encabezado -->
  <?php include('layout/menu.php'); ?>
  <!--Aqui finaliza el encabezado-->


  <title>Listado de Movimientos</title>


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
          <section class="content-header">

            <div class="container-fluid">
              <div class="row mb-4">
                <div class="col-sm-12">
              
                  <h1>Libro Fondo Recambio </h1>

                  <div class="info-box mb-3 bg-primary">
                     <span class="info-box-icon"><i class="far fa-comment"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text"style="font-size: 20px">Saldo Actual</span>
                        <span class="info-box-number">
                        <?php
                        $query_consultasaldo = $pdo->prepare("select (SELECT Sum(Entrada) - Sum(Salida)) as Saldo from fondorecambio  WHERE Id_Estado='1'");
                        $query_consultasaldo->execute();
                        $saldos = $query_consultasaldo->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($saldos as $saldos) {
                        $saldos = $saldos['Saldo'];

                        ?>
                         <option value="<?php echo $saldos; ?>"><?php echo $saldos; ?></option>
                        <?php
                          }
                          ?>
                        </span>
              </div>
              <!-- /.info-box-content -->
            </div>

          </section>

        <!-- Main content -->
		
		
		

        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-primary">listado Movimientos Caja Menor
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_fondorecambio">
                        <i class="glyphicon glyphicon-plus">+</i>
                      </button>
            </div>
            <div class="panel-body">
              <table class="table table-bordered table-hover table-condensed">
              <th>Nro</th>
              <th>Fecha_Hora</th>
              <th>Entrada</th>
              <th>Salida</th>
              <th>Saldo</th>
              <th>Concepto</th>
              <th>Responsable</th>
              <th>Fecha_Creacion</th>
              <?php
              $query_fondorecambios = $pdo->prepare("SELECT TbFondorecambio.Id_FondoRecambio,TbFondorecambio.Fecha_Hora,TbFondorecambio.Entrada,TbFondorecambio.Salida,TbFondorecambio.Saldo,TbFondorecambio.Concepto,TbUsuario.Nombre,TbFondorecambio.Fecha_Creacion,TbEstacion.Nombre
              FROM fondorecambio TbFondorecambio 
              JOIN firma TbFirma ON TbFondorecambio.Id_Firma = TbFirma.Id_Firma 
              JOIN usuario TbUsuario ON TbFirma.Id_Usuario = TbUsuario.Id_Usuario 
              JOIN estacion TbEstacion on TbFondorecambio.Id_Estacion=TbEstacion.Id_Estacion
              WHERE TbFondorecambio.Id_Estado <> 0");
              $query_fondorecambios->execute();
              $fondorecambios = $query_fondorecambios->fetchAll(PDO::FETCH_ASSOC);
              foreach ($fondorecambios as $fondorecambio) {
                $Id_FondoRecambio = $fondorecambio['Id_FondoRecambio'];
                $Fecha_Hora = $fondorecambio['Fecha_Hora'];
                $Entrada = $fondorecambio['Entrada'];
                $Salida = $fondorecambio['Salida'];
                $Saldo = $fondorecambio['Saldo'];
                $Concepto = $fondorecambio['Concepto'];
                $Responsable = $fondorecambio['Nombre'];
                $Fecha_Creacion = $fondorecambio['Fecha_Creacion'];
                ?>
                  <tr>
                  <td>
                    <center><?php echo $Id_FondoRecambio ?></center>
                  </td>
                  <td><?php echo $Fecha_Hora ?></td>
                  <td><?php echo $Entrada ?></td>
                  <td><?php echo $Salida ?></td>
                  <td><?php echo $Saldo ?></td>
                  <td><?php echo $Concepto ?></td>
                  <td><?php echo $Responsable ?></td>
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


<?php

  // echo "<a href='login/controller_cerrar_sesion.php'>Cerrar Sesion </a> ";



} else {
  echo "<script>alert('No existe ninguna sesion activa');</script>";
  header('location:' . $url . '/login');
}

?>
<!-- INICIA MODAL PARA AGREGAR ALA TABLA  fondorecambio  DESDE LA VISTA SUPERVISOR-->


<div class="modal fade" id="myModal_fondorecambio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_fondorecambio.php" method="get">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Fondorecambio</h4>
        </div>
        <div class="modal-body">

          <div class="row">

            <div class="col-md-12">
              <label>Fecha </label>
              <input type="date" class="form-control" name="Fecha_Hora" required>
              <label>Entrada </label>
              <input type="text" class="form-control" id="entrada" name="Entrada" required>
              <label>Salida </label>
              <input type="text" class="form-control" id="salida" name="Salida" required>
              <label hidden= "true">Saldo inicial</label>
              <input type="text" class="form-control" id="saldoinicial" name="Saldoinicial" value = "<?php echo $saldos ?>" hidden= "true">
              <label>Saldo</label>
              <input type="text" class="form-control" id="saldofinal" name="Saldo">
              <label>Concepto </label>
              <input type="text" class="form-control" name="Concepto" required>
              <label>Observacion </label>
              <input type="text" class="form-control" name="Observaciones">
              <label hidden= "true">Firma </label>
              <input type="text" class="form-control" name="Firma" value = "<?php echo $Id_Firma ?>"hidden= "true">
              <label hidden= "true">Estacion </label>
              <input type="text" class="form-control" name="Estacion" value = "<?php echo $Id_Estacion ?>"hidden= "true">

            </div>
            <script>
        let Entrada = document.getElementById("entrada")
        let Salida = document.getElementById("salida")
        let Saldoinicial = document.getElementById("saldoinicial")
        let Saldofinal = document.getElementById("saldofinal")
        
        Salida.addEventListener("change", () => {
            Saldofinal.value = parseFloat(Saldoinicial.value)+ parseFloat(Entrada.value) - parseFloat(Salida.value)

        })
        
    </script>
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

    <!-- fin de Funcion para mostrar saldo en tiempo real-->
<!-- FINALIZA MODAL PARA AGREGAR ALA TABLA  caja menor DESDE LA VISTA SUPERVISOR-->




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