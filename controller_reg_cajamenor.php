<?php 
include('app/config/config.php');

$fecha_hora = $_GET['Fecha_Hora'];
$entrada = $_GET['Entrada'];
$salida = $_GET['Salida'];
$saldo = $_GET['Saldo'];
$concepto = $_GET['Concepto'];
$estacion = $_GET['Estacion'];
$firma = $_GET['Firma'];
$observaciones = $_GET['Observaciones'];




date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO cajamenor (Fecha_Hora, Entrada,Salida,Saldo, Concepto, Id_Estacion, Id_Firma, Observaciones)
values(:Fecha_Hora, :Entrada,:Salida,:Saldo,:Concepto, :Estacion, :Firma, :Observaciones)");


$sentencia->bindParam('Fecha_Hora',$fecha_hora);
$sentencia->bindParam('Entrada',$entrada);
$sentencia->bindParam('Salida',$salida);
$sentencia->bindParam('Saldo',$saldo);
$sentencia->bindParam('Concepto',$concepto);
$sentencia->bindParam('Estacion',$estacion);
$sentencia->bindParam('Firma',$firma);
$sentencia->bindParam('Observaciones',$observaciones);

 //echo "<script>alert('Concepto');</script>";


if ($sentencia->execute()){

  // echo "<script>alert('Feha_Hora');</script>";
    header('location:'.$url.'/registro_cajamenor.php');
} else {
    echo "<script>alert('Usuario no Registrado');</script>";
}


  



?>