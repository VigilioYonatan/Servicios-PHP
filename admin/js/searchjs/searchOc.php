<?php
$rollNo1 = $_REQUEST['rollNo'];

$con = mysqli_connect("localhost","root","","outsourcing");
if($rollNo1!==""){
    $query = mysqli_query($con,"SELECT * FROM clientes WHERE ruc_cliente = '$rollNo1' ");
    $row = mysqli_fetch_array($query);
    $sname = $row['razon_cliente'];
}



$result = array("$sname");
$myJson = json_encode($result);
echo $myJson;


?>
