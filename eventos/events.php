<?php
	session_start();
	include("header.php");

	mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());
	
	$query="select * from evento WHERE estado = 'Activo'";

	$result=mysql_query($query) or die (mysql_error());
	
	$datos = array();
	while ($row = mysql_fetch_array($result))
	{
		$datos[] = $row;
	}	
	
	date_default_timezone_set('America/Lima');
	$dia1= date("d");
	$mes1= date("m");
	$ano1= date("Y");
	
	 $cadena = " ";
	
?>

	<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Eventos</h1>
			</div>
		</div>
	</div>
	</div>

	
	
	<div class="container">
	
		<div class="row">
	
		<div class=" col-md-5 col-lg-5">
			<div class="well">
				<h2>Búsqueda de eventos</h2>
				Ingrese una fecha completa, un tipo de precio o ambos
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					
					<form class="navbar-form navbar-left" role="search">
							
							<div class="form-group">
								
								<select name="dia" class="form-control">
									<option value="Dia">Dia</option>
									
						  			<?php for($i=1; $i<=31; $i++){ ?>
									
									<option value="<?php echo $i ?>"><?php echo $i ?></option>
						  			<?php } ?>
								</select>
							</div>
							
							<div class="form-group">
								
								<select name="mes" class="form-control">
									<option>Mes</option>
					  				<option value="01">Enero</option>
					  				<option value="02">Febrero</option>
					  				<option value="03">Marzo</option>
					  				<option value="04">Abril</option>
					  				<option value="05">Mayo</option>
					  				<option value="06">Junio</option>
					  				<option value="07">Julio</option>
					  				<option value="08">Agosto</option>
					  				<option value="09">Setiembre</option>
					  				<option value="10">Octubre</option>
					  				<option value="11">Noviembre</option>
					  				<option value="12">Diciembre</option>
								</select>
							</div>
							<div class="form-group">
								
								<select name="ano" class="form-control">
									<option>Ano</option>
					  				<option>2013</option>
					  				<option>2014</option>
					  				
								</select>
							</div>
							</br>
							<div class="form-group">
								
								<select name="precio" class="form-control">
									<option>Precio</option>
					  				<option>Gratis</option>
					  				<option>Pago</option>
								</select>
							</div>
							</br>
							
							
							<div class="form-group pull-left">
						  	<button type="submit" class="btn btn-primary" >Buscar</button>
							</div>
							
							
						
							
							
							<?php 
							
							
							if(isset($_GET['dia']) && isset($_GET['mes'])  && isset($_GET['ano']) && isset($_GET['precio'])){
					
								$dia= $_GET['dia'];
								$mes= $_GET['mes'];
								$ano= $_GET['ano'];
								$precio= $_GET['precio'];
					
					        
								
								 
								 if ( ($dia == 'Dia' || $mes == 'Mes' || $ano == 'Ano') &&  $precio == 'Precio' ){
								
									 $error= "*Complete la fecha";
								 
								 
								 }
								if ($dia == 'Dia' && $mes == 'Mes' && $ano == 'Ano' && $precio == 'Precio'){
								
									 $error= "*Debe ingresar datos válidos";
								 
								 
								 }
							
							
							?>
							</br>
							<span style="color:red"><?php echo $error ?></span>
							<?php } ?>
							
							
							
					</form>
					
					</br>
					
			</div>
			<hr>
			Ingrese el nombre del evento
<div class="collapse navbar-collapse navbar-ex1-collapse">

					<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" name="evento" placeholder="Busca un evento">
							</div>
						  	<button type="submit" class="btn btn-primary" >Buscar</button>
							
						</form>
