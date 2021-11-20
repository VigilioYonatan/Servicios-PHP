<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 5){
  
}else{?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus"></i> AGREGAR ROL</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Agregar Rol</li>
          
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Nombre Rol:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Ingrese nombre" name="nombre_rol" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Codigo Rol:</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="text" placeholder="Ingrese codigo" name="cod_rol" required>
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
                      <th>CODIGO</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                  $all_cli = mysqli_query($conexion,"select * from roles");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_cli)){
                    // $nombreRa = $row['razon_proovedor'];
                    // $rucRa = $row['ruc_proovedor'];
                    ?>

                    <tbody align="center">
                      <tr>
                       <td><a href="index.php?action=lista_ocClienteID&codOC=<?php echo $row['rol_id']; ?>"> <?php echo $row['rol_id']; ?></a></td>
                       <td><?php echo $row['rol_nombre']; ?></td>
                       <td><?php echo $row['rol_cod']; ?></td>
   
                           <td class="delete"><a href="index.php?action=edit_rol&rol_cod=<?php echo $row['rol_id']; ?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>

                           <td class="delete"><a href="index.php?action=add_rol&delete_rol=<?php echo $row['rol_id'] ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  esto?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
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
    $nombreR = $_POST['nombre_rol'];
    $codigoR = $_POST['cod_rol'];

    $agregarRol = "insert into roles(rol_nombre,rol_cod) values ('$nombreR','$codigoR')";

    $agregarRol2 = mysqli_query($conexion, $agregarRol);

    if($agregarRol2){
         echo "<script>alert('Se guardo correctamente $ruc ')</script>";
        echo "<script>window.open('index.php?action=add_rol','_self')</script>";
    }else{
        echo "<script>alert('Hubo un error!!!')</script>";
    }
}

if(isset($_GET['delete_rol'])){
  $delete_serv = mysqli_query($conexion,"delete from roles where rol_id='$_GET[delete_rol]' ");
  
  if($delete_serv){
  
  echo "<script>window.open('index.php?action=add_rol','_self')</script>";
  
   
    }
  }


?>
<?php } ?>