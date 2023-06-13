<?php

// aqui inicia llamado ala base datos//
include('../app/config/config.php');
include('../app/config/conectar.php');
require("determinar_movimiento.php");
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
  <?php include('../layout/menu.php'); ?>
  <!--Aqui finaliza el encabezado-->


  <title>Formulario de Asistencia</title>


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
            <a href="../login/controller_cerrar_sesion.php" class="btn btn-default btn-flat">Cerrar Sesion </a>
          </li>
        </ul>
        </li>


        <!-- FIN MENU SUPERIOR DERECHO -->

        <!-- boton expandir pantalla  -->

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
          <span class="brand-text font-weight-light">Control Peajes</span>
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


          <!--Aqui sehace llamado del menu lateral -->
          <?php include('../vista_administrador.php'); ?>
          <!--Aqui finaliza el llamado de menu lateral-->

          <!--Aqui sehace llamado del menu lateral -->
          <?php include('../vista_supervisor.php'); ?>
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

                  <h1> Registro de Asistencia Personal </h1>


          </section>
        </center>

        <!-- Main content -->

        <section class="content">
          <div class="panel panel-primary">
            <div class="panel-primary"></div>
            <div class="panel-body">

              <!--AQUI VAMOS INICIAR FORMULARIO DE ASISTENCIA DE ENTRADA-->

              <form  action="registro_asistencia.php" id="form" method="POST">
	

                <div class="row">
			

                     </div>  

                  <div class="col-md-5 mx-auto">
				  
				  <div style="text-align:center;color:red;font-weight:900"> <?php

  
                        if(isset($_GET["error"]))
                              {
                            ?>
                            <div class="alert alert-danger">
                             <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo "No hay empleado registrado con esa cedula "; ?> !
                         </div>
                         <?php
                     }
                      
                     ?>

<?php

 
                        if(isset($movimiento) and ($movimiento==0))
                        {
                            ?>
                             <div style="color:Green">
                             <?php echo "Identificacion: ".$cedula; echo "<br>"; ?>
                              <?php  echo "Nombre y Apellido: ".$row["Nombre"];  echo " ";  echo $row["Apellido"]; echo "<br>";  ?>
							  <?php  echo "Cargo: ".$row["Cargo"]; echo "<br>";  ?>
							  <?php echo "Dinero Reportado: $ ".$dinero; echo "<br>"; ?>
                              <!-- <img src="admin/empleados/fotos/</?php echo $row['foto']; ?>" class="img-rounded" width="64px" height="64px" />-->
                                <?php echo "<br>"; ?>
								<?php echo $entrada; echo ": "; echo $hora; ?> 
                         </div>
                         <?php
                     }
                      if(isset($movimiento) and ($movimiento==1))
                        {
                            ?>
                             <div  style="color:Red">
                              <?php echo "Identificacion: ".$cedula; echo "<br>"; ?>
                                 <?php  echo "Nombre y Apellido: ".$row["Nombre"];  echo " ";  echo $row["Apellido"]; echo "<br>"; ?>
								 <?php  echo "Cargo: ".$row["Cargo"]; echo "<br>";  ?>
								 <?php echo "Dinero Reportado: $ ".$dinero; echo "<br>"; ?>
                                 <!-- <img src="admin/empleados/fotos/</?php echo $row['foto']; ?>" class="img-rounded" width="64px" height="64px" /> -->
                                  <?php echo "<br>"; ?>
								  <?php echo $salida; echo ": "; echo $hora; ?> 
                         </div>
          
                         <?php
                     }
                    
                       
                     ?>
				  </div>
				 
                    <div class="form-group">
                      <label>Identificacion *</label>
                      <input type="tex" class="form-control" name="Identificacion" maxlength="10" onkeypress="return isNumberKey(event)" placeholder="Identificacion" required="" autofocus="" >
                    </div>
					
					
					 <div class="form-group">
                      <label>Dineros Reportados*</label>
                      <input type="tex" class="form-control" name="Dinero" maxlength="10" onkeypress="return isNumberKey(event)" placeholder="Cantidad de dinero Reportado" required="" autofocus="" >
                    </div>
		
                    <!--<div class="form-group">
                      <label>Observaciones</label>
                      <input type="hidden" class="form-control" name="Observaciones" placeholder="Observacion">
                    </div> -->
					
					<div class="form-group">
                     <!-- <label>Usuario Registra</label> -->
                      <input type="hidden" class="form-control" name="UsuarioRegistra" value="<?php echo $id_sesion ?>">
                    </div>
					
                   <!-- Contenedor y Elemento Canvas -->
					<div id="signature-pad" class="signature-pad" >
				    <div class="description">Firme aqui</div>
					<div class="signature-pad--body">
					<canvas style="width: 440px; height: 60px; border: 0px black solid; " id="canvas"></canvas>
					<input type="text" name="base64" value="" id="base64">
					</div>
					</div>
					
                 
                    <div class="row">
                      <div class="col-md-12">
                        <!--<a href="" class="btn btn-warning">Cancelar</a>
                        <button type="button" class="btn btn-default " id="limpiar">Limpiar firma</button> -->
						<button id="saveandfinish" class="btn btn-lg btn-success btn-block" type="submit">Guardar y Finalizar</button>  
                      </div>
                    </div>
                 </div>
              </form>
			  
			  
				<script type="text/javascript">
					<!-- funcion para validar solo numeros en el input identificacion
					function isNumberKey(evt)
					{
					var charCode = (evt.which) ? evt.which : event.keyCode
					if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;
					return true;
					}
					//-->
				</script>
				
			<script type="text/javascript">

var wrapper = document.getElementById("signature-pad");

var canvas = wrapper.querySelector("canvas");
var signaturePad = new SignaturePad(canvas, {
  backgroundColor: 'rgb(255, 255, 255)'
});

function resizeCanvas() {

  var ratio =  Math.max(window.devicePixelRatio || 1, 1);

  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);

  signaturePad.clear();
}

window.onresize = resizeCanvas;
resizeCanvas();

</script>
<script>

   document.getElementById('form').addEventListener("submit",function(e){

    var ctx = document.getElementById("canvas");
      var image = ctx.toDataURL(); // data:image/png....
      document.getElementById('base64').value = image;
   },false);

</script>	
             


              <!--AQUI FINALIZA FORMULARIO DE ASISTENCIA-->
            </div>
          </div>

        </section>

      </div>

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


<?php include('../layout/footer.php') ?>


<!-- Control Sidebar menu superior  derecho aplicaciones-->

<!--<aside class="control-sidebar control-sidebar-dark">-->
<!-- Control sidebar content goes here -->
<!--</aside>-->

<!-- /.control-sidebar superior  derecho    aplicaciones-->


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
<!-- signature para firmas  -->
<script src="../libreria/signature/signature_pad.js"></script>

</body>

</html>


<!--FIN PLANTILLA INDEX DE USUARIO-->