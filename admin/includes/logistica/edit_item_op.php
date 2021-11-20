<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {


    echo "<script>alert('No puedes acceder acá ')</script>";
    echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else {
?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> EDITAR ITEM </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="index.php?action=ordenes_trabajo">Lista de iTEM</a></li>
                <li class="breadcrumb-item active">Orden ITEM</li>

            </ul>
        </div>
        <?php
        $edit_cat = mysqli_query($conexion, "select * from compra_servicio where compra_op='$_GET[cod_op]' and compra_id='$_GET[id]'");

        $fetch_cat = mysqli_fetch_array($edit_cat);

        ?>
        <div class="row" style="font-size: 15px;">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-1">
                            <form action="" method="POST" accept-charset="utf-8">
                                <h3 style="color:#dc3545; "><b><?php echo $fetch_cat['compra_op']; ?></b></h3>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">NOTA:</label>
                                    <input type="text" class="form-control" value="<?php echo $fetch_cat['compra_nota']; ?>" disabled>

                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">VENDEDOR:</label>
                                        <input type="text" class="form-control" value="<?php echo $fetch_cat['compra_asignado']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">PROVEEDOR:</label>
                                        <input class="form-control rounded " name="item_prov" id="proveedor" value="<?php echo $fetch_cat['compra_proveedor']; ?>" placeholder="Técnico" >

                                    </div>
                                    <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
                                        <div class="list-group" id="show-list">
                                            <!-- autocompletado aqui -->
                                        </div>
                                    </div>
                                    <label for="exampleInputEmail1">COSTO:</label>
                                    <input type="text" class="form-control" name="item_costo" value="<?php echo $fetch_cat['compra_costo']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RESPONSABLE:</label>
                                    <input type="text" class="form-control" value="<?php echo $fetch_cat['compra_responsable']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">OCP:</label>
                                    <input type="text" class="form-control" name="item_ocp" value="<?php echo $fetch_cat['compra_ocp']; ?>" disabled>
                                </div>
                        </div>
                        <div class="col-lg-4 offset-lg-1"><br><br>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ITEM:</label>
                                    <input class="form-control" type="text" disabled value="<?php echo  $fetch_cat['compra_item']; ?>" size="30" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CANTIDAD:</label>
                                    <input class="form-control" type="text" value="<?php echo $fetch_cat['compra_cantidad']; ?>" size="30" disabled>
                                </div>
                                <label for="exampleInputEmail1">MONEDA:</label><br>
                                <input class="form-control" type="text" value="<?php echo $fetch_cat['compra_moneda']; ?>" size="30" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">COT PROVEEDOR:</label>
                                <input type="text" class="form-control" name="item_cot_prov" value="<?php echo $fetch_cat['compra_cot_prov']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">TIEMPO DE ENTREGA:</label>
                                <input type="text" class="form-control" value="<?php echo $fetch_cat['compra_entrega']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="edita_item" value="EDITAR ITEM">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <?php
    if (isset($_POST['edita_item'])) {
        $item_prov = $_POST['item_prov'];
        $item_costo = $_POST['item_costo'];
        $item_moneda = $_POST['item_moneda'];
        $item_cot_prov = $_POST['item_cot_prov'];
        $item_op = $_GET['cod_op'];
        $item_ocp = $_GET['item_ocp'];
        $item_id = $_GET['id'];

        $upd_item = mysqli_query($conexion, "update compra_servicio set compra_moneda='$item_moneda', compra_proveedor='$item_prov',compra_costo='$item_costo ',compra_cot_prov='$item_cot_prov',compra_ocp ='$item_ocp' where compra_id='$item_id' and compra_op='$item_op'");
        if ($upd_item) {
            echo "<script>alert('Item Actualizado Correctamente')</script>";
            echo "<script>window.open('index.php?action=view_Items','_self')</script>";
        }
    }

    ?>
    <!--   BUSCAR RESPONSABLE -->
    <script type="text/javascript">
        $(document).ready(function() {
            // Send Search Text to the server
            $("#proveedor").keyup(function() {
                let searchText = $(this).val();
                if (searchText != "") {
                    $.ajax({
                        url: "js/autocompletado/searchproveedor.php",
                        method: "post",
                        data: {
                            query: searchText,
                        },
                        success: function(response) {
                            $("#show-list").html(response);
                        },
                    });
                } else {
                    $("#show-list").html("");
                }
            });
            // Set searched text in input field on click of search button
            $(document).on("click", "a", function() {
                $("#proveedor").val($(this).text());
                $("#show-list").html("");
            });
        });
    </script>



<?php } ?>