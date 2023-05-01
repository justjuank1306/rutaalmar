<?php 
include('../app/config/config.php');

$nombre = $_GET['Nombre'];
$id_cargo = $_GET['Id_Cargo'];




date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO cargo (Nombre, Id_Cargo)
values(:Nombre, :Id_Cargo)");


$sentencia->bindParam('Nombre',$nombre);
$sentencia->bindParam('Id_Cargo',$id_cargo);




if ($sentencia->execute()){
    //echo "<script>alert('insertando');</script>";
    header('location:'.$url.'/asistencia/registro_asistencia.php');
} else {
    echo "<script>alert('Usuario no Registrado');</script>";
}


  





?>