<?php include('cabeza.php'); ?>
<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5){
  echo "<script>alert('No sos de servicios')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}else{
  ?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-handshake-o"></i> SERVICIOS</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item active"><a href="index.php?action=view_serv">Lista de Servicios</a></li>

        </ul>
    </div>
    <form action="buscador_serv.php" method="get">
          <label>Buscar: </label>
          <input type="text" id="buscar_coti"name="buscador">
          <input type="submit" name="buscar_serv"  class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;">
        </form>
    <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="table-responsive">

                            <table class="table table-hover table-bordered">
                                <thead align="center">
                                    <tr>

                                        <th>Codigo </th>
                                        <th>Nombre </th>
                                        <th>Disponibles</th>
                                        <th>Precio</th>
                                        <th>Categoria </th>
                                        <th>Estado </th>
                                        <th>Proovedor</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <?php
                                if (isset($_GET['buscar_serv'])) {

                                    $search_query = $_GET['buscador'];
                                    $i = 1;

                                    $run_query_by_pro_id = mysqli_query($conexion, "select * from servicios where servicio_nombre like '%$search_query%' ");

                                    if ($run_query_by_pro_id) {

                                        while ($row_pro = $run_query_by_pro_id->fetch_array()) {

                                            $pro_id = $row_pro['servicio_id'];
                                            $pro_cod = $row_pro['servicio_cod'];
                                            $pro_nombre = $row_pro['servicio_nombre'];
                                            $pro_disp  = $row_pro['servicio_disponibles'];
                                            $pro_precio = $row_pro['servicio_pventa'];
                                            $pro_cat = $row_pro['servicio_categoria'];
                                            $pro_estado = $row_pro['servicio_estado'];
                                            $pro_provee = $row_pro['servicio_proveedor'];
                                            $pro_foto = $row_pro['servicio_foto'];


                                            echo "
                                <tr align='center'>
                                        <td><a href='index.php?action=view_serv_id&servicio_codigo=$pro_cod'style='color:#dc3545;'>$pro_cod</a> </td>
                                        <td>$pro_nombre</td>
                                        <td><img style='object-fit: cover;' src='servicios_fotos/$pro_foto ' width='70' height='70' /></td>
                                        <td>$pro_disp Disponibles</td>
                                        <td>S/.$pro_precio</td>
                                        <td>$pro_cat</td>
                                        <td>$pro_estado</td>
                                        <td>$pro_provee</td>
                               
                                        <td class='delete'><a href='index.php?action=edit_serv&serv_id= $pro_id' ><i class='fa fa-pencil fa-2x' aria-hidden='true'></i></a></td>

                                        <td class='delete'><a href='index.php?action=view_serv&delete_serv=$pro_id' onclick='return confirm('Estas seguro de eliminar que quieres eliminar  esto?');'><i class='fa fa-trash fa-2x' aria-hidden='true'></i></a></td>
       
                                        ";
                                        }
                                    } else {
                                        echo "<script>alert('No sé encontro')</script>";
                                    }


                                ?>

                                    </tbody>
                                <?php $i++;
                                } // End while loop 
                                ?>
                            </table>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php?action=add_serv" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Servicio</a> 
 </main>   

 
<!-- PHP CODIGO  --> 
<?php
// Delete User cuenta

if(isset($_GET['delete_serv'])){
  $delete_serv = mysqli_query($conexion,"delete from servicios where servicio_id='$_GET[delete_serv]' ");
  
  if($delete_serv){
  
  echo "<script>window.open('index.php?action=view_serv','_self')</script>";
  
   
    }
  }





// Remove items selected using foreach loop
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];
  
  foreach($remove as $key){
  $run_remove = mysqli_query($conexion,"delete from servicios where servicio_id='$key'");
  
  if($run_remove){
  echo "<script>alert('Los items seleccionados fueron eliminado correctamente!')</script>";
  
  echo "<script>window.open('index.php?action=view_serv','_self')</script>";
  }else{
  echo "<script>alert('Mysqli Failed: mysqli_error($conexion)!')</script>";
  }
  }
}
 ?>
                 
<?php } ?>
<?php include('pie.php'); ?>