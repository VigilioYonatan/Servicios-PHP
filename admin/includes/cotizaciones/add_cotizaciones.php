<?php if($_SESSION['role'] != 2 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
<h2>Agregar cotizaciones</h2>
<form action="" method="POST">
    <label>Cliente:</label>
    <input type="text">
    <label>Estado:</label>
    <select name="estado" id="">
        <option >Selecciona un estado</option>
    <?php
        $get_cats = "select * from venta_estado";

        $run_cats = mysqli_query($conexion, $get_cats);

        while ($row_cats = mysqli_fetch_array($run_cats)) {
            $estado_id = $row_cats['est_id'];
            $estado_nombre = $row_cats['est_nombre'];
                    
            echo "<option value='$estado_id'>$estado_nombre</option>";
        }
    ?>
    </select><br>
    <label>Asignado:</label>
    <input type="text" name="asigando">
    <label>Forma de pago</label>
    <select name="pago">
        <option >Selecciona un tipo pago</option>
    <?php
        $get_cats = "select * from venta_pago";

        $run_cats = mysqli_query($conexion, $get_cats);

        while ($row_cats = mysqli_fetch_array($run_cats)) {
            $pago_id = $row_cats['pago_id'];
            $pago_nombre = $row_cats['pago_nombre'];
                    
            echo "<option value='$pago_id'>$pago_nombre</option>";
        }
    ?>
    </select><br>
    <label>Moneda:</label>
    <select name="moneda">
        <option >Selecciona un tipo de moneda</option>
        <?php
        $get_cats = "select * from venta_moneda";

        $run_cats = mysqli_query($conexion, $get_cats);

        while ($row_cats = mysqli_fetch_array($run_cats)) {
            $moneda_id = $row_cats['moneda_id'];
            $moneda_nombre = $row_cats['moneda_nombre'];
                    
            echo "<option value='$moneda_id'>$moneda_nombre</option>";
        }
    ?>
    </select>
    <label>Tiempo de entrega: </label>
    <input type="number" name="tiempo"><br>
    <label>Expira: </label>
    <select name="expira" id="">
        <option >Selecciona el tiempo de expiracion</option>
    <?php
        $get_cats = "select * from venta_expira";

        $run_cats = mysqli_query($conexion, $get_cats);

        while ($row_cats = mysqli_fetch_array($run_cats)) {
            $expira_id = $row_cats['expira_id'];
            $expira_nombre = $row_cats['expira_nombre'];
                    
            echo "<option value='$expira_id'>$expira_nombre</option>";
        }
    ?>
    </select>
    <label>Dirección: </label>
    <input type="text" name="direccion"><br>
    <label>Condiciones generales: </label>
    <input type="text" name="condiciones">
    <label>Pie de paginas: </label>
    <input type="text" name="pie"><br>
    <input type="submit" name="agregarCot">
</form>

<?php } ?>