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
        <h1><i class="fa fa-users"></i>OC PROVEEDORES</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Lista de OC Proveedores</li>

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

                        <th>CODIGO</th>
                        <th>RUC PROVEEDOR</th>
                        <th>RESPONSABLE</th>
                        <th>RAZON SOCIAL PROVEEDOR</th>
                        <th>ESTADO</th>
                        <th>FECHA CREACION</th>
                        <th>TABLA</th>
                        <!-- <th>Editar</th> -->
                        <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php
                  $all_cli = mysqli_query($conexion, "select * from oc_proveedor order by ocp_id ");
                  $i = 1;

                  while ($row = mysqli_fetch_array($all_cli)) {
                    $ocp_codigo = $row['ocp_codigo'];
                  ?>

                    <tbody align="center">
                      <tr>
                        <td><a href="index.php?action=view_ocp_id&ocp_codigo=<?php echo $ocp_codigo; ?>"style="color:#1F618D;font-weight: bold;"><?php echo $ocp_codigo; ?></a></td>
                        <td><?php echo $row['ocp_ruc_prov']; ?></td>
                        <td><?php echo $row['ocp_responsable']; ?></td>
                        <td><?php echo $row['ocp_razon_prov']; ?></td>
                        <td><?php echo $row['ocp_estado']; ?></td>
                        <td><?php echo $row['ocp_creacion']; ?></td>
                        <td ><a href="index.php?action=lista_ocp&ocp_cod=<?php echo $ocp_codigo; ?>" ><i class="fa fa-table fa-2x" aria-hidden="true"></i></a></td> 
                        <!-- <td class="delete"><a href="index.php?action=edit_clien&ruc=<?php echo $row['ruc_cliente']; ?>"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td> -->

                        <td class="delete"><a href="index.php?action=view_ocproovedor&delete_ocp=<?php echo $ocp_codigo; ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  a este OC proveedor?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
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

    <a href="index.php?action=add_ocproveedor" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Agregar OC Proveedor</a>
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