<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> VER ITEM POR ID</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=view_clientes">Lista de ITEMS</a></li>
          <li class="breadcrumb-item active">ITEM ID</li>
          
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <?php
            $edit_cat = mysqli_query($conexion, "select * from compra_servicio where compra_id='$_GET[item_id]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> <?php echo $fetch_cat['compra_op'];?></h2>
                </div>
    
               </div>
                <div class="row invoice-info">
                  <div class="col-4">
               
                  <h5 class="colorText">ITEM: <b class="text-dark"><?php echo $fetch_cat['compra_item'];?></b></h5>
                  <h5 class="colorText">CANTIDAD: <b class="text-dark"><?php echo $fetch_cat['compra_cantidad'];?></b></h5>
                  <h5 class="colorText">MONEDA: <b class="text-dark"><?php echo $fetch_cat['compra_moneda'];?></b></h5>
                   <h5 class="colorText">COT PROVEEDOR: <b class="text-dark"><?php echo $fetch_cat['compra_cot_prov'];?></b></h5>
                  <h5 class="colorText">TIEMPO ENTREGA: <b class="text-dark"><?php echo $fetch_cat['compra_entrega'];?></b></h5>
                  <h5 class="colorText">OCP: <b class="text-dark"><?php echo $fetch_cat['compra_ocp'];?></b></h5>
                  
                </div>

                <div class="col-4">
                  <h5 class="colorText">NOTA: <b class="text-dark"><?php echo $fetch_cat['compra_nota'];?></b></h5>
                  <h5 class="colorText">PROVEEDOR: <b class="text-dark"><?php echo $fetch_cat['compra_proveedor'];?></b></h5>
                   <h5 class="colorText">COSTO: <b class="text-dark"><?php echo $fetch_cat['compra_costo'];?></b></h5>
                  <h5 class="colorText">VENDEDOR: <b class="text-dark"><?php echo $fetch_cat['compra_asignado'];?></b></h5>
                  <h5 class="colorText">RESPONSABLE: <b class="text-dark"><?php echo $fetch_cat['compra_responsable'];?></b></h5>

                </div>
              
              </div>
                
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

<?php } ?>