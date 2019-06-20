<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//conectar a la base de datos

$conexion=mysqli_connect("mysql.hostinger.mx","u819692389_carlo","laquesea", "u819692389_schoo");
$consulta="SELECT * FROM usuarios WHERE usuario='$usuario' and clave ='$clave'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);


if($filas>0){
	
	header("location:tareas.html");

}
else{
	
	echo"error tu usuario o contraseña no coinciden con ninguna cuenta :v";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
