<?php include('cabeza.php'); ?>
<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {


    echo "<script>alert('No puedes acceder acá ')</script>";
    echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else {
?>


    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-users"></i> CLIENTES</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item active"><a href="index.php?action=view_clientes">Clientes</a></li>

            </ul>
        </div>
         <form action="buscador_cliente.php" method="get">
      <label>Buscar: </label>
      <input id="buscar_coti" type="text" name="buscador_serv" >
      <input type="submit" name="buscar_serv" class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;">
    </form>
        <div class="row" style="font-size: 15px;">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="table-responsive">


                                <table class="table table-hover table-bordered" >
                                    <thead align="center">
                                        <tr>

                                            <th>CODIGO</th>
                                            <th>RUC</th>
                                            <th>Razon Social</th>
                                            <th>Area</th>
                                            <th>Estado</th>
                                            <th>Asignado</th>
                                            <th>WEB</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if (isset($_GET['buscar_serv'])) {

                                        $search_query = $_GET['buscador_serv'];
                                        $i = 1;

                                        $run_query_by_pro_ids = mysqli_query($conexion, "select * from clientes where razon_cliente like '%$search_query%' ");

                                        if ($run_query_by_pro_ids) {

                                            while ($row_pro = $run_query_by_pro_ids->fetch_array()) {

                                                $pro_id = $row_pro['Id_cliente'];
                                                $pro_cod = $row_pro['cod_cliente'];
                                                $pro_ruc = $row_pro['ruc_cliente'];
                                                $pro_razon  = $row_pro['razon_cliente'];
                                                $pro_area = $row_pro['area_cliente'];
                                                $pro_estado = $row_pro['estado_cliente'];
                                                $pro_asignado = $row_pro['asignado_cliente'];
                                                $pro_web = $row_pro['web_cliente'];


                                                echo "
                                                <tr align='center'>

                                                <td><a href='index.php?action=view_cliente_id&cliente_codigo=$pro_cod'style='color:#dc3545;'>$pro_cod</a> </td>
                                                <td>$pro_ruc</td>
                                                <td>$pro_razon</td>
                                                <td>$pro_area</td>
                                                <td>$pro_estado</td>
                                                <td>$pro_asignado</td>
                                                <td><a href='https://$pro_web' target='?blank'>$pro_web</a></td>
                                                <?php if ($pro_cod != $_SESSION[cod_user]) {?>
                                                    <td class='delete'><a href='index.php?action=edit_clien&ruc= $pro_ruc' ><i class='fa fa-pencil fa-2x' aria-hidden='true'></i></a></td>

                                                    <td class='delete'><a href='index.php?action=view_clientes&delete_cliente=$pro_ruc' onclick='return confirm('Estas seguro de eliminar que quieres eliminar  a este empleado?');'><i class='fa fa-trash fa-2x' aria-hidden='true'></i></a></td>
                                                    <?php } ?> 
                                                    ";
                                                }
                                            } else {
                                                echo "<script>alert('No sé encontro')</script>";
                                            }


                                    ?>

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
        <a href="index.php?action=add_clientes" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Agregar Cliente</a>
  </main>


  <!-- PHP CODIGO  -->
  <!-- PHP CODIGO  -->
  <?php
  // Delete User cuenta

  if (isset($_GET['delete_cliente'])) {
    $delete_cliente = mysqli_query($conexion, "delete from clientes where ruc_cliente='$_GET[delete_cliente]' ");

    if ($delete_cliente) {

      echo "<script>window.open('index.php?action=view_clientes','_self')</script>";
    }
  }

  ?>
<?php } ?>
<?php include('pie.php'); ?>

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $('#sampleTable').DataTable();
</script>