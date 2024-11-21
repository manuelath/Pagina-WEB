<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base_datos";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if($conn->connect_error){
    die("Conexion Fallida: ".$conn->connect_error);
}
//echo 'conexión exitosa';
?>