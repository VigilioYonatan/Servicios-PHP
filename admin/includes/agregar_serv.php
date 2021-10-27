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
                    <label for="exampleInputEmail1">CODIGO:</label>
                       <input class="form-control" type="text" placeholder="Ingrese codigo" name="codigo_serv" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del Servicio:</label>
                       <input class="form-control" type="text" placeholder="Ingrese nombre" name="nombre_serv" required>
                 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion:</label>
                    <textarea class="form-control" name="desc_serv" id="" cols="40" rows="5" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Materiales</label>
                    <textarea class="form-control" name="mat_serv" id="" cols="40" rows="5" required></textarea>
                  </div>

                   <div class="tile-footer">
              
            </div>
              </div>

              <div class="col-lg-4 offset-lg-1">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Disponibles</label>
                    <input class="form-control" type="number" placeholder="Ingrese precio" name="dis_serv" required>
                  </div>
                   
                  <div class="form-group">
                   <label for="exampleInputEmail1">Precio:</label>
                      <input class="form-control" type="text" placeholder="Ingrese precio" name="precio_serv" required>
                
                 </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Categoria de Servicio:</label>
                    <select class="form-control" name="cat_serv" id="entrega" required>
                      <?php
                     

                      $get_asignado = "select * from serv_categoria";
                      $get_asignado2 = mysqli_query($conexion,$get_asignado);
                      while ($row_a = mysqli_fetch_array($get_asignado2)){
                        $asignados = $row_a['nombre_categoria'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
      <label for="exampleInputEmail1">Editar estado:</label>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="estado_serv" value="1">Activo
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="estado_serv" value="0">No Activo
              </label>
            </div>
          
        </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">PROOVEDOR:</label>
                    <select class="form-control" name="pro_serv" id="entrega" required>
                      <?php
                     

                      $get_asignado = "select * from proveedores";
                      $get_asignado2 = mysqli_query($conexion,$get_asignado);
                      while ($row_a = mysqli_fetch_array($get_asignado2)){
                        $asignados = $row_a['razon_proovedor'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                    </select>
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
   $codigo_serv = $_POST['codigo_serv'];
    $nombre_serv = $_POST['nombre_serv'];
    $desc_serv = trim(mysqli_real_escape_string($conexion,$_POST['desc_serv']));;
    $mat_serv = trim(mysqli_real_escape_string($conexion,$_POST['mat_serv']));;
    $dis_serv = $_POST['dis_serv'];
    $precio_serv = $_POST['precio_serv'];
    $cat_serv = $_POST['cat_serv'];
    $estado_serv = $_POST['estado_serv'];
    $pro_serv = $_POST['pro_serv'];


   

    $addServ = mysqli_query($conexion, "insert into servicios(servicio_cod,servicio_nombre,servicio_desc,servicio_mat,servicio_disponibles,servicio_pventa,servicio_categoria,servicio_estado,servicio_proveedor) values('$codigo_serv','$nombre_serv','$desc_serv','$mat_serv','$dis_serv','$precio_serv','$cat_serv','$estado_serv','$pro_serv')");

   if ($addServ){
     echo "<script>alert('Servicio Agregado correctamente')</script>";
     echo "<script>window.open('index.php?action=view_serv','_self')</script>";
   }else{
     echo "<script>alert('No agregado correctamente')</script>";
   }

 
 
    
    
 }

 ?> 

<?php } ?>