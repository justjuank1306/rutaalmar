<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'peajesrmar');
$url= 'http://localhost/rutaalmar';
$servidor = "mysql:dbname=".DB_NAME.";host=".DB_SERVER;
// Conectar a la base de datos utilizando PDO
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
 
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

session_start(); //iniciar una sesion
$identificacion = $_POST['Identificacion'];
$password = $_POST['Password'];
$identificacion_tabla = '';
$password_tabla = '';

//echo $identificacion;
//echo $password;

$query_login = $pdo->prepare("SELECT * FROM usuario WHERE Identificacion = '$identificacion' AND Password = '$password' AND Id_Estado = '1'");
$query_login->execute();
$users = $query_login->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $usuario){
    $identificacion_tabla = $usuario['Identificacion'];
    $password_tabla = $usuario['Password'];


}
if (($identificacion==$identificacion_tabla) && ($password==$password_tabla)){
    //echo "<script>alert('Usuario Registrado Correctamente');</script>";
    $_SESSION['u_usuario'] = $identificacion; //crear una sesion activa 
    header('location:../principal.php');
} else {
    
    header('location:index.php');
    echo "<script>alert('Datos incorrecto intente de nuevo');</script>";
}
