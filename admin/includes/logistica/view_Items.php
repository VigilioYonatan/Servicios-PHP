<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i>Listado De Items</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Lista De Items</li>
          
        </ul>
      </div>
      <style type="text/css">
        
      </style>
      <!-- <form action="buscador_coti.php" method="get">
      <label>Buscar: </label>
      <input id="buscar_coti" type="text" name="buscador_coti" >
      <input type="submit" name="buscar_coti" class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;"> -->

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
                      <th>ITEM</th>
                      <th>NOTA</th>
                      <th>CANTIDAD</th>
                      <th>PROVEEDOR</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                  
                  $all_cot = mysqli_query($conexion,"select * from compra_servicio order by compra_id ");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_cot)){
                    // $nombreRo = $row['cot_cliente'];
                    // $codRo = $row['cot_codigo'];
                    ?>
                    <tbody align="center">
                      <tr>
                        
                       <td  ><a href="index.php?action=view_item_id&item_id=<?php echo $row['compra_id'];?>"style="color:#1F618D;font-weight: bold;"><?php echo $row['compra_op']; ?></a></td>
                       <td><?php echo $row['compra_item']; ?></td>
                       <td><?php echo $row['compra_nota']; ?></td>
                       <td><?php echo $row['compra_cantidad']; ?></td>
                       <td><?php echo $row['compra_proveedor']; ?></td>
                      <!-- <td><a href="lista_servicio.php?ruc=<?php echo $row['cot_codigo']; ?>" >Tabla</a></td>  comentado para ver si el profe diga que si lo agregamos -->
                           <td class="delete"><a href="index.php?action=edit_item_op&cod_op=<?php echo $row['compra_op']; ?>&id=<?php echo $row['compra_id']; ?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>

                           <td class="delete"><a href="?action=view_Items&delete_items=<?php echo $row['compra_id']; ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar este item');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                      
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

      


      <!-- <a href="index.php?action=add_cotizacion" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Cotización</a>  -->

 </main>   

 
<!-- PHP CODIGO  --> 
<?php
if(isset($_GET['delete_items'])){
  $delete_serv = mysqli_query($conexion,"delete from compra_servicio where compra_id='$_GET[delete_items]' ");

  if($delete_serv){

  echo "<script>window.open('index.php?action=view_Items','_self')</script>";


    }
  }


  ?>

<?php } ?>

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>