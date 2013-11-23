<?php
 session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   		<meta charset="utf-8">
			<title>PIET REAL</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="">
    	<meta name="author" content="">

		<link href="static/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="static/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="static/assets/style.css" />

		<link rel="stylesheet" type="text/css" href="static/css/fontis-google.css" />

		<link rel="shortcut icon" href="static/assets/ico/logo.jpg" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="static/assets/ico/apple-touch-icon-144-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="static/assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="static/assets/ico/apple-touch-icon-72-precomposed.png" >
		<link rel="apple-touch-icon-precomposed" href="static/assets/ico/apple-touch-icon-57-precomposed.png" >
	    <link rel="stylesheet" type="text/css" media="screen"
	     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

	</head>


<body>
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

	<div class="wrapper">

		<header>	
			
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					
					<div class="navbar-header">
					
						<img src="static/images/Logo.png" width='45' height='45' alt="logo" /><a class="navbar-brand" href="home.php">PIET REAL</a>
					</div>

		
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						

						<ul class="nav navbar-nav">
							
							<li><a class="" href="home.php">Inicio</a></li>
							<li><a class="" href="events.php">Eventos</a></li>
							
						  	<?php 
						  		if (isset($_SESSION['usuario'])){
									$usuario = $_SESSION['usuario']; ?>
						  			
									<!-- <li><a href="mis_eventos.php">Mis Eventos</a></li> -->
									<li><a href="mis_entradas.php">Mis Entradas</a></li>
									
						  	<?php } ?>
							<li><a class="" href="servicio.php">Servicios</a></li>
						  	<li><a class="" href="contact.php">Contactenos</a></li>
						</ul>
							<div class="nav navbar-nav navbar-right">
							
							 <?php
							   	include("login_nav.php");
							 ?>

							   	
						</div>

					</div>
				</div>	
					
				
			</nav>
			</body>
			</html>