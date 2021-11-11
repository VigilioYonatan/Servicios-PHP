<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php
$edit_cat = mysqli_query($conexion, "select * from oc_cliente where oc_codigo='$_GET[codOC]'");

$fetch_cat = mysqli_fetch_array($edit_cat);

?>

<?php if ($_SESSION['role'] != 14 and $_SESSION['role'] != 5) {
  echo "<script>alert('No sos de servicios')</script>";
  echo "<script>window.open('index.php','_self')</script>";
} else {
?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> EDITAR O.C CLIENTE </h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"><a href="index.php?action=lista_ocCliente">Lista de O.C.Clientes</a></li>
        <li class="breadcrumb-item active">Editar O.C.</li>

      </ul>
    </div>
    <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <div class="row">
            <div class="col-lg-4 offset-lg-1">
              <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                <br>

                <h3 style="color:#dc3545; "><b><?php echo $fetch_cat['oc_codigo']; ?></b></h3>
                <div class="form-group">
                  <label for="exampleInputEmail1">RUC:</label>
                  <input type="text" class="form-control" name="oc_ruc" onkeyup="GetDetail(this.value)" value="<?php echo $fetch_cat['oc_ruc']; ?>">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">DESCRIPCION:</label>
                  <textarea class="form-control" name="oc_descrip" id="" cols="40" rows="5" required><?php echo $fetch_cat['oc_descripcion']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">ARCHIVO: <b><?php echo $fetch_cat['oc_archivo']; ?></b></label><br>
                  <input type="file" name="oc_archivoxd" accept="application/pdf,.doc,.docx">
                </div>

                <div class="tile-footer">

                </div>
            </div>

            <div class="col-lg-4 offset-lg-1"><br><br>
              <div class="form-group">
                <label for="exampleInputEmail1">RAZON SOCIAL:</label>
                <input class="form-control" name="oc_razon" id="studentName" type="text" value="<?php echo $fetch_cat['oc_razon']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">COTIZACION:</label>
                <input class="form-control" id="tagCoti" type="text" name="oc_cotizacion" value="<?php echo $fetch_cat['oc_cotizacion']; ?>" size="30" required>
              </div>
              <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
                <div class="list-group" id="show-list">
                  <!-- autocompletado aqui -->
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">TIEMPO DE ENTREGA:</label>


                <select class="form-control" name="oc_tiempo" id="moneda">
                  <option value="<?php echo $fetch_cat['oc_tiempo']; ?>"><?php echo $fetch_cat['oc_tiempo']; ?></option>
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

              <div class="tile-footer">
                <button class="btn btn-primary" name="edit_oc" type="submit">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
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

  if (isset($_POST['edit_oc'])) {
    $oc_ruc = $_POST['oc_ruc'];
    $oc_razon = $_POST['oc_razon'];
    $oc_descrip = mysqli_real_escape_string($conexion, $_POST['oc_descrip']);
    $oc_cotizacion = $_POST['oc_cotizacion'];
    $oc_tiempo = $_POST['oc_tiempo'];

    $oc_archivo = $_FILES['oc_archivoxd']['name'];
    $oc_archivo_tmp = $_FILES['oc_archivoxd']['tmp_name'];

    if ($oc_archivo_tmp != "") {
      move_uploaded_file($oc_archivo_tmp, "archivosOC/$oc_archivo");
      $edit_oc = "update oc_cliente set oc_ruc='$oc_ruc', oc_razon='$oc_razon', oc_descripcion='$oc_descrip', oc_cotizacion='$oc_cotizacion', oc_archivo='$oc_archivo', oc_tiempo='$oc_tiempo'  where oc_codigo='$_GET[codOC]'";
    } else {
      $edit_oc = "update oc_cliente set oc_ruc='$oc_ruc', oc_razon='$oc_razon', oc_descripcion='$oc_descrip', oc_cotizacion='$oc_cotizacion', oc_tiempo='$oc_tiempo'  where oc_codigo='$_GET[codOC]'";
    }
    $run_oc = mysqli_query($conexion, $edit_oc);

    if ($run_oc) {

      echo "<script>alert('El O.C CLIENTE:$fetch_cat[oc_codigo] se edito correctamente')</script>";
      echo "<script>window.open('index.php?action=lista_ocCliente','_self')</script>";
    } else {
      echo "<script>alert('Empleado  no actualizado correctamente!')</script>";
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
        xm1hhtp.open("GET", "js/searchjs/searchOc.php?rollNo=" + str, true);
        xm1hhtp.send();
      }
    }
  </script>
  <!-- sacar id cotizacion -->
  <script type="text/javascript">
    $(document).ready(function() {
      // Send Search Text to the server
      $("#tagCoti").keyup(function() {
        let searchText = $(this).val();
        if (searchText != "") {
          $.ajax({
            url: "js/autocompletado/searchCotizacion.php",
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
        $("#tagCoti").val($(this).text());
        $("#show-list").html("");
      });
    });
  </script>
<?php } ?>