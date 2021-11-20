<?php include('cabeza.php')?>
    <div class="content">
     <div class="content_box">
      
     <?php 
     if(isset($_GET['action'])){
      $action = $_GET['action'];
     }else{
      $action ='';
     }
     
     switch($action){
      
    
    case 'edit_serv';
    include 'includes/edit_serv.php';
    break;
    
    case 'view_serv';
    include 'includes/ver_serv.php';
    break;
    case 'view_serv_id';
    include 'includes/ver_serv_id.php';
    break;
    
    
    case 'add_serv';
    include 'includes/agregar_serv.php';
    break;

    case 'list_servicio';
    include 'includes/list_servicio.php';
    break;
    case 'lista_serv';
    include 'includes/lista_serv.php';
    break;

    case 'buscador_serv';
    include 'includes/buscador_serv.php';
    break;
    
    case 'edit_user';
    include 'includes/edit_usuarios.php';
    break;
    
    case 'view_users';
    include 'includes/ver_usuarios.php';
    break;

    
    case 'add_rol';
    include 'includes/agregar_rol.php';
    break;

    case 'edit_rol';
    include 'includes/edit_rol.php';
    break;

    case 'view_cotizacion';
    include 'includes/cotizaciones/ver_cotizaciones.php';
    break;

    case 'edit_cotizacion';
    include 'includes/cotizaciones/edit_cotizaciones.php';
    break;
    case 'edit_cotizacion2';
    include 'includes/cotizaciones/edit_cotizaciones2.php';
    break;

    case 'add_cotizacion';
    include 'includes/cotizaciones/add_cotizaciones.php';
    break;
    case 'tabla_id';
    include 'includes/cotizaciones/tabla_id.php';
    break;

    case 'view_cotizacion_id';
    include 'includes/cotizaciones/ver_cotizacione_id.php';
    break;

    case 'view_clientes';
    include 'includes/cotizaciones/ver_clientes.php';
    break;

    case 'view_cliente_id';
    include 'includes/cotizaciones/ver_clientes_id.php';
    break;

    case 'add_clientes';
    include 'includes/crud/add_clientes.php';
    break;

    case 'edit_clien';
    include 'includes/cotizaciones/edit_cliente.php';
    break;



    case 'lista_ocCliente';
    include 'includes/ventas/lista_ocCliente.php';
    break;
    
    case 'lista_ocClienteID';
    include 'includes/ventas/lista_ocClienteID.php';
    break;

    case 'edit_ocClienteID';
    include 'includes/ventas/edit_ocClienteID.php';
    break;

    case 'registrar_ocCliente';
    include 'includes/cotizaciones/registrar_ocCliente.php';
    break;

    case 'add_proovedor';
    include 'includes/crud/add_pro.php';
    break;

    case 'view_proovedor';
    include 'includes/proovedor/view_pro.php';
    break;

    case 'view_proovedor_id';
    include 'includes/proovedor/view_proovedor_id.php';
    break;

    case 'edit_proovedor';
    include 'includes/proovedor/edit_pro.php';
    break;
    
    

    case 'lista_operaciones';
    include 'includes/operaciones/lista_op.php'; 
    break;
    case 'ordenes_trabajo';
    include 'includes/operaciones/ordenes_trabajo.php';
    break;


    case 'view_ot';
    include 'includes/operaciones/view_ot.php';
    break;

    case 'edit_ot';
    include 'includes/operaciones/edit_ot.php';
    break;

    case 'add_tipoMoneda';
    include 'includes/crud/add_tipoMoneda.php';
    break;

    
    case 'add_area_cli';
    include 'includes/crud/add_area_cli.php';
    break;

    case 'add_estado_cot';
    include 'includes/crud/add_estado_cot.php';
    break;
    
    case 'edit_estado_id';
    include 'includes/crud/edit_estado_id.php';
    break;

    case 'add_fPagoCot';
    include 'includes/crud/add_fPago_cot.php';
    break;

    case 'add_moneda_cot';
    include 'includes/crud/add_moneda_cot.php';
    break;

    case 'add_expira_cot';
    include 'includes/crud/add_expira_cot.php';
    break;

    case 'upd_condicion';
    include 'includes/crud/upd_condicion.php';
    break;

    case 'upd_pie';
    include 'includes/crud/upd_pie.php';
    break;

    case 'add_igv';
    include 'includes/crud/add_igv.php';
    break;

    case 'add_estado_cli';
    include 'includes/crud/add_estado_cli.php';
    break;

    case 'oc_proveedor_estado';
    include 'includes/crud/oc_proveedor_estado.php';
    break;

    case 'edit_estado_proveedorid';
    include 'includes/crud/edit_estado_proveedorid.php';
    break;

    case 'add_almacen_ingresos';
    include 'includes/crud/add_almacen_ingresos.php';
    break;

    case 'edit_almacen_ing';
    include 'includes/crud/edit_almacen_ing.php';
    break;

    case 'add_categorias_ingresos';
    include 'includes/crud/add_categorias_ingresos.php';
    break;

    case 'edit_categorias_ing';
    include 'includes/crud/edit_categorias_ing.php';
    break;

    case 'add_lote_ingresos';
    include 'includes/crud/add_lote_ingresos.php';
    break;

    case 'edit_lote_ing';
    include 'includes/crud/edit_lote_ing.php';
    break;

    case 'add_modelo_ingresos';
    include 'includes/crud/add_modelo_ingresos.php';
    break;

    case 'edit_modelo_ing';
    include 'includes/crud/edit_modelo_ing.php';
    break;

    case 'add_um_ingresos';
    include 'includes/crud/add_um_ingresos.php';
    break;

    case 'edit_um_ing';
    include 'includes/crud/edit_um_ing.php';
    break;


    case 'view_Ordpedido';
    include 'includes/logistica/view_Ordpedido.php';
    break;

    case 'view_Ordpedido_id';
    include 'includes/logistica/view_Ordpedido_id.php';
    break;

    case 'edit_Ordpedido';
    include 'includes/logistica/edit_Ordpedido.php';
    break;

    case 'view_Items';
    include 'includes/logistica/view_Items.php';
    break;

    case 'view_item_id';
    include 'includes/logistica/view_item_id.php';
    break;

    case 'edit_item_op';
    include 'includes/logistica/edit_item_op.php';
    break;

    case 'add_ocproveedor';
    include 'includes/logistica/add_ocproveedor.php';
    break;

    case 'view_ocproovedor';
    include 'includes/logistica/view_ocproovedor.php';
    break;

    case 'lista_ocp';
    include 'includes/logistica/lista_ocp.php';
    break;

    case 'tabla_OCP';
    include 'includes/logistica/tabla_OCP.php';
    break;

    case 'view_ocp_id';
    include 'includes/logistica/view_ocp_id.php';
    break;
    

    case 'view_ingresos';
    include 'includes/almacen/view_ingresos.php';
    break;

    case 'add_ingresos';
    include 'includes/almacen/add_ingresos.php';
    break;

    case 'view_stock';
    include 'includes/almacen/view_stock.php';
    break;

    case 'view_ingresos_id';
    include 'includes/almacen/view_ingresos_id.php';
    break;

    case 'stock_salida';
    include 'includes/almacen/stock_salida.php';
    break;

    case 'edit_stock';
    include 'includes/almacen/edit_stock.php';
    break;
    
    case 'view_stock_cod';
    include 'includes/almacen/view_stock_cod.php';
    break;


    case 'add_fabricante_ingresos';
    include 'includes/crud/add_fabricante_ingresos.php';
    break;


    case 'edit_fabricantes_ing';
    include 'includes/crud/edit_fabricantes_ing.php';
    break;





     }
     ?>
<?php include('pie.php'); ?>