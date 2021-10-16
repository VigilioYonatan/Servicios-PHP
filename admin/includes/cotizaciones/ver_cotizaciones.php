<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>


<div class="view_product_box">
<a href="index.php?action=add_cotizacion"> Agregar cotizaciones</a>

<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data" >

<table width="100%">
 <thead>
  <tr>  
   <th>ID</th>
   <th>Codigo</th>
   <th>Cliente</th>
   <th>Asignado</th>
   <th>Estado</th>
   <th>Pago</th>
   <th>Moneda</th> 
   <th>Fecha de cotizacion</th>
  </tr>
 </thead>
 <?php 
 $all_cot = mysqli_query($conexion,"select * from cotizacion order by cot_id ");
 $i = 1;
 
 while($row=mysqli_fetch_array($all_cot)){
  $nombreRo = $row['cot_cliente'];
  $codRo = $row['cot_codigo'];
 ?>
 <tbody>
  <tr>

   <td class="blanco"><?php echo $i; ?></td>
   <td class="blanco"><a href="index.php?action=view_cotizacion_id&cot_codigo=<?php echo $row['cot_codigo'];?>"><?php echo $row['cot_codigo']; ?></a></td>
   <td class="blanco"><?php echo $row['cot_cliente']; ?></td>
   <td class="blanco"><?php echo $row['cot_asignado']; ?></td>
   <td class="blanco"><?php echo $row['cot_estado']; ?></td>
   <td class="blanco"><?php echo $row['cot_pago']; ?></td>
   <td class="blanco"><?php echo $row['cot_moneda']; ?></td>
   <td class="blanco"><?php echo $row['cot_fecha']; ?></td>
  </tr>
 </tbody>
 
 <?php $i++;} // End while loop ?>
 
<tr>

 
 
</tr> 
</table>

</form>

</div><!-- /.view_product_box -->
 

<?php } ?>