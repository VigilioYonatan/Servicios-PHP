<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
<h2>Agregar cotizaciones</h2>
<form action="" method="POST" accept-charset="utf-8">
    <label>Cliente:</label>
    <select name="cliente" id="" required>
    <option value="null">Selecciona un cliente</option>
    <?php
        $num = 17;
        $get_cats = "select * from usuarios where user_rol ='$num'";

        $run_cats = mysqli_query($conexion, $get_cats);

        while ($row_cats = mysqli_fetch_array($run_cats)) {

            $nom_cliente = $row_cats['user_nombre'];
                    
            echo "<option value='$nom_cliente'>$nom_cliente</option>";
        }
    ?>
    </select>
    <label>Estado:</label>
    <select name="estado" id="" required>
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
    </select><br>
    <label>Asignado:</label>
    <b><?php echo $_SESSION['name']; ?></b>
    <label>Forma de pago</label>
    <select name="pago" required>
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
    </select><br>
    <label>Moneda:</label>
    <select name="moneda"
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
    <label>Tiempo de entrega: </label>
    <select name="entrega" id="" required>
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
    </select><br>
    <label>Expira: </label>
    <select name="expira" id="" required>
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
    <label>Dirección: </label>
    <input type="text" name="direccion" required><br>
    <label>Condiciones generales: </label><br>
    <textarea name="condicion"  cols="35" rows="5">Cuenta corriente en Dolares         Bco. Scotiabank: 000-34533433
CCI DOLARES: 009-021-0000463603-77
Cuenta corriente en soles Bco.
 Scotiabank: 2824507
CCI Soles: 009-021-0000026452345-74</textarea><br>
    <label>Pie de paginas: </label><br>
    <textarea name="pie" cols="45" rows="5">Telef: 01-05440920 Celulares: 958529197
        958070350/945014170/976545807
        Correo: ventas@chromemetales.com/
        gerencia@chromemetales.com
        www.chrometales.com
    </textarea><br>
    <input type="submit" name="agregarCot" value="Agregar">
</form>

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
<?php } ?>