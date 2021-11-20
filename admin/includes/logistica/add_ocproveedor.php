<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else { ?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-file-text"></i> <i class="fa fa-plus"></i> AGREGAR OC PROVEEDOR</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item "><a href="index.php?action=view_cotizacion">Lista de 0C PROVEEDOR</a></li>
        <li class="breadcrumb-item active">Agregar oc</li>
      </ul>
    </div>
    <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <div class="row">
            <div class="col-lg-4 offset-lg-1">
              <form action="" method="POST" accept-charset="utf-8">
                <div class="form-group">
                  <label for="exampleInputEmail1">RUC PROVEEDOR:</label>
                  <input class="typeahead form-control" type="text" aria-describedby="emailHelp" placeholder="Ruc Proveedor" name="ocp_ruc" onkeyup="GetDetail(this.value)" id="rollNo">
                  
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">ESTADO:</label>
                  <select name="ocp_estado" id="">
                    <?php
                    $ocp_estados = mysqli_query($conexion, "select * from oc_proveedor_estado");
                    while ($row = mysqli_fetch_array($ocp_estados)) {
                      $nombre_estado = $row['ocp_nombre'];
                      echo "<option  value='$nombre_estado'>$nombre_estado</option>";
                    }

                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">RESPONSABLE:</label>
               
                  <input  type="text" name="ocp_responsable" id="tag">
                </div>
                <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
                  <div class="list-group" id="show-list">
                    <!-- autocompletado aqui -->
                  </div>
                </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">MONEDA:</label>
              <select name="ocp_moneda" id="">
                <?php
                $ocp_monedas = mysqli_query($conexion, "select * from cotizacion_moneda");
                while ($row2 = mysqli_fetch_array($ocp_monedas)) {
                  $ocp_mon_nombre = $row2['cotizacion_nombre'];
                  echo "<option value='$ocp_mon_nombre'>$ocp_mon_nombre</option>";
                }
                ?>
              </select>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">TIEMPO DE ENTREGA:</label>
              <select name="ocp_entrega" id="">
                <?php
                $ocp_entregas = mysqli_query($conexion, "select * from cotizacion_pago");
                while ($row3 = mysqli_fetch_array($ocp_entregas)) {
                  $ocp_ent_nombre = $row3['nombre_cotizacion'];
                  echo "<option value='$ocp_ent_nombre'>$ocp_ent_nombre</option>";
                }

                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">RAZON SOCIAL:</label>
              <input class="form-control" type="text" placeholder="Razon Social" id="codPersona" name="ocp_razon">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">CONTACTO:</label>
              <input class="form-control" type="text" placeholder="Contacto" id="codPersona2" name="ocp_contacto">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">DIRECCION:</label>
              <input class="form-control" type="text" placeholder="Direccion" id="codPersona3" name="ocp_direccion">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">COT PROVEEDOR:</label>
              <input class="form-control" type="text" placeholder="Cot Proveedor" name="ocp_cot_prov">
            </div>

            <div class="form-group">
              <input type="submit" value="AGREGAR" name="agregar_ocp">
            </div>

            </form>
          </div>

        </div>



  </main>
  <!-- PHP CODIGO  -->
  <?php
  if (isset($_POST['agregar_ocp'])) {
    $ocp_ruc = $_POST['ocp_ruc'];
    $ocp_estado = $_POST['ocp_estado'];
    $ocp_responsable = $_POST['ocp_responsable'];
    $ocp_moneda = $_POST['ocp_moneda'];
    $ocp_entrega = $_POST['ocp_entrega'];
    $ocp_razon = $_POST['ocp_razon'];
    $ocp_contacto = $_POST['ocp_contacto'];
    $ocp_direccion = $_POST['ocp_direccion'];
    $ocp_cot_prov = $_POST['ocp_cot_prov'];

    $all_cot = mysqli_query($conexion, "select * from oc_proveedor");
    while ($row = mysqli_fetch_array($all_cot)) {

      $codRo = $row['ocp_codigo'];
      $codRo2 = str_replace('OCP-', '', $codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'OCP-';
      $cot_cod = $ser . $codRo3;
    }

    $addServ = mysqli_query($conexion, "insert into oc_proveedor(ocp_codigo,ocp_ruc_prov,ocp_estado,ocp_responsable,ocp_moneda,ocp_entrega,ocp_razon_prov,ocp_contacto,ocp_direccion,oc_cot_prov) values ('$cot_cod','$ocp_ruc','$ocp_estado','$ocp_responsable','$ocp_moneda','$ocp_entrega','$ocp_razon','$ocp_contacto','$ocp_direccion','$ocp_cot_prov')");
    
    if ($addServ) {
      echo "<script>alert('agregado OC Proveedor $cot_cod exitosamente')</script>";
      echo "<script>window.open('index.php?action=view_ocproovedor','_self')</script>";
    } else {
      echo "<script>alert('No se agrego correctamente')</script>";
    }
  }
  ?>
  <script>

    // responsable
    $(document).ready(function() {
      // Send Search Text to the server
      $("#tag").keyup(function() {
        let searchText = $(this).val();
        if (searchText != "") {
          $.ajax({
            url: "js/autocompletado/searchResponsableOCP.php",
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
        $('.typeahead').typeahead({
            hint: true,
            highlight: true
        },{
            name: 'datos',
            limit: 2,
            source: function(query, sync, async) {
                $.getJSON('js/autosearch/consulta.php', {query},
                    function(data) {
                        async(data);
                    }
                );
            },
            display: function(item) {
                return item.ruc_proovedor;
            }
        });

        $('.typeahead').on('typeahead:selected', function(e, dato) {
            $('#codPersona').val(dato.razon_proovedor);
            $('#codPersona2').val(dato.contacto_proovedor);
            $('#codPersona3').val(dato.direccion_proovedor);
        })
    </script>


<?php } ?>