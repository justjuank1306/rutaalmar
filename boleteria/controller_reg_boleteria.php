<?php 
include('../app/config/config.php');

$fecha_hora = $_GET['Fecha_Hora'];
$categoria = $_GET['Categoria'];
$boletainicial = $_GET['BoletaInicial'];
$boletafinal= $_GET['BoletaFinal'];
$entrada = $_GET['Entrada'];
$salida = $_GET['Salida'];
$saldo = $_GET['Saldo'];
$estacion = $_GET['Estacion'];
$destino = $_GET['Destino'];
$firma = $_GET['Firma'];
$observaciones = $_GET['Observaciones'];

//print_r($categoria);


date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO boleteria (Fecha_Hora,Id_Categoria,Boleta_Inicial,Boleta_Final, Entrada,Salida,Saldo,Id_Estacion,Id_Destino, Id_Firma, Observaciones)
values(:Fecha_Hora,:Categoria,:BoletaInicial,:BoletaFinal,:Entrada,:Salida,:Saldo,:Estacion,:Destino,:Firma,:Observaciones)");


$sentencia->bindParam('Fecha_Hora',$fecha_hora);
$sentencia->bindParam('Categoria',$categoria);
$sentencia->bindParam('BoletaInicial',$boletainicial);
$sentencia->bindParam('BoletaFinal',$boletafinal);
$sentencia->bindParam('Entrada',$entrada);
$sentencia->bindParam('Salida',$salida);
$sentencia->bindParam('Saldo',$saldo);
$sentencia->bindParam('Estacion',$estacion);
$sentencia->bindParam('Destino',$destino);
$sentencia->bindParam('Firma',$firma);
$sentencia->bindParam('Observaciones',$observaciones);

 //echo "<script>alert('Categoria');</script>";

if ($sentencia->execute()){

  // echo "<script>alert('Feha_Hora');</script>";
    header('location:'.$url.'/boleteria/registro_boleteria.php');
} else {
    echo "<script>alert('Usuario no Registrado');</script>";
}


  



?>