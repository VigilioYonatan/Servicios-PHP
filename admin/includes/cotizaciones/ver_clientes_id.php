<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> VER CLIENTES POR ID</h1>
        </div>
         <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="index.php?action=view_clientes">Clientes</a></li>
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
              <div class="row invoice-info">
                <div class="col-4">
                  <h4 style="color:#dc3545;">Codigo: <b><?php echo $fetch_cat['cod_cliente'];?></b></h4>
                  <h4>RUC: <b><?php echo $fetch_cat['ruc_cliente'];?></b></h4>
                  <h4>Razón Cliente: <b><?php echo $fetch_cat['razon_cliente'];?></b></h4>
                  <h4>Direccón del Cliente: <b><?php echo $fetch_cat['direccion_cliente'];?></b></h4>
                  <h4>Contacto del Cliente: <b><?php echo $fetch_cat['contacto_cliente'];?></b></h4>
                  <h4>Celular 1: <b><?php echo $fetch_cat['celular1_cliente'];?></b></h4>
                  <h4>Celular 2: <b><?php echo $fetch_cat['celular2_cliente'];?></b></h4>
                 
                </div>
                <div class="col-4">
                  <h4>Email 1: <b><?php echo $fetch_cat['email1_cliente'];?></b></h4>
                  <h4>Email 2: <b><?php echo $fetch_cat['email2_cliente'];?></b></h4>
                  <h4>Web Cliente: <b><?php echo $fetch_cat['web_cliente'];?></b></h4>
                  <h4>Area Cliente: <b><?php echo $fetch_cat['area_cliente'];?></b></h4>
                  <h4>Estado Cliente: <b><?php echo $fetch_cat['estado_cliente'];?></b></h4>
                  <h4>Asignado Cliente: <b><?php echo $fetch_cat['asignado_cliente'];?></b></h4>
                </div>
            </section>
          </div>
        </div>
      </div>
    </main>

<?php } ?>