<?php 
session_start();
	if(isset($_SESSION['role'])){
	$cliente = $_SESSION['role'];
	}else{
		header('Location: ../login.php');
		die();
	}
?>

<?php include '../web/bd.php'; ?>

<!DOCTYPE html><!-- HTML5 Declaration -->
<html>
<head>
<title>Web ADMIN</title>

<link href="styles/index.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="../css/icons2/flaticon.css">
<link rel="stylesheet" href="../css/icons/flaticon.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../ajax/jquery-3.6.0.min.js"></script>

<head>	
<body>
<div class="container">
   <div class="header">
     <div class="navbar-header">
	  <h3><a class="admin_name">Bienvenido</a><p><?php echo $_SESSION['name']; ?></p></h3> 
	 </div> 
	 
	 <div class="navbar-right-header">
	 
	
	   <ul class="dropdown-navbar-right">
       <li>
          <a><img src="usuarios_fotos/<?php echo $_SESSION['foto'];?>" /></a> 

         <ul class="subnavbar-right">
           <li><a>Cuenta de usuario</a></li>
           <li><a href="logout.php">Salir</a></li>
         </ul>
       </li>


     </ul>

	 </ul>
	 
	 <!-- <ul class="dropdown-navbar-right">
	   <li>
	     <a><i style="color: white;" class="fa fa-bell"></i>&nbsp;<i  style="color: white;" class="fa fa-caret-down"></i></a>
		 
		 <ul class="subnavbar-right">
		   <li><a>Notificaciones </a></li>
		   
		 </ul>
	   </li>
	 </ul> -->
	 
	 </div><!-- /.navbar-right-header -->
	 
   </div><!-- /.header -->
   
   <div class="body_container">
     <div class="left_sidebar">
	   <div class="left_sidebar_box">
	   
	   <ul class="left_sidebar_first_level">
	     
		 <li style="margin-top: 30px;">
		  <a href="#" ><i class="flaticon-speedometer"></i>&nbsp;DASHBOARD <i class="flaticon-chevron-pointing-to-the-left"></i></a>

		 </li>

		 <li>
		  <a href="#"><i class="flaticon-customer"></i>&nbsp;CLIENTES <i class="flaticon-chevron-pointing-to-the-left"></i></a>
		 
	
		 </li>
		 
		 <li>
		  <a href="#"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;PROVEEDORES <i class="flaticon-chevron-pointing-to-the-left"></i></a>
		 </li>
		 <li>
		  <a href="#"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;VENTAS <i class="flaticon-chevron-pointing-to-the-left"></i></a>
		  <ul class="left_sidebar_second_level">
			 <li><a href="index.php?action=view_users">Orden de servicios</a></li>
			 <li><a href="index.php?action=view_users">Cotizaciones</a></li>
		   </ul>
		 </li>
		 <li>
		  <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;LOGISTICA <i class="flaticon-chevron-pointing-to-the-left"></i></a>

		 </li>
		 <li>
		  <a href="#"><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;ALMACÉN <i class="flaticon-chevron-pointing-to-the-left"></i></a>
	
		 </li>
		 <li>
		  <a href="#"><i class="flaticon-gear"></i>&nbsp;OPERACIONES <i class="flaticon-chevron-pointing-to-the-left"></i></a>
	
		 </li>
		 <li>
		  <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;PRODUCTOS <i class="flaticon-chevron-pointing-to-the-left"></i></a>

		 </li>
		 <li>
		  <a href="index.php?action=view_serv"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;SERVICIOS <i class="flaticon-chevron-pointing-to-the-left"></i></a>
		  <ul class="left_sidebar_second_level">
			 <li><a href="index.php?action=add_serv">Agregar Servicios</a></li>
		   </ul>
		   <ul class="left_sidebar_second_level">
			 <li><a href="index.php?action=view_serv">Lista de Servicios</a></li>
		   </ul>
		 </li>
		 <li>
		  <a href="#"><i class="flaticon-search-for-incidents"></i>&nbsp;INCIDENCIAS <i class="flaticon-chevron-pointing-to-the-left"></i></a>
		 
		   
		 </li>
			<?php if($_SESSION['role'] == 5){ ?>
		 <li>
		  <a href="#"><i class="fa fa-lock fa-2x" aria-hidden="true"></i>&nbsp;Admin <i class="flaticon-left-arrow-black-triangular-shape"></i></a>
		   <ul class="left_sidebar_second_level">
			 <li><a href="index.php?action=view_users">Lista de usuarios</a></li>
		   </ul>
		   <ul class="left_sidebar_second_level">
			 <li><a href="index.php?action=add_rol">Agregar Rol</a></li>
		   </ul>
		 </li>
			 <?php }//else{
			 //echo "<script>alert('No sos admin')</script>";}?> 


		 </ul>
	   </div>
	   
	 </div>
	
	 
	 <div class="content">
	   <div class="content_box">
	   <?php 
	   if(isset($_GET['action'])){
	    $action = $_GET['action'];
	   }else{
	    $action ='';
	   }
	   
	   switch($action){
	    case 'add_pro';
		include 'includes/insertar_productos.php';
		break;
		
		case 'view_pro';
		include 'includes/ver_productos.php';
		break;
		
		case 'edit_serv';
		include 'includes/edit_serv.php';
		break;
		
		case 'view_serv';
		include 'includes/ver_serv.php';
		break;
		
		case 'add_serv';
		include 'includes/agregar_serv.php';
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
	   }
	   ?>
			
	   </div><!-- /.content_box -->
	   
	 </div><!-- /.content -->
	 
   </div><!-- /.body_container -->
   
 </div><!-- /.container -->
 
 <script src="../ajax/jquery-3.6.0.min.js"></script>     
</body>

</html>



<script>
$(document).ready(function(){
  
  // Drop Down Menu Right
  $(".dropdown-navbar-right").on('click',function(){
   $(this).find(".subnavbar-right").slideToggle('fast');
  });
  
  // Collapse Left Sidebar
  $(".left_sidebar_first_level li").on('click',this,function(){
    $(this).find(".left_sidebar_second_level").slideToggle('fast');
  });
  
});
</script>

