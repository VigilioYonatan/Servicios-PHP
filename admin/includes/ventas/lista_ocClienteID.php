<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> VER O.C. CLIENTE POR ID</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=lista_ocCliente">Lista de O.C.Clientes</a></li>
          <li class="breadcrumb-item active">O.C. ID</li>
          
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <?php
            $edit_cat = mysqli_query($conexion, "select * from oc_cliente where oc_codigo='$_GET[codOC]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i>  <?php echo $fetch_cat['oc_codigo'];?></h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">RUC: <b class="text-dark"><?php echo $fetch_cat['oc_ruc'];?></b></h5>
                </div>
               </div>
              <div class="row invoice-info">
                <div class="col-4">
                 
                  <h5 class="colorText" >RAZON SOCIAL: <b class="text-dark"><?php echo $fetch_cat['oc_razon'];?></b></h5>
                   
                   
                </div>
                
                
                <div class="col-11"><br>
                  <h5 class="colorText">DESCRIPCION: <b class="text-dark"><?php echo $fetch_cat['oc_descripcion'];?></b></h5>
                  <h5 class="colorText">ADJUNTAR ARCHIVO: <a class="text-dark" href="archivosOC/<?php echo $fetch_cat['oc_archivo']; ?>" target="_blank"> <i class="fa fa-download fa-2x" aria-hidden="true"></i></a></h5>
                </div>
                <div class="col-4"><br>
                  <h5 class="colorText">COTIZACION: <b class="text-dark"><?php echo $fetch_cat['oc_cotizacion'];?></b></h5>
                 </div>
                 <div class="col-4"><br>
                    
                    <h5 class="colorText">TIEMPO DE ENTREGA: <b class="text-dark"><?php echo $fetch_cat['oc_tiempo'];?></b></h5>
   
                </div>
             
            </section>
          </div>
        </div>
      </div>
    </main>

<?php } ?>