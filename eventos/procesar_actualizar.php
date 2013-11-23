<?php

session_start();
$usuario=$_SESSION['usuario'];
mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());

$nombres= $_POST['nombres'];
$nombres= $_POST['nombres'];
$apellido_paterno= $_POST['apellido_paterno'];
$apellido_materno= $_POST['apellido_materno'];
$dni= $_POST['dni'];
$correo= $_POST['correo'];
$direccion= $_POST['direccion'];
$pass= $_POST['contrasena'];

$contrasena = sha1($pass);

$query =  "UPDATE usuario SET nombres='$nombres',apepat='$apellido_paterno', apemat='$apellido_materno', correo='$correo',dni='$dni', direccion='$direccion', contrasena = '$contrasena' WHERE usuario='$usuario'";

mysql_query($query)or die (mysql_error());
header ('Location: home.php');


?>