<?php
session_start();
if(isset($_GET['idevento'])){

$idevento=$_GET['idevento'];}

$nombre= $_SESSION['nombre'];
$codigo= $_SESSION['codigo'];
$precio= $_SESSION['precio'];
$fechainicio= $_SESSION['fechainicio'];
$horainicio= $_SESSION['horainicio'];
$fecha_hoy= $_SESSION['fechahoy'];
$cliente=$_SESSION['cliente'];



				$partes = explode("-", $fechainicio);
				$ano_evento = $partes[0]; // 
				$mes_evento = $partes[1]; 
				$dia_evento= $partes[2];
				

?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="static/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="static/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="static/assets/style.css" />

<link rel="stylesheet" type="text/css" href="static/css/fontis-google.css" />

	<div class="panel">
					<div class="panel-heading text-center">
						  <img width=" 50px"height="50px" src="static/images/Logo.png"></br><h3> RECIBO VIRTUAL</h3><h4>Nro <?php echo $codigo ?></h4>
					</div>
	<h3><?php echo $nombre?></h3>
	 
	 <p>Cliente: <?php echo $cliente ?></p>
	 <p>Día y hora del evento:<?php echo $partes[2]."/".$partes[1]."/".$partes[0]." ".$horainicio; ?></p>
	 <p>Monto pagado: S/. <?php echo $precio ?></p>
	 <p>Fecha de emisión: <?php echo $fecha_hoy ?></p><br>
	 <p >**No olvide presentar este recibo impreso el día del evento</p><br>
	 
	 <a href="http://pitreal.hostei.com/eventos/home.php">@PIET REAL 2013</a>
	 
	 </div>
	 
 
</html>