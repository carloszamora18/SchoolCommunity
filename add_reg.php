<?php
$nombre=$_POST['nombre'];
	$control=$_POST['control'];
	$plantel=$_POST['plantel'];
	$edad=$_POST['edad'];
	$clave=$_POST['clave'];
	$correo=$_POST['correo'];
	$usuario=$_POST['usuario'];
	$conexion = mysql_connect("localhost", "root", "");
	mysql_select_db("fenaci",$conexion);
	$sql = "INSERT INTO usuarios (nombre,control,plantel,edad,correo,clave,usuario) VALUES ('$nombre',$control,'$plantel', $edad, '$correo', '$clave', '$usuario')";
	mysql_query($sql);
	header("location:tareas.php");
//$bd = "u819692389_chatt";
//$server = "mysql.hostinger.mx";
//$user = "u819692389_car";
//$password = "laquesea";

?>
