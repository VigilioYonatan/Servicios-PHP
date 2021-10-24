<?php $edit_cat = mysqli_query($conexion, "select * from cotizacion where cot_codigo='$_GET[ruc]'");

$fetch_cat = mysqli_fetch_array($edit_cat); ?>
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){

echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> EDITAR COTIZACIÓN</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item "><a href="index.php?action=view_cotizacion">Cotizaciones</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <form action="" method="POST" accept-charset="utf-8">
                  <h3 style="color:#dc3545; "><b><?php echo $fetch_cat['cot_codigo']; ?></b></h3>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Nombre:</label>
                       <input class="form-control" type="text"name="nombre" value="<?php echo $fetch_cat['cot_cliente']; ?>" size="30" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar estado:</label>
                    <select class="form-control"name="estado" id="estado" required>
                      <option value="<?php echo $fetch_cat['cot_estado']; ?>"><?php echo $fetch_cat['cot_estado']; ?></option>
                      <?php
                      $get_cats = "select * from venta_estado";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $estado_id = $row_cats['est_id'];
                        $estado_nombre = $row_cats['est_nombre'];

                        echo "<option value='$estado_nombre'>$estado_nombre</option>";
                      }
                      ?>
                  </select>
                  </div> 
                        
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar forma de pago:</label>
                    <select class="form-control" name="pago" id="pago" required>
                      <option value="<?php echo $fetch_cat['cot_pago']; ?>"><?php echo $fetch_cat['cot_pago']; ?></option>
                      <?php
                      $get_cats = "select * from venta_pago";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $pago_id = $row_cats['pago_id'];
                        $pago_nombre = $row_cats['pago_nombre'];

                        echo "<option value='$pago_nombre'>$pago_nombre</option>";
                      }
                      ?>
                    </select>
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar moneda:</label>
                    <select class="form-control" name="moneda" id="moneda">
                      <option value="<?php echo $fetch_cat['cot_moneda']; ?>"><?php echo $fetch_cat['cot_moneda']; ?></option>
                      <?php
                      $get_cats = "select * from venta_moneda";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $moneda_id = $row_cats['moneda_id'];
                        $moneda_nombre = $row_cats['moneda_nombre'];

                        echo "<option value='$moneda_nombre'>$moneda_nombre</option>";
                      }
                      ?>
                    </select>
                  </div> 
                   

                  <div class="tile-footer">
              
            </div>
          </div>
              <div class="col-lg-4 offset-lg-1"><br><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Asignado:</label>
                    <select class="form-control" name="asignado" id="entrega" required>
                      <option value="<?php echo $fetch_cat['cot_asignado']; ?>"><?php echo $fetch_cat['cot_asignado']; ?></option>
                      <?php
                     $rol2 = 5 ;
                      $get_asignado = "select * from usuarios where user_rol = '$rol2'";
                      $get_asignado2 = mysqli_query($conexion,$get_asignado);
                      while ($row_a = mysqli_fetch_array($get_asignado2)){
                        $asignados = $row_a['user_nombre'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                    </select>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar tiempo de entrega:</label>
                    <select class="form-control" name="entrega" id="entrega" required>
                      <option value="<?php echo $fetch_cat['cot_entrega']; ?>" ><?php echo $fetch_cat['cot_entrega']; ?></option>
                      <?php
                      $get_cats = "select * from venta_entrega";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $entrega_id = $row_cats['entrega_id'];
                        $entrega_nombre = $row_cats['entrega_nombre'];

                        echo "<option value='$entrega_nombre'>$entrega_nombre</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Expira:</label>
                     <select class="form-control" name="expira" id="expira" required>
                      <option value="<?php echo $fetch_cat['cot_expira']; ?>"><?php echo $fetch_cat['cot_expira']; ?></option>
                      <?php
                      $get_cats = "select * from venta_expira";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $expira_id = $row_cats['expira_id'];
                        $expira_nombre = $row_cats['expira_nombre'];

                        echo "<option value='$expira_nombre'>$expira_nombre</option>";
                      }
                      ?>
                    </select>
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar direccion:</label>
                    <input class="form-control" type="text"name="direccion" value="<?php echo $fetch_cat['cot_direccion']; ?>" size="30" required >
                  </div> 
                  <div class="tile-footer">
                    <button class="btn btn-primary" name="edit_coti"type="submit">Guardar  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                  </div>

                </form>
                </div>

            </div>

          </div>
        </div>
      </div>
    </main>

    <?php

if (isset($_POST['edit_coti'])) {
  
        $nombre_cot = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $estado_cot = $_POST['estado'];
        $pago_cot = $_POST['pago'];
        $moneda_cot = $_POST['moneda'];
        $asignado_cot = $_POST['asignado'];
        $entrega_cot = $_POST['entrega'];
        $expira_cot = $_POST['expira'];
        $direccion_cot = $_POST['direccion'];
        $edit_cot = "update cotizacion set cot_cliente=' $nombre_cot ',cot_estado=' $estado_cot',cot_pago='$pago_cot',cot_moneda='$moneda_cot',cot_asignado='$asignado_cot ',cot_entrega='$entrega_cot',cot_expira='$expira_cot',cot_direccion='$direccion_cot' where cot_codigo='$_GET[ruc]'";
        $edit_cot2 = mysqli_query($conexion, $edit_cot);

        echo "<script>window.open('index.php?action=view_cotizacion','_self')</script>";
    }
?>



<?php } ?>






    