<?php $edit_cat = mysqli_query($conexion, "select * from proveedores where ruc_proovedor='$_GET[ruc]'");

$fetch_cat = mysqli_fetch_array($edit_cat); ?>
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){

echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> EDITAR PROVEEDOR</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item "><a href="index.php?action=view_proovedor">Proveedores</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <form action="" method="POST" accept-charset="utf-8">
                  <h3 style="color:#dc3545; ">RUC: <b><?php echo $fetch_cat['ruc_proovedor']; ?></b></h3>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Nombre de Proveedor:</label>
                       <input class="form-control" type="text"name="pro_nombre" value="<?php echo $fetch_cat['razon_proovedor']; ?>" size="30" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar Direccion de Proveedor:</label>
                    <input class="form-control" type="text"name="pro_direccion" value="<?php echo $fetch_cat['direccion_proovedor']; ?>" size="30" required >
                  </div> 
                        
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar celular 1:</label>
                    <input class="form-control" type="text"name="pro_cel1" value="<?php echo $fetch_cat['celular1_proovedor']; ?>" size="30" required >
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar email 1:</label>
                    <input class="form-control" type="text"name="pro_email1" value="<?php echo $fetch_cat['email1_proovedor']; ?>" size="30" required >
                  </div> 
                   <div class="form-group">
                    <label for="exampleInputEmail1">Editar contacto de Proveedor:</label>
                    <input class="form-control" type="text"name="pro_contact" value="<?php echo $fetch_cat['contacto_proovedor']; ?>" size="30" required >
                  </div>  

                  <div class="tile-footer">
              
            </div>
          </div>
              <div class="col-lg-4 offset-lg-1"><br><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Editar Web:</label>
                    <input class="form-control" type="text"name="pro_web" value="<?php echo $fetch_cat['web_proovedor']; ?>" size="30" required >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar area:</label>
                    <input class="form-control" type="text"name="pro_area" value="<?php echo $fetch_cat['area_proovedor']; ?>" size="30" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar celular 2:</label>
                    <input class="form-control" type="text"name="pro_cel2" value="<?php echo $fetch_cat['celular2_proovedor']; ?>" size="30" required >
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputEmail1">Editar email 2:</label>
                    <input class="form-control" type="text"name="pro_email2" value="<?php echo $fetch_cat['email2_proovedor']; ?>" size="30" required >
                  </div> 
                  <div class="tile-footer">
                    <button class="btn btn-primary" name="edit_pro"type="submit">Guardar  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                  </div>

                </form>
                </div>

            </div>

          </div>
        </div>
      </div>
    </main>

    <?php

if (isset($_POST['edit_pro'])) {
  
        $nombre_cliente = mysqli_real_escape_string($conexion, $_POST['pro_nombre']);
        $direccion_cliente = $_POST['pro_direccion'];
        $cliente_contact = $_POST['pro_contact'];
        $cliente_cel1 = $_POST['pro_cel1'];
        $cliente_cel2 = $_POST['pro_cel2'];
        $cliente_email1 = $_POST['pro_email1'];
        $cliente_email2 = $_POST['pro_email2'];
        $cliente_web = $_POST['pro_web'];
        $cliente_area = $_POST['pro_area'];
        $edit_serv = "update proveedores set razon_proovedor='$nombre_cliente', direccion_proovedor= '$direccion_cliente',contacto_proovedor='$cliente_contact',celular1_proovedor = '$cliente_cel1',celular2_proovedor = '$cliente_cel2', email1_proovedor ='$cliente_email1',email2_proovedor ='$cliente_email2',web_proovedor='$cliente_web',area_proovedor='$cliente_area' where ruc_proovedor='$_GET[ruc]'";
        $edit_serv2 = mysqli_query($conexion, $edit_serv);

        echo "<script>window.open('index.php?action=view_proovedor','_self')</script>";
    }
?>



<?php } ?>