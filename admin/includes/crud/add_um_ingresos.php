<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 5){
  
}else{?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus"></i> AGREGAR U.M. INGRESOS</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Agregar U.M.</li>
          
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3"> Fabricantes:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Ingresar unidad" name="nombre_unidad" required>
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
                  $all_cli = mysqli_query($conexion,"select * from ingresos_um");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_cli)){
                    // $nombreRa = $row['razon_proovedor'];
                    // $rucRa = $row['ruc_proovedor'];
                    ?>

                    <tbody align="center">
                      <tr>
                       <td><?php echo $i; ?></td>
                       
                       <td> <input type="text" name="nombre" value="<?php echo $row['nombre_ingresos']; ?>" disabled></td>
           
           
                           <td class="delete"><a id="pagina_pequeña" href="index.php?action=edit_um_ing&id=<?php echo $row['id_ingresos']; ?>" onclick="window.open(this.href, this.target, 'width=600,height=400'); return false;"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>
                           
                           <td class="delete"><a href="index.php?action=add_um_ingresos&delete_id=<?php echo $row['id_ingresos']; ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  esto?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
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
    $nombre_um = $_POST['nombre_unidad'];


    $agregarRol = "insert into ingresos_um(nombre_ingresos) values ('$nombre_um')";

    $agregarRol2 = mysqli_query($conexion, $agregarRol);

    if($agregarRol2){
         echo "<script>alert('Se agregó correctamente ingreso unidad ')</script>";
        echo "<script>window.open('index.php?action=add_um_ingresos','_self')</script>";
    }else{
        echo "<script>alert('Hubo un error!!!')</script>";
    }
}

if(isset($_GET['delete_id'])){
  $delete_serv = mysqli_query($conexion,"delete from ingresos_um where id_ingresos='$_GET[delete_id]' ");
  
  if($delete_serv){  
  echo "<script>window.open('index.php?action=add_um_ingresos','_self')</script>";
    }else{
      echo "<script>alert('error')</script>";
    }
  }


?>

<?php } ?>