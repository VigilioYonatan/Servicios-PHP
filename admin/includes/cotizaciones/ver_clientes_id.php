<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> VER CLIENTE POR ID</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=view_clientes">Lista de Clientes</a></li>
          <li class="breadcrumb-item active">Clientes ID</li>
          
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <?php
            $edit_cat = mysqli_query($conexion, "select * from clientes where cod_cliente='$_GET[cliente_codigo]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> <?php echo $fetch_cat['cod_cliente'];?></h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right ">RUC: <b><?php echo $fetch_cat['ruc_cliente'];?></b></h5>
                 </div>
               </div>
                <div class="row invoice-info">
                  <div class="col-4">
               
                  <h5 class="colorText">RAZON SOCIAL: <b class="text-dark"><?php echo $fetch_cat['razon_cliente'];?></b></h5>
                  <h5 class="colorText">EMAIL 1: <b class="text-dark"><?php echo $fetch_cat['email1_cliente'];?></b></h5>
                  <h5 class="colorText">CELULAR 1: <b class="text-dark"><?php echo $fetch_cat['celular1_cliente'];?></b></h5>
                   <h5 class="colorText">AREA: <b class="text-dark"><?php echo $fetch_cat['area_cliente'];?></b></h5>
                  <h5 class="colorText">ESTADO: <b class="text-dark"><?php echo $fetch_cat['estado_cliente'];?></b></h5>
                  
                </div>

                <div class="col-4">
                  <h5 class="colorText">CONTACTO: <b class="text-dark"><?php echo $fetch_cat['contacto_cliente'];?></b></h5>
                  <h5 class="colorText">EMAIL 2: <b class="text-dark"><?php echo $fetch_cat['email2_cliente'];?></b></h5>
                   <h5 class="colorText">CELULAR 2: <b class="text-dark"><?php echo $fetch_cat['celular2_cliente'];?></b></h5>
                  <h5 class="colorText">ASIGNADO: <b class="text-dark"><?php echo $fetch_cat['asignado_cliente'];?></b></h5>

                </div>
                <div class="col-11"><br>
                  <h5 class="colorText">DIRECCIÓN: <b class="text-dark"><?php echo $fetch_cat['direccion_cliente'];?></b></h5>
                  
                 <h5 class="colorText">PAGINA WEB: <a class="text-dark" href="https://<?php echo $fetch_cat['web_cliente'];?>"><?php echo $fetch_cat['web_cliente'];?></a></h5>
                 
                </div>
              </div>
                
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

<?php } ?>