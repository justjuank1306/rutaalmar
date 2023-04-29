<?php
/*// este codigo es para mantetene una sesion activa des*/
include('../app/config/config.php');
session_start();
if(isset($_SESSION['u_usuario'])){
    //echo "<script>alert('Existe una sesion activa');</script>";
    session_destroy();
    header('location:'.$url.'/login');
}else{
    //echo "<script>alert('No existe ninguna sesion activa');</script>";
  
}

?>