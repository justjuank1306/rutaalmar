<?php 
include('app/config/config.php');



// Obtener los datos del formulario pot get

$nombre = $_GET['Nombre'];
$apellido = $_GET['Apellido'];
$email = $_GET['Email'];
$password = $_GET['Password'];
$identificacion = $_GET['Identificacion'];
$cargo = $_GET['Cargo'];
$empresa = $_GET['Empresa'];
$estacion = $_GET['Estacion'];



date_default_timezone_set("America/Bogota");


$sentencia = $pdo->prepare("INSERT INTO usuario (Id_Usuario,Nombre,Apellido,Email,Password,Identificacion,Id_Cargo,Id_Empresa,Id_Estacion )
values(:Id_Usuario, :Nombre, :Apellido, :Email, :Password, :Identificacion, :Id_Cargo, :Id_Empresa, :Id_Estacion)");


$sentencia->bindParam('Id_Usuario',$Id_Usuario);
$sentencia->bindParam('Nombre',$nombre);
$sentencia->bindParam('Apellido',$apellido);
$sentencia->bindParam('Email',$email);
$sentencia->bindParam('Password',$password);
$sentencia->bindParam('Identificacion',$identificacion);
$sentencia->bindParam('Id_Cargo',$cargo);
$sentencia->bindParam('Id_Empresa',$empresa);
$sentencia->bindParam('Id_Estacion',$estacion);


if ($sentencia->execute()){
    //echo "<script>alert('insertando');</script>";
    header('location:'.$url.'/Registro_Asistencia_Sup_Entrada.php');
} else {
    echo "<script>alert('Usuario no Registrado');</script>";
}




