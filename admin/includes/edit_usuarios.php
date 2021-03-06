<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php
$edit_cat = mysqli_query($conexion, "select * from usuarios where user_id='$_GET[user_id]'");

$fetch_cat = mysqli_fetch_array($edit_cat);

?>
<?php
$get_cats = "select * from roles where rol_id = '$fetch_cat[user_rol]'";

$run_cats = mysqli_query($conexion, $get_cats);

while ($row_cats = mysqli_fetch_array($run_cats)) {
  $rol_id = $row_cats['rol_id'];
  $rol_nombre = $row_cats['rol_nombre'];
  $rol_cod = $row_cats['rol_cod'];
} ?>

<?php if ($_SESSION['role'] != 5) {
} else {
?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> EDITAR EMPLEADO</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item "><a href="index.php?action=view_users">Lista de Empleados</a></li>
        <li class="breadcrumb-item active">Editar</li>
      </ul>
    </div>

    <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <div class="row">
            <div class="col-lg-4 offset-lg-1">

              <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="exampleInputEmail1">Editar Nombre:</label>
                  <input class="form-control" type="text" name="user_nombre" value="<?php echo $fetch_cat['user_nombre']; ?>" size="30" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Editar Apellido:</label>
                  <input class="form-control" type="text" name="user_apellido" value="<?php echo $fetch_cat['user_apellido']; ?>" size="30" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Editar Correo:</label>
                  <input class="form-control" type="text" name="user_correo" value="<?php echo $fetch_cat['user_correo']; ?>" size="30" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Editar DNI</label>
                  <input class="form-control" type="text" name="user_dni" value="<?php echo $fetch_cat['user_dni']; ?>" size="30" required />
                </div>
               
                  <td><b>Editar imagen de Usuario:</b></td>
                  <td>
                    <div id="estilo-foto">
                      <p><i class="fa fa-download" aria-hidden="true"></i> Agregar Foto</p>
                      <input type="file" name="image_user" id="foto" accept="image/*">
                    </div>
                  </td><br>
                  <td><img src="usuarios_fotos/<?php echo $fetch_cat['user_foto']; ?>" style="width: 150px; height:150px; box-shadow: 0px 0px 5px black;" /></td>
                

                <div class="tile-footer">

                </div>
            </div>

            <div class="col-lg-4 offset-lg-1">
              <div class="form-group">
                <label for="exampleInputEmail1">Cambiar tipo de Empleado:</label>
                <select class="form-control" name="user_rol">
                  <option value='<?php echo $rol_id ?>'><?php echo $rol_nombre ?></option>"
                  <?php
                  $get_cats = "select * from roles";

                  $run_cats = mysqli_query($conexion, $get_cats);

                  while ($row_cats = mysqli_fetch_array($run_cats)) {


                    $categoria_id = $row_cats['rol_id'];
                    $categoria_nombre = $row_cats['rol_nombre'];

                    echo "<option value='$categoria_id'>$categoria_nombre</option>";
                  }
                  ?>
                </select>

              </div>
              <!-- <tr>
       <td><b>Editar Codigo:</b></td>
       <td><input type="text" name="cod_user" id="" value="<?php //echo $fetch_cat['user_cod_empleado']; 
                                                            ?>"></td>
     </tr> -->

              <div class="form-group">
                <label for="exampleInputEmail1">Editar estado:</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="estado" value="1" <?php if ($fetch_cat['user_estado'] == '1') echo 'checked="checked"'; ?>>Activo
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="estado" value="0" <?php if ($fetch_cat['user_estado'] == '0') echo 'checked="checked"'; ?>>No Activo
                  </label>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Editar Fecha de Nacimiento:</label>
                  <input class="form-control" type="date" name="user_nacimiento" value="<?php echo $fetch_cat['user_nacimiento']; ?>" size="30" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Editar Celular:</label>
                  <input class="form-control" type="text" name="user_celular" value="<?php echo $fetch_cat['user_telefono']; ?>" size="30" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Editar Direccion:</label>
                  <input class="form-control" type="text" name="user_direccion" value="<?php echo $fetch_cat['user_direccion']; ?>" size="30" required />
                </div>
            

              </div>
              <div class="tile-footer">
                <button class="btn btn-primary" name="edit_user" type="submit">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
              </div>
            </div>

            </form>
          </div>

        </div>

      </div>
    </div>
    </div>

  </main>

  <!-- PHP CODIGO  -->
  <?php

  if (isset($_POST['edit_user'])) {

    $user_nombre = mysqli_real_escape_string($conexion, $_POST['user_nombre']);
    $user_foto = $_FILES['image_user']['name'];
    $user_foto_tmp = $_FILES['image_user']['tmp_name'];

    $user_rol = $_POST['user_rol'];
    $user_estado = $_POST['estado'];
    $user_apellido = $_POST['user_apellido'];
    $user_correo = $_POST['user_correo'];
    $user_dni = $_POST['user_dni'];
    $user_nacimiento = $_POST['user_nacimiento'];
    $user_celular = $_POST['user_celular'];
    $user_direccion = $_POST['user_direccion'];
    $user_celular = $_POST['user_celular'];
    

    if ($user_foto_tmp != "") {
      move_uploaded_file($user_foto_tmp, "usuarios_fotos/$user_foto");
      $edit_cat = "update usuarios set user_nombre='$user_nombre' ,user_apellido='$user_apellido',user_estado='$user_estado',user_dni='$user_dni',user_correo='$user_correo',user_nacimiento='$user_nacimiento', user_foto = '$user_foto', user_direccion='$user_direccion',user_telefono='$user_celular',user_rol = '$user_rol' where user_id='$_GET[user_id]'";
    } else {
      $edit_cat = "update usuarios set user_nombre='$user_nombre' ,user_apellido='$user_apellido',user_estado='$user_estado',user_dni='$user_dni',user_correo='$user_correo',user_nacimiento='$user_nacimiento',  user_direccion='$user_direccion',user_telefono='$user_celular', user_rol = '$user_rol' where user_id='$_GET[user_id]'";
    }
    $run_cat = mysqli_query($conexion, $edit_cat);



    if ($run_cat) {

      echo "<script>alert('Se guardo correctamente $ruc ')</script>";
      echo "<script>window.open('index.php?action=view_users','_self')</script>";
    } else {
      echo "<script>alert('Empleado  no actualizado correctamente!')</script>";
    }
  }

  ?>
<?php } ?>