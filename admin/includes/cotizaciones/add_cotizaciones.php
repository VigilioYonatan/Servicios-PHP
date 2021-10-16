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
        <option >Selecciona uno</option>
        <option value="abierto">Abierto</option>
        <option value="pendiente">Pendiente</option>
        <option value="proceso">Proceso</option>
        <option value="cerrado">Cerrado</option>
    </select><br>
    <label>Asignado:</label>
    <input type="text" name="asigando">
    <label>Forma de pago</label>
    <select name="pago">
        <option >Selecciona un pago</option>
        <option value="efectivo">Efectivo</option>
        <option value="10">10 dias</option>
        <option value="15">15 dias</option>
        <option value="20">20 dias</option>
    </select><br>
    <label>Moneda:</label>
    <select name="moneda">
        <option >Selecciona un pago</option>
        <option>Efectivo</option>
        <option value="soles">Soles</option>
        <option value="dolares">Dolares</option>
        <option value="euros">Euros</option>
    </select>
    <label>Tiempo de entrega: </label>
    <input type="number" name="tiempo"><br>
    <label>Expira: </label>
    <input type="number" name="expira">
    <label>Dirección: </label>
    <input type="text" name="direccion"><br>
    <label>Condiciones generales: </label>
    <input type="text" name="condiciones">
    <label>Pie de paginas: </label>
    <input type="text" name="pie"><br>
    <input type="submit" name="agregarCot">
</form>

<?php } ?>