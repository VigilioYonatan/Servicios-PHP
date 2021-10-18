<link href="styles/agregar.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5){
  echo "<script>alert('No sos de servicios')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>

<?php include '../web/bd.php'; ?>
<div class="form_box">
<h2><i class="fa fa-plus fa-1x" aria-hidden="true"></i>  AGREGAR SERVICIOS</h2>
<div class="border_bottom"></div>
<form action="" method="POST" enctype="multipart/form-data">
    <label>Nombre del servicio:</label>
    <input type="text" name="nombre_serv" required><br>
    <label>Tipo de servicio:</label>
    <select name="tipo_serv" id="">Elige el tipo
        <option value="Software">Software</option>
        <option value="Hardware">Hardware</option>
        <option value="General">General</option>
    </select><br>
    <label>Categoria de servicio:</label>
    <select name="cat_serv" id="">
        <option value="Servidores">Servidores</option>
        <option value="CPU">CPU</option> 
    </select><br>
    <label>Tiempo de servicio:</label>
    <input type="number" name="time_serv" min="0" max="31" required><br>
    <label>Detalles del Servicio:</label><br>
    <textarea name="det_serv" id="" cols="40" rows="5" required></textarea><br>
    <div id="guardar">
    <input type="submit" name="agregar_serv" value="Agregar"><i class="fa fa-check-circle-o" aria-hidden="true"></i>
    </div>
</form>
</div>

<!-- PHP CODIGO  -->
<?php
 if(isset($_POST['agregar_serv'])){
    $nombre_serv = $_POST['nombre_serv'];
    $tipo_serv = $_POST['tipo_serv'];
    $cat_serv = $_POST['cat_serv'];
    $time_serv = $_POST['time_serv'];
    $det_serv = $_POST['det_serv'];
    
    $all_serv = mysqli_query($conexion,"select * from servicios  ");
    while($row=mysqli_fetch_array($all_serv)){
      
      $codRo = $row['servicio_cod'];
      $codRo2 = str_replace('SER','',$codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'SER';
    }
        
    $addServ = mysqli_query($conexion, "insert into servicios(servicio_cod,servicio_nombre,servicio_tipo,servicio_cat,servicio_det,servicio_time) values('$ser$codRo3','$nombre_serv','$tipo_serv','$cat_serv','$det_serv','$time_serv')");
   
    ?>
	<h3 style="background-color: white; padding:10px; text-align:center;">Servicio agregado Correctamente<a style="text-decoration: none; color:#0d9d94; padding:0px 10px;" href="index.php?action=view_serv">Ver Lista de servicios</a></h3>
	<?php 
    
    
 }

 ?> 

<?php } ?>