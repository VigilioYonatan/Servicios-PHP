<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php
$edit_cat = mysqli_query($conexion, "select * from servicios where servicio_id='$_GET[serv_id]'");

$fetch_cat = mysqli_fetch_array($edit_cat);

?>

<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5){
  echo "<script>alert('No sos de servicios')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> EDITAR SERVICIOS</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item "><a href="index.php?action=view_serv">Lista de Servicios</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <form action="" method="POST" accept-charset="utf-8">
                  <h3 style="color:#dc3545; ">Codigo: <b><?php echo $fetch_cat['servicio_cod']; ?></b></h3>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Nombre de Servicio:</label>
                       <input class="form-control" type="text"name="serv_nombre" value="<?php echo $fetch_cat['servicio_nombre']; ?>" size="30" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Categoria de Servicio:</label>
                    <select class="form-control" name="cat_serv" id="">
                            <option value="<?php echo $fetch_cat['servicio_cat']; ?>"><?php echo $fetch_cat['servicio_cat']; ?></option>
                            <option value="Servidores">Servidores</option>
                            <option value="CPU">CPU</option> 
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Dias de Servicio:</label>
                       <input class="form-control" type="number" name="time_serv" value="<?php echo $fetch_cat['servicio_time']; ?>"  min="0" max="31">
                  </div>
                  <div class="tile-footer">
              
            </div>
              </div>

              <div class="col-lg-4 offset-lg-1">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Tipo de Servicio:</label>
                    <select class="form-control" name="tipo_serv" id="" value="<?php echo $fetch_cat['servicio_tipo']; ?>" >
                            <option value="<?php echo $fetch_cat['servicio_tipo']; ?>"><?php echo $fetch_cat['servicio_tipo']; ?></option>
                            <option value="Software">Software</option>
                            <option value="Hardware">Hardware</option>
                            <option value="General">General</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Detalles de Servicio:</label>
                     <textarea class="form-control" name="det_serv" id="area" cols="40" rows="5"><?php echo $fetch_cat['servicio_det']; ?></textarea>  
                  </div>

                  <div class="tile-footer">
              <button class="btn btn-primary" name="edit_serv"type="submit">Guardar  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
            </div>
                </form>
                </div>

            </div>

          </div>
        </div>
      </div>
    </main>

<!-- PHP CODIGO  -->
  <?php

    if (isset($_POST['edit_serv'])) {
      
      $serv_nombre = mysqli_real_escape_string($conexion, $_POST['serv_nombre']);
            $tipo_serv = $_POST['tipo_serv'];
            $cat_serv = $_POST['cat_serv'];
            $det_serv = $_POST['det_serv'];
            $time_serv = $_POST['time_serv'];

            $edit_serv = "update servicios set servicio_nombre='$serv_nombre', servicio_tipo = '$tipo_serv',servicio_cat='$cat_serv',servicio_det = '$det_serv',servicio_time = '$time_serv' where servicio_id='$_GET[serv_id]'";
            $edit_serv2 = mysqli_query($conexion, $edit_serv);

            echo "<script>window.open('index.php?action=view_serv','_self')</script>";
        }
    // }else{
        //     echo "<script>alert('No se pudo cambiar')</script>";
        // }

  ?>
<?php } ?>