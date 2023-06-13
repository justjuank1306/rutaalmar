<?php 
include('../app/config/config.php');

$nombre = $_GET['Nombre'];
$id_estacion = $_GET['Id_Estacion'];




date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO estacion (Nombre, Id_Estacion)
values(:Nombre, :Id_Estacion)");


$sentencia->bindParam('Nombre',$nombre);
$sentencia->bindParam('Id_Estacion',$id_estacion);




if ($sentencia->execute()){
    //echo "<script>alert('insertando');</script>";
    header('location:'.$url.'/empleado/registro_empleado.php');
} else {
    echo "<script>alert('Usuario no Registrado');</script>";
}
