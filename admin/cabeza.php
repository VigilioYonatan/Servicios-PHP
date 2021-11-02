<?php 
session_start();
  if(isset($_SESSION['role'])){
  $cliente = $_SESSION['role'];
  }else{
    header('Location: ../index.php');
    die();
  }
?>

<?php include '../web/bd.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Web Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../ajax/jquery-3.6.0.min.js"></script>
    <link  rel="stylesheet" href="js/jquery-ui.css">
    <script src="js/jquery-ui.js"></script>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="styles/main.css"> 
   <link rel="stylesheet" type="text/css" href="styles/ver.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap">
    
  </head>
  <body class="app sidebar-mini" style="font-family: 'Open Sans', sans-serif;">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">Outsourcing</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              </div>
              
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Cuenta</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="usuarios_fotos/<?php echo $_SESSION['foto'];?>" alt="User Image" style="width: 30%;">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['name']; ?></p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['cod_user']; ?></p>
        </div>
      </div>
      <ul class="app-menu" style="font-weight: bold;">
        <li><a class="app-menu__item " href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">DASHBOARD</span></a></li>

        <li><a class="app-menu__item" href="index.php?action=view_proovedor" ><i class="app-menu__icon fa fa-truck"></i><span class="app-menu__label">PROOVEDORES</span></a>
         
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i>
          <span class="app-menu__label">VENTAS</span>
          <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="index.php?action=view_cotizacion"><i class="icon fa fa-circle-o"></i> Cotizaciones</a></li>
            <li><a class="treeview-item" href="index.php?action=view_clientes" ><i class="icon fa fa-circle-o"></i> Clientes</a></li>
            <li><a class="treeview-item" href="index.php?action=view_proovedor"><i class="icon fa fa-circle-o"></i> Proveedores</a></li>
           
           
          </ul>
        </li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-bar-chart"></i><span class="app-menu__label">LOGISTICA</span></a></li>

        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cubes"></i><span class="app-menu__label">ALMACEN</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i>
          <span class="app-menu__label">OPERACIONES</span>
          <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="index.php?action=lista_operaciones"><i class="icon fa fa-circle-o"></i>Evaluaciones</a></li>
          </ul>
        </li>
        
        <li class="treeview"><a class="app-menu__item" href="index.php?action=view_serv" data-toggle="treeview"><i class="app-menu__icon fa fa-handshake-o"></i><span class="app-menu__label">SERVICIOS</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="index.php?action=view_serv"><i class="icon fa fa-circle-o"></i> Lista de Servicios</a></li>
            <li><a class="treeview-item" href="index.php?action=add_serv"><i class="icon fa fa-circle-o"></i> Agregar Servicios</a></li>
            
          </ul>
        </li>
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-search"></i><span class="app-menu__label">INCIDENCIAS</span></a></li>

       <?php if($_SESSION['role'] == 5){ ?>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">Admin</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="index.php?action=view_users"><i class="icon fa fa-circle-o"></i> Lista de Empleados</a></li>
            <li><a class="treeview-item" href="index.php?action=add_rol"><i class="icon fa fa-circle-o"></i> Agregar Rol</a></li>
            <li><a class="treeview-item" href="index.php?action=add_tipoMoneda"><i class="icon fa fa-circle-o"></i> Agregar Tipo de Moneda</a></li>
            <li><a class="treeview-item" href="index.php?action=add_area"><i class="icon fa fa-circle-o"></i> Agregar Area</a></li>
          </ul>
        </li>
        
        <?php }//else{
       //echo "<script>alert('No sos admin')</script>";}?> 

     </ul>
     
    </aside>