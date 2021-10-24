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
                    <label for="exampleInputEmail1">Editar Codigo:</label>
                       <input class="form-control" type="text"name="serv_cod" value="<?php echo $fetch_cat['servicio_cod']; ?>" size="30" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Nombre de Servicio:</label>
                       <input class="form-control" type="text"name="serv_nombre" value="<?php echo $fetch_cat['servicio_nombre']; ?>" size="30" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar descripción de Servicio:</label>
                    <textarea class="form-control" name="serv_desc" id="" cols="40" rows="5" required><?php echo $fetch_cat['servicio_desc']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Materiales de Servicio:</label>
                    <textarea class="form-control" name="serv_mat" id="" cols="40" rows="5" required><?php echo $fetch_cat['servicio_mat']; ?></textarea>
                  </div>

                  <div class="tile-footer">
              
            </div>
              </div>

              <div class="col-lg-4 offset-lg-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Servicios Disponibles:</label>
                    <input class="form-control" type="number" placeholder="Ingrese precio" value="<?php echo $fetch_cat['servicio_disponibles']; ?>" name="serv_dis" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Precio de venta de Servicio:</label>
                    <input class="form-control" type="text" placeholder="Ingrese precio" name="serv_precio" value="<?php echo $fetch_cat['servicio_pventa']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar categoria de Servicio:</label>
                    <select class="form-control" name="cat_serv" id="entrega" required>
                      <option value="<?php echo $fetch_cat['servicio_categoria']; ?>"><?php echo $fetch_cat['servicio_categoria']; ?></option>
                      <?php
                     

                      $get_asignado = "select * from serv_categoria";
                      $get_asignado2 = mysqli_query($conexion,$get_asignado);
                      while ($row_a = mysqli_fetch_array($get_asignado2)){
                        $asignados = $row_a['nombre_categoria'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                    </select>
                  </div>
                  <div class="form-group">
      <label for="exampleInputEmail1">Editar estado:</label>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="estado_serv" value="1" <?php if ($fetch_cat['servicio_estado'] == '1') echo 'checked="checked"'; ?>>Activo
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="estado_serv" value="0" value="0" <?php if ($fetch_cat['servicio_estado'] == '0') echo 'checked="checked"'; ?>>No Activo
              </label>
            </div>
          
        </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Proovedor de Servicio:</label>             
                    <select class="form-control" name="pro_serv" id="entrega" required>
                    <option value="<?php echo $fetch_cat['servicio_proveedor']; ?>"><?php echo $fetch_cat['servicio_proveedor']; ?></option>
                      <?php
                     

                      $get_asignado = "select * from proveedores";
                      $get_asignado2 = mysqli_query($conexion,$get_asignado);
                      while ($row_a = mysqli_fetch_array($get_asignado2)){
                        $asignados = $row_a['razon_proovedor'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                    </select>
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
            $serv_cod = $_POST['serv_cod'];
             $serv_nombre = mysqli_real_escape_string($conexion, $_POST['serv_nombre']);
            $serv_desc = $_POST['serv_desc'];
            $serv_mat = $_POST['serv_mat'];
            $serv_dis = $_POST['serv_dis'];
            $serv_precio = $_POST['serv_precio'];
            $cat_serv = $_POST['cat_serv'];
            $estado_serv = $_POST['estado_serv'];
            $pro_serv = $_POST['pro_serv'];
            $edit_serv = "update servicios set servicio_cod = '$serv_cod', servicio_nombre='$serv_nombre', servicio_desc = '$serv_desc',servicio_mat='$serv_mat', servicio_disponibles='$serv_dis', servicio_pventa = '$serv_precio', servicio_categoria = '$cat_serv', servicio_estado='$estado_serv', servicio_proveedor='$pro_serv ' where servicio_id='$_GET[serv_id]'";
            $edit_serv2 = mysqli_query($conexion, $edit_serv);

            echo "<script>window.open('index.php?action=view_serv','_self')</script>";
        }
    // }else{
        //     echo "<script>alert('No se pudo cambiar')</script>";
        // }

  ?>
<?php } ?>