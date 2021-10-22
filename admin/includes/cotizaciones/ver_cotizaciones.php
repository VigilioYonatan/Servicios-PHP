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
          <li class="breadcrumb-item active">Cotizaciones</li>
          
        </ul>
      </div>

      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">

                <form action="" method="post" enctype="multipart/form-data" >
              <table class="table table-hover table-bordered" id="sampleTable">
                  <thead align="center">
                    <tr>
                      
                      <th>ID</th>
                      <th>Codigo </th>
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
                    <tbody align="center">
                      <tr>
                        
                       <td ><?php echo $i; ?></td>
                       <td  ><a href="index.php?action=view_cotizacion_id&cot_codigo=<?php echo $row['cot_codigo'];?>"style="color:#dc3545;"><?php echo $row['cot_codigo']; ?></a></td>
                       <td><?php echo $row['cot_cliente']; ?></td>
                       <td><?php echo $row['cot_asignado']; ?></td>
                       <td><?php echo $row['cot_estado']; ?></td>
                       <td><?php echo $row['cot_pago']; ?></td>
                       <td><?php echo $row['cot_moneda']; ?></td>
                       <td><?php echo $row['cot_fecha']; ?></td>

                      </tr>

                    </tbody>
                    <?php $i++;} // End while loop ?>
                </table>
              </form>

              </div>
            </div>
          </div>
        </div>
      </div>

      <a href="index.php?action=add_cotizacion" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Cotización</a> 
 </main>   

 
<!-- PHP CODIGO  --> 


<?php } ?>

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

    