</div>
			
			</div>
		</div>


		
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-right" style="z-index:1020;"> 
		
			<div id="carousel-example-generic" class="carousel slide">
			  
			   <ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			   </ol>

			  <div class="carousel-inner">
				<div class="item active">
					<img src="static/images/evento4.jpeg" alt="item" />
				</div>
				
				<div class="item">
					<img src="static/images/evento1.jpg" alt="item"/>
				</div>
				
				<div class="item">
					<img src="static/images/evento2.jpg" alt="item"/>
				</div>
				
			  </div>
			  
				  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<span class="icon-prev"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<span class="icon-next"></span>
				  </a>
			</div>    
				
		</div> 
		
		
		
		</div>
	</div>	
		
	
	
						<?php
					if(isset($_GET['dia']) && isset($_GET['mes'])  && isset($_GET['ano'])){
					
						if ($_GET['dia'] != 'Dia' && $_GET['mes'] != 'Mes' && $_GET['ano'] != 'Ano'){
					
							$dia= $_GET['dia'];
							$mes= $_GET['mes'];
							$ano= $_GET['ano'];
							
						?>
	<hr>
	<div class="container">
	<div class="row">
		<table>
			
		<tbody>
						
						<?php
							$registros = 4;

							$contador = 1;
								if($_GET['pagina']){
								 $pagina= $_GET['pagina'];
								 }

								if (!$pagina) { 
									$inicio = 0; 
									$pagina = 1; 
								} else { 
									$inicio = ($pagina - 1) * $registros; 
							} 
							
							$conn = new mysqli('localhost','a2968841_pitreal', 'a2968841_pitreal', 'a2968841_pitreal');
						
					
					
					
							$fecha= $ano."-".$mes."-".$dia;
							$query4="SELECT * FROM evento WHERE fechainicio = '$fecha' AND estado = 'Activo'";	
							
							
							
							if(isset($_GET['precio'])){
								if ($_GET['precio'] != 'Precio'){
								
								$precio =$_GET['precio'];
								
								if($precio=='Gratis'){
								$query4=	"SELECT * FROM evento WHERE fechainicio = '$fecha' AND preciounit = 0 AND estado = 'Activo'";
								
								}
								else { $query4=	"SELECT * FROM evento WHERE fechainicio = '$fecha' AND preciounit > 0 AND estado = 'Activo'";
								}
								
								} 
							
							}
							
						
						$resultados = mysqli_query($conn,$query4);
						$total_registros = mysqli_num_rows($resultados); 
						$resultados = mysqli_query($conn,$query4." AND estado = 'Activo' ORDER BY nombre ASC LIMIT $inicio, $registros");
						
						$total_paginas = ceil($total_registros / $registros);
						
									
			
						
						
			if ($total_registros) {
				while ($eventos = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
				
				
				$ano_evento = $ano; // 
				$mes_evento = $mes; 
				$dia_evento= $dia;
				
				?>		
					
			<div class="box col-xs-12 col-md-4 col-sm-6 col-lg-3">		
			<div class="thumbnail">
								
				<div class="plus">
				
				<?php
				
				date_default_timezone_set('America/Lima');
							$dia_actual= date("d");
							$mes_actual= date("m");
							$ano_actual= date("Y");
	
							$cadena = $ano_actual."-".$mes_actual."-".$dia_actual;
							$entradas = $eventos['nroentradas']- $eventos['entradasvendidas'];
							
							if($eventos['fechalimite']>= $cadena && $entradas >0 ){
							
								if ($usuario==""){
							
									$url= "error=1";
									?>
									<a href="events.php"  class="btn btn-success btn-block">Debe loguearse para comprar</a>
									<?php
								}
								if($url==""){
							
				?>
				<a href="compra_entradas.php?idevento=<?php echo $eventos['idevento']; ?>"  class="btn btn-success btn-block">Comprar</a>
				
				<?php
				} }
				
				else{
				?>
				<a class="btn btn-info btn-block">Finalizado</a>
				<?php
				}
				?>
				
				
				
				</div>
				
							
				<img class="img-responsive" src="static/images/<?php echo $eventos['idevento'].".jpg";?>" alt="">
							
				<div class="caption">
								
				<h3 class="single-title"><a href="event.php?idevento=<?php echo $eventos['idevento']; ?>" ><?php echo $eventos["nombre"]?></a></h3>
				<p>Sede: <?php echo $eventos['lugar']?></p>
				<p>Fecha y hora: <?php echo $dia_evento."-".$mes_evento."-".$ano_evento; ?> <?php echo $eventos['horainicio']?></p>
				<p><?php if ($eventos['preciounit']== 0){ echo "Ingreso Libre" ;} else {echo "Precio: ".$eventos['preciounit'];}?></p>
				
				<p><?php echo $eventos['descripcion']; ?></p>
				<p><a class="btn btn-default" href="event.php?idevento=<?php echo $eventos['idevento']; ?>">Ver detalles</a></p>
				</div>
			</div> 
			</div>					
					
					<?php			
					
			 	   $contador++;
				    
			   
			 } }else {
			  echo "<font color='darkgray'>No hay eventos disponibles</font>";
			}
				
			mysqli_free_result($resultados);
			
					?>		
					
					
					
					
		</tbody>
	</table>
	
	</div>
	
	<div class="col-12 col-lg-12 text-center">
		<ul class="pagination text-center">
		<?php
				if ($total_registros) {
			
				if (($pagina - 1) > 0) { 
		?>
				
				<li id="page_nav"><a href="events.php?dia=<?php echo $dia ?>&mes=<?php echo $mes ?>&ano=<?php echo $ano ?>&precio=<?php echo $precio ?>&pagina=<?php echo($pagina-1)?>">Anterior</a></li>
				
		<?php } else {
		?>
			
				<li class="disabled"><a>Anterior</a></li>
			
		<?php }
		
			
			for ($i = 1; $i <= $total_paginas; $i++) {
				if ($pagina == $i) {
					
				?>
					<li class="active" id="page_nav"><a><?php echo $pagina ?></a></li>
				<?php
				} else {
				?>
					
					<li id="page_nav"><a href="events.php?dia=<?php echo $dia ?>&mes=<?php echo $mes ?>&ano=<?php echo $ano ?>&precio=<?php echo $precio ?>&pagina=<?php echo $i ?>"><?php echo $i?></a></li>
				<?php }	
			}
	  		
			if (($pagina + 1)<=$total_paginas) {
				
				?>
				<li id="page_nav"><a href="events.php?dia=<?php echo $dia ?>&mes=<?php echo $mes ?>&ano=<?php echo $ano ?>&precio=<?php echo $precio ?>&pagina=<?php echo($pagina+1)?>">Siguiente</a></li>
			<?php	
			} else {
				
				?>
				<li class="disabled" id="page_nav"><a>Siguiente</a></li>
				<?php
				
			}		 
		}
		?>	
	
	
	<?php
		mysqli_close($conn);
 	?>
	</ul>
		
	</div> 					
		</div> 

					
					<?php
					}
					}
					
					
					?>


		
		
		
		
		
		
	<?php
					if(isset($_GET['dia']) && isset($_GET['mes'])  && isset($_GET['ano']) && isset($_GET['precio'])){
					
							$dia= $_GET['dia'];
							$mes= $_GET['mes'];
							$ano= $_GET['ano'];
							$precio= $_GET['precio'];
						
						if ($dia == 'Dia' && $mes == 'Mes' && $ano == 'Ano' && $precio != 'Precio'){
					
							
							
						?>
	<hr>
	<div class="container">
	<div class="row">
		<table>
			
		<tbody>
						
						<?php
							$registros = 4;

							$contador = 1;
								if($_GET['pagina']){
								 $pagina= $_GET['pagina'];
								 }

								if (!$pagina) { 
									$inicio = 0; 
									$pagina = 1; 
								} else { 
									$inicio = ($pagina - 1) * $registros; 
							} 
							
							$conn = new mysqli('localhost','a2968841_pitreal', 'a2968841_pitreal', 'a2968841_pitreal');
							$fecha= $ano."-".$mes."-".$dia;
								
							
								if($precio=='Gratis'){
								$query4="SELECT * FROM evento WHERE preciounit = 0 AND estado = 'Activo'";
								
								}
								else { $query4=	"SELECT * FROM evento WHERE preciounit > 0 AND estado = 'Activo'";
								}
								
						
						$resultados = mysqli_query($conn,$query4);
						
						
						$total_registros = mysqli_num_rows($resultados); 
						$query5 = $query4." AND estado = 'Activo' ORDER BY nombre ASC LIMIT $inicio, $registros";
						
						
						$resultados = mysqli_query($conn,$query5);
						
						$total_paginas = ceil($total_registros / $registros);
						
						
			
						
						
			if ($total_registros) {
				while ($eventos = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
				
				$fecha_evento= $eventos['fechainicio']; 
				$partes = explode("-", $fecha_evento);
				$ano_evento = $partes[0]; // 
				$mes_evento = $partes[1]; 
				$dia_evento= $partes[2];
				
				
				
				
				?>		
					
			<div class="box col-xs-12 col-md-4 col-sm-6 col-lg-3">		
			<div class="thumbnail">
								
				<div class="plus">
				<?php
				
							date_default_timezone_set('America/Lima');
							$dia_actual= date("d");
							$mes_actual= date("m");
							$ano_actual= date("Y");
	
							$cadena = $ano_actual."-".$mes_actual."-".$dia_actual;
							$entradas = $eventos['nroentradas']- $eventos['entradasvendidas'];
							
							if($eventos['fechalimite']>= $cadena && $entradas >0 ){
							
								if ($usuario==""){
							
									$url= "error=1";
									?>
									<a href="events.php"  class="btn btn-success btn-block">Debe loguearse para comprar</a>
									<?php
								}
								if($url==""){
							
				?>
				<a href="compra_entradas.php?idevento=<?php echo $eventos['idevento']; ?>"  class="btn btn-success btn-block">Comprar</a>
				
				<?php
				} }
				
				else{
				?>
				<a class="btn btn-info btn-block">Finalizado</a>
				<?php
				}
				?>
				</div>
							
				<img class="img-responsive" src="static/images/<?php echo $eventos['idevento'].".jpg";?>" alt="">
							
				<div class="caption">
								
				<h3 class="single-title"><a href="event.php?idevento=<?php echo $eventos['idevento']; ?>" ><?php echo $eventos["nombre"]?></a></h3>
				<p>Sede: <?php echo $eventos['lugar']?></p>
				<p>Fecha y hora: <?php echo $dia_evento."-".$mes_evento."-".$ano_evento; ?> <?php echo $eventos['horainicio']?></p>
				<p><?php if ($eventos['preciounit']== 0){ echo "Ingreso Libre" ;} else {echo "Precio: ".$eventos['preciounit'];}?></p>
				
				<p><?php echo $eventos['descripcion']; ?></p>
				<p><a class="btn btn-default" href="event.php?idevento=<?php echo $eventos['idevento']; ?>">Ver detalles</a></p>
				</div>
			</div> 
			</div>					
					
					<?php			
					
			 	   $contador++;
				    
			   	
					
				
			 } }else {
			  echo "<font color='darkgray'>No hay eventos disponibles</font>";
			}
				
			mysqli_free_result($resultados);
			
					?>		
					
					
					
					
		</tbody>
	</table>
	
	</div>
	
	<div class="col-12 col-lg-12 text-center">
		<ul class="pagination text-center">
		<?php
				if ($total_registros) {
			
				if (($pagina - 1) > 0) { 
		?>
				
				<li id="page_nav"><a href="events.php?dia=<?php echo $dia ?>&mes=<?php echo $mes ?>&ano=<?php echo $ano ?>&precio=<?php echo $precio ?>&pagina="<?php echo($pagina-1)?>">Anterior</a></li>
				
				
				
		<?php } else {
		?>
			
				<li class="disabled"><a>Anterior</a></li>
			
		<?php }
		
			
			for ($i = 1; $i <= $total_paginas; $i++) {
				if ($pagina == $i) {
					
				?>
					<li class="active" id="page_nav"><a><?php echo $pagina ?></a></li>
				<?php
				} else {
				?>
					
					<li id="page_nav"><a href="events.php?dia=<?php echo $dia ?>&mes=<?php echo $mes ?>&ano=<?php echo $ano ?>&precio=<?php echo $precio ?>&pagina=<?php echo $i ?>"><?php echo $i?></a></li>
				<?php }	
			}
	  		
			if (($pagina + 1)<=$total_paginas) {
				
				?>
				<li id="page_nav"><a href="events.php?dia=<?php echo $dia ?>&mes=<?php echo $mes ?>&ano=<?php echo $ano ?>&precio=<?php echo $precio ?>&pagina=<?php echo($pagina+1)?>">Siguiente</a></li>
			<?php	
			} else {
				
				?>
				<li class="disabled" id="page_nav"><a>Siguiente</a></li>
				<?php
				
			}		 
		}
		?>	
	
	
	<?php
		mysqli_close($conn);
 	?>
	</ul>
		
	</div> 					
		</div> 

					
					<?php
					}
					}
					
					
					?>	
		
		
	







