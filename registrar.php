<head>
    <meta charset="UTF-8">
    <title>Añadir</title>

    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/icons2/flaticon.css">
</head>

<?php session_start();
if (isset($_SESSION['role'])) {
    $cliente = $_SESSION['role'];
} else {
    header('Location: index.php');
    die();
}
include('web/bd.php');
include('web/funciones.php');
?>

<main>
    <h2 class="h2_agregar"><i class="fa fa-user-plus" aria-hidden="true"></i> AGREGAR EMPLEADO</h2>
    <div class="border_bottom"></div>
    <form action="" class="formulario" id="formulario" method="POST" enctype="multipart/form-data">


        <!-- Grupo: Nombre -->
        <div class="formulario__grupo" id="grupo__nombre">
            <label for="nombre" class="formulario__label">Nombre</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Digite Nombre">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El nombre tiene que ser de 4 a 16 dígitos y solo puede contener letras.</p>
        </div>

        <!-- Grupo:Apellido -->
        <div class="formulario__grupo" id="grupo__apellido">
            <label for="nombre" class="formulario__label">Apellido</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="apellido" id="apellido" placeholder="Digite Apellidos">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El apellido tiene que ser de 3 a 20 dígitos y solo puede contener letras.</p>
        </div>
        <!-- Grupo:DNI -->
        <div class="formulario__grupo" id="grupo__dni">
            <label for="nombre" class="formulario__label">DNI</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="dni" id="dni" placeholder="DNI">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El DNI tiene que ser de 6 a 10 dígitos y solo puede contener numeros.</p>
        </div>

        <!-- Grupo: Correo Electronico -->
        <div class="formulario__grupo" id="grupo__correo">
            <label for="correo" class="formulario__label">Correo Electrónico</label>
            <div class="formulario__grupo-input">
                <input type="email" class="formulario__input" name="correo" id="correo" placeholder="abc@correo.com">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
        </div>

        <!-- Grupo: Contraseña -->
        <div class="formulario__grupo" id="grupo__password">
            <label for="password" class="formulario__label">Contraseña</label>
            <div class="formulario__grupo-input">
                <input type="password" class="formulario__input" name="contraseña" id="password" placeholder="Digite contraseña">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
        </div>

        <!-- Grupo: Contraseña 2 -->
        <div class="formulario__grupo" id="grupo__password2">
            <label for="password2" class="formulario__label">Repetir Contraseña</label>
            <div class="formulario__grupo-input">
                <input type="password" class="formulario__input" name="confirmar_contraseña" id="password2" placeholder="Repita Contraseña">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
        </div>

        <!-- Grupo:Direccion  -->
        <div class="formulario__grupo" id="grupo__direccion">
            <label for="telefono" class="formulario__label">Direccion:</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Dirección">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La direccion tiene que ser minimo de 8 digitos</p>
        </div>



        <!-- Grupo: Teléfono -->
        <div class="formulario__grupo" id="grupo__telefono">
            <label for="telefono" class="formulario__label">Teléfono</label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Telefono">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
        </div>
        <div class="formulario__mensaje" id="formulario__mensaje">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario. </p>
        </div>
        <div>
            <label class="titulo">Tipo de empleado</label><br><br>
            <select name="rol" required>

                <?php
                $get_cats = "select * from roles";

                $run_cats = mysqli_query($conexion, $get_cats);

                while ($row_cats = mysqli_fetch_array($run_cats)) {
                    $rol_id = $row_cats['rol_id'];
                    $rol_nombre = $row_cats['rol_nombre'];
                    $rol_cod = $row_cats['rol_cod'];
                    echo "<option value='$rol_id'>$rol_nombre</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-input">
            <label for="file-ip-1"><i class="fa fa-download" aria-hidden="true"></i>  Subir foto</label>
            <input type="file" id="file-ip-1" accept="image/*" name="foto" onchange="showPreview(event);">
            <div class="preview">
                <img id="file-ip-1-preview">
            </div>
        </div>

        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button type="submit" class="formulario__btn" name="registrar"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>  Enviar</button>
            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Empleado nuevo agregado!</p>
        </div>
    </form>
</main>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<script src="ajax/formulario.js"></script>
<?php
if (isset($_POST['registrar'])) {
    if (!empty($_POST['correo']) && !empty($_POST['contraseña']) && !empty($_POST['confirmar_contraseña']) && !empty($_POST['nombre'])) {
        $ip = get_ip();
        // $usuario_codigoEmp = $_POST['codigoEmp'];
        $usuario_nombre = $_POST['nombre'];
        $usuario_apellido = $_POST['apellido'];
        $usuario_rol = $_POST['rol'];
        $usuario_dni = $_POST['dni'];
        $usuario_correo = trim($_POST['correo']);
        $usuario_contraseña = trim($_POST['contraseña']);
        $hash_contraseña = md5($usuario_contraseña);
        $confirmar_contraseña = trim($_POST['confirmar_contraseña']);


        $usuario_foto = $_FILES['foto']['name'];
        $usuario_foto_tmp = $_FILES['foto']['tmp_name'];
        $usuario_direccion = $_POST['direccion'];
        $usuario_telefono = $_POST['telefono'];

        $codigo_crear = mysqli_query($conexion,"select rol_cod from roles where rol_id ='$usuario_rol' ");
        while($row_role = mysqli_fetch_array($codigo_crear)){
            $row_cod = $row_role['rol_cod']; //sacar rol_cod
        }
        $codrandom = rand(10000,99999);
        $codigoEmpleado = $row_cod.$codrandom ;
        $con_registrar = mysqli_query($conexion, "select * from usuarios where user_correo ='$usuario_correo' ");//1
        $con_codigo = mysqli_query($conexion, "select * from usuarios where user_cod_empleado ='$codigoEmpleado' ");//2
    
        

        $correo_count = mysqli_num_rows($con_registrar);//1
        $codigo_count = mysqli_num_rows($con_codigo);//2

        $row_registrar = mysqli_fetch_array($con_registrar);//1
        $row_codigo = mysqli_fetch_array($con_codigo);//2

        


       if ($correo_count > 0 ) {
            echo "<script>alert('Perdon, El correo $usuario_correo ya está registrado')</script>";
            echo "<script>window.open('registrar.php','_self')</script>";
            
       }elseif($codigo_count > 0){
        echo "<script>alert('Perdon, El codigo de empleado  $codigoEmpleado ya está registrado')</script>";
        } elseif ($row_codigo['user_cod_empleado'] !=$codigoEmpleado && $row_registrar['user_correo'] != $usuario_correo && $usuario_contraseña == $confirmar_contraseña) {
            move_uploaded_file($usuario_foto_tmp, "admin/usuarios_fotos/$usuario_foto");
            $run_insertar = mysqli_query($conexion, "insert into usuarios(user_ip,user_cod_empleado,user_nombre,user_apellido,user_dni,user_correo,user_contraseña,user_foto,user_direccion,user_telefono,user_rol) values('$ip','$codigoEmpleado','$usuario_nombre','$usuario_apellido',$usuario_dni,'$usuario_correo','$hash_contraseña','$usuario_foto','$usuario_direccion','$usuario_telefono','$usuario_rol')");
            ?>
            <h3 style="background-color: white; padding:10px; text-align:center;">Nuevo Empleado agregado<a style="text-decoration: none; color:#0d9d94; padding:0px 10px;" href="admin/index.php?action=view_users">Ver Lista de los usuarios</a></h3>
            
            <?php
            // echo "<script>alert('Nuevo Empleado Registrado correctamente con el id:$codigoEmpleado ','_self')</script>";
            // echo "<script>window.open('admin/index.php?action=view_users','_self')</script>";
            // echo "<script>window.close();</script>";

            if ($run_insertar) {
                $sel_user = mysqli_query($conexion, "select * from usuarios where user_correo = '$usuario_correo'");
                $row_user = mysqli_fetch_array($sel_user);

                $_SESSION['user_id'] = $row_user['user_id'] . "<br>";
                $_SESSION['user_role'] = $row_user['user_rol'];
            }
        }
    }else{
        echo "<script>alert('Perdon, Complete el formulario  no se ha registrado')</script>";
        echo "<script>window.open('registrar.php','_self')</script>";
    }
}
?>