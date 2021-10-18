<link href="styles/ver.css" type="text/css" rel="stylesheet">

<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>


<div class="view_product_box">
<h2><i class="fa fa-file-text-o  fa-1x" aria-hidden="true"></i>  COTIZACIONES</h2>
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
   <td class="blanco1"><a href="index.php?action=view_cotizacion_id&cot_codigo=<?php echo $row['cot_codigo'];?>"><?php echo $row['cot_codigo']; ?></a></td>
   <td class="blanco"><?php echo $row['cot_cliente']; ?></td>
   <td class="blanco"><?php echo $row['cot_asignado']; ?></td>
   <td class="blanco"><?php echo $row['cot_estado']; ?></td>
   <td class="blanco"><?php echo $row['cot_pago']; ?></td>
   <td class="blanco"><?php echo $row['cot_moneda']; ?></td>
   <td class="blanco"><?php echo $row['cot_fecha']; ?></td>
  </tr>

 </tbody>
 
 <?php $i++;} // End while loop ?>
 

 <td colspan="7" class="aqui">
    <div id="guardar">
    <a href="index.php?action=add_cotizacion"> Agregar  <i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
</div>
</td>
<style type="text/css">
  #guardar {
    padding: 10px;
    background: #0d9d94;
    margin-top: 20px;
    width: 85px;
    position: relative;
    border-radius: 4px;
}
#guardar a{
  border: none;
    background: none;
    font-family: 'Open Sans', sans-serif;
    font-size: 17px;
    text-decoration: none;
     color: white;
}
#guardar:hover {
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.40), 0 2px 10px 0 rgba(0, 0, 0, 0.19);
}
.blanco1 a{
  border: none;
    background: none;
    font-family: 'Open Sans', sans-serif;
    font-size: 17px;
    text-decoration: none;
     color: red;
     text-shadow: 0.1em 0.1em 0.2em black;
}
.blanco1 a:hover {
    font-weight: bold;
    color: black;
}

</style>

</table>

</form>

</div><!-- /.view_product_box -->
 

<?php } ?>
