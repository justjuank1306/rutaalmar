<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'peajesrmar');
$url= 'http://localhost/rutaalmar';
$servidor = "mysql:dbname=".DB_NAME.";host=".DB_SERVER;
// Conectar a la base de datos utilizando PDO
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
 
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Obtener los datos del formulario
$cargo = $_GET['cargo'];
$empresa = $_GET['empresa'];
$identificacion = $_GET['Identificacion'];
$nombre = $_GET['Nombre'];
$apellido = $_GET['Apellido'];
$observaciones = $_GET['Observaciones'];
$estacion = $_GET['Estacion'];
$fecha_hora_entrada = $_GET['Fecha_hora_entrada'];
//$fecha_hora_salida = $_GET['Fecha_hora_salida'];
$dinero_reportado = $_GET['Dinero_Reportado'];
$firma = $_GET['firma'];


echo $cargo;
echo $empresa;
echo $identificacion;
echo $nombre;
echo $apellido;
echo $observaciones;
echo $estacion;
echo $fecha_hora_entrada;
echo $dinero_reportado;
echo $firma;

date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO asistencia (Id_Asistencia,Id_Cargo,Id_Empresa,Identificacion,Nombre,Apellido,Observaciones,Id_Estacion,Fecha_hora_entrada,Dinero_Reportado,Id_Firma )
values(:Id_Asistencia, :Id_Cargo, :Id_Empresa, :Identificacion, :Nombre, :Apellido, :Observaciones, :Id_Estacion, :Fecha_hora_entrada, :Dinero_Reportado, :Id_Firma)");


$sentencia->bindParam('Id_Asistencia',$id_asistencia);
$sentencia->bindParam('Id_Cargo',$cargo);
$sentencia->bindParam('Id_Empresa',$empresa);
$sentencia->bindParam('Identificacion',$identificacion);
$sentencia->bindParam('Nombre',$nombre);
$sentencia->bindParam('Apellido',$apellido);
$sentencia->bindParam('Observaciones',$observaciones);
$sentencia->bindParam('Id_Estacion',$estacion);
$sentencia->bindParam('Fecha_hora_entrada',$fecha_hora_entrada);
//$sentencia->bindParam('Fecha_hora_salida',$fecha_hora_salida);
$sentencia->bindParam('Dinero_Reportado',$dinero_reportado);
$sentencia->bindParam('Id_Firma',$firma);


if ($sentencia->execute()){
    //echo "<script>alert('insertando');</script>";
    header('location:'.$url.'/asistencia');
} else {
    echo "<script>alert('Usuario no Registrado');</script>";
}


?>



