<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 5){
  
}else{?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus"></i> AGREGAR TIPO MONEDA</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Agregar Tipo</li>
          
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Nombre Tipo Moneda:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Ingrese nombre" name="nombre_rol" required>
                  </div>
                </div>
               
                <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-success" type="submit" name="agregar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Agregar</button>
                </div>
              </div>
            </div>
      </form>
            </div>
            
          </div>
        </div>
       
      </div>
</main>

<!-- PHP CODIGO  -->
<?php
if(isset($_POST['agregar'])){
    $nombreR = $_POST['nombre_rol'];


    $agregarRol = "insert into venta_moneda(moneda_nombre) values ('$nombreR')";

    $agregarRol2 = mysqli_query($conexion, $agregarRol);

    if($agregarRol2){
         echo "<script>alert('Se guardo correctamente $ruc ')</script>";
        echo "<script>window.open('index.php?action=add_tipoMoneda','_self')</script>";
    }else{
        echo "<script>alert('Hubo un error!!!')</script>";
    }
}

?>
<?php } ?>