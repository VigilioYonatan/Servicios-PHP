<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else { ?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-users"></i> <i class="fa fa-plus"></i> REGISTRAR O.C CLIENTE</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item "><a href="index.php?action=lista_ocCliente">Lista de O.C. Clientes</a></li>
        <li class="breadcrumb-item active">Registrar O.C</li>
      </ul>
    </div>
    <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <div class="row">
            <div class="col-lg-4 offset-lg-1">
              <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">RUC:</label>
                <input class="form-control rounded " name="oc_ruc"  onkeyup="GetDetail(this.value)" id="rollNo" placeholder="RUC" required>

              </div>
              <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
                <div class="list-group" id="show-listRuc">
                  <!-- autocompletado aqui -->
                </div>
              </div>
              
               
                <div class="form-group">
                  <label for="exampleInputEmail1">DESCRIPCION:</label><br>
                 <textarea  class="form-control rounded " name="oc_descripcion" id="" placeholder="Descripcion" cols="50" rows="4"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">ADJUNTAR ARCHIVO:</label><br>
                    <input  type="file" accept="application/pdf" name="oc_archivo" required>
                </div>



            </div>

            <div class="col-lg-4 offset-lg-1">

              <div class="form-group">
                <label for="exampleInputEmail1">RAZON SOCIAL:</label>
               <input class="form-control rounded " type="text" name="oc_razon" id="studentName" placeholder="Razon social">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">COTIZACION:</label>
                <input class="form-control rounded " name="oc_cotizacion" id="tagCoti" placeholder="COT-XXX" required>

              </div>
              <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
                <div class="list-group" id="show-list">
                  <!-- autocompletado aqui -->
                </div>
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">TIEMPO DE ENTREGA:</label>
                <select class="form-control" name="oc_entrega" id="entrega" required>
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

              
              
              <div class="tile-footer">
                <button class="btn btn-primary" name="agregarOC" type="submit">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
              </div>
              </form>
            </div>

          </div>



  </main>
  <!-- PHP CODIGO  -->
  <?php
  if (isset($_POST['agregarOC'])) {
    
    $oc_ruc = $_POST['oc_ruc'];
    $oc_razon = $_POST['oc_razon'];
   
    $oc_descripcion = trim(mysqli_real_escape_string($conexion,$_POST['oc_descripcion']));
    $oc_cotizacion = $_POST['oc_cotizacion'];
    $oc_entrega = $_POST['oc_entrega'];
   
    $all_cot = mysqli_query($conexion, "select * from oc_cliente");
    while ($row = mysqli_fetch_array($all_cot)) {

      $codRo = $row['oc_codigo'];
      $codRo2 = str_replace('OCC-', '', $codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'OCC-';
      $oc_cod = $ser . $codRo3;
    }
    if (!empty($_FILES['oc_archivo']['name'])) {

        $oc_archivo = $_FILES['oc_archivo']['name'];
        $oc_archivo_tmp = $_FILES['oc_archivo']['tmp_name'];
        $target_file = "archivosOC/". $oc_archivo;
        $message = '';
    
    
        // if del peso de archivo.
        if ($_FILES["oc_archivo"]["size"] < 8098888) {
    
          // Check if file already exists
             move_uploaded_file($oc_archivo_tmp,$target_file);
    
             $addServ = mysqli_query($conexion, "insert into oc_cliente(oc_codigo,oc_ruc,oc_razon,oc_descripcion,oc_cotizacion,oc_archivo,oc_tiempo) values('$oc_cod','$oc_ruc','$oc_razon','$oc_descripcion','$oc_cotizacion','$oc_archivo','$oc_entrega')");

             if ($addServ) {
               echo "<script>alert('agregado O.C CLiente cotizacion correctamente')</script>";
               echo "<script>window.open('index.php?action=lista_ocCliente','_self')</script>";
             } else {
               echo "<script>alert('No se agrego correctamente')</script>";
             }
        } else {
            echo "<script>alert('Llegaste el maximo de peso MAX 8MB')</script>";
        }
    
    }
  }
  ?>
  <!-- sacar ruc cliente -->
<script type="text/javascript">
  // $(document).ready(function () {
  //   // Send Search Text to the server
  //   $("#rollNo").keyup(function () {
  //     let searchTextRUC = $(this).val();
  //     if (searchTextRUC != "") {
  //       $.ajax({
  //         url: "js/autocompletado/searchRuc.php",
  //         method: "post",
  //         data: {
  //           query: searchTextRUC,
  //         },
  //         success: function (response) {
  //           $("#show-listRuc").html(response);
  //         },
  //       });
  //     } else {
  //       $("#show-listRuc").html("");
  //     }
  //   });
  //   // Set searsched text in input field on click of search button
  //   $(document).on("click", "a", function () {
  //     $("#rollNo").val($(this).text());
  //     $("#show-listRuc").html("");
  //   });
  // });
// </script>

  <!-- JAVASCRIPT RUC-RAZON -->
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
  $(document).ready(function () {
    // Send Search Text to the server
    $("#tagCoti").keyup(function () {
      let searchText = $(this).val();
      if (searchText != "") {
        $.ajax({
          url: "js/autocompletado/searchCotizacion.php",
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
      $("#tagCoti").val($(this).text());
      $("#show-list").html("");
    });
  });
</script>


 

<?php } ?>