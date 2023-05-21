<?php 
include('app/config/config.php');

$nombre = $_GET['Nombre'];
$id_empresa = $_GET['Id_Empresa'];




date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO empresa (Nombre, Id_Empresa)
values(:Nombre, :Id_Empresa)");


$sentencia->bindParam('Nombre',$nombre);
$sentencia->bindParam('Id_Empresa',$id_empresa);




if ($sentencia->execute()){
    //echo "<script>alert('insertando');</script>";
    header('location:'.$url.'/Registro_Asistencia_Sup_Entrada.php');
} else {
    echo "<script>alert('Usuario no Registrado');</script>";
}


  



?>