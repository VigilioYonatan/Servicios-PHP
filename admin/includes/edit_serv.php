<link href="styles/edit.css" type="text/css" rel="stylesheet">
<?php
$edit_cat = mysqli_query($conexion, "select * from servicios where servicio_id='$_GET[serv_id]'");

$fetch_cat = mysqli_fetch_array($edit_cat);

?>

<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5){
  echo "<script>alert('No sos de servicios')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}else{
  ?>
	<div class="form_box">

		<form action="" method="post" enctype="multipart/form-data">

			<table align="center" width="70%">

				<tr>
					<td colspan="7">
						<h2><i class="fa fa-pencil fa-1x" aria-hidden="true"></i> EDITAR SERVICIOS</h2>
						<div class="border_bottom"></div>
						<!--/.border_bottom -->
					</td>
				</tr>
                <tr>
                    <td>
                        <h3>Codigo: <b><?php echo $fetch_cat['servicio_cod']; ?></b></h3>
                    </td>
                </tr>
				<tr>
					<td><b>Editar Nombre:</b></td>
					<td><input type="text" name="serv_nombre" value="<?php echo $fetch_cat['servicio_nombre']; ?>" size="30" required /></td>
				</tr>
				<tr>
					<td><b>Editar Tipo de servicio:</b></td>
					<td><select name="tipo_serv" id="" value="<?php echo $fetch_cat['servicio_tipo']; ?>" >
                            <option value="<?php echo $fetch_cat['servicio_tipo']; ?>"><?php echo $fetch_cat['servicio_tipo']; ?></option>
                            <option value="Software">Software</option>
                            <option value="Hardware">Hardware</option>
                            <option value="General">General</option>
                        </select>
					</td>

				</tr>
				
				<tr>
					<td><b>Editar categoria de servicio:</b></td>
					<td><select name="cat_serv" id="">
                            <option value="<?php echo $fetch_cat['servicio_cat']; ?>"><?php echo $fetch_cat['servicio_cat']; ?></option>
                            <option value="Servidores">Servidores</option>
                            <option value="CPU">CPU</option> 
                        </select>
					</td>				
				</tr>
				<tr>
					<td><b>Editar Detalles de servicio:</b></td>
					<td>
                    <textarea name="det_serv" id="" cols="40" rows="5"><?php echo $fetch_cat['servicio_det']; ?></textarea>
					</td>
				</tr>
                <tr>
                    <td><b>Editar Dias de servicio:</b></td>
                    <td>
                        <input type="number" name="time_serv" value="<?php echo $fetch_cat['servicio_time']; ?>"  min="0" max="31">
                    </td>
                </tr>
				<tr>
					<td></td>
					<td colspan="7">
						<div id="guardar">
							<input class="save" type="submit" name="edit_serv" value="Guardar" /><i class="fa fa-floppy-o" aria-hidden="true"></i>
						</div>
					</td>
				</tr>
			</table>

		</form>

	</div><!-- /.form_box -->

	<!-- PHP CODIGO  -->

	<?php

		if (isset($_POST['edit_serv'])) {
			
			$serv_nombre = mysqli_real_escape_string($conexion, $_POST['serv_nombre']);
            $tipo_serv = $_POST['tipo_serv'];
            $cat_serv = $_POST['cat_serv'];
            $det_serv = $_POST['det_serv'];
            $time_serv = $_POST['time_serv'];

            $edit_serv = "update servicios set servicio_nombre='$serv_nombre', servicio_tipo = '$tipo_serv',servicio_cat='$cat_serv',servicio_det = '$det_serv',servicio_time = '$time_serv' where servicio_id='$_GET[serv_id]'";
            $edit_serv2 = mysqli_query($conexion, $edit_serv);

            echo "<script>window.open('index.php?action=view_serv','_self')</script>";
        }
		// }else{
        //     echo "<script>alert('No se pudo cambiar')</script>";
        // }

	?>
<?php } ?>