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

    case 'view_cotizacion';
    include 'includes/cotizaciones/ver_cotizaciones.php';
    break;

    case 'edit_cotizacion';
    include 'includes/cotizaciones/edit_cotizaciones.php';
    break;

    case 'add_cotizacion';
    include 'includes/cotizaciones/add_cotizaciones.php';
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
    include 'includes/cotizaciones/add_clientes.php';
    break;

    case 'edit_clien';
    include 'includes/cotizaciones/edit_cliente.php';
    break;

    case 'add_proovedor';
    include 'includes/proovedor/add_pro.php';
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

     }
     ?>
<?php include('pie.php'); ?>