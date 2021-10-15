<link href="styles/edit.css" type="text/css" rel="stylesheet">
<?php
$edit_cat = mysqli_query($conexion, "select * from usuarios where user_id='$_GET[user_id]'");

$fetch_cat = mysqli_fetch_array($edit_cat);

?>
<?php
$get_cats = "select * from roles where rol_id = '$fetch_cat[user_rol]'";

$run_cats = mysqli_query($conexion, $get_cats);

while ($row_cats = mysqli_fetch_array($run_cats)) {
	$rol_id = $row_cats['rol_id'];
	$rol_nombre = $row_cats['rol_nombre'];
	$rol_cod = $row_cats['rol_cod'];
} ?>

<?php if ($_SESSION['role'] != 5) {
} else {
?>
	<div class="form_box">

		<form action="" method="post" enctype="multipart/form-data">

			<table align="center" width="70%">

				<tr>
					<td colspan="7">
						<h2><i class="fa fa-pencil fa-1x" aria-hidden="true"></i> EDITAR EMPLEADO</h2>
						<div class="border_bottom"></div>
						<!--/.border_bottom -->
					</td>
				</tr>

				<tr>
					<td><b>Editar Nombre:</b></td>
					<td><input type="text" name="user_nombre" value="<?php echo $fetch_cat['user_nombre']; ?>" size="30" required /></td>
				</tr>
				<tr>
					<td><b>Cambiar tipo de empleado:</b></td>
					<td>
						<select name="user_rol">
							<option value='<?php echo $rol_id ?>'><?php echo $rol_nombre ?></option>"
							<?php
							$get_cats = "select * from roles";

							$run_cats = mysqli_query($conexion, $get_cats);

							while ($row_cats = mysqli_fetch_array($run_cats)) {


								$categoria_id = $row_cats['rol_id'];
								$categoria_nombre = $row_cats['rol_nombre'];

								echo "<option value='$categoria_id'>$categoria_nombre</option>";
							}
							?>
						</select>
					</td>

				</tr>
				<!-- <tr>
			 <td><b>Editar Codigo:</b></td>
			 <td><input type="text" name="cod_user" id="" value="<?php //echo $fetch_cat['user_cod_empleado']; 
																	?>"></td>
		 </tr> -->
				<tr>
					<td><b>Editar imagen de Usuario:</b></td>
					<td>
						<div id="estilo-foto">
							<p><i class="fa fa-download" aria-hidden="true"></i> Agregar Foto</p>
							<input type="file" name="image_user" id="foto"  accept="image/*">
						</div>
					</td>
					<td><img src="usuarios_fotos/<?php echo $fetch_cat['user_foto']; ?>" style="width: 150px; height:150px; box-shadow: 0px 0px 5px black;" /></td>
				</tr>
				<tr>
					<td><b>Editar Estado</b></td>
					<td>
						<label for="">Activo</label>
						<input type="radio" name="estado" value="1" <?php if ($fetch_cat['user_estado'] == '1') echo 'checked="checked"'; ?>>
						<label for="">No Activo</label>
						<input type="radio" name="estado" value="0" <?php if ($fetch_cat['user_estado'] == '0') echo 'checked="checked"'; ?>>
					</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="7">
						<div id="guardar">
							<input class="save" type="submit" name="edit_user" value="Guardar" /><i class="fa fa-floppy-o" aria-hidden="true"></i>
						</div>
					</td>
				</tr>
			</table>

		</form>

	</div><!-- /.form_box -->
	
	<!-- PHP CODIGO  -->
	<?php

		if (isset($_POST['edit_user'])) {
			
			$user_nombre = mysqli_real_escape_string($conexion, $_POST['user_nombre']);
			$user_foto = $_FILES['image_user']['name'];
			$user_foto_tmp = $_FILES['image_user']['tmp_name'];

			$user_rol = $_POST['user_rol'];
			$user_estado = $_POST['estado'];
		
				if ($user_foto_tmp != "" ) {
					move_uploaded_file($user_foto_tmp, "usuarios_fotos/$user_foto");
					$edit_cat = "update usuarios set user_nombre='$user_nombre' , user_foto = '$user_foto', user_rol = '$user_rol',user_estado='$user_estado' where user_id='$_GET[user_id]'";
				} else {
					$edit_cat = "update usuarios set user_nombre='$user_nombre', user_rol = '$user_rol',user_estado='$user_estado' where user_id='$_GET[user_id]'";
				}
				$run_cat = mysqli_query($conexion, $edit_cat);
		
		
				
			if ($run_cat ) {
				?>
				<h3 style="background-color: white; padding:10px; text-align:center;">Usuario Editado correctamente<a style="text-decoration: none; color:#0d9d94; padding:0px 10px;" href="index.php?action=view_users">Ver Lista de los usuarios</a></h3>
				<?php 
				
			}else{
				echo "<script>alert('Empleado  no actualizado correctamente!')</script>";
			}
		}

	?>
<?php } ?>