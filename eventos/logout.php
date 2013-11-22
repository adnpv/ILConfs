<?php
	session_start();
	unset($_SESSION['usuario']);
	unset($_SESSION['idusuario']);
	session_destroy();
	header('Location: home.php');
?>