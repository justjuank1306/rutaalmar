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


  <title>Listado de boleteria</title>


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
<style type="text/css">
        main {
            width: 100%;
            display: flex;
        }
        main .content {
            width: 60%;
        }
    </style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">

            <div class="container-fluid">
              <div class="row mb-4">
                <div class="col-sm-12">
                
                  <h1>Libro de Boleteria  </h1>
				  <main>
				 <div class="col-sm-1">
                  <div class="info-box mb-3 bg-info">
                      <div class="info-box-content">
                        <span class="content" class="info-box-text">I</span>
                        <span class="info-box-number">
                        <?php
                        $query_consultasaldo = $pdo->prepare("select (SELECT Sum(Entrada) - Sum(Salida)) as Saldo from boleteria  WHERE Id_Categoria= '1' and Id_Estado='1'");
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
				  </div>
				 </div> 
				 
				 				 <div class="col-sm-1">
                  <div class="info-box mb-3 bg-info">
                     <span class="info-box-icon"></span>

                      <div class="info-box-content">
                        <span  class="content" class="info-box-text">II</span>
                        <span class="info-box-number">
                        <?php
                        $query_consultasaldo = $pdo->prepare("select (SELECT Sum(Entrada) - Sum(Salida)) as SaldoII from boleteria  WHERE Id_Categoria= '2' and Id_Estado='1'");
                        $query_consultasaldo->execute();
                        $saldoII = $query_consultasaldo->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($saldoII as $saldoII) {
                        $saldoII = $saldoII['SaldoII'];

                        ?>
                         <option value="<?php echo $saldoII; ?>"><?php echo $saldoII; ?></option>
                        <?php
                          }
                          ?>
                        </span>
                       </div>
				  </div>
				 </div> 
				 
				 				 <div class="col-sm-1">
                  <div class="info-box mb-3 bg-info">

                      <div class="info-box-content">
                         <span  class="content" class="info-box-text">III</span>
                        <span class="info-box-number">
                        <?php
                        $query_consultasaldo = $pdo->prepare("select (SELECT Sum(Entrada) - Sum(Salida)) as Saldo from boleteria  WHERE Id_Categoria= '3' and Id_Estado='1'");
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
				  </div>
				 </div> 
				 
				 				 <div class="col-sm-1">
                  <div class="info-box mb-3 bg-info">

                      <div class="info-box-content">
                         <span  class="content" class="info-box-text">IV</span>
                        <span class="info-box-number">
                        <?php
                        $query_consultasaldo = $pdo->prepare("select (SELECT Sum(Entrada) - Sum(Salida)) as Saldo from boleteria  WHERE Id_Categoria= '4' and Id_Estado='1'");
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
				  </div>
				 </div> 
				 
				 				 <div class="col-sm-1">
                  <div class="info-box mb-3 bg-info">

                      <div class="info-box-content">
                         <span  class="content" class="info-box-text">VA</span>
                        <span class="info-box-number">
                        <?php
                        $query_consultasaldo = $pdo->prepare("select (SELECT Sum(Entrada) - Sum(Salida)) as Saldo from boleteria  WHERE Id_Categoria= '5' and Id_Estado='1'");
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
				  </div>
				 </div> 
				 				 <div class="col-sm-1">
                  <div class="info-box mb-3 bg-info">

                      <div class="info-box-content">
                        <span  class="content" class="info-box-text">VB</span>
                        <span class="info-box-number">
                        <?php
                        $query_consultasaldo = $pdo->prepare("select (SELECT Sum(Entrada) - Sum(Salida)) as Saldo from boleteria  WHERE Id_Categoria= '6' and Id_Estado='1'");
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
				  </div>
				 </div> 
				 
				 				 <div class="col-sm-1">
                  <div class="info-box mb-3 bg-info">

                      <div class="info-box-content">
                         <span  class="content" class="info-box-text">VI</span>
                        <span class="info-box-number">
                        <?php
                        $query_consultasaldo = $pdo->prepare("select (SELECT Sum(Entrada) - Sum(Salida)) as Saldo from boleteria  WHERE Id_Categoria= '7' and Id_Estado='1'");
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
				  </div>
				 </div> 
				 
				 				 <div class="col-sm-1">
                  <div class="info-box mb-3 bg-info">

                      <div class="info-box-content">
                        <span  class="content" class="info-box-text">VII</span>
                        <span class="info-box-number">
                        <?php
                        $query_consultasaldo = $pdo->prepare("select (SELECT Sum(Entrada) - Sum(Salida)) as Saldo from boleteria  WHERE Id_Categoria= '8' and Id_Estado='1'");
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
				  </div>
				 </div> 
				 </main>
				 
				 
			  </div>
              <!-- /.info-box-content -->
            </div>

          </section>

        <!-- Main content -->
		
		
		

        <!-- Main content -->
        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-primary">listado Movimientos Boleteria
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_boleteria">
                        <i class="glyphicon glyphicon-plus">+</i>
                      </button>
            </div>
            <div class="panel-body">
              <table class="table table-bordered table-hover table-condensed">
              <th>Nro</th>
              <th>Fecha_Hora</th>
			  <th>Boleta_Inicial</th>
			  <th>Boleta_Final</th>
              <th>Entran</th>
              <th>Salen</th>
              <th>Saldo</th>
              <th>Destino</th>
              <th>Responsable</th>
              <th>Fecha_Creacion</th>
              <?php
              $query_boleterias = $pdo->prepare("SELECT 
			  TbBoleteria.Id_Boleteria,
			  TbBoleteria.Fecha_Hora,
			  TbBoleteria.Boleta_Inicial,
			  TbBoleteria.Boleta_Final,
			  TbBoleteria.Entrada,
			  TbBoleteria.Salida,
			  TbBoleteria.Saldo,
			  TbDestino.Nombre as Destino,
			  TbUsuario.Nombre,
			  TbBoleteria.Fecha_Creacion
              FROM boleteria TbBoleteria 
              JOIN firma TbFirma ON TbBoleteria.Id_Firma = TbFirma.Id_Firma 
              JOIN usuario TbUsuario ON TbFirma.Id_Usuario = TbUsuario.Id_Usuario 
			  JOIN destino TbDestino ON TbDestino.Id_Destino = TbBoleteria.Id_Destino
              JOIN estacion TbEstacion on TbBoleteria.Id_Estacion=TbEstacion.Id_Estacion
              WHERE TbBoleteria.Id_Estado <> 0");
              $query_boleterias->execute();
              $boleterias = $query_boleterias->fetchAll(PDO::FETCH_ASSOC);
              foreach ($boleterias as $boleteria) {
                $Id_Boleteria = $boleteria['Id_Boleteria'];
                $Fecha_Hora = $boleteria['Fecha_Hora'];
			    $Boleta_Inicial = $boleteria['Boleta_Inicial'];
			    $Boleta_Final = $boleteria['Boleta_Final'];
                $Entrada = $boleteria['Entrada'];
                $Salida = $boleteria['Salida'];
                $Saldo = $boleteria['Saldo'];
                $Destino = $boleteria['Destino'];
                $Responsable = $boleteria['Nombre'];
                $Fecha_Creacion = $boleteria['Fecha_Creacion'];
                ?>
                  <tr>
                  <td>
                    <center><?php echo $Id_Boleteria ?></center>
                  </td>
                  <td><?php echo $Fecha_Hora ?></td>
				  <td><?php echo $Boleta_Inicial ?></td>
                  <td><?php echo $Boleta_Final ?></td>
                  <td><?php echo $Entrada ?></td>
                  <td><?php echo $Salida ?></td>
                  <td><?php echo $Saldo ?></td>
                  <td><?php echo $Destino ?></td>
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
<!-- INICIA MODAL PARA AGREGAR ALA TABLA  boleteria  DESDE LA VISTA SUPERVISOR-->


<div class="modal fade" id="myModal_boleteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_boleteria.php" method="get">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Boleteria</h4>
        </div>
        <div class="modal-body">

          <div class="row">

            <div class="col-md-12">
              <label>Fecha </label>
              <input type="date" class="form-control" name="Fecha_Hora" required>
			        <label>Categoria</label>
              <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_categoria">
                        <i class="glyphicon glyphicon-plus">+</i>
                      </button>
              <select name="Categoria" id="" class="form-control">
                        <option value="">Selecciona una categoria</option>


                        <?php

                        $query_consultacategoria = $pdo->prepare("SELECT * FROM categoria WHERE Id_Estado='1'");
                        $query_consultacategoria->execute();
                        $categorias = $query_consultacategoria->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($categorias as $categorias) {
                          $id_Categoria = $categorias['Id_Categoria'];
                          $nombre = $categorias['Nombre'];

                        ?>


                          <option name="Categoria" value="<?php echo $id_Categoria; ?>"><?php echo $nombre; ?></option>
                        <?php

                        }
                        ?>

                      </select>
                      
			        <label>Boleta_Inicial </label>
              <input type="text" class="form-control" name="BoletaInicial" required>
              <label>Boleta_Final </label>
              <input type="text" class="form-control" name="BoletaFinal" required>
              <label>Entrada </label>
              <input type="text" class="form-control" id="entrada" name="Entrada" required>
              <label>Salida </label>
              <input type="text" class="form-control" id="salida" name="Salida" required>
              <label hidden= "true">Saldo inicial</label>
              <input type="text" class="form-control" id="saldoinicial" name="Saldoinicial" value = "<?php echo $saldos ?>" hidden= "true">
              <label>Saldo</label>
              <input type="text" class="form-control" id="saldofinal" name="Saldo">
			   <label>Destino </label>
			    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_destino">
                        <i class="glyphicon glyphicon-plus">+</i>
                </button>
              <select name="Destino" id="" class="form-control">
                        <option value="">Selecciona un Destino</option>


                        <?php

                        $query_consultadestino = $pdo->prepare("SELECT * FROM destino WHERE Id_Estado='1'");
                        $query_consultadestino->execute();
                        $destinos = $query_consultadestino->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($destinos as $destinos) {
                          $id_Destino = $destinos['Id_Destino'];
                          $nombre = $destinos['Nombre'];

                        ?>


                          <option name="Destino" value="<?php echo $id_Destino; ?>"><?php echo $nombre; ?></option>
                        <?php

                        }
                        ?>

                      </select>
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
<!-- INICIA MODAL PARA AGREGAR MAS CATEGORIA  ALA TABLA CATEGORIA DESDE LA VISTA SUPERVISOR-->

<div class="modal fade" id="myModal_categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_categoria.php" method="get">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Categoria</h4>
        </div>
        <div class="modal-body">

          <div class="row">

            <div class="col-md-12">
              <label>Codigo </label>
              <input type="tex" class="form-control" name="Codigo" placeholder="Digite el codigo" required>
              <label>Nombre </label>
              <input type="tex" class="form-control" name="Nombre" placeholder="Digite el nombre" required>
              <label>Descripcion </label>
              <input type="tex" class="form-control" name="Descripcion" placeholder="Digite la descripcion" required>
              <label>Numero de ejes sencillos</label>
              <input type="tex" class="form-control" name="Ejes" placeholder="Digite el Numero de ejes sencillos" required>
              <label>Numero de ejes dobles </label>
              <input type="tex" class="form-control" name="Dobles" placeholder="Digite el Numero de ejes dobles" required>

            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-primary" value="Guardar Categoria">
        </div>
      </div>
    </form>
  </div>
</div>

<!-- FINALIZA MODAL PARA AGREGAR MAS CATEGORIA  ALA TABLA CATEGORIA DESDE LA VISTA SUPERVISOR-->

<!-- INICIA MODAL PARA AGREGAR MAS DESTINO  ALA TABLA DESTINO DESDE LA VISTA SUPERVISOR-->

<div class="modal fade" id="myModal_destino" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_destino.php" method="get">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="Cancelar" data-dismiss="modal" aria-label="Cancelar"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Destino</h4>
        </div>
        <div class="modal-body">

          <div class="row">

            <div class="col-md-12">
              <label>Nombre </label>
              <input type="tex" class="form-control" name="Nombre" placeholder="Digite el nombre" required>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-primary" value="Guardar Destino">
        </div>
      </div>
    </form>
  </div>
</div>

<!-- FINALIZA MODAL PARA AGREGAR MAS DESTINO  ALA TABLA DESTINO DESDE LA VISTA SUPERVISOR-->


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