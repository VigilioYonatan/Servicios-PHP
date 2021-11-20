<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> VER OC PROVEEDOR</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=view_cotizacion">OC PROVEEDORES</a></li>
          <li class="breadcrumb-item active">OC PROVEEDOR ID</li>
          
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <?php
            $edit_cat = mysqli_query($conexion, "select * from oc_proveedor where ocp_codigo='$_GET[ocp_codigo]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Outsourcing</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right colorText">Date: <b class="text-dark"><?php echo $fetch_cat['ocp_creacion']; ?></b></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">
                  <h4 style="color:#dc3545;">Codigo: <b class="text-dark"><?php echo $fetch_cat['ocp_codigo'];?></b></h4>
                  <h5 class="colorText">Ruc Proveedor: <b class="text-dark"><?php echo $fetch_cat['ocp_ruc_prov'];?></b></h5>
                  <h6 class="colorText">Estado: <b class="text-dark"><?php echo $fetch_cat['ocp_estado'];?></b></h6>
                </div>
                <div class="col-4">
                 <h5 class="colorText">Responsable: <b class="text-dark"><?php echo $fetch_cat['ocp_responsable'];?></b></h5>
                 <h6 class="colorText">moneda: <b class="text-dark"><?php echo $fetch_cat['ocp_moneda'];?></b></h6>
                 <h6 class="colorText">Entrega: <b class="text-dark"><?php echo $fetch_cat['ocp_entrega'];?></b></h6>
               </div>
               <div class="col-4">
                <h6 class="colorText">Razon social: <b class="text-dark"><?php echo $fetch_cat['ocp_razon_prov'];?></b></h6>
                <h6 class="colorText">Contacto: <b class="text-dark"><?php echo $fetch_cat['ocp_contacto'];?></b></h6>
                <h6 class="colorText">Direccion: <b class="text-dark"><?php echo $fetch_cat['ocp_direccion'];?></b></h6>
                <h6 class="colorText">COT Proveedor: <b class="text-dark"><?php echo $fetch_cat['oc_cot_prov'];?></b></h6>
              </div>
              </div>
              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>OP/ITEM</th>
                        <th>NOTA</th>
                        <th>CANTIDAD</th>
                        <th>COSTO</th>
                        <th>TOTAL</th>
                      </tr>
                    </thead>
                    <?php 
                    $i = 1;
                      $edit_cat2 = mysqli_query($conexion, "select * from oc_proveedortabla where ocp_cod='$_GET[ocp_codigo]'");
                      
                      while($row = mysqli_fetch_array($edit_cat2)){
                        $cantidad =$row['ocp_item_id'];
                        $edit_cat3 = mysqli_query($conexion, "select * from oc_proveedortabla2 where ocp2_item_id='$cantidad' and ocp2_cod='$_GET[ocp_codigo]'");
                        $row2 = mysqli_fetch_array($edit_cat3);
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row2['ocp2_op']; ?>/<?php echo $row2['ocp2_item']; ?></td>
                        <td><?php echo $row2['ocp2_nota']; ?></td>
                        <td><?php echo $row2['ocp2_cantidad']; ?></td>
                        <td><?php echo $row2['ocp2_costo']; ?></td>
                        <td><?php echo $row2['ocp2_total1']; ?></td>
                        
                      </tr>
                    </tbody>
                        <?php  $i++; } ?>
                  </table>
 
                        <label class="text-right colorText">Subtotal: <b class="text-dark"><?php echo $row2['ocp2_subtotal']; ?></b></label><br>
                        <label class="text-right colorText">IGV: <b class="text-dark"><?php echo $row2['ocp2_igv']; ?></b></label><br>
                        <label class="text-right colorText">TOTAL: <b class="text-dark"><?php echo $row2['ocp2_total']; ?></b></label>
               
                </div>
              </div>
             
            </section>
          </div>
        </div>
      </div>
    </main>

<?php } ?>