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
          <h1><i class="fa fa-users"></i> EMPLEADOS</h1>
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
              <div class="table-responsive">

                <form action="" method="post" enctype="multipart/form-data" >
              <table class="table table-hover table-bordered" id="sampleTable" >
                  <thead align="center">
                    <tr>
                      
                      <th>ID</th>
                      <th>Codigo </th>
                      <th>Rol</th>
                      <th>Estado</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Imagen</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                  $all_users = mysqli_query($conexion,"select * from usuarios order by user_id DESC ");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_users)){
                    $nombreRo = $row['user_rol'];
                    $codRo = $row['user_cod_empleado'];
                    $rolenombre =mysqli_query($conexion, "select * from roles where rol_id ='$nombreRo' ");
                    $rowNombre = mysqli_fetch_array($rolenombre)
                    ?>
                    <tbody align="center">
                     <tr>

                       <td ><?php echo $i; ?></td>
                       <td ><?php echo $row['user_cod_empleado']; ?></td>
                       <td ><?php echo $rowNombre['rol_nombre']; ?></td>
                       <td ><?php echo $row['user_estado']; ?></td>
                       <td ><?php echo $row['user_nombre']; ?></td>
                       <td ><?php echo $row['user_correo']; ?></td>
                    <td>
                           <?php if($row['user_foto'] !=''){ ?>
                             <img src="usuarios_fotos/<?php echo $row['user_foto']; ?>" width="70" height="70" style="box-shadow: 0px 0px 5px black;" />

                           <?php }else{ ?>
                             <img src="../images/profile-icon.png" width="70" height="50" />

                           <?php } ?>

                         </td>
                         <?php if ($codRo != $_SESSION['cod_user']) {?>
                           <td class="delete"><a href="index.php?action=edit_user&user_id=<?php echo $row['user_id'];?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>

                           <td class="delete"><a href="index.php?action=view_users&delete_user=<?php echo $row['user_id'];?>" onclick="return confirm('Estas seguro de eliminar a este empleado?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                         <?php } ?> 
                 </tr>

               </tbody>
                    <?php $i++;} // End while loop ?>
                </table>
              </form>

              </div>
            </div>
          </div>
        </div>
      </div>

      <a href="../registrar.php"  class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Empleado</a> 
 </main>   


<!-- PHP CODIGO  --> 
<?php
// Delete User Account

if(isset($_GET['delete_user'])){
  $delete_user = mysqli_query($conexion,"delete from usuarios where user_id='$_GET[delete_user]' ");
  
  if($delete_user){
  // echo "<script>alert('Cuenta eliminada correctamente!')</script>";
  
  echo "<script>window.open('index.php?action=view_users','_self')</script>";
   
    }
  }





// Remove items selected using foreach loop
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];
  
  foreach($remove as $key){
  $run_remove = mysqli_query($conexion,"delete from usuarios where user_id='$key'");
  
  if($run_remove){
  echo "<script>alert('Los items seleccionados fueron eliminado correctamente!')</script>";
  
  echo "<script>window.open('index.php?action=view_users','_self')</script>";
  }else{
  echo "<script>alert('Mysqli Failed: mysqli_error($conexion)!')</script>";
  }
  }
}
 ?>


<?php } ?>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

    