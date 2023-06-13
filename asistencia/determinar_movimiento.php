<?php 
       

// aqui inicia llamado ala base datos//
require("../app/config/conectar.php");

if (isset($_POST["Identificacion"])) {
     
  $cedula = test_input($_POST["Identificacion"]);

 //Consulto si la cedula esta registrada 
//$sql = "SELECT * FROM usuario WHERE Identificacion='$cedula'";
$sql = "SELECT
  TbEmpleado.Id_Empleado,
  TbEmpleado.Nombre,
  TbEmpleado.Apellido,
  TbEmpleado.Identificacion,
  TbCargo.Nombre Cargo,
  TbEmpresa.Nombre Empresa,
  TbEstacion.Nombre Estacion,
  TbEstado.Nombre Estado,
  TbEmpleado.Fecha_Creacion
  FROM empleado TbEmpleado
  JOIN cargo TbCargo ON TbEmpleado.Id_cargo = TbCargo.Id_cargo 
  JOIN empresa TbEmpresa ON TbEmpleado.Id_Empresa = TbEmpresa.Id_Empresa
  JOIN estacion TbEstacion on TbEmpleado.Id_Estacion = TbEstacion.Id_Estacion
  JOIN estado TbEstado on TbEmpleado.Id_Estado = TbEstado.Id_Estado
  WHERE TbEmpleado.Identificacion='$cedula' AND TbEmpleado.Id_Estado = '1'";
$result = $conn->query($sql);

 //traigo los datos del  registro 
$row = $result->fetch_assoc();

 //$sql = "SELECT * FROM usuario WHERE Identificacion = '$cedula'";
 $sql = "SELECT
   TbEmpleado.Id_Empleado,
   TbEmpleado.Nombre,
   TbEmpleado.Apellido,
   TbEmpleado.Identificacion,
   TbCargo.Nombre Cargo,
   TbEmpresa.Nombre Empresa,
   TbEstacion.Nombre Estacion,
   TbEstado.Nombre Estado,
   TbEmpleado.Fecha_Creacion
   FROM empleado TbEmpleado
   JOIN cargo TbCargo ON TbEmpleado.Id_cargo = TbCargo.Id_cargo 
   JOIN empresa TbEmpresa ON TbEmpleado.Id_Empresa = TbEmpresa.Id_Empresa
   JOIN estacion TbEstacion on TbEmpleado.Id_Estacion = TbEstacion.Id_Estacion
   JOIN estado TbEstado on TbEmpleado.Id_Estado = TbEstado.Id_Estado
   WHERE TbEmpleado.Identificacion='$cedula' AND TbEmpleado.Id_Estado = '1' ";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       
      $count = mysqli_num_rows($result);
	

      if($count > 0) {

 $fecha = date("Y-m-d");
 $dinero = $_POST['Dinero'];
 $hora = date("H:i:s");
 $usuario = $_POST['UsuarioRegistra'];
 $firma = $_POST['base64'];
 // codigo para guardar la imagen de la firma en formato .png
 $firma = str_replace('data:image/png;base64,', '', $firma);
 $fileData = base64_decode($firma);
 $fileName = '../public/firmas/' .uniqid().'.png';
 file_put_contents($fileName, $fileData);
 //fin del codigo guardar firma


        //Consulto si la cedula esta registrada en asistencia
      $sql2 = "SELECT * FROM asistenciav2 WHERE Identificacion = '$cedula'and Id_Estado = '4'";
      $result2 = mysqli_query($connect,$sql2);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
       
     $count2 = mysqli_num_rows($result2);
     
           $par = abs($count2%2);



          if ($par == 0){ 
                              
                               //$tipo = "Entrada"; // PARA INGRESAR EN REGISTROS DIFERENTES EN LA BD
                               $entrada = "Entrada";
							      
   
  // $query = "INSERT INTO Asistenciav2 (Identificacion,  Tipo, Dinero_Reportado, Fecha, Id_Usuario, Firma) VALUES ('$cedula', '$tipo', '$dinero', '$fecha', '$usuarioreg', '$firma')";
   $query = "INSERT INTO Asistenciav2 (Identificacion,  Entrada, Dinero_Reportado, Fecha, Id_Usuario_Reg,Id_Usuario_Sal, Firma) VALUES ('$cedula', '$entrada', '$dinero', '$fecha', '$usuario', '$usuario', '$firma')";
    
   
    $result = mysqli_query($connect,$query);
    $movimiento = 0; 
  

   } else{ 
                               
                               // $tipo = "Salida";// PARA INGRESAR EN REGISTROS DIFERENTES EN LA BD
                                $salida = "Salida";
  
 //$query = "INSERT INTO Asistenciav2 (Identificacion,  Tipo, Dinero_Reportado, Fecha, Id_Usuario, Firma ) VALUES ('$cedula', '$tipo', '$dinero', '$fecha', '$usuarioreg', '$firma')";
 $query = "UPDATE asistenciav2 SET Id_Estado = '5', Dinero_Entregado = '$dinero',Salida = '$salida', firma_Salida = '$firma', Id_Usuario_Sal = '$usuario' WHERE asistenciav2.Identificacion = '$cedula' and asistenciav2.Id_Estado = '4'"; 

 $result = mysqli_query($connect,$query);
     $movimiento = 1; 
                       
                            
        
        } 
        } else {

       
         header("location: registro_asistencia.php?error");
      }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
