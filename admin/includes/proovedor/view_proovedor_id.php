<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 9 and $_SESSION['role'] != 5) {


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else {
?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-file-text-o"></i> VER PROVEEDORES POR ID</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"><a href="index.php?action=view_proovedor">Proovedores</a></li>
        <li class="breadcrumb-item active">Proveedores ID</li>

      </ul>
    </div>
    <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <?php
          $edit_cat = mysqli_query($conexion, "select * from proveedores where cod_proovedor='$_GET[pro_codigo]'");

          $fetch_cat = mysqli_fetch_array($edit_cat);

          ?>
          <section class="invoice">
            <div class="row mb-4">
              <div class="col-6">
                <h2 class="page-header"><i class="fa fa-globe"></i> Outsourcing</h2>
              </div>
              <div class="col-6">
                <h5 class="text-right">RUC: <b><?php echo $fetch_cat['ruc_proovedor']; ?></b></h5>
              </div>
            </div>
            <div class="row invoice-info">
              <div class="col-4">
                <h4 style="color:#dc3545;">Codigo: <b><?php echo $fetch_cat['cod_proovedor']; ?></b></h4>

                <h5 class="colorText">Razón social: <b class="text-dark"><?php echo $fetch_cat['razon_proovedor']; ?></b></h5>
                <h5 class="colorText">Estado Proovedor: <b class="text-dark"><?php echo $fetch_cat['estado_proovedor']; ?></b></h5>
                <h5 class="colorText">Dirección del Proovedor: <b class="text-dark"><?php echo $fetch_cat['direccion_proovedor']; ?></b></h5>

              </div>
              <div class="col-4">
                <h5 class="colorText">Contacto del Proovedor: <b class="text-dark"><?php echo $fetch_cat['contacto_proovedor']; ?></b></h5>
                <h5 class="colorText">Asignado Proovedor: <b class="text-dark"><?php echo $fetch_cat['asignado_proovedor']; ?></b></h5>
                <h5 class="colorText">Area Proovedor: <b class="text-dark"><?php echo $fetch_cat['area_proovedor']; ?></b></h5>
                <h5 class="colorText">Web Proovedor: <b class="text-dark"><?php echo $fetch_cat['web_proovedor']; ?></b></h5>

              </div>
              <div class="col-4">
                <h5 class="colorText">Email 1: <b class="text-dark"><?php echo $fetch_cat['email1_proovedor']; ?></b></h5>
                <h5 class="colorText">Email 2: <b class="text-dark"><?php echo $fetch_cat['email2_proovedor']; ?></b></h5>
                <h5 class="colorText">Celular 1: <b class="text-dark"><?php echo $fetch_cat['celular1_proovedor']; ?></b></h5>
                <h5 class="colorText">Celular 2: <b class="text-dark"><?php echo $fetch_cat['celular2_proovedor']; ?></b></h5>
              </div>
            </div>
            <div class="row invoice-info">
              <div class="col-11">
              </div>
            </div>
        </div>
        </section>
      </div>
    </div>
    </div>
  </main>

<?php } ?>