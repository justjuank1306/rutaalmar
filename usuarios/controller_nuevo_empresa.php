<?php 
include('../app/config/config.php');

$nombre = $_POST['Nombre'];
$id_empresa = $POST['Id_Empresa'];




date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO empresa (Nombre, Id_Empresa)
values(:Nombre, :Id_Empresa)");


$sentencia->bindParam('Nombre',$nombre);
$sentencia->bindParam('Id_Empresa',$id_empresa);




if ($sentencia->execute()){
    //echo "<script>alert('insertando');</script>";
    header('location:'.$url.'/usuarios/create.php');
} else {
    echo "<script>alert('Usuario no Registrado');</script>";
}


  



?>