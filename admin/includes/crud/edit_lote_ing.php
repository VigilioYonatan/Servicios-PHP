<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 5){
  
}else{?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus"></i>EDITAR LOTE</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">EDITAR LOTE</li>
          
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Lote:</label>
                  <div class="col-md-8">
                      <?php
                      $estado_id= mysqli_query($conexion, "select * from ingresos_lote where id_ingresos='$_GET[id]'");
                      $estado_id2 = mysqli_fetch_array($estado_id);
                      ?>
                    <input class="form-control" type="text" placeholder="Ingrese Lote" name="lote_ingresos" value="<?php echo $estado_id2['nombre_ingresos']; ?>" required>
                  </div>
                </div>
               
                <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-success" type="submit" name="actualizar"><i class="fa fa-fw fa-lg fa-check-circle"></i>ACTUALIZAR</button>
                </div>
              </div>
            </div>
      </form>
            </div>
          </div>
        </div>
      </div>
</main>
<?php
if(isset($_POST['actualizar'])){
    $lote_ingresos=$_POST['lote_ingresos'];
    $upd_estado = mysqli_query($conexion, "update ingresos_lote set nombre_ingresos='$lote_ingresos' where id_ingresos='$_GET[id]'");
    if($upd_estado){
        echo "<script>alert('Actualizado Correctamente')</script>";
        echo "<script>window.close()</script>";
        
        
    }
}
?>

<?php } ?>