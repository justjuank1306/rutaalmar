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
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$identificacion = $_POST['Identificacion'];
$cargo = $_POST['Cargo'];
$empresa = $_POST['Empresa'];
$estacion = $_POST['Estacion'];
//$estado = $_POST['Estado'];
//$fecha_creacion = $_POST['Fecha_Creacion'];

$identificacion_tabla ='';

$query_usuarios = $pdo->prepare("SELECT * FROM usuario WHERE Identificacion = '$identificacion'");
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario){
    $identificacion_tabla = $usuario['Identificacion'];


}

if($identificacion_tabla == $identificacion){
    echo "<script>alert('ESte Usuario Ya sta Registrado');</script>";
}else{
    //echo "<script>alert('No existe user');</script>";
  
    date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO usuario
(Id_usuario,Nombre,Apellido,Email,Password,Identificacion,Id_Cargo,Id_Empresa,Id_Estacion)
values(:Id_Usuario,:Nombre,:Apellido,:Email,:Password,:Identificacion,:Id_Cargo,:Id_Empresa,:Id_Estacion)");

$sentencia->bindParam('Id_Usuario',$Id_Usuario);
$sentencia->bindParam('Nombre',$nombre);
$sentencia->bindParam('Apellido',$apellido);
$sentencia->bindParam('Email',$email);
$sentencia->bindParam('Password',$password);
$sentencia->bindParam('Identificacion',$identificacion);
$sentencia->bindParam('Id_Cargo',$cargo);
$sentencia->bindParam('Id_Empresa',$empresa);
$sentencia->bindParam('Id_Estacion',$estacion);
//$sentencia->bindParam('Id_Estado',$estado);
//$sentencia->bindParam('Fecha_Creacion',$fecha_creacion);

print_r ($cargo);
print_r ($empresa);
print_r ($estacion);

if ($sentencia->execute()){
    //echo "<script>alert('Usuario Registrado Correctamente');</script>";
    header('location:'.$url.'/usuarios');
} else {
    echo "<script>alert('Usuario no Registrado');</script>";
}


  
}




