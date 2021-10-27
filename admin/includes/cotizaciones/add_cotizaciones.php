
<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i> <i class="fa fa-plus"></i> AGREGAR COTIZACIONES</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item "><a href="index.php?action=view_cotizacion">Lista de Cotizaciones</a></li>
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
                    <label for="exampleInputEmail1">Cliente:</label>
                       <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="cliente" name="cliente" onkeyup="GetDetail(this.value)" id="rollNo">
                  </div>
                   <script type="text/javascript">
                      $(document).ready(function(){
                        $("#rollNo").typeahead({
                          source: function(query,resultado){
                            $.ajax({
                              url: "accion.php",
                              type: "POST",
                              dataType: "json",
                              data: {query: query},
                              success: function(data){
                                resultado($.map(data, function(item){
                                    return item;
                                }));
                              }
                            });
                          }
                        });
                      });
                   </script>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Estado:</label>
                    <select class="form-control"name="estado" id="estado" required>
                      <option value="null">Selecciona un estado</option>
                      <?php
                      $get_cats = "select * from venta_estado";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $estado_id = $row_cats['est_id'];
                        $estado_nombre = $row_cats['est_nombre'];

                        echo "<option value='$estado_nombre'>$estado_nombre</option>";
                      }
                      ?>
                    </select>
                  </div>
        
                  <div class="form-group">
                    <label for="exampleInputEmail1">Forma de pago:</label>
                    <select class="form-control" name="pago" id="pago" required>
                      <option value="null">Selecciona un tipo pago</option>
                      <?php
                      $get_cats = "select * from venta_pago";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $pago_id = $row_cats['pago_id'];
                        $pago_nombre = $row_cats['pago_nombre'];

                        echo "<option value='$pago_nombre'>$pago_nombre</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Moneda:</label>
                    <select class="form-control" name="moneda" id="moneda">
                      <option value="null">Selecciona un tipo de moneda</option>
                      <?php
                      $get_cats = "select * from venta_moneda";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $moneda_id = $row_cats['moneda_id'];
                        $moneda_nombre = $row_cats['moneda_nombre'];

                        echo "<option value='$moneda_nombre'>$moneda_nombre</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Condiciones Generales:</label>
                    <textarea class="form-control" id="exampleTextarea" rows="6"name="condicion"  cols="35">Cuenta corriente en Dolares         
Bco. Scotiabank: 000-34533433
CCI DOLARES: 009-021-0000463603-77
Cuenta corriente en soles Bco.
Scotiabank: 2824507
CCI Soles: 009-021-0000026452345-74</textarea>
                  </div>
                  <div class="tile-footer">
                  </div>

               
              </div>

              <div class="col-lg-4 offset-lg-1">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Asignado:</label>
                    <select class="form-control" name="asignado" id="">
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

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiempo de entrega:</label>
                    <select class="form-control" name="entrega" id="entrega" required>
                      <option value="null" >Selecciona el tiempo de entrega</option>
                      <?php
                      $get_cats = "select * from venta_entrega";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $entrega_id = $row_cats['entrega_id'];
                        $entrega_nombre = $row_cats['entrega_nombre'];

                        echo "<option value='$entrega_nombre'>$entrega_nombre</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Expira:</label>
                    <select class="form-control" name="expira" id="expira" required>
                      <option value="null">Selecciona el tiempo de expiracion</option>
                      <?php
                      $get_cats = "select * from venta_expira";

                      $run_cats = mysqli_query($conexion, $get_cats);

                      while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $expira_id = $row_cats['expira_id'];
                        $expira_nombre = $row_cats['expira_nombre'];

                        echo "<option value='$expira_nombre'>$expira_nombre</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Direccion:</label>
                       <input class="form-control" type="text"  name="direccion" id="studentName" placeholder="direccion" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Pie de paginas:</label>
                    <textarea class="form-control" id="exampleTextarea" name="pie" cols="45" rows="6">Telef: 01-05440920 
