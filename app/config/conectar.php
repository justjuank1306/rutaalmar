<?php
//Zona horaria
date_default_timezone_set('America/Bogota');
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "peajesrmar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$hostname = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "peajesrmar";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
?>
