
<?php 

include '../web/bd.php';


if(isset($_POST['id'])){
    
   $update_qty = mysqli_query($conexion,"update cotizacion_servicio set nota_cot='$_POST[Nota]'  where cod_cot ='$_POST[ip]' and servicio_cot='$_POST[id]' ");
   
   if($update_qty){
       echo 1;
   }
}

?>