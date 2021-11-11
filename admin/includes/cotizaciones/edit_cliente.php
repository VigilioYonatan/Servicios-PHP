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
          <li class="breadcrumb-item "><a href="index.php?action=view_clientes">Lista de Clientes</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <form action="" method="POST" accept-charset="utf-8"><br>
                  <h3 style="color:#dc3545; ">RUC: <b><?php echo $fetch_cat['ruc_cliente']; ?></b></h3><br>

                  <div class="form-group">
                    <label for="exampleInputEmail1">DIRECCIÓN:</label>
                    <input class="form-control" type="text"name="cliente_direccion" value="<?php echo $fetch_cat['direccion_cliente']; ?>" size="30" required >
                  </div> 
                        
                  <div class="form-group">
                    <label for="exampleInputEmail1">CELULAR 1:</label>
                    <input class="form-control" type="text"name="cliente_cel1" value="<?php echo $fetch_cat['celular1_cliente']; ?>" size="30" required >
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputEmail1">EMAIL 1:</label>
                    <input class="form-control" type="text"name="cliente_email1" value="<?php echo $fetch_cat['email1_cliente']; ?>" size="30" required >
                  </div> 
                    <div class="form-group">
                    <label for="exampleInputEmail1">PAGINA WEB:</label>
                    <input class="form-control" type="text"name="cliente_web" value="<?php echo $fetch_cat['web_cliente']; ?>" size="30" required >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">ESTADO:</label>
                     <select class="form-control" name="cliente_est" id="moneda">
                      <option value="<?php echo $fetch_cat['estado_cliente']; ?>"><?php echo $fetch_cat['estado_cliente']; ?></option>
                      <?php
                      $get_estado = "select * from cliente_estado ";
                      $get_estado2 = mysqli_query($conexion,$get_estado);
                      while ($row_a = mysqli_fetch_array($get_estado2)){
                        $asignados = $row_a['nombre_estado'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                    </select>
                  </div>

                  <div class="tile-footer">
              
            </div>
          </div>
              <div class="col-lg-4 offset-lg-1">
                <div class="form-group">
                    <label for="exampleInputEmail1">RAZON SOCIAL:</label>
                       <input class="form-control" type="text"name="cliente_nombre" value="<?php echo $fetch_cat['razon_cliente']; ?>" size="30" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CONTACTO:</label>
                    <input class="form-control" type="text"name="cliente_contact" value="<?php echo $fetch_cat['contacto_cliente']; ?>" size="30" required >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">CELULAR 2:</label>
                    <input class="form-control" type="text"name="cliente_cel2" value="<?php echo $fetch_cat['celular2_cliente']; ?>" size="30" required >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">EMAIL 2:</label>
                    <input class="form-control" type="text"name="cliente_email2" value="<?php echo $fetch_cat['email2_cliente']; ?>" size="30" required >
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">AREA:</label>
                    <select class="form-control" name="cliente_area" id="entrega" required>
                       <option value="<?php echo $fetch_cat['area_cliente']; ?>"><?php echo $fetch_cat['area_cliente']; ?></option>
                    
                    <?php
                      $rol2 = 5 ;

                      $get_asignado = "select * from cliente_area";
                      $get_asignado2 = mysqli_query($conexion,$get_asignado);
                      while ($row_a = mysqli_fetch_array($get_asignado2)){
                        $asignados = $row_a['area_nombre'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ASIGNADO:</label>
                    <select class="form-control" name="cliente_asig" id="entrega" required>
                       <option value="<?php echo $fetch_cat['asignado_cliente']; ?>"><?php echo $fetch_cat['asignado_cliente']; ?></option>
                      <?php
                      $rol2 = 5 ;

                      $get_asignado = "select * from usuarios where user_rol = '$rol2'";
                      $get_asignado2 = mysqli_query($conexion,$get_asignado);
                      while ($row_a = mysqli_fetch_array($get_asignado2)){
                        $asignados = $row_a['user_nombre'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                    </select>
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
        $cliente_estado=$_POST['cliente_est'];
        $cliente_asignado=$_POST['cliente_asig'];
        $edit_serv = "update clientes set razon_cliente='$nombre_cliente', direccion_cliente= '$direccion_cliente',contacto_cliente='$cliente_contact',celular1_cliente = '$cliente_cel1',celular2_cliente = '$cliente_cel2', email1_cliente ='$cliente_email1',email2_cliente ='$cliente_email2',web_cliente='$cliente_web',area_cliente='$cliente_area',estado_cliente='$cliente_estado',asignado_cliente='$cliente_asignado' where ruc_cliente='$_GET[ruc]'";
        $edit_serv2 = mysqli_query($conexion, $edit_serv);

        echo "<script>window.open('index.php?action=view_clientes','_self')</script>";
    }
?>



<?php } ?>






    