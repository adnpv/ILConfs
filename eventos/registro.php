<?php
	session_start();

	$usuario=$_POST['usuario'];
	$correo=$_POST['correo'];
	$contrasena=$_POST['contrasena'];
	
	include("header.php");
	
	if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
		$url= "home.php?error=2";
		echo '<h3>Procesando...</h3>';
		//header ("Location: $url");
		print "<meta http-equiv=Refresh content=\"0 ; url=$url\">";

									
	}
	
	mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());
	$query="select 1 from usuario where usuario= '$usuario'";
	$result=mysql_query($query) or die (mysql_error());	
	
	if($row = mysql_fetch_assoc ($result)){
		$url= "home.php?error=3";
		echo '<h3>Procesando...</h3>';
		//header ("Location: $url");
		print "<meta http-equiv=Refresh content=\"0 ; url=$url\">";
	
	}
		if(!isset($url)){
		$_SESSION['usuario']=$usuario;	
		}
				
									
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Registro</h1>
			</div>
		</div>
	</div>
</div>

<!-- Example row of columns -->
	<div class="container">
      <div class="row">
			<div class="col-sm-12 col-lg-12">
				<div class="panel">
					<div class="panel-heading">
						<h3></i>Datos personales</h3>
					</div>
					<div class="panel-body">
					 	<form id="ajax-contacts" action="registrar_usuario.php" class="" method="post">
							<fieldset>
								<div class="form-group">
									<label for="user">Usuario</label><input class="form-control" type="text" name="usuario" value="<?php echo $usuario; ?>" required>
								</div>
								<div class="form-group">
									<label for="name">Nombres</label><input class="form-control" type="text" name="nombres" placeholder="Nombres" value=""required>
								</div>
								<div class="form-group">
									<label for="apepat">Apellido Paterno</label><input class="form-control" type="text" name="apepat" placeholder="Apellido paterno"  value=""required>
								</div>
								<div class="form-group">
									<label for="apemat">Apellido Materno</label><input class="form-control" type="text" name="apemat" placeholder="Apellido materno"  value=""required>
								</div>
								<div class="form-group">
									<label for="dni">DNI</label><input class="form-control" type="text" name="dni" placeholder="DNI (8 dígitos)"  value=""required>
								<div class="form-group">
									<label for="correo">Correo</label><input class="form-control" type="text" name="correo" value="<?php echo $correo; ?>"required>
								</div>
								
								<div class="form-group">
									<label for="direccion">Dirección</label><input class="form-control" type="text" name="direccion" placeholder="Dirección"  value=""required>
								</div>
								<div class="form-group">
									<label for="distrito">Distrito</label><input class="form-control" type="text" name="distrito" placeholder="Distrito"  value=""required>
								</div>
								<div class="form-group">
									<label for="contrasena">Contraseña</label><input class="form-control" type="password" name="contrasena" value="<?php echo $contrasena; ?>"required>
								</div>
								
					<?php
					if(isset($_GET['error']) && $_GET['error'] == 5){
					?>
					<span style="color:red"><?php echo "*Debe ingresar caracteres válidos. " ?></span>
					<?php
					}
					?>
								
								<div class="form-group">
									<label for="submit">&nbsp;</label><input class="btn btn-lg btn-info" type="submit" name="submit" value="Guardar">
									
									
								</div>
							
							<fieldset>
						</form>
					</div>
				  </div>
			</div>
		</div>
	
      </div>
    </div>
<?php
	include("footer.php");
?>