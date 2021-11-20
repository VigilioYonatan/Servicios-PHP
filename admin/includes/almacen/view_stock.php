<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else {
?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-users"></i>LISTA DE STOCK</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Lista de stock</li>

      </ul>
    </div>
    <!-- <form action="buscador_cliente.php" method="get">
      <label>Buscar: </label>
      <input id="buscar_coti" type="text" name="buscador_serv" >
      <input type="submit" name="buscar_serv" class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;">
    </form> -->
    <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="table-responsive">


                <table class="table table-hover table-bordered">
                  <thead align="center">
                    <tr>

                        <th>CODIGO ALM</th>
                        <th>NOMBRE/ITEM</th>
                        <th>FABRICANTE</th>
                        <th>MODELO</th>
                        <th>CATEGORIA</th>
                        <th>LOTE</th>
                        <th>UNIDADES</th>
                        <!-- <th>Editar</th>
                        <th>Eliminar</th> -->
                    </tr>
                  </thead>
                  <?php
                  $all_cli = mysqli_query($conexion, "select * from ingresos_salida order by id_salida");
                  $i = 1;

                  while ($row = mysqli_fetch_array($all_cli)) {
                    $ing_codigo = $row['codigo_salida'];
                  ?>

                    <tbody align="center">
                      <tr>
                        <td><a href="index.php?action=view_stock_cod&stock_cod=<?php echo $ing_codigo; ?>"style="color:#1F618D;font-weight: bold;"><?php echo $ing_codigo; ?></a></td>
                        <td><?php echo $row['nombre_salida']; ?></td>
                        <td><?php echo $row['fabricante_salida']; ?></td>
                        <td><?php echo $row['modelo_salida']; ?></td>
                        <td><?php echo $row['categoria_salida']; ?></td>
                        <td><?php echo $row['lote_salida']; ?></td>
                        <td><?php echo $row['unidades_salida']; ?></td>
                        <!-- <td class="delete"><a href="index.php?action=edit_clien&ruc=<?php echo $ocp_codigo; ?>"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>

                        <td class="delete"><a href="index.php?action=view_ingresos_cod&delete_ocp=<?php echo $ocp_codigo; ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  a este OC proveedor?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td> -->
                      </tr>
                    </tbody>
                  <?php $i++;
                  } // End while loop 
                  ?>
                </table>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <a href="index.php?action=stock_salida" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Agregar Salida</a>
  </main>


  <!-- PHP CODIGO  -->
  <!-- PHP CODIGO  -->
  <?php
  // Delete User cuenta

  if (isset($_GET['delete_ocp'])) {
    $delete_cliente = mysqli_query($conexion, "delete from oc_proveedor where ocp_codigo='$_GET[delete_ocp]' ");
    $delete_cliente2 = mysqli_query($conexion, "delete from oc_proveedortabla where ocp_cod='$_GET[delete_ocp]' ");
    $delete_cliente2 = mysqli_query($conexion, "delete from oc_proveedortabla2 where ocp2_cod='$_GET[delete_ocp]' ");

    if ($delete_cliente2) {
      echo "<script>alert('Eliminado CORRECTAMENTE')</script>";

      echo "<script>window.open('index.php?action=view_ocproovedor','_self')</script>";
    }
  }

  ?>
<?php } ?>

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $('#sampleTable').DataTable();
</script>