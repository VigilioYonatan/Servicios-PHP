
<?php 

include '../web/bd.php';


if(isset($_POST['id'])){
    
   $update_qty = mysqli_query($conexion,"update compra_servicio set compra_costo='$_POST[Costo]' where compra_cot_prov ='$_POST[ip]' and compra_id='$_POST[id]'");
   
   if($update_qty){
       echo 1;
   }
}

?>