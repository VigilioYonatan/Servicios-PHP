
<?php
 
require_once('../../../../vendor/autoload.php');

$css = file_get_contents('cssPlantilla/pdf.css');

$mpdf = new \Mpdf\Mpdf([
]);

$cod=$_GET["id"];

$conexion = new mysqli("localhost","root","","outsourcing");
$conexion->set_charset('utf8');

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml(getPlantilla($cod, $conexion), \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();



function getPlantilla($cod,$conexion){

$plantilla = '
        <div class="row"  style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">';       
$edit_cat = mysqli_query($conexion, "select * from cotizacion where cot_codigo='$cod'");

$fetch_cat = mysqli_fetch_array($edit_cat);
          
$plantilla .=         
          '<section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Outsourcing</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right colorText">Date: <b class="text-dark">'
                  .$fetch_cat['cot_fecha'].
                  '</b></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">
                  <h4 class="a">Codigo: <b class="text-dark">'
                  .$fetch_cat['cot_codigo'].
                  '</b></h4>
                  <h5 class="colorText">Cliente: <b class="text-dark">'
                  .$fetch_cat['cot_cliente'].
                  '</b></h5>
                  <h6 class="colorText">Tipo de Estado: <b class="text-dark">'
                  .$fetch_cat['cot_estado'].
                  '</b></h6>
                </div>
                <div class="col-4">
                 <h5 class="colorText">Asignado: <b class="text-dark">'
                 .$fetch_cat['cot_asignado'].
                 '</b></h5>
                 <h6 class="colorText">Tipo de Pago: <b class="text-dark">'
                 .$fetch_cat['cot_pago'].
                 '</b></h6>
                 <h6 class="colorText">Tipo de Moneda: <b class="text-dark">'
                 .$fetch_cat['cot_moneda'].
                 '</b></h6>
               </div>
               <div class="col-4">
                <h6 class="colorText">Entrega: <b class="text-dark">'
                .$fetch_cat['cot_entrega'].
                '</b></h6>
                <h6 class="colorText">Expira: <b class="text-dark">'
                .$fetch_cat['cot_expira'].
                '</b></h6>
              </div>
              </div>
              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Servicio</th>
                        <th>Nota</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Precio Neto</th>
                      </tr>
                    </thead>';
                    
$i = 1;
$edit_cat2 = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$cod'");
                      
while($row = mysqli_fetch_array($edit_cat2)){
$cantidad =$row['cantidad_cot'];
$edit_cat3 = mysqli_query($conexion, "select * from cotizacion_servicio2 where cantidad_cot2='$cantidad' and cod_cot2='$cod'");
$row2 = mysqli_fetch_array($edit_cat3);

$plantilla.=
                    
                    '<tbody>
                      <tr>
                        <td>' 
                        .$i.
                        '</td>
                        <td>'
                        .$row['nombre_cot']. 
                        '</td>
                        <td>'
                        .$row['nota_cot'].
                        '</td>
                        <td>' 
                        .$row['cantidad_cot'].
                        '</td>
                        <td>'
                        .$row['precio_cot'].
                        '</td>
                        <td>'
                        .$row2['total_cot2'].
                        '</td>
                        <td>'
                        .$row2['total_cot2'].
                        '</td>
                        
                      </tr>
                    </tbody>';
$i++; }
                  
$plantilla .=
                '</table>';
                  
                  
//$edit_cat3 = mysqli_query($conexion, "select * from cotizacion_servicio2 where cantidad_cot2=\'$cantidad\' and cod_cot2=\'$cod\'");
 //   $row3 =mysqli_fetch_array($edit_cat3) 
                     
$edit_cat2 = mysqli_query($conexion, "select * from cotizacion_servicio where cod_cot='$cod'");
                      
$row = mysqli_fetch_array($edit_cat2);
$cantidad =$row['cantidad_cot'];
$edit_cat31 = mysqli_query($conexion, "select * from cotizacion_servicio2 where cantidad_cot2='$cantidad' and cod_cot2='$cod'");
 $row6 = mysqli_fetch_array($edit_cat31); 
                        
$plantilla .=    
                        
                        '<label class="text-right colorText">Subtotal: <b class="text-dark">' 
                        .$row2['subtotal_cot2'].
                        '</b></label><br>
                        <label class="text-right colorText">IGV: <b class="text-dark">' 
                        .$row2['IGV_cot2'].
                        '</b></label><br>
                        <label class="text-right colorText">TOTAL: <b class="text-dark">' 
                        .$row2['totalall_cot2'].
                        '</b></label>
               
                </div>
              </div>
                        <hr>
              <div class="row invoice-info">
                <div class="col-6">
                  <h5 class="colorText">Dirección: <b '
                  .$fetch_cat['cot_direccion'].
                  '></b></h5>
                </div>
                <div class="col-11">
                  <h5 class="colorText">Condiciones: <br></h5>
                   <h6>'
                   .$fetch_cat['cot_condicion'].
                   '</h6>
                </div>
                <div class="col-8">
                  <h6 class="colorText"><b class="text-dark">'
                 .$fetch_cat['cot_pie'].
                  '</b</h6>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
      ';

        return $plantilla;
        
    }
?>
