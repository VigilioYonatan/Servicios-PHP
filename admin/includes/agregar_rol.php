<link href="styles/agregar.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 5){
  
}else{?>
    <div class="form_box">
<h2><i class="fa fa-user-plus" aria-hidden="true"></i>  Agregar Rol</h2>
<div class="border_bottom"></div>
<form action="" method="POST" enctype="multipart/form-data">
    <label for="">Nombre rol:</label>
    <input type="text" name="nombre_rol" required><br>
    <label for="">Codigo Rol:</label>
    <input type="text" name="cod_rol" required><br>
    <td colspan="7">
                        <div id="guardar">
    <input type="submit" value="Agregar" name="agregar"><i class="fa fa-check-circle-o" aria-hidden="true"></i>
    </div>
                    </td>
</form>
</div>

<!-- PHP CODIGO  -->

<?php
if(isset($_POST['agregar'])){
    $nombreR = $_POST['nombre_rol'];
    $codigoR = $_POST['cod_rol'];

    $agregarRol = "insert into roles(rol_nombre,rol_cod) values ('$nombreR','$codigoR')";

    $agregarRol2 = mysqli_query($conexion, $agregarRol);

    if($agregarRol2){
        ?>
        <h3 style="background-color: white; padding:10px; text-align:center;">Rol agregado Correctamente<a style="text-decoration: none; color:#0d9d94; padding:0px 10px;" href="index.php?action=view_users">Ver Lista de usuarios</a></h3>
        <?php 
    }else{
        echo "<script>alert('Hubo un error!!!')</script>";
    }
}

?>
<?php } ?>