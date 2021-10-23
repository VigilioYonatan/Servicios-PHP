<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 9 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus"></i> AGREGAR PROOVEDOR</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item "><a href="index.php?action=view_clientes">Lista de Clientes</a></li>
          <li class="breadcrumb-item active">Agregar</li>
        </ul>
      </div>
      <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <form action="" method="POST" accept-charset="utf-8">
                  <div class="form-group">
                    <label for="exampleInputEmail1">RUC:</label>
                       <input class="form-control" type="text"name="ruc" placeholder="Ingrese ruc" required >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Direccion:</label>
                       <input class="form-control" type="text"name="direccion" placeholder="Ingrese direccion"required >
                  </div><div class="form-group">
                    <label for="exampleInputEmail1">Celular 1:</label>
                       <input class="form-control" type="text"name="celular1" placeholder="Ingrese celular"required >
                  </div><div class="form-group">
                    <label for="exampleInputEmail1">Email 1:</label>
                       <input class="form-control" type="email"name="email1" placeholder="Ingrese email" required >
                  </div><div class="form-group">
                    <label for="exampleInputEmail1">Pagina web:</label>
                       <input class="form-control" type="text"name="pagina" required placeholder="Escriba su pagina">
                  </div>
       
                  <div class="form-group">
                    <label for="exampleInputEmail1">Estado:</label>
                    <select class="form-control" name="estado" id="moneda">
                      <option value="null">Selecciona un tipo de estado</option>
                      <?php
                      $get_estado = "select * from cliente_estado ";
                      $get_estado2 = mysqli_query($conexion,$get_estado);
                      while ($row_a = mysqli_fetch_array($get_estado2)){
                        $asignados = $row_a['nombre_estado'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                    </select>
                  </div>

                  <div class="tile-footer">
              
            </div>
              </div>

              <div class="col-lg-4 offset-lg-1">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Razon Social:</label>
                       <input class="form-control" type="text"  name="razon" required placeholder="Ingrese su razon social">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contacto:</label>
                       <input class="form-control" type="text"  name="contacto" required placeholder="Ingrese el contacto">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Celular 2:</label>
                       <input class="form-control" type="text"  name="celular2" placeholder="celular 2" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email 2:</label>
                       <input class="form-control" type="email"  name="email2" placeholder="email"  required >
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Area:</label>
                  <select class="form-control" name="area" id="entrega" required>
                    
                    <?php
                      $rol2 = 5 ;

                      $get_asignado = "select * from cliente_area";
                      $get_asignado2 = mysqli_query($conexion,$get_asignado);
                      while ($row_a = mysqli_fetch_array($get_asignado2)){
                        $asignados = $row_a['area_nombre'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Asignado:</label>
                    <select class="form-control" name="asignado" id="entrega" required>
                      <option value="<?php echo $_SESSION['name']; ?>"><?php echo $_SESSION['name']; ?></option>
                      <?php
                      $rol2 = 5 ;

                      $get_asignado = "select * from usuarios where user_rol = '$rol2'";
                      $get_asignado2 = mysqli_query($conexion,$get_asignado);
                      while ($row_a = mysqli_fetch_array($get_asignado2)){
                        $asignados = $row_a['user_nombre'];
                        echo "<option value='$asignados'>$asignados</option>";
                      }

                      ?>
                    </select>
                  </div>
                  

                  <div class="tile-footer">
              <button class="btn btn-primary" name="agregarPRO"type="submit">Guardar  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
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
if(isset($_POST['agregarPRO'])){
    $ruc = $_POST['ruc'];
    $razon = $_POST['razon'];
    $direccion = $_POST['direccion'];
    $contacto = $_POST['contacto'];
    $celular1 = $_POST['celular1'];
    $celular2 = $_POST['celular2'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $web = $_POST['pagina'];
    $area = $_POST['area'];
    $estado = $_POST['estado'];
    $asignado= $_POST['asignado'];
    $all_cot = mysqli_query($conexion,"select * from proveedores");
    while($row=mysqli_fetch_array($all_cot)){
      
      $codRo = $row['cod_proovedor'];
      $codRo2 = str_replace('PRO-','',$codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'PRO-';
      $cot_cod = $ser.$codRo3 ;
    }
    
    $addServ = mysqli_query($conexion, "insert into proveedores(cod_proovedor,ruc_proovedor,razon_proovedor,direccion_proovedor,contacto_proovedor,celular1_proovedor,celular2_proovedor,email1_proovedor,email2_proovedor,web_proovedor,area_proovedor,estado_proovedor,asignado_proovedor) values('$cot_cod','$ruc','$razon','$direccion','$contacto','$celular1','$celular2','$email1','$email2','$web','$area','$estado','$asignado')");

    if($addServ){
        echo "<script>alert('Agregado correctamente proovedor $ruc ')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>alert('No se agrego correctamente')</script>";
    }
    
}
?>
<?php } ?>