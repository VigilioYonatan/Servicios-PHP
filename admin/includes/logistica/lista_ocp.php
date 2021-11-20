<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 5) {
    echo "<script>alert('No eres de este role ')</script>";
    echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else {
?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-handshake-o"></i> LISTA DE ITEMS</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="index.php?action=view_cotizacion">Lista de Cotizaciones</a></li>
                <li class="breadcrumb-item active">Servicios</li>

            </ul>
        </div>
        <div class="row" style="font-size: 15px;">
            <div class="col-4">
                <h4 style="color:#dc3545;"><?php echo $_GET['ocp_cod']; ?></h4>
            </div>
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead align="center">
                                        <tr>

                                            <th>ID</th>
                                            <th>CODIGO</th>
                                            <th>ITEM</th>
                                            <th>NOTA</th>
                                            <th>CANTIDAD</th>
                                            <th>Añadir ITEM</th>
                                        </tr>
                                    </thead> 
                                    <?php
                                    $codigo = $_GET['ocp_cod'];
                                    $get_pro = "select * from compra_servicio where compra_añadido != 1";

                                    $i = 1;
                                    $run_pro = mysqli_query($conexion, $get_pro);

                                    while ($row_pro = mysqli_fetch_array($run_pro)) {
                                        $row_id = $row_pro['compra_id'];
                                    ?>
                                        <tbody align="center">
                                            
                                            <tr>

                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row_pro['compra_op']; ?></td>
                                                <td><?php echo $row_pro['compra_item']; ?></td>
                                                <td><?php echo $row_pro['compra_nota']; ?></td>
                                                <td><?php echo $row_pro['compra_cantidad']; ?></td>
                                                <td><a href="index.php?action=tabla_OCP&ocp_codigo=<?php echo $codigo; ?>&item_id=<?php echo $row_id; ?>"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a></td>


                                            </tr>

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

    </main>



<?php } ?>