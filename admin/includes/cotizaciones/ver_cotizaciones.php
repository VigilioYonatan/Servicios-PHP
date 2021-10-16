<?php if($_SESSION['role'] != 2 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>

<a href="index.php?action=add_cotizacion"> Agregar cotizaciones</a>

<form action="" method="post" enctype="multipart/form-data" >

<table width="100%">
 <thead>
  <tr>  
   <th><input type="checkbox" id="checkAll" />Check</th>
   <th>ID</th>
   <th>Nombre</th>
   <th>Apellido</th>
   <th>DNI</th>
  </tr>
 </thead>
 <?php 
//  $all_users = mysqli_query($conexion,"select * from clientes order by user_id DESC ");
//  $i = 1;
 
//  while($row=mysqli_fetch_array($all_users)){
//   $nom_cliente = $row['nom_cliente'];
//   $ape_cliente = $row['ape_cliente'];
//   $dni_cliente = $row['dni_cliente'];}
//  ?>
<!-- //  <tbody>
//     <tr>
//         <td><?php //echo $row['nom_cliente']; ?></td>
//         <td><?php //echo $nom_cliente; ?></td>
//         <td><?php //echo $nom_cliente; ?></td>
//     </tr> -->
</tbody>

<?php } ?>