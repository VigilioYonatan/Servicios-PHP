<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5){
  echo "<script>alert('No sos de servicios')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>

<?php include '../web/bd.php'; ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-handshake-o"></i> <i class="fa fa-plus"></i> AGREGAR SERVICIOS</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item "><a href="index.php?action=view_serv">Lista de Servicios</a></li>
          <li class="breadcrumb-item active">Agregar</li>
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <form action="" method="POST" accept-charset="utf-8">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del Servicio:</label>
                       <input class="form-control" type="text" placeholder="Ingrese nombre" name="nombre_serv" required>
                 
                  </div>
                   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Categoria de Servicio:</label>
                    <select class="form-control" name="cat_serv" id="">
                      <option value="Servidores">Servidores</option>
                      <option value="CPU">CPU</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Precio:</label>
                       <input class="form-control" type="text" placeholder="Ingrese precio" name="precio_serv" required>
                 
                  </div>
                  <div class="tile-footer">
              
            </div>
              </div>

              <div class="col-lg-4 offset-lg-1">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipo de Servicio:</label>
                    <select class="form-control" name="tipo_serv" id="" required>
                      <option value="Software">Software</option>
                      <option value="Hardware">Hardware</option>
                      <option value="General">General</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiempo de Servicio:</label>
                       <input class="form-control" type="number" placeholder="Ingrese tiempo" name="time_serv"  min="0" max="31"  required>
                 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Detalles del Servicio:</label>
                    <textarea class="form-control" name="det_serv" id="" cols="40" rows="5" required></textarea>
                  </div>

                  <div class="tile-footer">
              <button class="btn btn-primary" name="agregar_serv"type="submit">Guardar  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
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
 if(isset($_POST['agregar_serv'])){
    $nombre_serv = $_POST['nombre_serv'];
    $tipo_serv = $_POST['tipo_serv'];
    $cat_serv = $_POST['cat_serv'];
    $time_serv = $_POST['time_serv'];
    $precio_serv = $_POST['precio_serv'];
    $det_serv = $_POST['det_serv'];

    $all_serv = mysqli_query($conexion,"select * from servicios  ");
    while($row=mysqli_fetch_array($all_serv)){

      $codRo = $row['servicio_cod'];
      $codRo2 = str_replace('SER','',$codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'SER';
    }

    $addServ = mysqli_query($conexion, "insert into servicios(servicio_cod,servicio_nombre,servicio_tipo,servicio_precio,servicio_cat,servicio_det,servicio_time) values('$ser$codRo3','$nombre_serv','$tipo_serv','$precio_serv','$cat_serv','$det_serv','$time_serv')");

    ?>

  <h3 style="background-color: white; padding:10px; text-align:center;">Servicio agregado Correctamente<a style="text-decoration: none; color:#0d9d94; padding:0px 10px;" href="index.php?action=view_serv">Ver Lista de servicios</a></h3>
  <?php 
    
    
 }

 ?> 

<?php } ?>