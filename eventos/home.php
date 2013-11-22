<?php
	session_start();
	include("header.php");
	//mysql_connect('mysql10.000webhost.com', 'a2968841_pitreal', 'a2968841_pitreal') or die(mysql_error());
	mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());

	$query="SELECT * FROM (select * from evento where estado = 'Activo' ORDER BY RAND() LIMIT 6) AS A ORDER BY preciounit DESC LIMIT 3";
	$result=mysql_query($query) or die (mysql_error());
	
	$datos = array();
	while ($row = mysql_fetch_array($result))
	{
		$datos[] = $row;
	}	
	
	
	date_default_timezone_set('America/Lima');
	$dia= date("d");
	$mes= date("m");
	$ano= date("Y");
	
	 $cadena = " ";
	
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-7 text-center" >
		
				<img src="static/images/logo_animado.gif" width='380' height='350' alt="logo" />
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-5">

				 <form action="registro.php" method="POST" class="form-signin">
			        <h2 class="form-signin-heading">¡Regístrate con nosotros!</h2>
			        <input type="text" name= "usuario" class="form-control" placeholder="Usuario" autofocus required>
			        <input type="text" name= "correo" class="form-control" placeholder="Correo" required>
			        <input type="password" name= "contrasena" class="form-control" placeholder="Contraseña" required>
			    
			        <label class="checkbox">
			          <input type="checkbox" value="remember-me"> Recordarme
			        </label>
					
					<?php
					if(isset($_GET['error']) && $_GET['error'] == 2){
					?>
					<span style="color:red"><?php echo "*Correo inválido" ?></span>
					<?php
					}
					?>
					
					<?php
					if(isset($_GET['error']) && $_GET['error'] == 3){
					?>
					<p style="color:red"><?php echo "*Usuario ya registrado" ?></p>
					<?php
					}
					?>
					
					
					
					
					
					
			        <button class="btn btn-block btn-info btn-lg" type="submit">Quiero registrarme</button>
					
			      </form>
				  <div>
				  <div class="fb-like nav navbar-nav " data-href="https://www.facebook.com/pietreal" data-width="450" data-show-faces="true" data-send="true"></div>
			</div></div>
		</div>
	</div>
</div>


	<div class="well">
	<div class="row">
       <div class="col-md-3 col-lg-3 text-center">
	   	<a href="events.php"><img width=" 50px"height="50x" src="static/images/Search-icon.jpg" alt="item" /></a>
        <h4>Busca</h4>
       </div>
	   
       <div class="col-xs-1 col-sm-6 col-md-3 col-lg-3 text-center">
       	<a href="servicio.php"><img width=" 90px"height="50x" src="static/images/Interact-icon.jpg" alt="item" /></a>
        <h4>Interactúa</h4>
	    </div>
		
       <div class="col-xs-1 col-sm-6 col-md-3 col-lg-3 text-center">
       	<a href="#" onclick="   window.open('https://www.facebook.com/sharer/sharer.php?u=www.facebook.com/pietreal', 'facebook-share-dialog', 'width=626,height=436');  return false;"><img width=" 50px"height="50x" src="static/images/share-icon.jpg" alt="item" /></a>
		<h4>Comparte</h4>
       </div>
	   
	   <div class="col-xs-1 col-sm-6 col-md-3 col-lg-3 text-center">
       	<a href="contact.php"><img width=" 50px"height="50px" src="static/images/dudas.jpg" alt="item" /></a>
		<h4>Ubícanos</h4>
       </div>
	</div>
	</div>





<div class="container sub">
	

	<div class=" col-xs-6 col-md-8">
	<div class="panel">
					<div class="panel-heading">
						<h3> Próximos Eventos</h3>
					</div>
	
	<div class="panel-body ">
	<?php 
	
	$i = 0;
		while ($i <=2 ) {
		
		$fecha_evento= $datos[$i]['fechainicio']; //fecha
		$precio= $datos[$i]['preciounit']; //precio
		
		$partes = explode("-", $fecha_evento);
		$ano_evento = $partes[0]; // 
		$mes_evento = $partes[1]; 
		$dia_evento= $partes[2];
		
		
				
	?>
						
						
						<div class="box col-xs-12 col-md-4 col-sm-6 col-lg-4">		
						<div class="thumbnail">
						<a href="event.php?idevento=<?php echo $datos[$i]['idevento']; ?>"  class="btn btn-success btn-block">Comprar</a>
						<div class="panel-heading ">
						<img class="img-responsive"  src="static/images/<?php echo $datos[$i]['idevento'].".jpg";?>" alt="">
							<h4 class="text-center"><?php echo $datos[$i]['nombre']?></h4>
						</div>
						<div class="panel-body">
							
							<p><?php echo $datos[$i]['lugar']?></p>
							<p>Fecha: <?php echo $partes[2]."-".$partes[1]."-".$partes[0]?></p>
							

							<p><a class="btn btn-warning btn-primary" href="event.php?idevento=<?php echo $datos[$i]['idevento'] ?>">Ver detalles</a>
							</p>

					</div>
				</div></div>
				
			   
	<?php
 	$i++; 
	}
		
		
	
	
			
	?>
	
	
	
		
</div>
	</div></div>

	<div class="col-xs-6 col-md-3 "> 
	<div class="fb-like-box" data-href="https://www.facebook.com/pietreal" data-width="355" data-show-faces="true" data-header="false" data-stream="true" data-show-border="true"></div>

	</div>
</div>
<?php
	include("footer.php");
?>