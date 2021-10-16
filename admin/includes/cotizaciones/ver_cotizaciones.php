<?php if($_SESSION['role'] != 2 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>

<a href="index.php?action=add_cotizacion"> Agregar cotizaciones</a>

<table></table>

<?php } ?>