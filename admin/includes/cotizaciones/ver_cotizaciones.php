<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i> COTIZACIONES</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Lista de Cotizaciones</li>
          
        </ul>
      </div>
      <div class="form-group">
      <form action="buscador_coti.php" method="get">
      <label>Buscar: </label>
      <input id="buscar_coti" type="text" name="buscador_coti" id="tag">
      <input type="submit" name="buscar_coti" class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;">
      </div>
      <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
        <div class="list-group" id="show-list">
          <!-- autocompletado aqui -->
        </div>
      </div>

    </form>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="post" enctype="multipart/form-data" >
              <div class="table-responsive">

                
              <table class="table table-hover table-bordered">
                  <thead align="center">
                    <tr>
                      
                      <th>CODIGO </th>
                      <th>CLIENTE</th>
                      <th>VENDEDOR</th>
                      <th>ESTADO</th>
                      <th>PAGO</th>
                      <th>FECHA DE CREACION</th>
                      <th>Agregar tabla</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                  $all_cot = mysqli_query($conexion,"select * from cotizacion order by cot_id ");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_cot)){
                    $nombreRo = $row['cot_cliente'];
                    $codRo = $row['cot_codigo'];
                    ?>
                    <tbody align="center">
                      <tr>
                        
                       <td  ><a href="index.php?action=view_cotizacion_id&cot_codigo=<?php echo $row['cot_codigo'];?>"style="color:#A04000 ;font-weight: bold;"><?php echo $row['cot_codigo']; ?></a></td>
                       <td><?php echo $row['cot_cliente']; ?></td>
                       <td><?php echo $row['cot_asignado']; ?></td>
                       <td><?php echo $row['cot_estado']; ?></td>
                       <td><?php echo $row['cot_pago']; ?></td>
                       <td><?php echo $row['cot_fecha']; ?></td>
                       <td ><a href="index.php?action=list_servicio&ruc=<?php echo $row['cot_codigo']; ?>" ><i class="fa fa-table fa-2x" aria-hidden="true"></i></a></td> 
                      <!-- <td><a href="lista_servicio.php?ruc=<?php echo $row['cot_codigo']; ?>" >Tabla</a></td>  -->
                           <td class="delete"><a href="index.php?action=edit_cotizacion&ruc=<?php echo $row['cot_codigo']; ?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>

                           <td class="delete"><a href="index.php?action=view_cotizacion&delete_cotizacion=<?php echo $row['cot_codigo']; ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  a este empleado?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>

                      </tr>

                    </tbody>
                    <?php $i++;} // End while loop ?>
                  </table>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>

      <a href="index.php?action=add_cotizacion" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Cotización</a> 

 </main>   
 

 
<!-- PHP CODIGO  --> 
<?php
if(isset($_GET['delete_cotizacion'])){
  $delete_serv = mysqli_query($conexion,"delete from cotizacion where cot_codigo='$_GET[delete_cotizacion]' ");
  $delete_serv = mysqli_query($conexion,"delete from cotizacion_servicio where cod_cot='$_GET[delete_cotizacion]' ");
  $delete_serv = mysqli_query($conexion,"delete from cotizacion_servicio2 where cod_cot2='$_GET[delete_cotizacion]' ");

  if($delete_serv){

  echo "<script>window.open('index.php?action=view_cotizacion','_self')</script>";


    }
  }
  ?>

<?php } ?>
<script type="text/javascript">
  $(document).ready(function () {
    // Send Search Text to the server
    $("#tag").keyup(function () {
      let searchText = $(this).val();
      if (searchText != "") {
        $.ajax({
          url: "js/autocompletado/searchCoti.php",
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

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

    