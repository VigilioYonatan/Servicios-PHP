<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> VER OT</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=view_cotizacion">OT</a></li>
          <li class="breadcrumb-item active">OT ID</li>
          
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <?php
            $edit_cat = mysqli_query($conexion, "select * from otcotizacion_servicio where ot_codigo='$_GET[otcod]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Outsourcing</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Fecha: <b><?php echo $fetch_cat['ot_fechaEdit']; ?></b></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">
                  <h4 style="color:#dc3545;">Codigo: <b class="text-dark"><?php echo $fetch_cat['ot_codigo'];?></b></h4>
                  <h5 class="colorText">Cliente: <span class="text-dark"><?php echo  $fetch_cat['ot_cliente'];?></span></h5>
                  <h5 class="colorText">Tipo de Estado: <b><?php echo $fetch_cat['ot_estado'];?></b></h6>
                </div>
                <div class="col-4">
                <h5 class="colorText">Asignado: <b class="text-dark"><?php echo $fetch_cat['ot_asignado'];?></b></h5>
                <h5 class="colorText">Tipo de Pago: <b class="text-dark"><?php echo $fetch_cat['ot_pago'];?></b></h5>
                <h5 class="colorText">Tipo de Moneda: <b class="text-dark"><?php echo $fetch_cat['ot_moneda'];?></b></h5>
               </div>
               <div class="col-4">
               <h5 class="colorText">Entrega: <b class="text-dark"><?php echo $fetch_cat['ot_entrega'];?></b></h5>
               <h5 class="colorText">Expira: <b class="text-dark"><?php echo $fetch_cat['ot_expira'];?></b></h5>
               <h5 class="colorText">Dirección: <b class="text-dark"><?php echo $fetch_cat['ot_direccion'];?></b></h5>
              </div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                       
                        <th>Item</th>
                        <th>Nota</th>
                        <th>Cantidad</th>
                        <th>Observaciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
               
                        <td><?php echo $fetch_cat['ot_servicio'];?></td>
                        <td><?php echo $fetch_cat['ot_nota'];?></td>
                        <td><?php echo $fetch_cat['ot_cantidad'];?></td>
                        <td><?php echo $fetch_cat['ot_observaciones'];?></td>
                    
                        
                      </tr>
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
                <h5 class="colorText">Tecnico:<b class="text-dark"><?php echo $fetch_cat['ot_tecnico'];?></b></h5>
                <h5 class="colorText">Operativo:<b class="text-dark"><?php echo $fetch_cat['ot_operativo'];?></b></h5>
                <h5 class="colorText">Requiere:<b class="text-dark"><?php echo $fetch_cat['ot_requiere'];?></b></h5>
                </div>
                
              
              <div class="row d-print-none mt-2">
                <!-- <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Imprimir</a></div> -->
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

<?php } ?>