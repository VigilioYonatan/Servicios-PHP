<?php $edit_cat = mysqli_query($conexion, "select * from cotizacion where cot_codigo='$_GET[ruc]'");

$fetch_cat = mysqli_fetch_array($edit_cat); ?>
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {

  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else { ?>
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
                  <input class="form-control" type="text" name="nombre" value="<?php echo $fetch_cat['cot_cliente']; ?>" size="30" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Editar estado:</label>
                  <select class="form-control" name="estado" id="estado" required>
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
                <div class="form-group">
                  <label for="exampleInputEmail1">Editar Fecha:</label>
                  <input class="form-control" type="text" name="fecha" value="<?php echo $fetch_cat['cot_fecha']; ?>" size="30" required>
                </div>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Servicio</th>
                      <th>Nota</th>
                      <th>Cantidad</th>
                      <th>Observaciones</th>
                    </tr>
                  </thead>
                  <?php
                  $i = 1;
                  $edit_cat2 = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$_GET[ruc]'");

                  while ($row = mysqli_fetch_array($edit_cat2)) {
                    $nombre = $row['nombre_cot'];
                    $cantidad = $row['cantidad_cot'];
                    $nota = $row['nota_cot'];
                    $edit_cat3 = mysqli_query($conexion, "select * from cotizacion_servicio2 where cantidad_cot2='$cantidad' and cod_cot2='$_GET[ruc] '");
                    $row2 = mysqli_fetch_array($edit_cat3);
                  ?>
                    <tbody>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $nota; ?></td>
                        <td><?php echo $cantidad; ?></td>

                        <td><input type="text" name="observaciones" placeholder="Observaciones"></td>

                      </tr>
                    </tbody>
                  <?php $i++;
                  } ?>

                </table>
                <div class="tile-footer">
                  <button class="btn btn-primary" name="edit_cotiOT" type="submit">PROCESAR <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
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
                  $rol2 = 5;
                  $get_asignado = "select * from usuarios where user_rol = '$rol2'";
                  $get_asignado2 = mysqli_query($conexion, $get_asignado);
                  while ($row_a = mysqli_fetch_array($get_asignado2)) {
                    $asignados = $row_a['user_nombre'];
                    echo "<option value='$asignados'>$asignados</option>";
                  }

                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Editar tiempo de entrega:</label>
                <select class="form-control" name="entrega" id="entrega" required>
                  <option value="<?php echo $fetch_cat['cot_entrega']; ?>"><?php echo $fetch_cat['cot_entrega']; ?></option>
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
                <input class="form-control" type="text" name="direccion" value="<?php echo $fetch_cat['cot_direccion']; ?>" size="30" required>
              </div>
              
              <?php $result = mysqli_query($conexion, "select * from servicios ");

              $array = array();
              if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                  $equipo = utf8_encode($row['servicio_nombre']);
                  array_push($array, $equipo); // equipos
                }
              }
              ?>

              <div class="form-group">
                <label for="exampleInputEmail1">Asignar Tecnico:</label>
                <input class="form-control rounded "  name="tecnico" id="tag" placeholder="Técnico" required>
                
              </div>
              <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
        <div class="list-group" id="show-list">
          <!-- autocompletado aqui -->
        </div>
      </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Detalle Operativo:</label>
                <input class="form-control " type="text" name="operativo" placeholder="Detalle Operativo" size="30" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Requiere:</label>
                <input class="form-control" type="text" name="requiere" placeholder="Requiere" size="30" required>
              </div>

              </form>
            </div>

          </div>

        </div>
      </div>
    </div>
  </main>

  <?php

  if (isset($_POST['edit_cotiOT'])) {

    $nombre_cotOT = $_POST['nombre'];
    $estado_cotOT = $_POST['estado'];
    $pago_cotOT = $_POST['pago'];
    $moneda_cotOT = $_POST['moneda'];
    $asignado_cotOT = $_POST['asignado'];
    $entrega_cotOT = $_POST['entrega'];
    $expira_cotOT = $_POST['expira'];
    $direccion_cotOT = $_POST['direccion'];
    $fecha_cotOT = $_POST['fecha'];

    $tecnico_cotOT = $_POST['tecnico'];
    $operativo_cotOT = $_POST['operativo'];
    $requiere_cotOT = $_POST['requiere'];

    //tabla

    $nombre_serviciOT =   $nombre;
    $nota_servicioOT = $nota;
    $cantidad_servicioOT = $cantidad;
    $observaciones_servicioOT = $_POST['observaciones'];

    //codigo
    $all_cot = mysqli_query($conexion, "select * from otcotizacion_servicio");
    while ($row4 = mysqli_fetch_array($all_cot)) {

      $codRo = $row4['ot_codigo'];
      $codRo2 = str_replace('OT-', '', $codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'OT-';
      $cot_cod = $ser . $codRo3;
    }

    $edit_cotOT = mysqli_query($conexion, "insert into otcotizacion_servicio (ot_codigo,ot_cot,ot_cliente,ot_asignado,ot_estado,ot_pago,ot_moneda,ot_entrega,ot_expira,ot_direccion,ot_fecha,ot_servicio,ot_nota,ot_cantidad,ot_observaciones,ot_tecnico,ot_operativo,ot_requiere) values ('$cot_cod','$_GET[ruc]','$nombre_cotOT','$asignado_cotOT','$estado_cotOT','$pago_cotOT','$moneda_cotOT','$entrega_cotOT','$expira_cotOT','$direccion_cotOT','$fecha_cotOT','$nombre_serviciOT','$nota_servicioOT','$cantidad_servicioOT','$observaciones_servicioOT','$tecnico_cotOT','$operativo_cotOT','$requiere_cotOT')");


    if ($edit_cotOT) {
      echo "<script>alert('$cot_cod fue creado correctamente')</script>";
      echo "<script>window.open('index.php?action=lista_operaciones','_self')</script>";
    } else {
      echo "<script>alert('ERROR')</script>";
    }
  }
  ?>

  <script type="text/javascript">
  $(document).ready(function () {
    // Send Search Text to the server
    $("#tag").keyup(function () {
      let searchText = $(this).val();
      if (searchText != "") {
        $.ajax({
          url: "js/autocompletado/searchTecnico.php",
          method: "post",
          data: {
            query: searchText,
          },
          success: function (response) {
            $("#show-list").html(response);
          },
        });
      } else {
        $("#show-list").html("");
      }
    });
    // Set searched text in input field on click of search button
    $(document).on("click", "a", function () {
      $("#tag").val($(this).text());
      $("#show-list").html("");
    });
  });
</script>
<script>

    // $(document).ready(function() {
    //   var items = <?= json_encode($array) ?>

    //   $("#tag").autocomplete({
    //     source: items,
    //     select: function(event, item) {
    //       var params = {
    //         equipo: item.item.value
    //       };
    //       $.get("js/autocompletado/getTecnico.php", params, function(response) {
            
    //       }); // ajax
    //     }
    //   });
    // });
  </script>

<?php } ?>