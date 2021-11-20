<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i>VER INGRESO POR ID</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=view_clientes">Lista de INGRESOS</a></li>
          <li class="breadcrumb-item active">INGRESO ID</li>
          
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <?php
            $edit_cat = mysqli_query($conexion, "select * from ingresos_salida where codigo_salida='$_GET[stock_cod]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> <?php echo $fetch_cat['codigo_salida'];?></h2>
                </div>
                
               </div>
                <div class="row invoice-info">
                  <div class="col-4">
               
                  <h5 class="colorText">COD: <b class="text-dark"><?php echo $fetch_cat['cod_salida'];?></b></h5>
                  <h5 class="colorText">FABRICANTE: <b class="text-dark"><?php echo $fetch_cat['fabricante_salida'];?></b></h5>
                  <h5 class="colorText">MODELO: <b class="text-dark"><?php echo $fetch_cat['modelo_salida'];?></b></h5>
                   <h5 class="colorText">CATEGORIA: <b class="text-dark"><?php echo $fetch_cat['categoria_salida'];?></b></h5>
                  <h5 class="colorText">P.COSTO: <b class="text-dark"><?php echo $fetch_cat['pcosto_salida'];?></b></h5>
                  <h5 class="colorText">DESCRIPCION: <b class="text-dark"><?php echo $fetch_cat['descripcion_salida'];?></b></h5>
                  <h5 class="colorText">RUC PROVEEDOR: <b class="text-dark"><?php echo $fetch_cat['ruc_prov_salida'];?></b></h5>
                  <h5 class="colorText">ALMACEN: <b class="text-dark"><?php echo $fetch_cat['almacen_salida'];?></b></h5>
                  
                </div>

                <div class="col-4">
                  <h5 class="colorText">NOMBRE/ITEM: <b class="text-dark"><?php echo $fetch_cat['nombre_salida'];?></b></h5>
                  <h5 class="colorText">LOTE: <b class="text-dark"><?php echo $fetch_cat['lote_salida'];?></b></h5>
                  <h5 class="colorText">UNIDAD DE MEDIDA: <b class="text-dark"><?php echo $fetch_cat['umedida_salida'];?></b></h5>
                   <h5 class="colorText">UNIDADES: <b class="text-dark"><?php echo $fetch_cat['unidades_salida'];?></b></h5>
                  <h5 class="colorText">MONEDA: <b class="text-dark"><?php echo $fetch_cat['moneda_salida'];?></b></h5>
                  <h5 class="colorText">RAZON SOCIAL: <b class="text-dark"><?php echo $fetch_cat['razon_salida'];?></b></h5>
                  <h5 class="colorText">GUIA DE INGRESO: <b class="text-dark"><?php echo $fetch_cat['guia_salida'];?></b></h5>
                  <h5 class="colorText">OCC: <b class="text-dark"><?php echo $fetch_cat['occ_salida'];?></b></h5>
                  <h5 class="colorText">COT: <b class="text-dark"><?php echo $fetch_cat['cot_salida'];?></b></h5>

                </div>
              
              </div>
                
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

<?php } ?>