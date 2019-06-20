<?php
$destino= "glamouryestilo1986@gmail.com";
      $nombre=$_POST["nombre"];
	  $correo=$_POST["correo"];
	  $telefono=$_POST["telefono"];
	  $mensaje=$_POST["mensaje"];
	  $contenido = "Nombre: " . $nombre . "\nCorreo: " . $correo . "\ntelefono: " . $telefono . "\nmensaje: " .$mensaje;
	  mail($destino,"CITA",$contenido);
	  header("location:gracias.html");
?>