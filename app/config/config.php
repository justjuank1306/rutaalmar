<?php
//Zona horaria
date_default_timezone_set('America/Bogota');
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
