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
                            <label for="">CODIGO:<?php echo $_GET['cod_codigo']; ?> </label>
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
   
   
   
   $run_cart = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$_GET[cod_codigo]'");
   
   $count_cart = mysqli_num_rows($run_cart);
   
//    if($count_cart > 1){
//        $item_message = 'items';
//    }else{
//        $item_message = 'item';
//    }
   
   
   while($fetch_cart = mysqli_fetch_array($run_cart)){
       
	   $product_id = $fetch_cart['servicio_cot'];
	   
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
		 
		</tr>
	   </table>
	   </form>

		   <?php $total = 0;
                    $igv = 0;
                    $todo =0;
   $run_cart = mysqli_query($conexion, "select * from cotizacion_servicio  where cod_cot = '$_GET[cod_codigo]' ");
   
   while($fetch_cart = mysqli_fetch_array($run_cart)){
       
	   $product_id = $fetch_cart['servicio_cot'];
	   
	   $qty = $fetch_cart['cantidad_cot'];
	   
	   $result_product = mysqli_query($conexion, "select * from servicios where servicio_cod = '$product_id'");
	   
       while($fetch_product = mysqli_fetch_array($result_product)){
                
		$product_price = array($fetch_product['servicio_pventa']);
        
		$values = array_sum($product_price);
		
		$values_qty = $values * $qty;
		
		$total += $values_qty;
        $igv = 20;
        $todo = $total + $igv;
				
       }	   
   }
   
   echo "<h3>Subtotal: S/.$total</h3>
        <h3>IGV: S/.$igv</h3>
        <h3>TOTAL: S/.$todo </h3>"; ?> 
           <?php //cart();?>
           
    <?php if(isset($_GET['ser_codigo'])){
        
        $product_id = $_GET['ser_codigo'];
        
        
        $run_check_pro = mysqli_query($conexion,"select * from cotizacion_servicio where servicio_cot = '$product_id' and cod_cot='$_GET[cod_codigo]'");
      
        if(mysqli_num_rows($run_check_pro) > 0){
           echo "";
        }else{
          
          $fetch_pro = mysqli_query($conexion, "select * from servicios where servicio_cod='$product_id'");
          
          $fetch_pro = mysqli_fetch_array($fetch_pro);
          
          $pro_title = $fetch_pro['servicio_nombre'];
          $pro_precio = $fetch_pro['servicio_pventa'];
          
          
          
          
          $run_insert_pro = mysqli_query($conexion, "insert into cotizacion_servicio (cod_cot,nombre_cot,servicio_cot,precio_cot) values ('$_GET[cod_codigo]','$pro_title','$product_id','$pro_precio') ");		
          
        
         "<script>window.open('index.php?action=tabla_id&cod_codigo=$_GET[cod_codigo]','_self')</script>";
         
        }
      }?>

	   <?php 
	   if(isset($_POST['remove'])){
	     
		 foreach($_POST['remove'] as $remove_id){
		   
		  $run_delete = mysqli_query($conexion,"delete from cotizacion_servicio where cod_cot = '$_GET[cod_codigo]' and servicio_cot='$remove_id' ");
		 
		 if($run_delete){
		    echo "<script>window.open('index.php?action=tabla_id&cod_codigo=$_GET[cod_codigo]&ser_codigo=$_GET[ser_codigo]','_self')</script>";
		 }
		 }
		 
	   }
	   
	   if(isset($_POST['continue'])){
      
	     echo "<script>window.open('index.php?action=list_servicio&ruc=$_GET[cod_codigo]','_self')</script>";
         
	   }
    
?>