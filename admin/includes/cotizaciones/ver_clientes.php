<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> CLIENTES</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Clientes</li>
          
        </ul>
      </div>

      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="post" enctype="multipart/form-data" >
              <div class="table-responsive">

                
              <table class="table table-hover table-bordered" id="sampleTable">
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
                  $all_cli = mysqli_query($conexion,"select * from clientes order by Id_cliente ");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_cli)){
                    $nombreRa = $row['razon_cliente'];
                    $rucRa = $row['ruc_cliente'];
                    ?>

                    <tbody align="center">
                      <tr>

                       <td><?php echo $row['cod_cliente']; ?></td>
                       <td><?php echo $row['ruc_cliente']; ?></td>
                       <td><?php echo $row['razon_cliente']; ?></td>
                       <td><?php echo $row['area_cliente']; ?></td>
                       <td><?php echo $row['estado_cliente']; ?></td>
                       <td><?php echo $row['asignado_cliente']; ?></td>
                       <td><a href="https://<?php echo $row['web_cliente']; ?>" target="?blank"><?php echo $row['web_cliente']; ?></a></td>

                     
                      
                           <td class="delete"><a href="index.php?action=edit_clien&ruc=<?php echo $row['ruc_cliente']; ?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>

                           <td class="delete"><a href="index.php?action=view_clientes&delete_cliente=<?php echo $row['ruc_cliente']; ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  a este empleado?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
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

      <a href="index.php?action=add_clientes" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Cliente</a> 
 </main>   

 
<!-- PHP CODIGO  --> 
<!-- PHP CODIGO  --> 
<?php
// Delete User cuenta

if(isset($_GET['delete_cliente'])){
  $delete_cliente = mysqli_query($conexion,"delete from clientes where ruc_cliente='$_GET[delete_cliente]' ");
  
  if($delete_cliente){
  
  echo "<script>window.open('index.php?action=view_clientes','_self')</script>";
  
   
    }
  }

  ?>
<?php } ?>

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

    