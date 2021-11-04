<link href="styles/main.css" type="text/css" rel="stylesheet">
<main class="app-content">
	<div class="app-title">
		<ul class="app-breadcrumb breadcrumb side">
			<li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
			<li class="breadcrumb-item active">Lista de Pedidos</li>

		</ul>
	</div>
	<div class="row" style="font-size: 15px;">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<form action="" method="post" enctype="multipart/form-data" id="frmajax">
						<div class="table-responsive">
							<h4 style="color:#dc3545;"><?php echo $_GET['cod_codigo']; ?> </h4>
							<table class="table table-hover table-bordered">
								<thead align="center">
									<tr>

										<th>Eliminar </th>
										<th>Servicio </th>
										<th>Nota</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>TOTAL</th>
										<th>Precio Neto</th>

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


								while ($fetch_cart = mysqli_fetch_array($run_cart)) {

									$product_id = $fetch_cart['servicio_cot'];

									$qty = $fetch_cart['cantidad_cot'];
									$nota = $fetch_cart['nota_cot'];

									$result_product = mysqli_query($conexion, "select * from servicios where servicio_cod = '$product_id'");

									while ($fetch_product = mysqli_fetch_array($result_product)) {

										$product_price = array($fetch_product['servicio_pventa']);

										$product_title = $fetch_product['servicio_nombre'];
										

										//$product_image = $fetch_product['product_image'];

										$sing_price = $fetch_product['servicio_pventa'];

										$values = array_sum($product_price);

										$values_qty = $values * $qty;

										$total += $values_qty;


								?>
										<tr align="center">
											<td><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>" /></td>
											<td>
												<?php echo $product_title; ?><br>

											</td>
											<td>
												<input type="text" name="nota" class="nota_id"  data-id="<?php echo $product_id; ?>" value="<?php echo $nota; ?>">
											</td>
											<td><input type="text" class="qty_id" data-id="<?php echo $product_id; ?>" size="4" name="qty" value="<?php echo $qty; ?>" /></td>
											<td><?php echo "S./" . $sing_price; ?></td>
											<td><?php echo "S./" . $values_qty; ?></td>
											<td><?php echo "S./" . $values_qty; ?></td>
										</tr>

								<?php }
								} ?>


								<tr align="center">
									<td colspan="1"><input class="btn btn-info" type="submit" name="update_cart" value="Actualizar" /></td>
									<td><input class="btn btn-primary" type="submit" name="continue" value="Agregar mas Servicios" /></td>
									<td><input type="submit" id="btnguardar" name="guardar" value="GUARDAR"></td>
								</tr>
							</table>
					</form>

					<input type="hidden" class="hidden_ip" value="<?php echo $_GET['cod_codigo']; ?>">
				
			

					<div class="load_ajax"></div>

					<?php $total = 0;
					$igv = 0;
					$todo = 0;
					
					$run_cart = mysqli_query($conexion, "select * from cotizacion_servicio  where cod_cot = '$_GET[cod_codigo]' ");

					while ($fetch_cart = mysqli_fetch_array($run_cart)) {

						$product_id = $fetch_cart['servicio_cot'];
						$product_nombre = $fetch_cart['nombre_cot'];

						$qty = $fetch_cart['cantidad_cot'];

						$result_product = mysqli_query($conexion, "select * from servicios where servicio_cod = '$product_id'");

						while ($fetch_product = mysqli_fetch_array($result_product)) {
							$price = $fetch_product['servicio_pventa'];
							$product_price = array($fetch_product['servicio_pventa']);

							$values2 = array_sum($product_price);

							$values_qty = $values2 * $qty;

							$total += $values_qty;
							$igv = 20;
							$todo = $total + $igv;
							if (isset($_POST['guardar'])) {
								$nota = $_POST['nota'];

								$run_insert_prop = mysqli_query($conexion, "insert into cotizacion_servicio2 (cod_cot2,nombre_cot2,nota_cot2,cantidad_cot2,precio_cot2,total_cot2,precioNeto_cot2,subtotal_cot2,IGV_cot2,totalall_cot2) values ('$_GET[cod_codigo]','$product_title','$nota','$qty','$price','$values_qty','$values_qty','$total','$igv','$todo') ");

								if ($run_insert_prop) {
									echo "<script>alert('Guardado correctamente')</script>";
									echo "<script>window.open('index.php?action=view_cotizacion_id&cot_codigo=$_GET[cod_codigo]','_self')</script>";
								}
							}
						}
					}

					echo "
   							<div style='text-align:right;'>
   							<h5>Subtotal: S/.$total</h5>
   							<h5>IGV: S/.$igv</h5>
   							<h4 style='color:#dc3545;''>TOTAL: S/.$todo </h4></div>"; ?>
					<?php //cart();
					?>

					<?php if (isset($_GET['ser_codigo'])) {

						$product_id = $_GET['ser_codigo'];


						$run_check_pro = mysqli_query($conexion, "select * from cotizacion_servicio where servicio_cot = '$product_id' and cod_cot='$_GET[cod_codigo]'");

						if (mysqli_num_rows($run_check_pro) > 0) {
							echo "";
						} else {

							$fetch_pro = mysqli_query($conexion, "select * from servicios where servicio_cod='$product_id'");
							$fetch_pro = mysqli_fetch_array($fetch_pro);

							$run_cart2 = mysqli_query($conexion, "select * from cotizacion_servicio where servicio_cot = '$product_id' ");
							$fetch_pro2 = mysqli_fetch_array($run_cart2);
							$qty2 = $fetch_pro2['cantidad_cot'];

							$pro_title = $fetch_pro['servicio_nombre'];
							// $pro_precio = $fetch_pro['servicio_pventa'];
							$precio = $fetch_pro['servicio_pventa'];
							$product_price = array($fetch_pro['servicio_pventa']);
							$valueS = array_sum($product_price);
							$valuesQ = $valueS * $qty2;

					

							$run_insert_pro = mysqli_query($conexion, "insert into cotizacion_servicio (cod_cot,nombre_cot,servicio_cot,precio_cot) values ('$_GET[cod_codigo]','$pro_title','$product_id','$precio')");


							echo "<script>window.open('index.php?action=tabla_id&cod_codigo=$_GET[cod_codigo]','_self')</script>";
						}
					} ?>
					<script> //cantidad
						$(document).ready(function() {

							$(".qty_id").on("keyup", function() {

								var pro_id = $(this).data("id");
								var qty = $(this).val();
								//var nota = $(this).val();
							
								var ip = $(".hidden_ip").val();

								//alert(ip);

								// Update servicios cantidad in ajax and php
								$.ajax({
									url: 'update_qty_ajax.php',
									type: 'post',
									data: {
										id: pro_id,
										//Nota: nota,
										quantity: qty,
							
										ip: ip
									},
									dataType: 'html',
									

								});

							});

						});
						$(document).ready(function() {

							$(".nota_id").on("keyup", function() {

								var pro_id = $(this).data("id");
								//	var qty = $(this).val();
								var nota = $(this).val();
							
								var ip = $(".hidden_ip").val();

								//alert(ip);

								// Update servicios nota in ajax and php
								$.ajax({
									url: 'update_nota_ajax.php',
									type: 'post',
									data: {
										id: pro_id,
										Nota: nota,
										//quantity: qty,
							
										ip: ip
									},
									dataType: 'html',
									

								});

							});

						});
					</script>
				
					
					<?php
					if (isset($_POST['remove'])) {

						foreach ($_POST['remove'] as $remove_id) {

							$run_delete = mysqli_query($conexion, "delete from cotizacion_servicio where cod_cot = '$_GET[cod_codigo]' and servicio_cot='$remove_id' ");

							if ($run_delete) {
								echo "<script>window.open('index.php?action=tabla_id&cod_codigo=$_GET[cod_codigo]&ser_codigo=$_GET[ser_codigo]','_self')</script>";
							}
						}
					}

					if (isset($_POST['continue'])) {

						echo "<script>window.open('index.php?action=list_servicio&ruc=$_GET[cod_codigo]','_self')</script>";
					}

					?>