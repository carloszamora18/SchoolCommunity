<?php
$bd = "u819692389_chatt";
$server = "mysql.hostinger.mx";
$user = "u819692389_carlo";
$password = "laquesea";

$conexion = @mysqli_connect($server, $user, $password, $bd);
if( !$conexion )   die( "Error de la conexion, :v ".mysqli_connect_error() );

$sql = "SELECT usuario, mensaje FROM conversation5 order by idConversation asc;";
$result = mysqli_query($conexion, $sql);

while($data = mysqli_fetch_assoc($result)){
    echo "<p><b>". $data["usuario"]."</b> dijo: ".$data["mensaje"]."</p>";
}

 ?>
