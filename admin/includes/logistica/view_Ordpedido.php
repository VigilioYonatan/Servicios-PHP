<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 9 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-truck"></i> ORDENES DE PEDIDOS</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Lista de Pedidos</li>
          
        </ul>
      </div>
      <form action="buscador_prov.php" method="get">
      <label>Buscar: </label>
      <input type="text" id="buscar_coti" name="buscador_prov">
      <input type="submit" name="buscar_prov"class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;">
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
                      
                      <th>CODIGO</th>
                      <th>CLIENTE</th>
                      <th>ASIGNADO</th>
                      <th>OT</th>
                      <th>CREADO</th>
                      <th>PROCESADO</th>
                      <th>RESPONSABLE</th>
                      <!-- <th>Editar</th> -->
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                  $all_cli = mysqli_query($conexion,"select * from opcotizacion_servicio order by op_id");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_cli)){
                    // $nombreRa = $row['razon_proovedor'];
                    // $rucRa = $row['ruc_proovedor'];
                    ?>

                    <tbody align="center">
                      <tr>
                       <td><a href="index.php?action=view_Ordpedido_id&op_codigo=<?php echo $row['op_codigo'];?>"style="color:#1F618D;font-weight: bold;"> <?php echo $row['op_codigo']; ?></a></td>
                       <td><?php echo $row['op_cliente']; ?></td>
                       <td><?php echo $row['op_asignado']; ?></td>
                       <td><?php echo $row['op_ot']; ?></td>
                       <td><?php echo $row['op_creacion']; ?></td>
                       <td><?php echo $row['op_fechaActual']; ?></td>
                       <td><?php echo $row['op_responsable']; ?></td>

                     
                      
                           <!-- <td class="delete"><a href="index.php?action=edit_proovedor&ruc=<?php echo $row['op_codigo']; ?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td> -->

                           <td class="delete"><a href="index.php?action=view_Ordpedido&delete_op=<?php echo $row['op_codigo']; ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  a este empleado?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
                    <?php $i++;} // End while loop ?>
                </table>
              </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      <!--<a href="index.php?action=add_proovedor" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Proovedor</a> --> 
 </main>   

 
<!-- PHP CODIGO  --> 
<!-- PHP CODIGO  --> 
<?php
// Delete User cuenta

if(isset($_GET['delete_op'])){
  $delete_pro = mysqli_query($conexion,"delete from opcotizacion_servicio where op_codigo='$_GET[delete_op]' ");
  $delete_pro2 = mysqli_query($conexion,"delete from opcotizacion_servicio2 where op2_cod='$_GET[delete_op]' ");
  
 
  
  echo "<script>window.open('index.php?action=view_Ordpedido','_self')</script>";
  
   
}

  ?>
<?php } ?>

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>