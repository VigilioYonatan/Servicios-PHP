<?php $rollNo2 = $_REQUEST['rollNo2'];
$con = mysqli_connect("localhost","root","","outsourcing");
if($rollNo2!==""){
    $query2 = mysqli_query($con,"SELECT * FROM servicios WHERE servicio_nombre = '$rollNo2' ");
    $row2 = mysqli_fetch_array($query2);
    $sname2 = $row2['servicio_precio'];
 
}

$result2 = array("$sname2");
$myJson2 = json_encode($result2);
echo $myJson2;
?>