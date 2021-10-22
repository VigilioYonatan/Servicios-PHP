<?php 
$conexion = mysqli_connect("localhost","root","","outsourcing");

if(mysqli_connect_errno()){
    echo "No se conectó a la base de datos: ".mysqli_connect_error();
}
mysqli_query($conexion,"SET NAMES 'utf8' ");

?>