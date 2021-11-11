<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> EDITAR ORDEN DE TRABAJO</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=ordenes_trabajo">Lista de Ordenes</a></li>
          <li class="breadcrumb-item active">Orden ID</li>
          
        </ul>
      </div>
      <?php
            $edit_cat = mysqli_query($conexion, "select * from otcotizacion_servicio where ot_codigo='$_GET[otcod]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
      <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <div class="row">
            <div class="col-lg-4 offset-lg-1">
              <form action="" method="POST" accept-charset="utf-8">
                <h3 style="color:#dc3545; "><b><?php echo $fetch_cat['ot_codigo'];?></b></h3>

                <div class="form-group">
                  <label for="exampleInputEmail1">CLIENTE:</label>
                  <input class="form-control" type="text" disabled value="<?php echo  $fetch_cat['ot_cliente'];?>" size="30" required>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">ASIGNADO:</label>
                <input type="text" class="form-control" value="<?php echo $fetch_cat['ot_asignado'];?>" disabled>

              </div>
               <div class="form-group">
                <label for="exampleInputEmail1">DIRECCIÓN:</label>
                <input class="form-control" type="text" value="<?php echo $fetch_cat['ot_direccion'];?>" size="30" disabled>
              </div>
               <div class="form-group">
                <label for="exampleInputEmail1">PROCESADO:</label>
                <input class="form-control" type="text" value="<?php echo $fetch_cat['ot_fechaEdit']; ?>" size="30" disabled>
              </div>
            </div>
            <div class="col-lg-4 offset-lg-1"><br><br>
             <div class="form-group">
                  <label for="exampleInputEmail1">ESTADO:</label><br>
                  <input type="text" class="form-control" value="<?php echo $fetch_cat['ot_estado'];?>" disabled>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">TIEMPO DE ENTREGA:</label>
                <input type="text" class="form-control" value="<?php echo $fetch_cat['ot_entrega'];?>" disabled>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">CREADO:</label>
                  <input type="text" class="form-control" value="<?php echo $fetch_cat['ot_fecha'];?>" disabled>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">COT:</label>
                  <input type="text" class="form-control" value="<?php echo $fetch_cat['ot_cot'];?>" disabled>
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
              <div class="row" >
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
                    <tbody align="center">
                    <?php
                  
                  $edit_cats = mysqli_query($conexion, "select * from otcotizacion_servicio2 where ot2_cod='$_GET[otcod]'");

                  while ($rows = mysqli_fetch_array($edit_cats)) {

                    ?>
                      <tr>
                      
                        <td><?php echo $rows['ot2_nombre'];?></td>
                        <td><?php echo $rows['ot2_nota'];?></td>
                        <td><?php echo $rows['ot2_cantidad'];?></td>
                        <td><?php echo $rows['ot2_observaciones'];?></td>
                    
                        
                      </tr>
                
                      <?php }?>
                    </tbody>
                
                  </table>
                  <?php 
                  
                  //$edit_cat3 = mysqli_query($conexion, "select * from cotizacion_servicio2 where cantidad_cot2='$cantidad' and cod_cot2='$_GET[cot_codigo] '");
                     //   $row3 =mysqli_fetch_array($edit_cat3) ?>
                      
                            
                </div>
              </div>
             <div class="col-lg-4 offset-lg-1">
              <div class="form-group">
                <label for="exampleInputEmail1">RESPONSABLE:</label>
                <input class="form-control rounded " id="tag" name="op_responsable"value="<?php echo $fetch_cat['ot_tecnico'];?>" >

              </div>
              <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
                <div class="list-group" id="show-list">
                  <!-- autocompletado aqui -->
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">OPERACIONES:</label><br>
                <input class="form-control" cols="65" rows="5" value="<?php echo $fetch_cat['ot_operativo'];?>" disabled></input>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">REQUIERE:</label>
                <input class="form-control" cols="65" rows="5" value="<?php echo $fetch_cat['ot_requiere'];?>" disabled></input>
              </div>
            </div>
             <div class="tile-footer">
                  <button class="btn btn-primary"name="procesarOP" type="submit">PROCESAR A OP <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </div></div>
          </form>
            </div>

          </div>

        </div>
      </div>
    </div>
    </main>

    <?php
    if(isset($_POST['procesarOP'])){
       
        $op_cot =  $fetch_cat['ot_cot'];
        $op_cliente = $fetch_cat['ot_cliente'];
        $op_asignado = $fetch_cat['ot_asignado'];
        $op_entrega = $fetch_cat['ot_entrega'];
        $op_estado = $fetch_cat['ot_estado'];
        $op_pago = $fetch_cat['ot_pago'];
        $op_direccion = $fetch_cat['ot_direccion'];
        $op_creacion = $fetch_cat['ot_fecha'];
        $op_moneda = $fetch_cat['ot_moneda'];
        $op_fechaActual = $fetch_cat['ot_fechaEdit'];
        $op_responsable = $_POST['op_responsable'];
        $op_operativo = $fetch_cat['ot_operativo'];
        $op_requiere = $fetch_cat['ot_requiere'];


        

        //codigo
        $all_cot = mysqli_query($conexion, "select * from opcotizacion_servicio");
        while ($row4 = mysqli_fetch_array($all_cot)) {

          $codRo = $row4['op_codigo'];
          $codRo2 = str_replace('OP-', '', $codRo);
          $codRo3 = (int)$codRo2 + 1;
          $ser = 'OP-';
          $op_codigo = $ser . $codRo3;
        }

        $product_id = $_GET['otcod'];
        $fetch_pro = mysqli_query($conexion, "select * from otcotizacion_servicio2 where ot2_cod='$product_id'");
        while ($fetch_pro2 = mysqli_fetch_array($fetch_pro)) {

          //tabla	
          $nombre_serviciOT = $fetch_pro2['ot2_nombre'];
          $nota_servicioOT = $fetch_pro2['ot2_nota'];
          $cantidad_servicioOT = $fetch_pro2['ot2_cantidad'];
          $observaciones_servicioOT = $fetch_pro2['ot2_observaciones'];

          $edit_cotOT2 = mysqli_query($conexion, "insert into opcotizacion_servicio2(op2_cod,op2_cot,op2_nombre,op2_nota,op2_cantidad,op2_observaciones) values ('$op_codigo','$op_cot','$nombre_serviciOT','$nota_servicioOT','$cantidad_servicioOT','$observaciones_servicioOT')");
        
      
        }

      $addOP = mysqli_query($conexion,"insert into opcotizacion_servicio(op_codigo,op_ot,op_cot,op_cliente,op_asignado,op_entrega,op_estado,op_pago,op_direccion,op_creacion,op_moneda,op_responsable,op_operativo,op_requiere) values('$op_codigo','$_GET[otcod]','$op_cot','$op_cliente','$op_asignado','$op_entrega','$op_estado','$op_pago','$op_direccion','$op_creacion','$op_moneda','$op_responsable','$op_operativo','$op_requiere')");
      if ($addOP){
        echo "<script>alert('Nuevo Orden de Pedido:$op_codigo fue agregado correctamente ')</script>";
        echo "<script>window.open('index.php?action=ordenes_trabajo','_self')</script>";

      }else{
        echo "<script>alert('No se subió correctamente')</script>";
      }

        
    }

?>
                 <!--   BUSCAR RESPONSABLE -->
    <script type="text/javascript">
    $(document).ready(function() {
      // Send Search Text to the server
      $("#tag").keyup(function() {
        let searchText = $(this).val();
        if (searchText != "") {
          $.ajax({
            url: "js/autocompletado/searchResponsable.php",
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

<?php } ?>