<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 5){
  echo "<script>alert('No eres de este role ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>

<div class="view_product_box">

<h2><i style="color:black;" class="fa fa-user fa-1x"></i>   EMPLEADO</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data" >

<table width="100%">
 <thead>
  <tr>  
   <th><input type="checkbox" id="checkAll" />Check</th>
   <th>ID</th>
   <th>Codigo de empleado</th>
   <th>Rol</th>
   <th>Estado</th>
   <th>Nombre</th>
   <th>Correo</th>
   <th>Imagen</th>
   <th>Editar</th>
   <th>Eliminar</th>
   
  </tr>
 </thead>

 <?php 
 $all_users = mysqli_query($conexion,"select * from usuarios order by user_id DESC ");
 $i = 1;
 
 while($row=mysqli_fetch_array($all_users)){
  $nombreRo = $row['user_rol'];
  $codRo = $row['user_cod_empleado'];
  $rolenombre =mysqli_query($conexion, "select * from roles where rol_id ='$nombreRo' ");
  $rowNombre = mysqli_fetch_array($rolenombre)
 ?>
 
 <tbody>
  <tr>
  <?php if ($codRo == $_SESSION['cod_user']) {?>
    
   <td><input type="checkbox" name="deleteAll[]" /></td>
   <?php }else{?>
    <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['user_id'];?>" /></td>
   <?php } ?>
   <td class="blanco"><?php echo $i; ?></td>
   <td class="blanco"><?php echo $row['user_cod_empleado']; ?></td>
   <td class="blanco"><?php echo $rowNombre['rol_nombre']; ?></td>
   <td class="blanco"><?php echo $row['user_estado']; ?></td>
   <td class="blanco"><?php echo $row['user_nombre']; ?></td>
   <td class="blanco"><?php echo $row['user_correo']; ?></td>
  
   <td>
   <?php if($row['user_foto'] !=''){ ?>
   <img src="usuarios_fotos/<?php echo $row['user_foto']; ?>" width="70" height="70" style="box-shadow: 0px 0px 5px black;" />
   
   <?php }else{ ?>
   <img src="../images/profile-icon.png" width="70" height="50" />
   
   <?php } ?>

   </td>
   <?php if ($codRo != $_SESSION['cod_user']) {?>
   <td class="delete"><a href="index.php?action=edit_user&user_id=<?php echo $row['user_id'];?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>
   
   <td class="delete"><a href="index.php?action=view_users&delete_user=<?php echo $row['user_id'];?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  a este empleado?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
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
<a href="../registrar.php"  class="agregar"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Empleado</a>	
<?php
// Delete User Account

if(isset($_GET['delete_user'])){
  $delete_user = mysqli_query($conexion,"delete from usuarios where user_id='$_GET[delete_user]' ");
  
  if($delete_user){
  // echo "<script>alert('Cuenta eliminada correctamente!')</script>";
  
  echo "<script>window.open('index.php?action=view_users','_self')</script>";
   
    }
  }





// Remove items selected using foreach loop
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];
  
  foreach($remove as $key){
  $run_remove = mysqli_query($conexion,"delete from usuarios where user_id='$key'");
  
  if($run_remove){
  echo "<script>alert('Los items seleccionados fueron eliminado correctamente!')</script>";
  
  echo "<script>window.open('index.php?action=view_users','_self')</script>";
  }else{
  echo "<script>alert('Mysqli Failed: mysqli_error($conexion)!')</script>";
  }
  }
}
 ?>

<?php } ?>