<?php
					if(isset($_GET['evento'])){
					
					
					
							$busqueda= $_GET['evento'];
						
						?>
	<hr>
	<div class="container">
	<div class="row">
		<table>
			
		<tbody>
						
						<?php
							$registros = 4;

							$contador = 1;
								if($_GET['pagina']){
								 $pagina= $_GET['pagina'];
								 }

								if (!$pagina) { 
									$inicio = 0; 
									$pagina = 1; 
								} else { 
									$inicio = ($pagina - 1) * $registros; 
							} 
							
							$conn = new mysqli('localhost','a2968841_pitreal', 'a2968841_pitreal', 'a2968841_pitreal');
							$fecha= $ano."-".$mes."-".$dia;
								
							
								$query4="SELECT * FROM evento WHERE nombre LIKE '%$busqueda%' AND estado = 'Activo'";
								
						$resultados = mysqli_query($conn,$query4);
						
						
						$total_registros = mysqli_num_rows($resultados); 
						$query5 = $query4." ORDER BY nombre ASC LIMIT $inicio, $registros";
						
						
						$resultados = mysqli_query($conn,$query5);
						
						$total_paginas = ceil($total_registros / $registros);
						
						
			
						
						
			if ($total_registros) {
				while ($eventos = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
				
				$fecha_evento= $eventos['fechainicio']; 
				$partes = explode("-", $fecha_evento);
				$ano_evento = $partes[0]; // 
				$mes_evento = $partes[1]; 
				$dia_evento= $partes[2];
				
				
				
				?>		
					
			<div class="box col-xs-12 col-md-4 col-sm-6 col-lg-3">		
			<div class="thumbnail">
								
				<div class="plus">
				<?php
				
				date_default_timezone_set('America/Lima');
							$dia_actual= date("d");
							$mes_actual= date("m");
							$ano_actual= date("Y");
	
							$cadena = $ano_actual."-".$mes_actual."-".$dia_actual;
							$entradas = $eventos['nroentradas']- $eventos['entradasvendidas'];
							
							if($eventos['fechalimite']>= $cadena && $entradas >0 ){
							
								if ($usuario==""){
							
									$url= "error=1";
									?>
									<a href="events.php"  class="btn btn-success btn-block">Debe loguearse para comprar</a>
									<?php
								}
								if($url==""){
							
				?>
				<a href="compra_entradas.php?idevento=<?php echo $eventos['idevento']; ?>"  class="btn btn-success btn-block">Comprar</a>
				
				<?php
				} }
				
				else{
				?>
				<a class="btn btn-info btn-block">Finalizado</a>
				<?php
				}
				?>
				</div>
							
				<img class="img-responsive" src="static/images/<?php echo $eventos['idevento'].".jpg";?>" alt="">
							
				<div class="caption">
								
				<h3 class="single-title"><a href="event.php?idevento=<?php echo $eventos['idevento']; ?>" ><?php echo $eventos["nombre"]?></a></h3>
				<p>Sede: <?php echo $eventos['lugar']?></p>
				<p>Fecha y hora: <?php echo $dia_evento."-".$mes_evento."-".$ano_evento; ?> <?php echo $eventos['horainicio']?></p>
				<p><?php if ($eventos['preciounit']== 0){ echo "Ingreso Libre" ;} else {echo "Precio: ".$eventos['preciounit'];}?></p>
				
				<p><?php echo $eventos['descripcion']; ?></p>
				<p><a class="btn btn-default" href="event.php?idevento=<?php echo $eventos['idevento']; ?>">Ver detalles</a></p>
				</div>
			</div> 
			</div>					
					
					<?php			
					
			 	   $contador++;
				    
			    
				}		
			 } else {
			  echo "<font color='darkgray'>No hay eventos disponibles</font>";
			}
				
			mysqli_free_result($resultados);
			
					?>		
					
					
					
					
		</tbody>
	</table>
	
	</div>
	
	<div class="col-12 col-lg-12 text-center">
		<ul class="pagination text-center">
		<?php
				if ($total_registros) {
			
				if (($pagina - 1) > 0) { 
		?>
				
				<li id="page_nav"><a href="events.php?evento=<?php echo $busqueda ?>&pagina="<?php echo($pagina-1);?>">Anterior</a></li>
				
				
				
		<?php } else {
		?>
			
				<li class="disabled"><a>Anterior</a></li>
			
		<?php }
		
			
			for ($i = 1; $i <= $total_paginas; $i++) {
				if ($pagina == $i) {
					
				?>
					<li class="active" id="page_nav"><a><?php echo $pagina ?></a></li>
				<?php
				} else {
				?>
					
					<li id="page_nav"><a href="events.php?evento=<?php echo $busqueda ?>&pagina=<?php echo $i ?>"><?php echo $i?></a></li>
				<?php }	
			}
	  		
			if (($pagina + 1)<=$total_paginas) {
				
				?>
				<li id="page_nav"><a href="events.php?evento=<?php echo $busqueda ?>&pagina=<?php echo($pagina+1)?>">Siguiente</a></li>
			<?php	
			} else {
				
				?>
				<li class="disabled" id="page_nav"><a>Siguiente</a></li>
				<?php
				
			}		 
		}
		?>	
	
	
	<?php
		mysqli_close($conn);
 	?>
	</ul>
		
	</div> 					
		</div> 

					
					<?php
					
					}
					
					
					?>		
		
		
		
		
		
		
		
		
		
		
		
		
