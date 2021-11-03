<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> VER COTIZACIÓN</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=view_cotizacion">Cotizaciones</a></li>
          <li class="breadcrumb-item active">Cotizacion ID</li>
          
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <?php
            $edit_cat = mysqli_query($conexion, "select * from cotizacion where cot_codigo='$_GET[cot_codigo]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Outsourcing</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right colorText">Date: <b class="text-dark"><?php echo $fetch_cat['cot_fecha']; ?></b></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">
                  <h4 style="color:#dc3545;">Codigo: <b class="text-dark"><?php echo $fetch_cat['cot_codigo'];?></b></h4>
                  <h5 class="colorText">Cliente: <b class="text-dark"><?php echo $fetch_cat['cot_cliente'];?></b></h5>
                  <h6 class="colorText">Tipo de Estado: <b class="text-dark"><?php echo $fetch_cat['cot_estado'];?></b></h6>
                </div>
                <div class="col-4">
                 <h5 class="colorText">Asignado: <b class="text-dark"><?php echo $fetch_cat['cot_asignado'];?></b></h5>
                 <h6 class="colorText">Tipo de Pago: <b class="text-dark"><?php echo $fetch_cat['cot_pago'];?></b></h6>
                 <h6 class="colorText">Tipo de Moneda: <b class="text-dark"><?php echo $fetch_cat['cot_moneda'];?></b></h6>
               </div>
               <div class="col-4">
                <h6 class="colorText">Entrega: <b class="text-dark"><?php echo $fetch_cat['cot_entrega'];?></b></h6>
                <h6 class="colorText">Expira: <b class="text-dark"><?php echo $fetch_cat['cot_expira'];?></b></h6>
              </div>
              </div>
              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Servicio</th>
                        <th>Nota</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Precio Neto</th>
                      </tr>
                    </thead>
                    <?php 
                    $i = 1;
                      $edit_cat2 = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$_GET[cot_codigo]'");
                      
                      while($row = mysqli_fetch_array($edit_cat2)){
                        $cantidad =$row['cantidad_cot'];
                        $edit_cat3 = mysqli_query($conexion, "select * from cotizacion_servicio2 where cantidad_cot2='$cantidad' and cod_cot2='$_GET[cot_codigo] '");
                        $row2 = mysqli_fetch_array($edit_cat3);
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['nombre_cot']; ?></td>
                        <td><?php echo $row2['nota_cot2']; ?></td>
                        <td><?php echo $row['cantidad_cot']; ?></td>
                        <td><?php echo $row['precio_cot']; ?></td>
                        <td><?php echo $row2['total_cot2']; ?></td>
                        <td><?php echo $row2['total_cot2']; ?></td>
                        
                      </tr>
                    </tbody>
                        <?php  $i++; } ?>
                  </table>
                  <?php 
                  
                  //$edit_cat3 = mysqli_query($conexion, "select * from cotizacion_servicio2 where cantidad_cot2='$cantidad' and cod_cot2='$_GET[cot_codigo] '");
                     //   $row3 =mysqli_fetch_array($edit_cat3) ?>
                     <?php 
                     $edit_cat2 = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$_GET[cot_codigo]'");
                      
                     $row = mysqli_fetch_array($edit_cat2);
                       $cantidad =$row['cantidad_cot'];
                     $edit_cat31 = mysqli_query($conexion, "select * from cotizacion_servicio2 where cantidad_cot2='$cantidad' and cod_cot2='$_GET[cot_codigo] '");
                        $row6 = mysqli_fetch_array($edit_cat31); ?>
                        <label class="text-right colorText">Subtotal: <b class="text-dark"><?php echo $row2['subtotal_cot2']; ?></b></label><br>
                        <label class="text-right colorText">IGV: <b class="text-dark"><?php echo $row2['IGV_cot2']; ?></b></label><br>
                        <label class="text-right colorText">TOTAL: <b class="text-dark"><?php echo $row2['totalall_cot2']; ?></b></label>
               
                </div>
              </div>
                        <hr>
              <div class="row invoice-info">
                <div class="col-6">
                  <h5 class="colorText">Dirección: <b <?php echo $fetch_cat['cot_direccion'];?>></b></h5>
                </div>
                <div class="col-11">
                  <h5 class="colorText">Condiciones: <br></h5>
                   <h6><?php echo $fetch_cat['cot_condicion'];?></h6>
                </div>
                <div class="col-8">
                  <h6 class="colorText"><b class="text-dark"><?php echo $fetch_cat['cot_pie'];?></b</h6>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Imprimir</a></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

<?php } ?>