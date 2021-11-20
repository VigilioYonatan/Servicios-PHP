<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user-plus"></i> AGREGAR CLIENTE</h1>
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
                    <label for="exampleInputEmail1">DIRECCIÓN:</label>
                       <input class="form-control" type="text"name="direccion" placeholder="Ingrese direccion"required >
                  </div><div class="form-group">
                    <label for="exampleInputEmail1">CELULAR 1:</label>
                       <input class="form-control" type="text"name="celular1" placeholder="celular 2" required >
                  </div><div class="form-group">
                    <label for="exampleInputEmail1">EMAIL 1:</label>
                       <input class="form-control" type="email"name="email1" placeholder="example1@email.com" required >
                  </div><div class="form-group">
                    <label for="exampleInputEmail1">PAGINA WEB:</label>
                       <input class="form-control" type="text"name="pagina" required placeholder="www.example.com">
                  </div>
       
                  <div class="form-group">
                    <label for="exampleInputEmail1">ESTADO:</label>
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
              <button class="btn btn-primary" name="agregarCli"type="submit">Guardar  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
            </div>
              </div>

              <div class="col-lg-4 offset-lg-1">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">RAZON SOCIAL:</label>
                       <input class="form-control" type="text"  name="razon" required placeholder="Ingrese su razon social">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CONTACTO:</label>
                       <input class="form-control" type="text"  name="contacto" required placeholder="Ingrese el contacto">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CELULAR 2:</label>
                       <input class="form-control" type="text"  name="celular2" placeholder="celular 2" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">EMAIL 2:</label>
                       <input class="form-control" type="email"  name="email2" placeholder="example2@email.com" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">AREA:</label>
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
                    <label for="exampleInputEmail1">VENDEDOR:</label>
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
if(isset($_POST['agregarCli'])){
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
    $all_cot = mysqli_query($conexion,"select * from clientes");
    while($row=mysqli_fetch_array($all_cot)){
      
      $codRo = $row['cod_cliente'];
      $codRo2 = str_replace('CLI-','',$codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'CLI-';
      $cot_cod = $ser.$codRo3 ;
    }
    
    $addServ = mysqli_query($conexion, "insert into clientes(cod_cliente,ruc_cliente,razon_cliente,direccion_cliente,contacto_cliente,celular1_cliente,celular2_cliente,email1_cliente,email2_cliente,web_cliente,area_cliente,estado_cliente,asignado_cliente) values('$cot_cod','$ruc','$razon','$direccion','$contacto','$celular1','$celular2','$email1','$email2','$web','$area','$estado','$asignado')");

    if($addServ){
        echo "<script>alert('Agregado correctamente cliente $ruc ')</script>";
        echo "<script>window.open('index.php?action=view_clientes','_self')</script>";
    }else{
        echo "<script>alert('No se agrego correctamente')</script>";
    }
    
}
?>
<?php } ?>