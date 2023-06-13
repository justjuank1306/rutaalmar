<?php 
include('../app/config/config.php');

$codigo= $_GET['Codigo'];
$nombre = $_GET['Nombre'];
$descripcion = $_GET['Descripcion'];
$ejes = $_GET['Ejes'];
$dobles = $_GET['Dobles'];




date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO categoria (Codigo, Nombre, Descripcion, Ejes, Dobles)
values(:Codigo,:Nombre,:Descripcion,:Ejes,:Dobles)");


$sentencia->bindParam('Codigo',$codigo);
$sentencia->bindParam('Nombre',$nombre);
$sentencia->bindParam('Descripcion',$descripcion);
$sentencia->bindParam('Ejes',$ejes);
$sentencia->bindParam('Dobles',$dobles);





if ($sentencia->execute()){
    //echo "<script>alert('insertando');</script>";
    header('location:'.$url.'/boletria/registro_boleteria.php');
} else {
    echo "<script>alert('Categoria no Registrada');</script>";
}


  





?>