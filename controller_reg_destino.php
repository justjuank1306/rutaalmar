<?php 
include('app/config/config.php');

$nombre = $_GET['Nombre'];


date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO destino (Nombre)
values(:Nombre)");

$sentencia->bindParam('Nombre',$nombre);





if ($sentencia->execute()){
    //echo "<script>alert('insertando');</script>";
    header('location:'.$url.'/registro_boleteria.php');
} else {
    echo "<script>alert('Categoria no Registrada');</script>";
}


  





?>