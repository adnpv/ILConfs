<?php

	if (isset($_SESSION['usuario'])){
		$usuario = $_SESSION['usuario']; 
		$contrasena=$_SESSION['contrasena'];
		$rol=$_SESSION['rol'];
				
		?>
		
			
			<?php 
			
			if($rol == "organizador") {
			//$url1= "index.php/autenticacion/autenticar";
			
			?>
			<ul class="nav navbar-nav">
			<form action="index.php/autenticacion/aut_org" method="post">
			<input  class="btn btn-success navbar-btn dropdown-toggle" type="submit" name="submit" value="Mis eventos">
			<input type="hidden" name="usuario" value="<?php echo $usuario ?>">
			<input type="hidden" name="contrasena" value="<?php echo $contrasena?>">
			</form>
			</ul>
			
			<?php
			
			}
			
			else{
			//$url1="index.php/autenticacion/aut_org";
			
			?>
			<ul class="nav navbar-nav">
			<form action="index.php/autenticacion/aut_org" method="post">
			<input  class="btn btn-success navbar-btn dropdown-toggle" type="submit" name="submit" value="Crear Evento">
			<input type="hidden" name="usuario" value="<?php echo $usuario ?>">
			<input type="hidden" name="contrasena" value="<?php echo $contrasena?>">
			</form>
			</ul>
			<?php
			
			}
			?>
			
			
		<ul class="nav navbar-nav">
			
			<li><a href="mi_cuenta.php"><img src="static/images/user.png" alt="<user img>" /><?php echo $usuario; ?></a></li>
  			
  			<li><a href="logout.php">Salir</a></li>
		</ul>
       

<?php } else { ?>


<a class="btn btn-success navbar-btn dropdown-toggle" data-toggle="dropdown" href="#">Inicia Sesión</a>

	<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
		<form method="post" action="procesar_login.php" accept-charset="UTF-8">
			<input class="form-control" style="margin-bottom: 15px;" type="text" placeholder="Usuario" id="username" name="usuario" required>
			<input class="form-control" style="margin-bottom: 15px;" type="password" placeholder="Contraseña" id="password" name="contrasena" required>
			<input style="float: left; margin-right: 10px;" type="checkbox" name="recordarme" id="remember-me" value="1">
			<label class="string optional" for="user_remember_me"> Recuerdame</label><br>
			<input type="hidden" name="<?php  if(isset($_GET['idevento']) && isset($_GET['error'])) { ?>evento<?php }?>" value="<?php echo $_GET['idevento']; ?>">
			<a href="home.php">Crear cuenta</a>
			<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Inicia Sesión">
			
			<br>
		</form>
	</div>

<!--{% block login %}

<ul class="nav navbar-nav">
	<li><a href="#"><img src="{% static "images/user.jpg" %}" alt="<user img>" />User n</a></li>
  	<li><a href="#">Crear Evento</a></li>
  	<li><a href="#">Salir</a></li>
</ul>
{% endblock %}-->

<?php } ?>