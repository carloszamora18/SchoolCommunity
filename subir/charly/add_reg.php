<?php
$nombre=$_POST['nombre'];
	$control=$_POST['control'];
	$plantel=$_POST['plantel'];
	$edad=$_POST['edad'];
	$clave=$_POST['clave'];
	$correo=$_POST['correo'];
	$usuario=$_POST['usuario'];
	$conexion = mysql_connect("mysql.hostinger.mx", "u819692389_car","laquesea");
	mysql_select_db("u819692389_schoo",$conexion);
	$sql = "INSERT INTO usuarios (nombre,control,plantel,edad,correo,clave,usuario) VALUES ('$nombre',$control,'$plantel', $edad, '$correo', '$clave', '$usuario')";
	mysql_query($sql);
	header("location:/myhome.php");
?>
