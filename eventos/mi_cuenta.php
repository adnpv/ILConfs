<?php
	session_start();
	include("header.php");
	
	
	mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());

	$query="select * from usuario where usuario= '$usuario'";
	$result=mysql_query($query) or die (mysql_error());
	
	$datos = array();
	while ($row = mysql_fetch_array($result))
	{
		$datos[] = $row;
	}	

	
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Mi cuenta</h1>
			</div>
		</div>
	</div>
</div>

<!-- Example row of columns -->
	<div class="container">
      <div class="row">
			<div class="col-sm-9 col-lg-9">
				<div class="panel">
					<div class="panel-heading">
						<h3>Información de contacto</h3>
					</div>
					<div class="panel-body">
						<form action="procesar_actualizar.php" class="" method="post">
							<fieldset>
								<div class="form-group">
									<label for="name">Nombres</label><input class="form-control" type="text" name="nombres" value="<?php echo $datos[0][3]; ?>" required/>
								</div>
								<div class="form-group">
									<label for="lugar">Apellido Paterno</label><input class="form-control" type="text" name="apellido_paterno" value="<?php echo $datos[0][1]; ?>"required/>
								</div>
								<div class="form-group">
									<label for="email">Apellido Materno</label><input class="form-control" type="text" name="apellido_materno" value="<?php echo $datos[0][2]; ?>"required/>
								</div>
								<div class="form-group">
									<label for="subject">DNI</label><input class="form-control" type="text" name="dni" value="<?php echo $datos[0][4]; ?>"required/>
								</div>
								<div class="form-group">
									<label for="subject">Correo</label><input class="form-control" type="text" name="correo" value="<?php echo $datos[0][6]; ?>"required/>
								</div>
								<div class="form-group">
									<label for="message">Dirección</label><input class="form-control" type="text" name="direccion" value="<?php echo $datos[0][9]; ?>"required/>
								</div>
								<div class="form-group">
									<label for="message">Contraseña</label><input class="form-control" type="password" name="contrasena" value=""required/>
								</div>
								<div class="form-group">
									<label for="submit"></label><input class="btn btn-lg btn-info" type="submit" name="submit" value="Guardar">
									<a href="home.php"  class="btn btn-lg btn-info">Regresar</a>
								</div>
							<fieldset>
						</form>
					</div>
					</div></div>
					<div class="col-xs-6 col-md-3 ">
					<img src="static/images/micuenta.jpg"/></br>
					</div> 
					
					</div></div>
					
				<?php
	include("footer.php");
?>