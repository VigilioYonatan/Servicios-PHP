<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> VER SERVICIO POR ID</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=view_serv">Lista de Servicios</a></li>
          <li class="breadcrumb-item active">Servicios ID</li>
          
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <?php
            $edit_cat = mysqli_query($conexion, "select * from servicios where servicio_cod='$_GET[servicio_codigo]'");

            $fetch_cat = mysqli_fetch_array($edit_cat);

            ?>
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i><?php echo $fetch_cat['servicio_cod'];?></h2>
                </div>
                
               </div>
              <div class="row invoice-info">
                <div class="col-4">
                 
                  <h5 class="colorText">NOMBRE: <b class="text-dark"><?php echo $fetch_cat['servicio_nombre'];?></b></h5>
                  
                  <h5 class="colorText" >DISPONIBLES: <b class="text-dark"><?php echo $fetch_cat['servicio_disponibles'];?></b></h5>
                   <h5 class="colorText">P/S: <b class="text-dark"><?php echo $fetch_cat['servicio_tipo'];?></b></h5> 
                     <h5 class="colorText">ESTADO: <b class="text-dark"><?php echo $fetch_cat['servicio_estado'];?></b></h5>
                </div>

                <div class="col-4">
                    <h5 class="colorText">PRECIO DE VENTA: <b class="text-dark">S/.<?php echo $fetch_cat['servicio_pventa'];?></b></h5>
                  <h5 class="colorText">CATEGORIA: <b class="text-dark"><?php echo $fetch_cat['servicio_categoria'];?></b></h5>
                  <h5 class="colorText">PROVEEDOR: <b class="text-dark"><?php echo $fetch_cat['servicio_proveedor'];?></b></h5>
               
                </div>
              
                 <div class="col-11"><br>
                  <h5 class="colorText" >DESCRIPCION: <b class="text-dark" ><?php echo $fetch_cat['servicio_desc'];?></b></h5>
                   <h5 class="colorText" >MATERIALES: <b class="text-dark"><?php echo $fetch_cat['servicio_mat'];?></b></h5>
                </div>
              </div>
             
            </section>
          </div>
        </div>
      </div>
    </main>

<?php } ?>