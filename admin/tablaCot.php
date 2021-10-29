<?php include('cabeza.php'); ?>
<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5){
  echo "<script>alert('No sos de servicios')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}else{
  ?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item active"><a href="index.php?action=view_serv">Lista de Servicios</a></li>

        </ul>
    </div>
    <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <input type="text" name="cod_cot" placeholder="escriba cod cotizacion">
                            <table class="table table-hover table-bordered">
                                <thead align="center">
                                    <tr>

                                        <th>Eliminar </th>
                                        <th>Servicio </th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
               
                                    </tr>
                                </thead>
                                <?php 
		 $total = 0;
   
   
   
   $run_cart = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$product_id' ");
   
   $count_cart = mysqli_num_rows($run_cart);
   
   if($count_cart > 1){
       $item_message = 'items';
   }else{
       $item_message = 'item';
   }
   
   
   while($fetch_cart = mysqli_fetch_array($run_cart)){
       
	   $product_id = $fetch_cart['cod_cot'];
	   
	   $qty = $fetch_cart['cantidad_cot'];
	   
	   $result_product = mysqli_query($conexion, "select * from servicios where servicio_cod = '$product_id'");
	   	   
       while($fetch_product = mysqli_fetch_array($result_product)){
                
		$product_price = array($fetch_product['servicio_pventa']);

        $product_title = $fetch_product['servicio_nombre'];

        //$product_image = $fetch_product['product_image'];
        
        $sing_price = $fetch_product['servicio_pventa'];
        
		$values = array_sum($product_price);
		
		$values_qty = $values * $qty;
		
		$total += $values_qty;
				
   
   ?>
		 <tr align="center">
		   <td><input type="checkbox" name="remove[]" value="<?php echo $product_id;?>" /></td>
		   <td>
		   <?php echo $product_title;?>
		   <br />
		   <!-- <img src="admin/productos_imagenes/<?php echo $product_image; ?> " style="width: 100px;" /> -->
		   </td>
		   <td><input type="text" size="4" name="qty" value="<?php echo $qty; ?>" /></td>
		   <td><?php echo "S./" . $sing_price; ?></td>
		 </tr>

         <?php }} ?>
         
	
	    <tr align="center">
		   <td colspan="1"><input type="submit" name="update_cart" value="Actualizar" /></td>
		   <td><input type="submit" name="continue" value="Agregar mas Servicios" /></td>
		   <td><button><a href="pago.php">Pagar</a></td>
		</tr>
	   </table>
	   </form>

		   <h3>Subtotal:<?php $total = 0;
   
   
   $run_cart = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$product_id' ");
   
   while($fetch_cart = mysqli_fetch_array($run_cart)){
       
	   $product_id = $fetch_cart['cod_cot'];
	   
	   $qty = $fetch_cart['cantidad_cot'];
	   
	   $result_product = mysqli_query($conexion, "select * from servicios where servicio_cod = '$product_id'");
	   
       while($fetch_product = mysqli_fetch_array($result_product)){
                
		$product_price = array($fetch_product['servicio_pventa']);
        
		$values = array_sum($product_price);
		
		$values_qty = $values * $qty;
		
		$total += $values_qty;
				
       }	   
   }
   
   echo "$".$total; ?> </h3>
           <?php //cart();?>
           
    <?php if(isset($_GET['add_cot'])){
        
        $product_id = $_GET['add_cot'];
        

        
        $run_check_pro = mysqli_query($conexion,"select * from cotizacion_servicio where cod_cot='$product_id'");
      
        if(mysqli_num_rows($run_check_pro) > 0){
           echo "";
        }else{
          
          $fetch_pro = mysqli_query($conexion, "select * from servicios where servicio_cod='$product_id'");
          
          $fetch_pro = mysqli_fetch_array($fetch_pro);
          
          $pro_title = $fetch_pro['servicio_nombre'];
          
          
          
          $run_insert_pro = mysqli_query($conexion, "insert into cotizacion_servicio (cod_cot,nombre_cot,cantidad_cot,totalall_cot) values ('$product_id','$pro_title','$qty','$total') ");		
          
          
          echo "<script>window.open('tablaCot.php','_self')</script>";
          
        }
      }?>

	   <?php 
	   if(isset($_POST['remove'])){
	     
		 foreach($_POST['remove'] as $remove_id){
		   
		  $run_delete = mysqli_query($conexion,"delete from cotizacion_servicio where cod_cot = '$remove_id'");
		 
		 if($run_delete){
		    echo "<script>window.open('tablaCot.php','_self')</script>";
		 }
		 }
		 
	   }
	   
	   if(isset($_POST['continue'])){
	     echo "<script>window.open('index.php?action=lista_serv','_self')</script>";
	   }
    
?>
                 
<?php } ?>
<?php include('pie.php'); ?>