<!-- TODOS--> 


<?php
if($query4 ==""){

$registros = 4;

$contador = 1;
if($_GET['pagina']){
 $pagina= $_GET['pagina'];
 }

if (!$pagina) { 
    $inicio = 0; 
    $pagina = 1; 
} else { 
    $inicio = ($pagina - 1) * $registros; 
} 
?>
<hr>
	<div class="container">
	<div class="row">
	<table>
			
		<tbody> 
			<?php
                        $conn = new mysqli('localhost', 'root', 'toortoor', 'eventos');
			$resultados = mysqli_query($conn,"SELECT * FROM evento WHERE estado = 'Activo'");
 
			$total_registros = mysqli_num_rows($resultados); 
			
			$resultados = mysqli_query($conn,"SELECT * FROM evento where estado = 'Activo' ORDER BY nombre ASC LIMIT $inicio, $registros");	
			 
			$total_paginas = ceil($total_registros / $registros); 		  			
			 
			if ($total_registros) {
				while ($eventos = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
				
				$fecha_evento= $eventos['fechainicio']; //2013-09-30
				$partes = explode("-", $fecha_evento);
				$ano_evento = $partes[0]; // 
				$mes_evento = $partes[1]; 
				$dia_evento= $partes[2];
				
				
				?>		
					
				<div class="box col-xs-12 col-md-4 col-sm-6 col-lg-3">		
				<div class="thumbnail">
								
				<div class="plus">
				<?php
				
				date_default_timezone_set('America/Lima');
							$dia_actual= date("d");
							$mes_actual= date("m");
							$ano_actual= date("Y");
	
							$cadena = $ano_actual."-".$mes_actual."-".$dia_actual;
							$entradas = $eventos['nroentradas']- $eventos['entradasvendidas'];
							
							if($eventos['fechalimite']>= $cadena && $entradas >0 ){
							
								if ($usuario==""){
							
									$url= "error=1";
									?>
									<a href="events.php"  class="btn btn-success btn-block">Debe loguearse para comprar</a>
									<?php
								}
								if($url==""){
							
				?>
				<a href="compra_entradas.php?idevento=<?php echo $eventos['idevento']; ?>"  class="btn btn-success btn-block">Comprar</a>
				
				<?php
				} }
				
				else{
				?>
				<a class="btn btn-info btn-block">Finalizado</a>
				<?php
				}
				
				?>
				</div>
							
				<img class="img-responsive" src="static/images/<?php echo $eventos['idevento'].".jpg";?>" alt="">
							
				<div class="caption">
								
				<h3 class="single-title"><a href="event.php?idevento=<?php echo $eventos['idevento']; ?>" ><?php echo $eventos["nombre"]?></a></h3>
				<p>Sede: <?php echo $eventos['lugar']?></p>
				<p>Fecha y hora: <?php echo $dia_evento."-".$mes_evento."-".$ano_evento; ?> <?php echo $eventos['horainicio']?></p>
				<p><?php if ($eventos['preciounit']== 0){ echo "Ingreso Libre" ;} else {echo "Precio: ".$eventos['preciounit'];}?></p>
				
				<p><?php echo $eventos['descripcion']; ?></p>
				<p><a class="btn btn-default" href="event.php?idevento=<?php echo $eventos['idevento']; ?>">Ver detalles</a></p>
				</div>
				</div> 
				</div>					
					
					<?php			
					
			 	   $contador++;
				    
			    }		
			 } else {
			  echo "<font color='darkgray'>No hay eventos disponibles</font>";
			}
				
			mysqli_free_result($resultados);	
			?>
		</tbody>
	</table>
	</div>
	
	
	<div class="col-12 col-lg-12 text-center">
		<ul class="pagination text-center">
		<?php
				if ($total_registros) {
			
				if (($pagina - 1) > 0) { 
		?>
				
				<li id="page_nav"><a href="events.php?pagina=<?php echo($pagina-1)?>">Anterior</a></li>
				
		<?php } else {
		?>
			
				<li class="disabled"><a>Anterior</a></li>
			
		<?php }
		
			
			for ($i = 1; $i <= $total_paginas; $i++) {
				if ($pagina == $i) {
					
				?>
					<li class="active" id="page_nav"><a><?php echo $pagina ?></a></li>
				<?php
				} else {
				?>
					
					<li id="page_nav"><a href="events.php?pagina=<?php echo $i ?>"><?php echo $i?></a></li>
				<?php }	
			}
	  		
			if (($pagina + 1)<=$total_paginas) {
				
				?>
				<li id="page_nav"><a href="events.php?pagina=<?php echo($pagina+1)?>">Siguiente</a></li>
			<?php	
			} else {
				
				?>
				<li class="disabled" id="page_nav"><a>Siguiente</a></li>
				<?php
				
			}		 
		}
		?>	
		</ul>
	
	</div> 
	</div>
	<?php
		mysqli_close($conn);
		
		
		}
 	?>

	
<?php
	include("footer.php");
?>