<link href="styles/main.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 17 and $_SESSION['role'] != 5) {


    echo "<script>alert('No puedes acceder acá ')</script>";
    echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else { ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text"></i> <i class="fa fa-plus"></i>REGISTRO DE INGRESOS</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item "><a href="index.php?action=view_cotizacion">Lista de ingresos</a></li>
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

                                    <label for="exampleInputEmail1">S/N:</label>
                                    <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="Serial" name="ing_cod" onkeyup="GetDetail(this.value)" id="rollNo" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">MODELO:</label>
                                    <select class="form-control" name="ing_modelo" id="">
                                        <?php
                                        $modelo = mysqli_query($conexion, "select * from ingresos_modelo");
                                        while ($row_modelo = mysqli_fetch_array($modelo)) {
                                            $nombre_modelo = $row_modelo['nombre_ingresos'];

                                            echo "<option value='$nombre_modelo'>$nombre_modelo</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">P.COSTO:</label>
                                    <input type="number" class="form-control" name="ing_costo" placeholder="P.COSTO">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">UNIDAD MEDIDA:</label>
                                    <select name="ing_um" id="" class="form-control">
                                        <?php
                                        $um = mysqli_query($conexion, "select * from ingresos_um");
                                        while ($row_um = mysqli_fetch_array($um)) {
                                            $nombre_um = $row_um['nombre_ingresos'];

                                            echo "<option value='$nombre_um'>$nombre_um</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">DESCRIPCION:</label><br>
                                    <textarea class="form-control" name="ing_descripcion" id="" cols="80" rows="5" required></textarea>
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">RUC PROVEEDOR:</label> <!-- typehead.js -->
                                    <input class="typeahead form-control" type="text" name="ing_ruc_prov" placeholder="RUC PROVEEDOR" required>
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">GUIA DE INGRESO:</label>
                                    <input type="text" class="form-control" name="ing_guia" placeholder="GUIA" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">OCP:</label>
                                    <input type="text" class="form-control" name="ing_ocp" placeholder="OCP" required>

                                </div>


                                <div class="tile-footer">
                                    <button class="btn btn-primary" name="agregarIng" type="submit">Guardar <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                </div>

                        </div>

                        <div class="col-lg-4 offset-lg-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NOMBRE/ITEM:</label><br>
                                <input class="form-control" type="text" name="ing_nombre" placeholder="Nombre de item">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">FABRICANTE:</label>
                                <select class="form-control" name="ing_fabricante" id="">
                                    <?php
                                    $fabricante = mysqli_query($conexion, "select * from ingresos_fabricante");
                                    while ($row_fabricante = mysqli_fetch_array($fabricante)) {
                                        $nombre_fabricante = $row_fabricante['nombre_ingresos'];

                                        echo "<option value='$nombre_fabricante'>$nombre_fabricante</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">CATEGORIA:</label>
                                <select class="form-control" name="ing_categoria" id="">
                                    <?php
                                    $categoria = mysqli_query($conexion, "select * from ingresos_categorias");
                                    while ($row_categoria = mysqli_fetch_array($categoria)) {
                                        $nombre_categoria = $row_categoria['nombre_ingresos'];

                                        echo "<option value='$nombre_categoria'>$nombre_categoria</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">LOTE:</label>
                                <select class="form-control" name="ing_lote" id="">
                                    <?php
                                    $lote = mysqli_query($conexion, "select * from ingresos_lote");
                                    while ($row_lote = mysqli_fetch_array($lote)) {
                                        $nombre_lote = $row_lote['nombre_ingresos'];

                                        echo "<option value='$nombre_lote'>$nombre_lote</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">UNIDADES:</label>
                                <input type="text" class="form-control" name="ing_unidades" placeholder="UNIDADES">
                            </div>
                         
                            <div class="form-group">
                                <label for="exampleInputEmail1">RAZON SOCIAL:</label> <!-- typehead.js -->
                                <input type="text" class="form-control" name="ing_razon" placeholder="RAZON SOCIAL" id="codPersona">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ALMACEN:</label>
                                <select name="ing_almacen" id="" class="form-control">
                                    <?php
                                    $almacen = mysqli_query($conexion, "select * from ingresos_almacen");
                                    while ($row_almacen = mysqli_fetch_array($almacen)) {
                                        $nombre_almacen = $row_almacen['nombre_ingresos'];

                                        echo "<option value='$nombre_almacen'>$nombre_almacen</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">OP:</label>
                                <input type="text" class="form-control" name="ing_op" placeholder="OP">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">MONEDA:</label>
                                <select name="ing_moneda" id="" class="form-control">
                                    <?php
                                    $moneda = mysqli_query($conexion, "select * from cotizacion_moneda");
                                    while ($row_moneda = mysqli_fetch_array($moneda)) {
                                        $nombre_moneda = $row_moneda['cotizacion_nombre'];

                                        echo "<option value='$nombre_moneda'>$nombre_moneda</option>";
                                    }
                                    ?>
                                </select>
                            </div>



                        </div>
                        </form>
                    </div>

                </div>



    </main>
    <!-- PHP CODIGO  -->
    <?php
    if (isset($_POST['agregarIng'])) {
        $ing_cod = $_POST['ing_cod'];
        $ing_nombre = $_POST['ing_nombre'];
        $ing_fabricante = $_POST['ing_fabricante'];
        $ing_modelo = $_POST['ing_modelo'];
        $ing_categoria = $_POST['ing_categoria'];
        $ing_costo = $_POST['ing_costo'];
        $ing_um = $_POST['ing_um'];
        $ing_ruc_prov = $_POST['ing_ruc_prov'];
        $ing_guia = $_POST['ing_guia'];
        $ing_ocp = $_POST['ing_ocp'];
        $ing_lote = $_POST['ing_lote'];
        $ing_unidades = $_POST['ing_unidades'];
        $ing_razon = $_POST['ing_razon'];
        $ing_almacen = $_POST['ing_almacen'];
        $ing_op = $_POST['ing_op'];
        $ing_moneda = $_POST['ing_moneda'];
        $ing_descripcion = trim(mysqli_real_escape_string($conexion, $_POST['ing_descripcion']));


        $all_cot = mysqli_query($conexion, "select * from ingresos");
        while ($row = mysqli_fetch_array($all_cot)) {

            $codRo = $row['codigo_ingresos'];
            $codRo2 = str_replace('ALM-', '', $codRo);
            $codRo3 = (int)$codRo2 + 1;
            $ser = 'ALM-';
            $ing_codigo = $ser . $codRo3;
        }

        $addIng = mysqli_query($conexion, "insert into ingresos(codigo_ingresos,cod_ingresos,nombre_ingresos,fabricante_ingresos,modelo_ingresos,categoria_ingresos,pcosto_ingresos,lote_ingresos,umedida_ingresos,unidades_ingresos,descripcion_ingresos,rucprov_ingresos,razon_ingresos,guia_ingresos,almacen_ingresos,ocp_ingresos,op_ingresos,moneda_ingresos) values('$ing_codigo','$ing_cod','$ing_nombre','$ing_fabricante','$ing_modelo','$ing_categoria','$ing_costo','$ing_lote','$ing_um','$ing_unidades','$ing_descripcion','$ing_ruc_prov','$ing_razon','$ing_guia','$ing_almacen','$ing_ocp','$ing_op','$ing_moneda')");
        $addIng2 = mysqli_query($conexion, "insert into ingresos_salida(codigo_salida,cod_salida,nombre_salida,fabricante_salida,modelo_salida,categoria_salida,pcosto_salida,lote_salida,umedida_salida,unidades_salida,descripcion_salida,ruc_prov_salida,razon_salida,guia_salida,almacen_salida,ocp_salida,op_salida,moneda_salida) values('$ing_codigo','$ing_cod','$ing_nombre','$ing_fabricante','$ing_modelo','$ing_categoria','$ing_costo','$ing_lote','$ing_um','$ing_unidades','$ing_descripcion','$ing_ruc_prov','$ing_razon','$ing_guia','$ing_almacen','$ing_ocp','$ing_op','$ing_moneda')");

        if ($addIng2) {
            echo "<script>alert('agregado ingreso correctamente')</script>";
            echo "<script>window.open('index.php?action=view_ingresos','_self')</script>";
        } else {
            echo "<script>alert('No se agrego correctamente')</script>";
        }
    }
    ?>
    
    
    

    <script>
        $('.typeahead').typeahead({
            hint: true,
            highlight: true
        },{
            name: 'datos',
            limit: 2,
            source: function(query, sync, async) {
                $.getJSON('js/autosearch/consulta.php', {query},
                    function(data) {
                        async(data);
                    }
                );
            },
            display: function(item) {
                return item.ruc_proovedor;
            }
        });

        $('.typeahead').on('typeahead:selected', function(e, dato) {
            $('#codPersona').val(dato.razon_proovedor);
        })
    </script>

<?php } ?>