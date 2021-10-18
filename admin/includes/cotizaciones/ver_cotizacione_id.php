<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>

<div class="view_product_box1">



<?php
$edit_cat = mysqli_query($conexion, "select * from cotizacion where cot_codigo='$_GET[cot_codigo]'");

$fetch_cat = mysqli_fetch_array($edit_cat);

?>

<h1 style="color:#dc3545;">Codigo: <b><?php echo $fetch_cat['cot_codigo'];?></b></h1>
<div class="border_bottom1"></div>
<h3 >Entrega: <b><?php echo $fetch_cat['cot_entrega'];?></b></h3>
<h3>Expira: <b><?php echo $fetch_cat['cot_expira'];?></b></h3>
<h3 class="cliente">Cliente: <b><?php echo $fetch_cat['cot_cliente'];?></b></h3>
<h3 class="asignado">Asignado: <b><?php echo $fetch_cat['cot_asignado'];?></b></h3>
<h3 >Tipo de Estado: <b><?php echo $fetch_cat['cot_estado'];?></b></h3>
<h3 >Tipo de Pago: <b><?php echo $fetch_cat['cot_pago'];?></b></h3>
<h3>Tipo de Moneda: <b><?php echo $fetch_cat['cot_moneda'];?></b></h3>

<div class="border_bottom"></div>
<h3>Dirección: <b><?php echo $fetch_cat['cot_direccion'];?></b></h3>
<h3>Condiciones: </h3>
<textarea name="" id="" cols="30" rows="10"><?php echo $fetch_cat['cot_condicion'];?></textarea>
<h3>Pie: <?php echo $fetch_cat['cot_pie'];?></h3>
</div>
<?php } ?>