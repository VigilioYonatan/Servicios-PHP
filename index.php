<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php session_start();
if(isset($_SESSION['role'])){
    echo "<script>window.open('admin/index.php','_self')</script>";
}else{
?>

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>

    <link rel="stylesheet" href="admin/styles/admin_form_login.css" />

</head>

<body>

    <!-- <nav><a href="#" class="focus">Iniciar sesion</a></nav> -->

    <form action="" method="post" enctype="multipart/form-data" align="center">
        <h2><i style="color:white;" class="fa fa-user fa-1x"></i> Login</h2>
        <div class="border_bottom"></div>

        <label for="usuario" class="formulario__label">CORREO O ID</label>
        <input type="text" name="email" class="text-field" placeholder="Email" /><br>

        <label for="usuario" class="formulario__label1">CONTRASEÑA</label>
        <input type="password" name="password" class="text-field" placeholder="Contraseña " /><br>
        
        <button type="submit" name="login" class="button"><i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</button>
    </form>

</body>

<?php

include('web/bd.php');

if (isset($_POST['login'])) {

    $email = trim(mysqli_real_escape_string($conexion, $_POST['email']));
    $id = $email;

    $password = trim(mysqli_real_escape_string($conexion, $_POST['password']));

    $hash_password = md5($password);

    $sel_user = "select * from usuarios where user_cod_empleado = '$id' AND user_contraseña='$hash_password' ";
    $sel_user2 ="select * from usuarios where user_correo = '$email' AND user_contraseña='$hash_password' ";
    $run_user = mysqli_query($conexion, $sel_user) or die("error: " . mysqli_error($conexion));
    $run_user2 =mysqli_query($conexion, $sel_user2) or die("error: " . mysqli_error($conexion));
    $check_user = mysqli_num_rows($run_user);
    $check_user2 = mysqli_num_rows($run_user2);
    if ($check_user > 0) {

        $db_row = mysqli_fetch_array($run_user);

        $_SESSION['email'] = $db_row['user_correo'];
        $_SESSION['name'] = $db_row['user_nombre'];
        $_SESSION['user_id'] = $db_row['user_id'];
        $_SESSION['role'] = $db_row['user_rol'];
        $_SESSION['foto'] = $db_row['user_foto'];
        $_SESSION['cod_user'] = $db_row['user_cod_empleado'];
        if ($db_row['user_rol']) {
        
            echo "<script>window.open('admin/index.php?logged_in=Logueaste correctamente!','_self')</script>";
        } 
    }elseif ($check_user2 > 0){
        
        $db_row2 = mysqli_fetch_array($run_user2);

        $_SESSION['email'] = $db_row2['user_correo'];
        $_SESSION['name'] = $db_row2['user_nombre'];
        $_SESSION['user_id'] = $db_row2['user_id'];
        $_SESSION['role'] = $db_row2['user_rol'];
        $_SESSION['foto'] = $db_row2['user_foto'];
        $_SESSION['cod_user'] = $db_row2['user_cod_empleado'];
        if ($db_row2['user_rol']) {
        
            echo "<script>window.open('admin/index.php?logged_in=Logueaste correctamente!','_self')</script>";
        } 
    }else{
        echo "<script>alert('Correo o ID y contraseña erronea , intenta de nuevo!')</script>";
    }
}
?><?php } ?>