Celulares: 958529197
958070350/945014170/976545807
Correo: ventas@chromemetales.com/
gerencia@chromemetales.com
www.chrometales.com                      </textarea>
                  </div>

                  <div class="tile-footer">
              <button class="btn btn-primary" name="agregarCot"type="submit">Guardar  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
            </div>
                </form>
                </div>

            </div>

            <div>
              <button type="button" name="add" id="add" class="btn btn-success" style="margin-bottom: 20px;"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Agregar Servicio</button>
            </div>

        <div class="col-md-12">
          <div class="tile">
            <table class="table table-hover table-bordered" id="dynamic_field">
            <div class="table-responsive">
              
                <tr>
                  <th>Item</th><th>Cantidad</th><th>PrecioV</th><th>Total</th><th>PrecioN</th>
                </tr>
                <tr id="row'+i+'">
                  <td><input type="text" onkeyup="Getprecio(this.value)" id="rollNo2" name="name[]" placeholder="Escriba el servicio" class="form-control name_list" /></td>

                  <td><input type="number" name="name[]" placeholder="cantidad" id="cantserv" class="form-control name_list" /></td>

                  <td><input type="text" id="studentName2" class="form-control name_list"></td>
                  <td><b><input type="text" id="totalserv" class="form-control name_list"></b></td>
                  <td><b><?php echo $entrega_nombre;?></b></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>
                </tr>
</div>
              </table>

              
               <div class="col-lg-4 offset-lg-1">
              <div class="form-group row">
                  <label class="control-label col-md-3">Subtotal:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text">
                 </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">IGV:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text">
                 </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Total:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text">
                 </div>
                </div>   
       
      </div>

          </div>
        </div>
      </div>
    </main>
<!-- PHP CODIGO  -->
<?php
if(isset($_POST['agregarCot'])){
    $codigo = "zsds";
    $cliente = $_POST['cliente'];
    $asignado = $_SESSION['name'];
    $estado = $_POST['estado'];
    $pago = $_POST['pago'];
    $moneda = $_POST['moneda'];
    $entrega = $_POST['entrega'];
    $expira = $_POST['expira'];
    $direccion = $_POST['direccion'];
    $condicion = trim(mysqli_real_escape_string($conexion,$_POST['condicion']));
    $pie = trim(mysqli_real_escape_string($conexion, $_POST['pie']));
    $all_cot = mysqli_query($conexion,"select * from cotizacion");
    while($row=mysqli_fetch_array($all_cot)){
      
      $codRo = $row['cot_codigo'];
      $codRo2 = str_replace('COT-','',$codRo);
      $codRo3 = (int)$codRo2 + 1;
      $ser = 'COT-';
      $cot_cod = $ser.$codRo3 ;
    }

    $addServ = mysqli_query($conexion, "insert into cotizacion(cot_codigo,cot_cliente,cot_asignado,cot_estado,cot_pago,cot_moneda,cot_entrega,cot_expira,cot_direccion,cot_condicion,cot_pie) values('$cot_cod','$cliente','$asignado','$estado','$pago','$moneda','$entrega','$expira','$direccion','$condicion','$pie')");

    if($addServ){
        ?>
        <h2>Agregado Correctamente</h2>
        <?php 
    }else{
        echo "<script>alert('No se agrego correctamente')</script>";
    }
    
}
?>
<script>
        function GetDetail(str){
            if(str.length == 0){
                document.getElementById("studentName").value = "";
                return;
            }else{
                var xm1hhtp = new XMLHttpRequest();
                xm1hhtp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200 ){
                    var myObj = JSON.parse(this.responseText);
                    document.getElementById("studentName").value=myObj[0];
                }
                };
                xm1hhtp.open("GET", "search.php?rollNo="+str, true);
                xm1hhtp.send();
            }
        }
    </script>
<script>
$(document).ready(function(){
    var i=1;
    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" onkeyup="Getprecio(this.value)" id="rollNo2" name="name[]" placeholder="Escriba el servicio" class="form-control name_list" /></td><td><input type="number" name="name[]" placeholder="cantidad" id="cantserv" class="form-control name_list" /></td><td><input type="text" id="studentName2" class="form-control name_list"></td><td><b><input type="text" id="totalserv" class="form-control name_list"></b></td><td><b><?php echo $entrega_nombre;?></b></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });

    $('#submit').click(function(){
        $.ajax({
            url:"name.php",
            method:"POST",
            data:$('#add_name').serialize(),
            success:function(data)
            {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });

});
</script>
<script>
        function Getprecio(str){
            if(str.length == 0){
                document.getElementById("studentName2").value = "";
 
                return;
            }else{
                var xm1hhtp2 = new XMLHttpRequest();
                xm1hhtp2.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200 ){
                    var myObj2 = JSON.parse(this.responseText);
                    document.getElementById("studentName2").value=myObj2;

                }
                };
                xm1hhtp2.open("GET", "search2.php?rollNo2="+str, true);
                xm1hhtp2.send();
            }
        }
    </script>

<?php } ?>
