<?php include('cabeza.php'); ?>
<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>


<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i> REGISTRO DE SALIDA</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active"><a href="index.php?action=view_cotizacion">Lista de Cotizaciones</a></li>
          
        </ul>
      </div>
     <form action="buscador_stock.php" method="get">
      <label>NOMBRE/ITEM: </label>
      <input id="buscar_coti" type="text" name="buscador_stock" >
      <input type="submit" name="buscar_stock" class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;">
    </form>
    <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
     <div class="list-group" id="show-list">
                    <!-- autocompletado aqui -->
    </div>
    </div><br>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="post" enctype="multipart/form-data" >
              <div class="table-responsive">

                
              <table class="table table-hover table-bordered">
                  <thead align="center">
                    <tr>  
                        <th>CODIGO ALM</th>
                        <th>NOMBRE/ITEM</th>
                        <th>FABRICANTE</th>
                        <th>MODELO</th>
                        <th>CATEGORIA</th>
                        <th>LOTE</th>
                        <th>UNIDADES</th>
                        <th>EDITAR</th>
                    </tr>
                  </thead>
                  <?php 
                  if (isset($_GET['buscar_stock'])) {

                    $search_query = $_GET['buscador_stock'];
                    $i = 1;

                    $run_query_by_pro_ids = mysqli_query($conexion, "select * from ingresos_salida where nombre_salida like '$search_query' ");

                    if ($run_query_by_pro_ids) {

                        while ($row_pro = $run_query_by_pro_ids->fetch_array()) {

                            $pro_id = $row_pro['id_salida'];
                            $pro_cod = $row_pro['codigo_salida'];
                            $pro_nombre= $row_pro['nombre_salida'];
                            $pro_fabricante = $row_pro['fabricante_salida'];
                            $pro_modelo  = $row_pro['modelo_salida'];
                            $pro_categoria = $row_pro['categoria_salida'];
                            $pro_lote = $row_pro['lote_salida'];
                            $pro_unidades = $row_pro['unidades_salida'];
                         


                            echo "
                                <tr align='center'>
                                       
                                        <td>$pro_cod</td>
                                        <td>$pro_nombre</td>
                                        <td>$pro_fabricante</td>
                                        <td>$pro_modelo</td>
                                        <td>$pro_categoria</td>
                                        <td>$pro_lote</td>
                                        <td>$pro_unidades</td>
                                        <td class='delete'><a href='index.php?action=edit_stock&stock_cod=$pro_cod'><i class='fa fa-pencil fa-2x' aria-hidden='true'></i></a></td>
                                        ";
                        }
                    }else{
                       echo "<td><h1>No se encontro</h1>";
                    }


                ?>

                    </tbody>
                    <?php $i++;} // End while loop ?>
                  </table>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>

 </main>   

 
<!-- PHP CODIGO  --> 
<?php
if(isset($_GET['delete_cotizacion'])){
  $delete_serv = mysqli_query($conexion,"delete from cotizacion where cot_id='$_GET[delete_cotizacion]' ");

  if($delete_serv){

  echo "<script>window.open('index.php?action=view_cotizacion','_self')</script>";


    }
  }
  ?>

<?php } ?>
<script>
// Search pe XD :D
    $(document).ready(function() {
      // Send Search Text to the server
      $("#buscar_coti").keyup(function() {
        let searchText = $(this).val();
        if (searchText != "") {
          $.ajax({
            url: "js/autocompletado/getStock.php",
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
        $("#buscar_coti").val($(this).text());
        $("#show-list").html("");
      });
    });

  </script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $('#sampleTable').DataTable();
</script>
    
    
<?php include('pie.php'); ?>
    