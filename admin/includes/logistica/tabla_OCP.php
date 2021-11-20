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
							<h4 style="color:#dc3545;"><?php echo $_GET['ocp_codigo']; ?> </h4>
							<table class="table table-hover table-bordered">
								<thead align="center">
									<tr>

										<th>Eliminar </th>
										<th>OP/ITEM</th>
										<th>NOTA</th>
										<th>CANTIDAD</th>
										<th>COSTO</th>
										<th>TOTAL</th>

									</tr>
								</thead>
								<?php
								$total = 0;
								$run_cart = mysqli_query($conexion, "select * from oc_proveedortabla where ocp_cod='$_GET[ocp_codigo]'");

								$count_cart = mysqli_num_rows($run_cart);

								while ($fetch_cart = mysqli_fetch_array($run_cart)) {

									$product_id = $fetch_cart['ocp_item_id'];
									


									$result_product = mysqli_query($conexion, "select * from compra_servicio where compra_id = '$product_id'");

									while ($fetch_product = mysqli_fetch_array($result_product)) {

										$product_cantidad = $fetch_product['compra_cantidad'];
										$product_costo = $fetch_product['compra_costo'];
										$product_costo2 = array($fetch_product['compra_costo']);
										$values = array_sum($product_costo2);
										$product_nota = $fetch_product['compra_nota'];
										$item = $fetch_product['compra_item'];
										$product_op = $fetch_product['compra_op'];
										$values_qty = $values * $product_cantidad;

										$total += $values_qty;

								?>
										<tr align="center">
											<td><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>" /></td>
											<td>
												<input type="text" class="op_id" data-id="<?php echo $product_id; ?>" size="24" name="nota" value="<?php echo $product_op; ?>" />
												<input type="text" class="item_id" data-id="<?php echo $product_id; ?>" size="24" name="nota" value="<?php echo $item; ?>" />
												
											</td>
											<td><input type="text" class="nota_id" data-id="<?php echo $product_id; ?>" size="24" name="nota" value="<?php echo $product_nota; ?>" />

											</td>
											<td><input type="text" class="cantidad_id" data-id="<?php echo $product_id; ?>" size="4" name="cantidad" value="<?php echo $product_cantidad; ?>" />

											</td>
											<td><input type="text" class="costo_id" data-id="<?php echo $product_id; ?>" size="4" name="qty" value="<?php echo $product_costo; ?>" /></td>
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
					<?php 
					$oc_prov = mysqli_query($conexion, "select * from oc_proveedor where ocp_codigo='$_GET[ocp_codigo]'");
					$row_oc2 = mysqli_fetch_array($oc_prov)

					?>			
					<input type="hidden" class="hidden_ip" value="<?php echo $row_oc2['oc_cot_prov']; ?>">



					<div class="load_ajax"></div>

					<?php $total = 0;
					$igv = 0;
					$todo = 0;

					$run_cart = mysqli_query($conexion, "select * from oc_proveedortabla  where ocp_cod='$_GET[ocp_codigo]'");

					while ($fetch_cart = mysqli_fetch_array($run_cart)) {

						$product_id = $fetch_cart['ocp_item_id'];

						

						$result_product = mysqli_query($conexion, "select * from compra_servicio where compra_id='$product_id'");

						while ($fetch_product = mysqli_fetch_array($result_product)) {
							$costo1 = $fetch_product['compra_costo'];
							$costo2 = array($fetch_product['compra_costo']);
							$values2 = array_sum($costo2);

							$op = $fetch_product['compra_op'];
							$qty = $fetch_product['compra_cantidad'];
							$item = $fetch_product['compra_item'];
							$nota = $fetch_product['compra_nota'];


							$values_qty = $values2 * $qty;

							$total += $values_qty;
							$igv_num = mysqli_query($conexion, "select igv_numero from igv");
							$row_igv = mysqli_fetch_array($igv_num);

							$igv = $row_igv['igv_numero'];
							$todo = $total + $igv;
							if (isset($_POST['guardar'])) {


								$run_insert_prop = mysqli_query($conexion, "insert into oc_proveedortabla2(ocp2_cod,ocp2_op,ocp2_item_id,ocp2_item,ocp2_nota,ocp2_cantidad,ocp2_costo,ocp2_total1,ocp2_subtotal,ocp2_igv,ocp2_total) values ('$_GET[ocp_codigo]','$op','$product_id','$item','$nota','$qty','$costo1','$values_qty','$total','$igv','$todo') ");
								$bloqueado = 1;
								$run_insert_prop2 = mysqli_query($conexion, "update compra_servicio set compra_añadido='$bloqueado' where compra_id='$product_id'") ;
								if ($run_insert_prop2) {
									echo "<script>alert('Guardado correctamente')</script>";
									echo "<script>window.open('index.php?action=view_ocproovedor','_self')</script>";
								}
							}
						}
					}

					echo "
   							<div style='text-align:right;'>
   							<h5>Subtotal: S/.$total</h5>
   							<h5>IGV: S/.$igv</h5>
   							<h4 style='color:#dc3545;''>TOTAL: S/.$todo </h4></div>"; ?>
					<?php
					?>

					<?php if (isset($_GET['item_id'])) {

						$product_id = $_GET['item_id'];


						$run_check_pro = mysqli_query($conexion, "select * from oc_proveedortabla where ocp_item_id = '$product_id' and ocp_cod='$_GET[ocp_codigo]'");

						if (mysqli_num_rows($run_check_pro) > 0) {
							echo "";
						} else {

							$fetch_pro = mysqli_query($conexion, "select * from compra_servicio where compra_id='$product_id'");
							$fetch_pro = mysqli_fetch_array($fetch_pro);


							$pro_title = $fetch_pro['compra_item'];
							$pro_nota = $fetch_pro['compra_nota'];
							$pro_qty = $fetch_pro['compra_cantidad'];
							$pro_costo = $fetch_pro['compra_costo'];
							$pro_op = $fetch_pro['compra_op'];

							$ocp_cot_prov = mysqli_query($conexion, "select * from oc_proveedor where ocp_codigo='$_GET[ocp_codigo]'");
							$ocp_cot_prov2 = mysqli_fetch_array($ocp_cot_prov);
							$ocp_cot_provedor = $ocp_cot_prov2['oc_cot_prov'];
							$ocp_provedor = $ocp_cot_prov2['ocp_razon_prov'];
							$ocp_moneda = $ocp_cot_prov2['ocp_moneda'];

							$run_insert_pro = mysqli_query($conexion, "insert into oc_proveedortabla(ocp_cod,ocp_op,ocp_item_id,ocp_item,ocp_nota,ocp_cantidad,ocp_costo) values ('$_GET[ocp_codigo]','$pro_op','$product_id','$pro_title','$pro_nota','$pro_qty','$pro_costo')");
							$run_insert_pro2 = mysqli_query($conexion, "update compra_servicio set compra_cot_prov='$ocp_cot_provedor',compra_proveedor = '$ocp_provedor', compra_moneda='$ocp_moneda',compra_ocp='$_GET[ocp_codigo]' where compra_id='$product_id'");

							echo "<script>window.open('index.php?action=tabla_OCP&ocp_codigo=$_GET[ocp_codigo]','_self')</script>";
						}
					} ?>
					<script>
						//cantidad
						$(document).ready(function() {

							$(".costo_id").on("keyup", function() {

								var pro_id = $(this).data("id");
								var costo = $(this).val();
								//var nota = $(this).val();

								var ip = $(".hidden_ip").val();

								//alert(ip);

								// Update servicios cantidad in ajax and php
								$.ajax({
									url: 'update_costo_ajax.php',
									type: 'post',
									data: {
										id: pro_id,	
										Costo: costo,
										ip: ip
									},
									dataType: 'html',


								});

							});

						});
						// cantidad
						$(document).ready(function() {

							$(".cantidad_id").on("keyup", function() {

								var pro_id = $(this).data("id");
								var cantidad = $(this).val();
								var ip = $(".hidden_ip").val();
								// Update servicios cantidad in ajax and php
								$.ajax({
									url: 'update_cantidad_ajax.php',
									type: 'post',
									data: {
										id: pro_id,
									
										Cantidad: cantidad,

										ip: ip
									},
									dataType: 'html',


								});

							});

						});

						// nota
						$(document).ready(function() {

							$(".nota_id").on("keyup", function() {

								var pro_id = $(this).data("id");
								var nota = $(this).val();


								var ip = $(".hidden_ip").val();
								// Update servicios cantidad in ajax and php
								$.ajax({
									url: 'upd_nota_ajax.php',
									type: 'post',
									data: {
										id: pro_id,
									
										Nota: nota,

										ip: ip
									},
									dataType: 'html',


								});

							});

						});
						// OP
						$(document).ready(function() {

							$(".op_id").on("keyup", function() {

								var pro_id = $(this).data("id");
								var op = $(this).val();


								var ip = $(".hidden_ip").val();
								// Update servicios cantidad in ajax and php
								$.ajax({
									url: 'upd_op_ajax.php',
									type: 'post',
									data: {
										id: pro_id,
									
										OP: op,

										ip: ip
									},
									dataType: 'html',


								});

							});

						});
						// item
						$(document).ready(function() {

							$(".item_id").on("keyup", function() {

								var pro_id = $(this).data("id");
								var item = $(this).val();


								var ip = $(".hidden_ip").val();
								// Update servicios cantidad in ajax and php
								$.ajax({
									url: 'upd_item_ajax.php',
									type: 'post',
									data: {
										id: pro_id,
									
										Item: item,

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

							$run_delete = mysqli_query($conexion, "delete from oc_proveedortabla where ocp_cod = '$_GET[ocp_codigo]' and ocp_item_id='$remove_id' ");
							$run_delete2 = mysqli_query($conexion, "delete from oc_proveedortabla2 where ocp2_cod = '$_GET[ocp_codigo]' and ocp2_item_id='$remove_id' ");

							if ($run_delete2) {
								echo "<script>window.open('index.php?action=tabla_OCP&ocp_codigo=$_GET[ocp_codigo]','_self')</script>";
							}
						}
					}

					if (isset($_POST['continue'])) {

						echo "<script>window.open('index.php?action=lista_ocp&ocp_cod=$_GET[ocp_codigo]','_self')</script>";
					}

					?>