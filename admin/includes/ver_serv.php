
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5){
  echo "<script>alert('No sos de servicios')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}else{
  ?>
<?php include '../web/bd.php'; ?>
<div class="view_product_box">

<h2>
<i style="color:black;"class="fa fa-handshake-o fa-1x"></i>  SERVICIOS</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data" >

<table width="100%">
 <thead>
  <tr>  
   <th><input type="checkbox" id="checkAll" />Check</th>
   <th>ID</th>
   <th>Codigo </th>
   <th>Nombre </th>
   <th>Tipo de Servicio</th>
   <th>Cat</th>
   <th>Detalles </th>
   <th>Dias </th> 
   <th>Editar</th>
   <th>Eliminar</th>
  </tr>
 </thead>
 <?php 
 $all_serv = mysqli_query($conexion,"select * from servicios order by servicio_id DESC ");
 $i = 1;
 
 while($row=mysqli_fetch_array($all_serv)){
  $nombreRo = $row['servicio_nombre'];
  $codRo = $row['servicio_cod'];
 ?>
 <tbody>
  <tr>
  <?php if ($codRo == $_SESSION['cod_user']) {?>
    
   <td><input type="checkbox" name="deleteAll[]" /></td>
   <?php }else{?>
    <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['servicio_id'];?>" /></td>
   <?php } ?>
   <td class="blanco"><?php echo $i; ?></td>
   <td class="blanco"><?php echo $row['servicio_cod']; ?></td>
   <td class="blanco"><?php echo $row['servicio_nombre']; ?></td>
   <td class="blanco"><?php echo $row['servicio_tipo']; ?></td>
   <td class="blanco"><?php echo $row['servicio_cat']; ?></td>
   <td class="blanco"><?php echo $row['servicio_det']; ?></td>
   <td class="blanco"><?php echo $row['servicio_time']; ?></td>
   <?php if ($codRo != $_SESSION['cod_user']) {?>
   <td class="delete"><a href="index.php?action=edit_serv&serv_id=<?php echo $row['servicio_id'];?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>
   
   <td class="delete"><a href="index.php?action=view_serv&delete_serv=<?php echo $row['servicio_id'];?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  a este empleado?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
   <?php } ?> 
  </tr>
 </tbody>
 
 <?php $i++;} // End while loop ?>
 
<tr>
<td >
  <div id="remover"><i class="fa fa-times-circle-o " style="color:white;" aria-hidden="true"></i>
  <input type="submit" name="delete_all" value="Remover" onclick="return confirm('Estas seguro de eliminar de eliminar a todos estos empleados!!?');"/>
</div>
 </td>
 
 
</tr> 
</table>

</form>

</div><!-- /.view_product_box -->
<a href="index.php?action=add_serv"  class="agregar"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Servicios</a>	
<!-- PHP CODIGO  -->

<?php
// Delete User cuenta

if(isset($_GET['delete_serv'])){
  $delete_serv = mysqli_query($conexion,"delete from servicios where servicio_id='$_GET[delete_serv]' ");
  
  if($delete_serv){
  
  echo "<script>window.open('index.php?action=view_serv','_self')</script>";
  
   
    }
  }





// Remove items selected using foreach loop
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];
  
  foreach($remove as $key){
  $run_remove = mysqli_query($conexion,"delete from servicios where servicio_id='$key'");
  
  if($run_remove){
  echo "<script>alert('Los items seleccionados fueron eliminado correctamente!')</script>";
  
  echo "<script>window.open('index.php?action=view_serv','_self')</script>";
  }else{
  echo "<script>alert('Mysqli Failed: mysqli_error($conexion)!')</script>";
  }
  }
}
 ?>

<?php } ?>






