<?php include('cabeza.php'); ?>
<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 5){
  echo "<script>alert('No eres de este role ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{
  ?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i>LISTA DE SERVICIOS</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Lista de Empleados</li>
          
        </ul>
      </div>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="post" enctype="multipart/form-data" >

                <div class="table-responsive">
              <table class="table table-hover table-bordered" id="sampleTable" >
                  <thead align="center">
                    <tr>
                      
                      <th>ID</th>
                      <th>Nombre </th>
                      <th>Disponibles</th>
                      <th>Precio</th>
                        <th>Añadir</th>
                    </tr>
                  </thead>
                  <?php
                  $codigo = $_GET['ruc'];
                  $get_pro = "select * from servicios";
                  
                  $i = 1;
                  $run_pro = mysqli_query($conexion, $get_pro);
              
                  while($row_pro = mysqli_fetch_array($run_pro)){
                      $pro_id = $row_pro['servicio_id'];
                      $pro_cod = $row_pro['servicio_cod'];
                      $pro_nombre  = $row_pro['servicio_nombre'];
                      $pro_desc = $row_pro['servicio_desc'];
                      $pro_mat = $row_pro['servicio_mat'];
                      $pro_disp = $row_pro['servicio_disponibles'];
                      $pro_pventa = $row_pro['servicio_pventa'];
                      $pro_cat = $row_pro['servicio_categoria'];
                    ?>
                   
                     <tr>

                       <td ><?php echo $i; ?></td>
                       <td ><?php echo $pro_nombre; ?></td>
                       <td ><?php echo $pro_disp; ?></td>
                       <td >S/.<?php echo $pro_pventa; ?></td>
                      
                           <td class="delete"><a href="tabla_cotizacion.php?cod_codigo=<?php echo $codigo; ?>&ser_codigo=<?php echo $pro_cod; ?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>
                           
               
                 </tr>

               
                    <?php } // End while loop ?>
                </table>
                </div>
              </form>

              
            </div>
          </div>
        </div>
      </div>

      <a href="../registrar.php"  class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Empleado</a> 
 </main>   



<?php } ?>


<?php include('pie.php'); ?>