<?php

$servidor = "mysql.hostinger.mx";
$usuario= "u819692389_carlo";
$password = "laquesea";
$base_datos = "u819692389_schoo";



$conexion = new mysqli($servidor, $usuario, $password, $base_datos);


function formatearFecha($fecha){
	return date('g:i a', strtotime($fecha));
}


?>