<?php $edit_cat = mysqli_query($conexion, "select * from cotizacion where cot_codigo='$_GET[ruc]'");

$fetch_cat = mysqli_fetch_array($edit_cat); ?>
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {

  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else { ?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> EDITAR EVALUACIÓN</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item "><a href="index.php?action=lista_operaciones">Lista de Evaluaciones</a></li>
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
                  <label for="exampleInputEmail1">CLIENTE:</label>
                  <input class="form-control" type="text" disabled value="<?php echo $fetch_cat['cot_cliente']; ?>" size="30" required>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">ASIGNADO:</label>
                <input type="text" class="form-control" value="<?php echo $fetch_cat['cot_asignado']; ?>" disabled>

              </div>
               <div class="form-group">
                <label for="exampleInputEmail1">DIRECCIÓN:</label>
                <input class="form-control" type="text" value="<?php echo $fetch_cat['cot_direccion']; ?>" size="30" disabled>
              </div>
           
            </div>
            <div class="col-lg-4 offset-lg-1"><br><br>
             <div class="form-group">
                  <label for="exampleInputEmail1">ESTADO:</label><br>
                  <input type="text" class="form-control" value="<?php echo $fetch_cat['cot_estado']; ?>" disabled>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">TIEMPO DE ENTREGA:</label>
                <input type="text" class="form-control" value="<?php echo $fetch_cat['cot_entrega']; ?>" disabled>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">CREADO:</label>
                  <input type="text" class="form-control" value="<?php echo $fetch_cat['cot_fecha']; ?>" disabled>
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
               </div>
             </div>
             <div class="row">
              <div class="col-12 table-responsive">
               <table class="table table-striped">
                  <thead align="center">
                    <tr>
                      <th>ITEM</th>
                      <th>NOTA</th>
                      <th>CANTIDAD</th>
                      <th>OBSERVACIONES</th>
                    </tr>
                  </thead>
                  <?php
                  $i = 1;
                  $edit_cat2 = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$_GET[ruc]'");

                  while ($row = mysqli_fetch_array($edit_cat2)) {
                    $product_id =  $row['servicio_cot'];
                    $nombre = $row['nombre_cot'];
                    $cantidad = $row['cantidad_cot'];
                    $nota = $row['nota_cot'];
                    $servicio = $row['servicio_cot'];
                    $observaciones  = $row['observacion_cot'];



                  ?>
                    <tbody align="center">
                      <tr>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $nota; ?></td>
                        <td><?php echo $cantidad; ?></td>

                        <td><input type="text" class="obv_id" data-id="<?php echo $product_id; ?>" value="<?php echo $observaciones; ?>" name="observaciones" placeholder="Observaciones" required></td>
                        <!-- <td><input type="text" name="observaciones" placeholder="Observaciones" value="" required></td> -->
                        <?php  ?>
                      </tr>
                    </tbody>
                  <?php $i++;
                  } ?>

                </table>
              </div>
             </div>
             
             <div class="col-lg-4 offset-lg-1">
              <div class="form-group">
                <label for="exampleInputEmail1">RESPONSABLE:</label>
                <input class="form-control rounded " name="tecnico" id="tag" placeholder="Técnico" required>

              </div>
              <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
                <div class="list-group" id="show-list">
                  <!-- autocompletado aqui -->
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">OPERACIONES:</label><br>
                <textarea name="operativo" class="form-control" cols="65" rows="5" placeholder="Detalle Operativo" required></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">REQUIERE:</label>
                <textarea name="requiere" class="form-control" cols="65" rows="5" placeholder="Requiere" required></textarea>
              </div>
            </div>
             <div class="tile-footer">
                  <button class="btn btn-primary" name="edit_cotiOT" type="submit">PROCESAR A OT <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </div></div>
          </form>
            </div>

          </div>

        </div>
      </div>
    </div>
  </main>
  <input type="hidden" class="hidden_ip" value="<?php echo $_GET['ruc']; ?>">
  <?php


  if (isset($_POST['edit_cotiOT'])) {

    $nombre_cotOT = $fetch_cat['cot_cliente'];
    $estado_cotOT = $fetch_cat['cot_estado'];
    $pago_cotOT = $fetch_cat['cot_pago'];
    $moneda_cotOT = $fetch_cat['cot_moneda'];
    $asignado_cotOT = $fetch_cat['cot_asignado'];
    $entrega_cotOT = $fetch_cat['cot_entrega'];
    $expira_cotOT = $fetch_cat['cot_expira'];
    $direccion_cotOT = $fetch_cat['cot_direccion'];
    $fecha_cotOT = $fetch_cat['cot_fecha'];

    $tecnico_cotOT = $_POST['tecnico'];
    $operativo_cotOT = $_POST['operativo'];
    $requiere_cotOT = $_POST['requiere'];

    
    //codigo
    $all_cot = mysqli_query($conexion, "select * from otcotizacion_servicio");
    while ($row4 = mysqli_fetch_array($all_cot)) {

      $codRo = $row4['ot_codigo'];
      $codRo2 = str_replace('OT-', '', $codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'OT-';
      $ot_cod = $ser . $codRo3;
    }

    $edit_cotOT = mysqli_query($conexion, "insert into otcotizacion_servicio (ot_codigo,ot_cot,ot_cliente,ot_asignado,ot_estado,ot_pago,ot_moneda,ot_entrega,ot_expira,ot_direccion,ot_fecha,ot_tecnico,ot_operativo,ot_requiere) values ('$ot_cod','$_GET[ruc]','$nombre_cotOT','$asignado_cotOT','$estado_cotOT','$pago_cotOT','$moneda_cotOT','$entrega_cotOT','$expira_cotOT','$direccion_cotOT','$fecha_cotOT','$tecnico_cotOT','$operativo_cotOT','$requiere_cotOT')");
    // $eliminarObv = mysqli_query($conexion,"delete observacion_cot from cotizacion_servicio where cod_cot='$_GET[ruc]'"); no funca

    $product_id = $_GET['ruc'];
    $fetch_pro = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$product_id'");
    while ($fetch_pro2 = mysqli_fetch_array($fetch_pro)) {

      //tabla 
      $nombre_serviciOT = $fetch_pro2['nombre_cot'];
      $nota_servicioOT = $fetch_pro2['nota_cot'];;
      $cantidad_servicioOT = $fetch_pro2['cantidad_cot'];
      $serviciocot_servicioOT = $fetch_pro2['servicio_cot'];
      $observaciones_servicioOT = $fetch_pro2['observacion_cot'];
      $edit_cotOT2 = mysqli_query($conexion, "insert into otcotizacion_servicio2 (ot2_cod,ot2_cot,ot2_nombre,ot2_nota,ot2_cantidad,ot2_observaciones) values ('$ot_cod','$_GET[ruc]','$nombre_serviciOT','$nota_servicioOT','$cantidad_servicioOT','$observaciones_servicioOT')");
      if ($edit_cotOT2) {
        echo "<script>alert('Nuevo Orden de Trabajo fue creado Correctamente')</script>";
        echo "<script>window.open('index.php?action=lista_operaciones','_self')</script>";
      } else {
      }
    }
  }
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // Send Search Text to the server
      $("#tag").keyup(function() {
        let searchText = $(this).val();
        if (searchText != "") {
          $.ajax({
            url: "js/autocompletado/searchTecnico.php",
            method: "post",
            data: {
              query: searchText,
            },
            success: function(response) {
              $("#show-list").html(response);
            },
          });
        } else {
          $("#show-list").html("");
        }
      });
      // Set searched text in input field on click of search button
      $(document).on("click", "a", function() {
        $("#tag").val($(this).text());
        $("#show-list").html("");
      });
    });
  </script>

  <script>
    $(document).ready(function() {

      $(".obv_id").on("keyup", function() {

        var pro_id = $(this).data("id");
        var qty = $(this).val();
        var nota = $(this).val();

        var ip = $(".hidden_ip").val();

        //alert(ip);

        // Update servicios cantidad in ajax and php
        $.ajax({
          url: 'update_obv_ajax.php',
          type: 'post',
          data: {
            id: pro_id,
            Nota: nota,
            //quantity: qty,

            ip: ip
          },
          dataType: 'html',


        });

      });

    });
  </script>

<?php } ?>