<?php
include("../web/bd.php");
if(isset($_POST['query'])){
   $respuesta = mysqli_real_escape_string($conexion, $_POST['query']);
   $data = array();
   $sql = "SELECT * FROM clientes WHERE razon_cliente LIKE '%".$respuesta. "%'";
   $res = $conexion->query($sql);
   if($res->num_rows>0){
       while($row= $res->fetch_assoc()){
           $data[]= $row['razon_cliente'];
       }
echo json_encode($data);
   }
}

?>