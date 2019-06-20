<?php

$bd = "u819692389_chatt";
$server = "mysql.hostinger.mx";
$user = "u819692389_carlo";
$password = "laquesea";

$conexion = @mysqli_connect($server, $user, $password, $bd);
if( !$conexion )   die( "Error de la conexion, :v ".mysqli_connect_error() );

$user = $_POST['user'];
$message = $_POST['message'];


$sql = "INSERT INTO conversation6 (usuario, mensaje) VALUES ('$user', '$message')";
$result = mysqli_query($conexion, $sql);

if ($result) {
  echo "mensaje enviado.";
}


 ?>
