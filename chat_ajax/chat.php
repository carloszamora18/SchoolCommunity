<?php
	include "db.php";
	///consultamos a la base
	$consulta = "SELECT * FROM chat ORDER BY id DESC";
	$ejecutar = $conexion->query($consulta); 
	while($fila = $ejecutar->fetch_array()) : 
?>
	<div id="datos-chat">
		<span style="color: darkturquoise"><?php echo $fila ['nombre'];  ?> :</span>
		<span style="color: #fff;"><?php echo $fila ['mensaje']; ?></span>
		<span style="float: right; color:#fff;"><?php echo formatearFecha($fila['fecha']); ?> . </span>
	</div>
	
	<?php endwhile; ?>

