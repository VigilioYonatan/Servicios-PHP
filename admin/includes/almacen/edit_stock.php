<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {


    echo "<script>alert('No puedes acceder acá ')</script>";
    echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else { ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text"></i> <i class="fa fa-plus"></i>REGISTRO DE SALIDA</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item "><a href="index.php?action=view_cotizacion">Lista de STOCK</a></li>
                <li class="breadcrumb-item active">REGISTRO DE SALIDA</li>
            </ul>
        </div>
        <div class="row" style="font-size: 15px;">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-1">
                            <form action="" method="POST" accept-charset="utf-8">
                                <?php 
                                    $salida = mysqli_query($conexion, "select * from ingresos_salida where codigo_salida ='$_GET[stock_cod]'");
                                    $row_salida = mysqli_fetch_array($salida);
                                ?>
                                <div class="form-group">

                                    <label for="exampleInputEmail1">S/N:</label>
                                    <input type="text" class="form-control" value="<?php echo $row_salida['cod_salida'] ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">MODELO:</label>
                                    <input type="text" class="form-control" value="<?php echo $row_salida['modelo_salida'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">P.COSTO:</label>
                                    <input type="text" class="form-control" value="<?php echo $row_salida['pcosto_salida'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">UNIDAD MEDIDA:</label>
                                    <input type="text" class="form-control" value="<?php echo $row_salida['umedida_salida'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">DESCRIPCION:</label><br>
                                    <textarea class="form-control" cols="80" rows="5" disabled><?php echo $row_salida['descripcion_salida'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ALMACEN:</label>
                                    <input type="text" class="form-control" value="<?php echo $row_salida['almacen_salida'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">MONEDA:</label>
                                    <input type="text" class="form-control" value="<?php echo $row_salida['moneda_salida'] ?>" disabled>
                                </div>
                               
                                
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">GUIA DE SALIDA:</label>
                                    <input type="text" class="form-control" value="<?php echo $row_salida['guia_salida'] ?>" name="salida_guia" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">OCC:</label>
                                    <input type="text" class="form-control"  name="salida_occ" value="<?php echo $row_salida['occ_salida'] ?>" placeholder="OCC" required>

                                </div>


                                <div class="tile-footer">
                                    <button class="btn btn-primary" name="salida_upd" type="submit">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                </div>

                        </div>

                        <div class="col-lg-4 offset-lg-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">RESPONSABLE:</label><br>
                                <input type="text" class="form-control" name="salida_responsable" id="tag" placeholder="Responsable" value="<?php echo $row_salida['responsable_salida'] ?>" required>
                            </div>
                            <div class="col-md-5" style="position: relative;margin-top: -15px; margin-left:-15px;">
                                <div class="list-group" id="show-list">
                                <!-- autocompletado aqui -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NOMBRE/ITEM:</label><br>
                                <input type="text" class="form-control" value="<?php echo $row_salida['nombre_salida'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">FABRICANTE:</label>
                                <input type="text" class="form-control" value="<?php echo $row_salida['fabricante_salida'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">CATEGORIA:</label>
                                <input type="text" class="form-control" value="<?php echo $row_salida['categoria_salida'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">LOTE:</label>
                                <input type="text" class="form-control" value="<?php echo $row_salida['lote_salida'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">UNIDADES:</label>
                                <input type="number" class="form-control" name="salida_unidad" required>
                            </div>
                         
                            <div class="form-group">
                                <label for="exampleInputEmail1">VENDEDOR:</label> 
                                <input type="text" class="form-control" name="salida_vendedor" value="<?php echo $row_salida['vendedor_salida'] ?>" placeholder="vendedor" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">RAZON SOCIAL:</label>
                                <input type="text" class="form-control"  value="<?php echo $row_salida['razon_salida'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">RUC PROVEEDOR:</label> 
                                    <input type="text" class="form-control" value="<?php echo $row_salida['ruc_prov_salida'] ?>" disabled>
                                </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">COT:</label>
                                <input type="text" class="form-control" name="salida_cot" value="<?php echo $row_salida['cot_salida'] ?>" placeholder="COT">
                            </div>



                        </div>
                        </form>
                    </div>

                </div>



    </main>
    <!-- PHP CODIGO  -->
    <?php
    if (isset($_POST['salida_upd'])) {
        $salida_guia = $_POST['salida_guia'];
        $salida_occ = $_POST['salida_occ'];
        $salida_responsable = $_POST['salida_responsable'];
        $salida_vendedor = $_POST['salida_vendedor'];
        $salida_cot = $_POST['salida_cot'];
        $unidad  = $row_salida['unidades_salida'];
        $salida_unidad = $unidad - $_POST['salida_unidad'] ;

       
        $upd_salida = mysqli_query($conexion, "update ingresos_salida set unidades_salida='$salida_unidad',guia_salida='$salida_guia',responsable_salida='$salida_responsable',vendedor_salida='$salida_vendedor',occ_salida='$salida_occ',cot_salida='$salida_cot' where codigo_salida='$_GET[stock_cod]'");

        if ($upd_salida) {
            echo "<script>alert('Cambios correctamente')</script>";
            echo "<script>window.open('index.php?action=view_stock','_self')</script>";
        } else {
            echo "<script>alert('No se agrego correctamente')</script>";
        }
    }
    ?>
    
    <script>

    // responsable
    $(document).ready(function() {
      // Send Search Text to the server
      $("#tag").keyup(function() {
        let searchText = $(this).val();
        if (searchText != "") {
          $.ajax({
            url: "js/autocompletado/consultaStock.php",
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
        $("#tag").val($(this).text());
        $("#show-list").html("");
      });
    });

  </script>
<script>
        $('.typeahead').typeahead({
            hint: true,
            highlight: true
        },{
            name: 'datos',
            limit: 2,
            source: function(query, sync, async) {
                $.getJSON('js/autocompletado/consultaStock2.php', {query},
                    function(data) {
                        async(data);
                    }
                );
            },
            display: function(item) {
                return item.user_nombre;
            }
        });

    </script>

<?php } ?>