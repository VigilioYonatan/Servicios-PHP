
<?php include('cabeza.php'); ?>
<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i> COTIZACIONES</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active"><a href="index.php?action=view_cotizacion">Cotizaciones</a></li>
          
        </ul>
      </div>
     <form action="buscador_coti.php" method="get">
      <label>Buscar: </label>
      <input id="buscar_coti" type="text" name="buscador_coti" >
      <input type="submit" name="buscar_coti" class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;">
    </form>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="post" enctype="multipart/form-data" >
              <div class="table-responsive">

                
              <table class="table table-hover table-bordered">
                  <thead align="center">
                    <tr>
                      
                      <th>Codigo </th>
                      <th>Cliente</th>
                      <th>Asignado</th>
                      <th>Estado</th>
                      <th>Pago</th>
                      <th>Moneda</th> 
                      <th>Fecha de cotizacion</th>
                      <th>Agregar tabla</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                  if (isset($_GET['buscar_coti'])) {

                    $search_query = $_GET['buscador_coti'];
                    $i = 1;

                    $run_query_by_pro_ids = mysqli_query($conexion, "select * from cotizacion where cot_cliente like '%$search_query%' ");

                    if ($run_query_by_pro_ids) {

                        while ($row_pro = $run_query_by_pro_ids->fetch_array()) {

                            $pro_id = $row_pro['cot_id'];
                            $pro_cod = $row_pro['cot_codigo'];
                            $pro_cliente = $row_pro['cot_cliente'];
                            $pro_asignado  = $row_pro['cot_asignado'];
                            $pro_estado = $row_pro['cot_estado'];
                            $pro_pago = $row_pro['cot_pago'];
                            $pro_moneda = $row_pro['cot_moneda'];
                            $pro_fecha = $row_pro['cot_fecha'];


                            echo "
                                <tr align='center'>

                                        <td ><a href='index.php?action=view_cotizacion_id&cot_codigo=$pro_cod'style='color:#dc3545;'>$pro_cod </a> </td>
                                        <td>$pro_cliente</td>
                                        <td>$pro_asignado</td>
                                        <td>$pro_estado</td>
                                        <td>$pro_pago</td>
                                        <td>$pro_moneda</td>
                                        <td>$pro_fecha</td>
                                        <td><a href='index.php?action=list_servicio&ruc=$row_pro[cot_codigo]' >Tabla</a></td> 
                                        <?php if ($pro_cod != $_SESSION[cod_user]) {?>
                                        <td class='delete'><a href='index.php?action=edit_cotizacion&ruc=$pro_cod' ><i class='fa fa-pencil fa-2x' aria-hidden='true'></i></a></td>

                                        <td class='delete'><a href='index.php?action=view_cotizacion&delete_cotizacion=$pro_id' onclick='return confirm('Estas seguro de eliminar que quieres eliminar  a este empleado?');'><i class='fa fa-trash fa-2x' aria-hidden='true'></i></a></td>
                                        <?php } ?> 
                                        ";
                        }
                    } else {
                        echo "<script>alert('No sé encontro')</script>";
                    }


                ?>

                    </tbody>
                    <?php $i++;} // End while loop ?>
                  </table>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>

      <a href="index.php?action=add_cotizacion" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Cotización</a> 
 </main>   

 
<!-- PHP CODIGO  --> 
<?php
if(isset($_GET['delete_cotizacion'])){
  $delete_serv = mysqli_query($conexion,"delete from cotizacion where cot_id='$_GET[delete_cotizacion]' ");

  if($delete_serv){

  echo "<script>window.open('index.php?action=view_cotizacion','_self')</script>";


    }
  }
  ?>

<?php } ?>

<?php include('pie.php'); ?>
    