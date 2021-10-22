<?php
include ('../bd.php');

$llamar = mysqli_query($conexion, "select user_nombre from usuarios");
while ($dat = mysqli_fetch_assoc($llamar)){
    $arr []= $dat;
}
echo json_decode($arr);


?>