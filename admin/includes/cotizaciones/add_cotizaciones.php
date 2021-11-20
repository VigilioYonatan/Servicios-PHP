<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else { ?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-file-text"></i> <i class="fa fa-plus"></i> AGREGAR COTIZACION</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item "><a href="index.php?action=view_cotizacion">Lista de Cotizaciones</a></li>
        <li class="breadcrumb-item active">Agregar</li>
      </ul>
    </div>
    <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <div class="row">
            <div class="col-lg-4 offset-lg-1">
              <form action="" method="POST" accept-charset="utf-8">
                <div class="form-group">

                  <label for="exampleInputEmail1">CLIENTE:</label>
                  <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Nombre" name="cliente" onkeyup="GetDetail(this.value)" id="rollNo">
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">VENDEDOR:</label>
                <select class="form-control" name="asignado" id="">
                  <option value="<?php echo $_SESSION['name']; ?>"><?php echo $_SESSION['name']; ?></option>
                  <?php
                  $rol2 = 1;

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
                  <label for="exampleInputEmail1">MONEDA:</label>
                  <select class="form-control" name="moneda" id="moneda">
                    <option value="null">Selecciona el tipo de moneda</option>
                    <?php
                    $get_cats = "select * from cotizacion_moneda";

                    $run_cats = mysqli_query($conexion, $get_cats);

                    while ($row_cats = mysqli_fetch_array($run_cats)) {
                      $moneda_id = $row_cats['cotizacion_id'];
                      $moneda_nombre = $row_cats['cotizacion_nombre'];

                      echo "<option value='$moneda_nombre'>$moneda_nombre</option>";
                    }
                    ?>
                  </select>
                </div>
             <div class="form-group">
                <label for="exampleInputEmail1">VALIDEZ DE OFERTA:</label>
                <select class="form-control" name="expira" id="expira" required>
                  <option value="null">Selecciona el tiempo </option>
                  <?php
                  $get_cats = "select * from cotizacion_expira";

                  $run_cats = mysqli_query($conexion, $get_cats);

                  while ($row_cats = mysqli_fetch_array($run_cats)) {
                    $expira_id = $row_cats['cotizacion_id'];
                    $expira_nombre = $row_cats['cotizacion_nombre'];

                    echo "<option value='$expira_nombre'>$expira_nombre</option>";
                  }
                  ?>
                </select>
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CONDICIONES GENERALES:</label>
                  <?php
                  $condicion = mysqli_query($conexion,"select * from condiciones_generales");
                  $condicion2 = mysqli_fetch_array($condicion);
                  ?>
                  <textarea class="form-control" id="exampleTextarea" rows="6" name="condicion" cols="35"><?php echo $condicion2['texto_condicion'] ?></textarea>
                </div>
                <div class="tile-footer">
                  <button class="btn btn-primary" name="agregarCot" type="submit">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </div>


            </div>

            <div class="col-lg-4 offset-lg-1">
               <div class="form-group">
                  <label for="exampleInputEmail1">ESTADO:</label>
                  <select class="form-control" name="estado" id="estado" required>
                    <option value="null">Selecciona un estado</option>
                    <?php
                    $get_cats = "select * from cotizacion_estado";

                    $run_cats = mysqli_query($conexion, $get_cats);

                    while ($row_cats = mysqli_fetch_array($run_cats)) {
                      $estado_id = $row_cats['id_estado'];
                      $estado_nombre = $row_cats['nombre_estado'];

                      echo "<option value='$estado_nombre'>$estado_nombre</option>";
                    }
                    ?>
                  </select>
                </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">FORMA DE PAGO:</label>
                  <select class="form-control" name="pago" id="pago" required>
                    <option value="null">Selecciona un tipo pago</option>
                    <?php
                    $get_cats = "select * from cotizacion_pago";

                    $run_cats = mysqli_query($conexion, $get_cats);

                    while ($row_cats = mysqli_fetch_array($run_cats)) {
                      $pago_id = $row_cats['id_cotizacion'];
                      $pago_nombre = $row_cats['nombre_cotizacion'];

                      echo "<option value='$pago_nombre'>$pago_nombre</option>";
                    }
                    ?>
                  </select>
                </div>

              <div class="form-group">
                <label for="exampleInputEmail1">TIEMPO DE ENTREGA:</label>
                <select class="form-control" name="entrega" id="entrega" required>
                  <option value="null">Selecciona el tiempo</option>
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
                <label for="exampleInputEmail1">DIRECCIÓN:</label>
                <input class="form-control" type="text" name="direccion" id="studentName" placeholder="direccion" required>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">PIE DE PAGINA:</label>
                <?php
                  $pie = mysqli_query($conexion,"select * from pie_pagina");
                  $pie2 = mysqli_fetch_array($pie);
                  ?>
                <textarea class="form-control" id="exampleTextarea" name="pie" cols="35" rows="6"><?php echo $pie2['texto_pie']; ?></textarea>
              </div>

              <div class="tile-footer">
                
              </div>
              </form>
            </div>

          </div>



  </main>
  <!-- PHP CODIGO  -->
  <?php
  if (isset($_POST['agregarCot'])) {
    $codigo = "zsds";
    $cliente = $_POST['cliente'];
    $asignado = $_SESSION['name'];
    $estado = $_POST['estado'];
    $pago = $_POST['pago'];
    $moneda = $_POST['moneda'];
    $entrega = $_POST['entrega'];
    $expira = $_POST['expira'];
    $direccion = $_POST['direccion'];
    $condicion = trim(mysqli_real_escape_string($conexion, $_POST['condicion']));
    $pie = trim(mysqli_real_escape_string($conexion, $_POST['pie']));
    $all_cot = mysqli_query($conexion, "select * from cotizacion");
    while ($row = mysqli_fetch_array($all_cot)) {

      $codRo = $row['cot_codigo'];
      $codRo2 = str_replace('COT-', '', $codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'COT-';
      $cot_cod = $ser . $codRo3;
    }

    $addServ = mysqli_query($conexion, "insert into cotizacion(cot_codigo,cot_cliente,cot_asignado,cot_estado,cot_pago,cot_moneda,cot_entrega,cot_expira,cot_direccion,cot_condicion,cot_pie) values('$cot_cod','$cliente','$asignado','$estado','$pago','$moneda','$entrega','$expira','$direccion','$condicion','$pie')");

    if ($addServ) {
      echo "<script>alert('agregado cotizacion correctamente')</script>";
      echo "<script>window.open('index.php?action=view_cotizacion','_self')</script>";
    } else {
      echo "<script>alert('No se agrego correctamente')</script>";
    }
  }
  ?>
  <script>
    function GetDetail(str) {
      if (str.length == 0) {
        document.getElementById("studentName").value = "";
        return;
      } else {
        var xm1hhtp = new XMLHttpRequest();
        xm1hhtp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById("studentName").value = myObj[0];
          }
        };
        xm1hhtp.open("GET", "js/searchjs/search.php?rollNo=" + str, true);
        xm1hhtp.send();
      }
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      var items = <?= json_encode($array) ?>

      $("#rollNo").autocomplete({
        source: items,
        select: function(event, item) {
          var params = {
            equipo: item.item.value
          };
          $.get("js/autocompletado/getCliente.php", params, function(response) {

          }); // ajax
        }
      });
    });
  </script>


<?php } ?>