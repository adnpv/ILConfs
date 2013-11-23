<?php
	session_start();
	
	mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());
	
	/* mysql_connect('localhost', 'root', '') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());
*/

 $cadena_recibida=$_POST['usuario'].$_POST['nombres'].$_POST['apepat'].$_POST['apemat'].$_POST['dni'].$_POST['correo'].$_POST['direccion'].$_POST['distrito'].$_POST['contrasena'];
 $cadena_procesada=mysql_real_escape_string($cadena_recibida);
	

	if(strlen($cadena_procesada)> strlen($cadena_recibida) ){
	
		$url= "registro.php?error=5";
		echo '<h3>Procesando...</h3>';
		//header ("Location: $url");
		print "<meta http-equiv=Refresh content=\"0 ; url=$url\">";
	
	}

	$usuario=$_POST['usuario'];
	$nombres=$_POST['nombres'];
	$apepat=$_POST['apepat'];
	$apemat=$_POST['apemat'];
	$dni=$_POST['dni'];
	$correo=$_POST['correo'];
	$direccion=$_POST['direccion'];
	$distrito=$_POST['distrito'];
	$contrasena=sha1($_POST['contrasena']);
	
	

	$query="insert into usuario(idusuario,apepat,apemat,nombres,dni,rol,correo,direccion,distrito,usuario, contrasena) values('','$apepat','$apemat','$nombres','$dni','usuario','$correo','$direccion','$distrito','$usuario','$contrasena')";

	mysql_query($query) or die (mysql_error()); 
	$_SESSION['usuario']=$usuario;	
	header("Location: home.php");
	
	

?>