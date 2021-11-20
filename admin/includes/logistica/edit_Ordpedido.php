<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> EDITAR ORDEN DE PEDIDO</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=ordenes_trabajo">Lista de 0P</a></li>
          <li class="breadcrumb-item active">Orden PEDIDO</li>
          
        </ul>
      </div>
      <?php
            $edit_cat = mysqli_query($conexion, "select * from opcotizacion_servicio where op_codigo='$_GET[op_cod]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
      <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <div class="row">
            <div class="col-lg-4 offset-lg-1">
              <form action="" method="POST" accept-charset="utf-8">
                <h3 style="color:#dc3545; "><b><?php echo $fetch_cat['op_codigo'];?></b></h3>

                <div class="form-group">
                  <label for="exampleInputEmail1">CLIENTE:</label>
                  <input class="form-control" type="text" disabled value="<?php echo  $fetch_cat['op_cliente'];?>" size="30" required>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">VENDEDOR:</label>
                <input type="text" class="form-control" value="<?php echo $fetch_cat['op_asignado'];?>" disabled>

              </div>
               <div class="form-group">
                <label for="exampleInputEmail1">DIRECCIÓN:</label>
                <input class="form-control" type="text" value="<?php echo $fetch_cat['op_direccion'];?>" size="30" disabled>
              </div>
               <div class="form-group">
                <label for="exampleInputEmail1">PROCESADO:</label>
                <input class="form-control" type="text" value="<?php echo $fetch_cat['op_fechaActual']; ?>" size="30" disabled>
              </div>
            </div>
            <div class="col-lg-4 offset-lg-1"><br><br>
             <div class="form-group">
                  <label for="exampleInputEmail1">ESTADO:</label><br>
                  <input type="text" class="form-control" value="<?php echo $fetch_cat['op_estado'];?>" disabled>
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">TIEMPO DE ENTREGA:</label>
                <input type="text" class="form-control" value="<?php echo $fetch_cat['op_entrega'];?>" disabled>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">CREADO:</label>
                  <input type="text" class="form-control" value="<?php echo $fetch_cat['op_creacion'];?>" disabled>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">OT:</label>
                  <input type="text" class="form-control" value="<?php echo $fetch_cat['op_ot'];?>" disabled>
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
                  
                  $edit_cats = mysqli_query($conexion, "select * from opcotizacion_servicio2 where op2_cod='$_GET[op_cod]'");

                  while ($rows = mysqli_fetch_array($edit_cats)) {

                    ?>
                      <tr>
                      
                        <td><?php echo $rows['op2_nombre'];?></td>
                        <td><?php echo $rows['op2_nota'];?></td>
                        <td><?php echo $rows['op2_cantidad'];?></td>
                        <td><?php echo $rows['op2_observaciones'];?></td>
                    
                        
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
                <input class="form-control rounded " id="tag" name="op_responsable"value="<?php echo $fetch_cat['op_responsable'];?>" >

              </div>
              <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
                <div class="list-group" id="show-list">
                  <!-- autocompletado aqui -->
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">OPERACIONES:</label><br>
                <input class="form-control" cols="65" rows="5" value="<?php echo $fetch_cat['op_operativo'];?>" disabled></input>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">REQUIERE:</label>
                <input class="form-control" cols="65" rows="5" value="<?php echo $fetch_cat['op_requiere'];?>" disabled></input>
              </div>
            </div>
             <div class="tile-footer">
                  <button class="btn btn-primary"name="procesarCompras" type="submit">PROCESAR A COMPRAS <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </div></div>
          </form>
            </div>

          </div>

        </div>
      </div>
    </div>
    </main>
    <?php
    if(isset($_POST['procesarCompras'])){
       
        $compra_op =  $fetch_cat['op_codigo'];
        $compra_ot =  $fetch_cat['op_ot'];
        $compra_cot =  $fetch_cat['op_cot'];
        $compra_cliente = $fetch_cat['op_cliente'];
        $compra_asignado = $fetch_cat['op_asignado'];
        $compra_entrega = $fetch_cat['op_entrega'];
        $compra_estado = $fetch_cat['op_estado'];
        $compra_pago = $fetch_cat['op_pago'];
        $compra_direccion = $fetch_cat['op_direccion'];
        $compra_creacion = $fetch_cat['op_creacion'];
        $compra_moneda = $fetch_cat['op_moneda'];
        $compra_fechaActual = $fetch_cat['op_fechaActual'];
        $compra_responsable = $_POST['op_responsable'];
        $compra_operativo = $fetch_cat['op_operativo'];
        $compra_requiere = $fetch_cat['op_requiere'];


        

       

        $product_id = $_GET['op_cod'];
        $fetch_pro = mysqli_query($conexion, "select * from opcotizacion_servicio2 where op2_cod='$product_id'");
        while ($fetch_pro2 = mysqli_fetch_array($fetch_pro)) {

          //tabla	
          $compra_item = $fetch_pro2['op2_nombre'];
          $compra_nota = $fetch_pro2['op2_nota'];
          $compra_cantidad = $fetch_pro2['op2_cantidad'];
          $compra_observaciones = $fetch_pro2['op2_observaciones'];

          $edit_cotOT2 = mysqli_query($conexion, "insert into compra_servicio(compra_op,compra_ot,compra_cot,compra_cliente,compra_asignado,compra_entrega,compra_estado,compra_pago,compra_direccion,compra_creacion,compra_moneda,compra_fechaActual,compra_responsable,compra_operativo,compra_requiere,compra_item,compra_nota,compra_cantidad,compra_observaciones) values ('$compra_op','$compra_ot','$compra_cot','$compra_cliente','$compra_asignado','$compra_entrega','$compra_estado','$compra_pago','$compra_direccion','$compra_creacion','$compra_moneda','$compra_fechaActual','$compra_responsable','$compra_operativo','$compra_requiere','$compra_item','$compra_nota','$compra_cantidad','$compra_observaciones')");
          if($edit_cotOT2){
            echo "<script>alert('Agregado correctamente a compras')</script>";
            echo "<script>window.open('index.php?action=view_Ordpedido','_self')</script>";
          }
      
        }

      // $addOP = mysqli_query($conexion,"insert into opcotizacion_servicio(op_codigo,op_ot,op_cot,op_cliente,op_asignado,op_entrega,op_estado,op_pago,op_direccion,op_creacion,op_moneda,op_responsable,op_operativo,op_requiere) values('$op_codigo','$_GET[otcod]','$op_cot','$op_cliente','$op_asignado','$op_entrega','$op_estado','$op_pago','$op_direccion','$op_creacion','$op_moneda','$op_responsable','$op_operativo','$op_requiere')");
      // if ($addOP){
      //   echo "<script>alert('Nuevo Orden de Pedido:$op_codigo fue agregado correctamente ')</script>";
      //   echo "<script>window.open('index.php?action=ordenes_trabajo','_self')</script>";

      // }else{
      //   echo "<script>alert('No se subió correctamente')</script>";
      // }

        
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