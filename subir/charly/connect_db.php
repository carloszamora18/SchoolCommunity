<?php


		$mysqli = new MySQLi("mysql.hostinger.mx", "u819692389_car","laquesea", "u819692389_schoo");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		else
			//echo "Conexión exitossa!";

//	$link =mysqli_connect("localhost","root","");
//	if($link){
//		mysqli_select_db($link,"academ");
//	}
?>