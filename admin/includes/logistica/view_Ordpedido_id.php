<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> VER ORDEN DE PEDIDO POR ID</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=view_Ordpedido">Lista de Pedidos</a></li>
          <li class="breadcrumb-item active">OP ID</li>
          
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <?php
            $edit_cat = mysqli_query($conexion, "select * from opcotizacion_servicio where op_codigo='$_GET[op_codigo]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
          <form action="" method="POST">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> <span><?php echo $fetch_cat['op_codigo'];?></span></h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">CREADO: <b><?php echo $fetch_cat['op_creacion'];?></b></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">
                  <h5 class="colorText">CLIENTE: <b class="text-dark"><?php echo  $fetch_cat['op_cliente'];?></b></h5>
                  <h5 class="colorText">PROCESADO: <b class="text-dark"><?php echo $fetch_cat['op_fechaActual']; ?></b></h5>
                  
                  
                  
                  
                </div>
                <div class="col-4">
                <h5 class="colorText">ASIGNADO: <b class="text-dark"><?php echo $fetch_cat['op_asignado'];?></b></h5>
               <h5 class="colorText">ESTADO: <b class="text-dark"><?php echo $fetch_cat['op_estado'];?></b></h5>
               
               </div>
               <div class="col-4">
               <h5 class="colorText">TIEMPO DE ENTREGA: <b class="text-dark"><?php echo $fetch_cat['op_entrega'];?></b></h5>
               
               <h5 class="colorText">OT: <b class="text-dark"><?php echo $fetch_cat['op_ot'];?></b></h5>
               
              </div>
              <div class="col-11"> <br>
                <h5 class="colorText">DIRECCION: <b class="text-dark"><?php echo $fetch_cat['op_direccion'];?></b></h5>
              </div>
              </div><br>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr align="center">
                       
                        <th>ITEM</th>
                        <th>NOTA</th>
                        <th>CANTIDAD</th>
                        <th>OBSERVACIONES</th>
                      </tr>
                    </thead>
                    <tbody align="center">
                    <?php
                  
                  $edit_cats = mysqli_query($conexion, "select * from opcotizacion_servicio2 where op2_cod='$_GET[op_codigo]'");

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
            <hr>    
              <div class="row invoice-info">
                <div class="col-6">
                <h5 class="colorText">RESPONSABLE: <b class="text-dark"><?php echo $fetch_cat['op_responsable'];?></b></h5>
                
               
              
                <h5 class="colorText">OPERACIONES:  <b class="text-dark"><?php echo $fetch_cat['op_operativo'];?></b></h5>
                
                <h5 class="colorText">REQUIERE:  <b class="text-dark"><?php echo $fetch_cat['op_requiere'];?></b></h5>
                 </div>
                </div>
                <!-- <div class="col-6">
                  <input type="submit" value="PROCESAR A OP" name="procesarOP">
                </div> -->
              
              <div class="row d-print-none mt-2">
                <!-- <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Imprimir</a></div> -->
              </div>
            </section>
          </form>
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

      $addOP = mysqli_query($conexion,"insert into opcotizacion_servicio(op_codigo,op_ot,op_cot,op_cliente,op_asignado,op_entrega,op_estado,op_pago,op_direccion,op_creacion,op_moneda,op_fechaActual,op_responsable,op_operativo,op_requiere) values('$op_codigo','$_GET[otcod]','$op_cot','$op_cliente','$op_asignado','$op_entrega','$op_estado','$op_pago','$op_direccion','$op_creacion','$op_moneda','$op_fechaActual','$op_responsable','$op_operativo','$op_requiere')");
      if ($addOP){
        echo "<script>alert('Nuevo Orden de Pedido:$op_codigo fue agregado correctamente ')</script>";
        

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