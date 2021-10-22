<?php $edit_cat = mysqli_query($conexion, "select * from clientes where ruc_cliente='$_GET[ruc]'");

$fetch_cat = mysqli_fetch_array($edit_cat); ?>
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){

echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> EDITAR CLIENTE</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item "><a href="index.php?action=view_serv">Lista de Servicios</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <form action="" method="POST" accept-charset="utf-8">
                  <h3 style="color:#dc3545; ">RUC: <b><?php echo $fetch_cat['ruc_cliente']; ?></b></h3>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Nombre de Cliente:</label>
                       <input class="form-control" type="text"name="cliente_nombre" value="<?php echo $fetch_cat['razon_cliente']; ?>" size="30" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Direccion de Cliente:</label>
                    <input class="form-control" type="text"name="cliente_direccion" value="<?php echo $fetch_cat['direccion_cliente']; ?>" size="30" required >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar contacto de Cliente:</label>
                    <input class="form-control" type="text"name="cliente_contact" value="<?php echo $fetch_cat['contacto_cliente']; ?>" size="30" required >
                  </div>         
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar celular 1:</label>
                    <input class="form-control" type="text"name="cliente_cel1" value="<?php echo $fetch_cat['celular1_cliente']; ?>" size="30" required >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar celular 2:</label>
                    <input class="form-control" type="text"name="cliente_cel2" value="<?php echo $fetch_cat['celular2_cliente']; ?>" size="30" required >
                  </div> 
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar email 1:</label>
                    <input class="form-control" type="text"name="cliente_email1" value="<?php echo $fetch_cat['email1_cliente']; ?>" size="30" required >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar email 2:</label>
                    <input class="form-control" type="text"name="cliente_email2" value="<?php echo $fetch_cat['email2_cliente']; ?>" size="30" required >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Web:</label>
                    <input class="form-control" type="text"name="cliente_web" value="<?php echo $fetch_cat['web_cliente']; ?>" size="30" required >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar area:</label>
                    <input class="form-control" type="text"name="cliente_area" value="<?php echo $fetch_cat['area_cliente']; ?>" size="30" required >
                  </div> 
                  <div class="tile-footer">
              <button class="btn btn-primary" name="edit_cliente"type="submit">Guardar  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
            </div>
                </form>
                </div>

            </div>

          </div>
        </div>
      </div>
    </main>

    <?php

if (isset($_POST['edit_cliente'])) {
  
        $nombre_cliente = mysqli_real_escape_string($conexion, $_POST['cliente_nombre']);
        $direccion_cliente = $_POST['cliente_direccion'];
        $cliente_contact = $_POST['cliente_contact'];
        $cliente_cel1 = $_POST['cliente_cel1'];
        $cliente_cel2 = $_POST['cliente_cel2'];
        $cliente_email1 = $_POST['cliente_email1'];
        $cliente_email2 = $_POST['cliente_email2'];
        $cliente_web = $_POST['cliente_web'];
        $cliente_area = $_POST['cliente_area'];
        $edit_serv = "update clientes set razon_cliente='$nombre_cliente', direccion_cliente= '$direccion_cliente',contacto_cliente='$cliente_contact',celular1_cliente = '$cliente_cel1',celular2_cliente = '$cliente_cel2', email1_cliente ='$cliente_email1',email2_cliente ='$cliente_email2',web_cliente='$cliente_web',area_cliente='$cliente_area' where ruc_cliente='$_GET[ruc]'";
        $edit_serv2 = mysqli_query($conexion, $edit_serv);

        echo "<script>window.open('index.php?action=view_clientes','_self')</script>";
    }
?>



<?php } ?>






    