<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 5){
  
}else{?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus"></i> AGREGAR FORMA DE PAGO COT</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Agregar Pago</li>
          
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Forma de Pago:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Ingrese forma de pago" name="nombre_fPago" required>
                  </div>
                </div>
               
                <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-success" type="submit" name="agregar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Agregar</button>
                </div>
              </div>
            </div>
      </form>
            </div><br>
            
            <table class="table table-hover table-bordered">
                  <thead align="center">
                    <tr>
                      
                      <th>ID</th>
                      <th>NOMBRE</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                  $all_cli = mysqli_query($conexion,"select * from cotizacion_pago");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_cli)){
                    // $nombreRa = $row['razon_proovedor'];
                    // $rucRa = $row['ruc_proovedor'];
                    ?>

                    <tbody align="center">
                      <tr>
                       <td><?php echo $i; ?></td>
                       
                       <td> <input type="text" name="nombre" value="<?php echo $row['nombre_cotizacion']; ?>" disabled></td>
           
           
                           <td class="delete"><a href="index.php?action=edit_estado_id&edit_pago=<?php echo $row['id_cotizacion']; ?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>
                           
                           <td class="delete"><a href="index.php?action=add_fPagoCot&delete_pago=<?php echo $row['id_cotizacion']; ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  esto?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
                    
                    <?php $i++;} // End while loop ?>
                </table>
          </div>
        </div>
       
      </div>
</main>
<!-- PHP CODIGO  -->
<?php
if(isset($_POST['agregar'])){
    $nombreR = $_POST['nombre_fPago'];


    $agregarRol = "insert into cotizacion_pago(nombre_cotizacion) values ('$nombreR')";

    $agregarRol2 = mysqli_query($conexion, $agregarRol);

    if($agregarRol2){
         echo "<script>alert('Se agreg?? correctamente su forma de pago COT ')</script>";
        echo "<script>window.open('index.php?action=add_fPagoCot','_self')</script>";
    }else{
        echo "<script>alert('Hubo un error!!!')</script>";
    }
}
if(isset($_GET['delete_pago'])){
  $delete_serv = mysqli_query($conexion,"delete from cotizacion_pago where id_cotizacion='$_GET[delete_pago]'");
  
  if($delete_serv){  
  echo "<script>window.open('index.php?action=add_fPagoCot','_self')</script>";
    }else{
      echo "<script>alert('error')</script>";
    }
  }


?>
<?php } ?>