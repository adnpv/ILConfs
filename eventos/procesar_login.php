<?php
	session_start();
 
	if(isset($_POST['usuario']) && isset($_POST['contrasena'])){
		$usuario = $_POST['usuario'];
		$contrasena = sha1($_POST['contrasena']);
		//echo $usuario."<br>".$contrasena;
	}
	else {
	header('Location: home.php');
	
	}

	mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());
	
	/* mysql_connect('localhost', 'root', '') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());
*/
	$query="select * from usuario where usuario='$usuario' and contrasena='$contrasena'";
	$result=mysql_query($query) or die (mysql_error());
	
	if($row = mysql_fetch_array($result)){
		$usuario=$row['usuario'];
		
			$_SESSION['usuario']=$usuario;
			$_SESSION['idusuario']=$row['idusuario'];
			$_SESSION['nombres']=$row['nombres'];
			$_SESSION['apepat']=$row['apepat'];
			$_SESSION['apemat']=$row['apemat'];
			$_SESSION['contrasena']=$row['contrasena'];
			$_SESSION['rol']=$row['rol'];
			
			if(isset($_POST['evento'])) {
			$idevento =$_POST['evento'];
			
			header("Location: event.php?idevento=$idevento");
			}
			
			else{
			header('Location: home.php');	
			
			}
			
			
	}
	else{
	
		$url= "home.php?error=6";
		echo '<h3>Procesando...</h3>';
		//header ("Location: $url");
		print "<meta http-equiv=Refresh content=\"0 ; url=$url\">";
	
	
	}		
	
?>