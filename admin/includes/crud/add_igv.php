<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 5){
  
}else{?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus"></i> CAMBIAR NUEVO IGV</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Agregar IGV</li>
          
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">IGV:</label>
                  <div class="col-md-8">
                    <?php $igv_num = mysqli_query($conexion, "select igv_numero from igv");
					$row_igv = mysqli_fetch_array($igv_num);
                    ?>
                    <input class="form-control" type="text" placeholder="Ingrese IGV" name="nombre_IGV" value="<?php echo $row_igv['igv_numero']; ?>" required>
                  </div>
                </div>
               
                <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-success" type="submit" name="agregar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Cambiar</button>
                </div>
              </div>
            </div>
      </form>
            </div>
            
          </div>
        </div>
       
      </div>
</main>

<!-- PHP CODIGO  -->
<?php
if(isset($_POST['agregar'])){
    $nombreR = $_POST['nombre_IGV'];


    $agregarRol = "update igv set igv_numero = '$nombreR'";

    $agregarRol2 = mysqli_query($conexion, $agregarRol);

    if($agregarRol2){
         echo "<script>alert('Se Actualizo nuevo IGV correctamente ')</script>";
        echo "<script>window.open('index.php?action=add_igv','_self')</script>";
    }else{
        echo "<script>alert('Hubo un error!!!')</script>";
    }
}

?>
<?php } ?>