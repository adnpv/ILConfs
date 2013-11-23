<?php
	session_start();
	
	mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());
	
	if($_GET['idevento']==""){
	header('Location: events.php');
	}
	else{
	include("header.php");
	
	}
	
	$idevento=$_GET['idevento'];
	
	$query="select * from evento where idevento='$idevento'";
	$result=mysql_query($query) or die (mysql_error());

	$p = array();
	if ($d = mysql_fetch_array($result))
	{
		$p = $d;
		
	}
	
	$query2="select * from usuario where usuario='$usuario'";
	$result2=mysql_query($query2) or die (mysql_error());

	$r = array();
	if ($s = mysql_fetch_array($result2))
	{
		$r = $s;
		
	}
	$_SESSION['nombres'] = $r['nombres'];
	$_SESSION['apepat'] = $r['apepat'];
	
?>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=550,height=700');");
}
// End -->
</script>


<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Compras</h1>
			</div>
		</div>
	</div>
</div>



<!-- Example row of columns -->
      <div class="row">
			<div class="col-sm-7 col-lg-7">
				<div class="panel">
					<div class="panel-heading">
						<h3><?php echo $p['nombre'] ?></h3>
					</div>
					<div class="panel-body">
					 	
							<legend>
								   	<label>Cliente: <?php echo $r['nombres']?> <?php echo $r['apepat']?></label></br>
								    <label>Total a pagar: S/. <?php echo $p['preciounit'] ?></label></br>
								 </legend>
						 		
							
						
								
								<p><?php echo $p['descripcion'] ?> </p>
								
								<p>Sede: <?php echo $p['lugar']?></p>
								<hr>
								
								
								<!-- NUEVONUEVONUEVONUEVONUEVONUEVONUEVONUEVONUEVONUEVONUEVONUEVO-->
								
								
								<?php 
									
										$isComprada = false;
										if(isset($r['idusuario'])){
										
											$id=$r['idusuario'];
											
											$query9 =  "SELECT 1 FROM entrada WHERE idusuario= '$id' AND idevento = '$idevento'";
											$result9 = mysql_query($query9)or die (mysql_error());
														
											if($row = mysql_fetch_assoc ($result9))
												$isComprada = true;	
										}
									
									 if(!$isComprada){
									 
										if($p['preciounit']==0){
										
										
									?>
									<A HREF="javascript:popUp('popup.php')" >Leer nuestros términos y condiciones</A></br></br>
									<img width=" 15px"height="15px" src="static/images/face.jpg" alt="item" /><a href="#" onclick="   window.open('https://www.facebook.com/sharer/sharer.php?u=www.facebook.com/pietreal', 'facebook-share-dialog', 'width=626,height=436');  return false;">  Comparte su asistencia</a>
										</br></br>
								    <a href="compra_entradas.php?idevento=<?php echo $idevento ?>&correo=true" class="btn btn-primary" >Procesar</a>
						
									<a href="event.php?idevento=<?php echo $idevento ?>"  class="btn btn-primary">Regresar</a>
									<?php
									
									if(isset($_GET['correo'])){
										if($_GET['correo']= 'true'){
										
										
											$update =  "UPDATE evento SET entradasvendidas = entradasvendidas+1 WHERE idevento='$idevento'";
											$result9 = mysql_query($update)or die (mysql_error());
										
										//r usuario
										//p evento
											$idusuario= $r['idusuario'];
											$nombre= $r['nombres'];
											$apellidos= $r['apepat']." ".$r['apemat'];
											$dni= $r['dni'];
											$correo= $r['correo'];
											
											$idevento = $p['idevento'];
											$evento= $p['nombre'];
											$fecha=$p['fechainicio'];
											$hora_inicio=$p['horainicio'];
											$hora_registro=$p['horaregistro'];
											$lugar=$p['lugar'];
											$entradas_disp= $p['nroentradas']- $p['entradasvendidas'] - 1;
											$fecha_limite = $p['fechalimite'];
											
											//OJO AQUIIIIIIIIIIIIIIIII
											
											$asistencia= "no";
											
											$codigo= rand(1,9999);
											
											$query = "INSERT INTO entrada VALUES('', '$idusuario', '$idevento','$codigo','$asistencia')";
											mysql_query($query) or die(mysql_error());
											
											$cuerpo="";
											
											//OJO AQUIIIIIIIIIIIIIIIII
											
											$cuerpo = "---DETALLE DE ENTRADA---"."\n"; 
											$cuerpo .= "Nombre: ".$nombre." ".$apellidos."\n"; 
											$cuerpo .= "DNI: ".$dni."\n"; 
											$cuerpo .= "Nos es grato comunicarnos con Ud. para informarle que su entrada al evento -".$evento."- con sede en ".$lugar.", ha sido reservada con éxito."."\n"; 
											$cuerpo .= "Por otro lado le informamos que el evento es el dia ".$fecha." a horas ".$hora_inicio." pero debe estar a las ".$hora_registro." para registrar su asistencia."."\n"; 
											$cuerpo .= "Finalmente, con la intensión de difundir nuestro servicio, le informamos que aun existen ".$entradas_disp." entradas disponibles para el evento y el último día de inscripción es el ".$fecha_limite."."."\n"; 
											$cuerpo .= "No dude en animar a sus amistades a participar junto con Ud. en este evento"."."."\n";
											$cuerpo .= "Muchas gracias"."."."\n";
											$cuerpo .= "Servicio al cliente - PIET REAL".".";
										  
										mail($correo,"Confirmación de entrada - PIET REAL", $cuerpo);
										
										
											print "<meta http-equiv=Refresh content=\"1 ; url=event.php?idevento=$idevento\">";
										
										
										}
									
									}
									}
									
									else{
									
									?>
									
									
								<form action="procesar.php" method="POST" class="form-signin">
																
								<div class="form-group">
									<label class="control-label">Titular de la tarjeta</label>
									<div class="controls">
										<input type="text" class="form-control" name="titular" title="Ingresa el nombre del titular" required>
									</div>
								</div>
						 
								<div class="form-group row">
									<label class="control-label col-lg-2">Número de tarjeta</label>
											<div class="col-lg-2">
												<input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" name="1" title="Ingresa 4 dígitos" required>
											</div>
											
											<div class="col-lg-2">
												<input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" name="2" title="Ingresa 4 dígitos" required>
											</div>
											<div class="col-lg-2">
												<input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" name="3" title="Ingresa 4 dígitos" required>
											</div>
											<div class="col-lg-2">
												<input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" name="4" title="Ingresa 4 dígitos" required>
											</div>
										
										
									
								</div>
						 
								<div class="form-group row">
		
									<label for="dia_inicio" class="col-lg-2 control-label">Fecha de expiración</label>
									
									<div class="col-lg-2">
										<select class="form-control">
											<option>Mes</option>
					  						<option>Enero</option>
					  						<option>Febrero</option>
											<option>Marzo</option>
				  							<option>Abril</option>
				  							<option>Mayo</option>
				  							<option>Junio</option>
							  				<option>Julio</option>
											<option>Agosto</option>
								  			<option>Setiembre</option>
								  			<option>Octubre</option>
								  			<option>Noviembre</option>
								  			<option>Diciembre</option>
										</select>
									</div>
									<div class="col-lg-2">
										<select class="form-control">
											<option>Año</option>
							  				<option>2013</option>
							  				<option>2014</option>
							  				<option>2015</option>
											<option>2016</option>
											<option>2017</option>
											<option>2018</option>
										</select>
									</div>
								</div>
						 
								<div class="from-group">
									<label class="control-label">Código CVV2</label>
									
											<div class="form-group">
												<input type="text" class="form-control" maxlength="3" title="Ingrese el codigo" required>
											</div>
										
									<img width=" 160px"height="110" src="static/images/cvv2.png" alt="item" /></br>
									<A HREF="javascript:popUp('popup.php')" >Leer nuestros términos y condiciones</A></br></br>
									<img width=" 15px"height="15px" src="static/images/face.jpg" alt="item" /><a href="#" onclick="   window.open('https://www.facebook.com/sharer/sharer.php?u=www.facebook.com/pietreal', 'facebook-share-dialog', 'width=626,height=436');  return false;">  Comparte su asistencia</a>

								</div>
									
									
								<button href="procesar.php" class="btn btn-primary" type="submit">Procesar</button>
									<a href="event.php?idevento=<?php echo $idevento ?>"  class="btn btn-primary">Regresar</a>
									
									<?php
									
									
									if(isset($_GET['correo'])){
										if($_GET['correo']= 'true'){
										
										
											$update =  "UPDATE evento SET entradasvendidas = entradasvendidas+1 WHERE idevento='$idevento'";
											$result9 = mysql_query($update)or die (mysql_error());
										
										//r usuario
										//p evento
											$idusuario= $r['idusuario'];
											$nombre= $r['nombres'];
											$apellidos= $r['apepat']." ".$r['apemat'];
											$dni= $r['dni'];
											$correo= $r['correo'];
											
											$idevento = $p['idevento'];
											$evento= $p['nombre'];
											$fecha=$p['fechainicio'];
											$hora_inicio=$p['horainicio'];
											$hora_registro=$p['horaregistro'];
											$lugar=$p['lugar'];
											$entradas_disp= $p['nroentradas']- $p['entradasvendidas'];
											$fecha_limite = $p['fechalimite'];
											
											//OJO AQUIIIIIIIIIIIIIIIII
											
											$asistencia= "no";
											
											$codigo= rand(1,9999);
											
											$query = "INSERT INTO entrada VALUES('', '$idusuario', '$idevento','$codigo','$asistencia')";
											mysql_query($query) or die(mysql_error());
											
											$cuerpo="";
											
											//OJO AQUIIIIIIIIIIIIIIIII
											
											$cuerpo = "---DETALLE DE ENTRADA---"."\n"; 
											$cuerpo .= "Nombre: ".$nombre." ".$apellidos."\n"; 
											$cuerpo .= "DNI: ".$dni."\n"; 
											$cuerpo .= "Nos es grato comunicarnos con Ud. para informarle que su entrada al evento -".$evento."- con sede en ".$lugar.", ha sido reservada con éxito."."\n"; 
											$cuerpo .= "Por otro lado le informamos que el evento es el dia ".$fecha." a horas ".$hora_inicio." pero debe estar a las ".$hora_registro." para registrar su asistencia."."\n"; 
											$cuerpo .= "Finalmente, con la intensión de difundir nuestro servicio, le informamos que aun existen ".$entradas_disp." entradas disponibles para el evento y el último día de inscripción es el ".$fecha_limite."."."\n"; 
											$cuerpo .= "No dude en animar a sus amistades a participar junto con Ud. en este evento"."."."\n";
											$cuerpo .= "Muchas gracias"."."."\n";
											$cuerpo .= "Servicio al cliente - PIET REAL".".";
										  
										mail($correo,"Confirmación de entrada - PIET REAL", $cuerpo);
										
										
											print "<meta http-equiv=Refresh content=\"1 ; url=event.php?idevento=$idevento\">";
										
										
										}
									
									}
									
									if(isset($_GET['error']) && $_GET['error']==1) {
										?>
										<span style="color:red">*Su tarjeta es inválida</span>
										<?php
									}
																		
									
									}
									if(!isset($_GET['error'])){ 
										?>
										<span style="color:red">*Luego de procesar, se le enviará un correo de confirmación</span>
										<?php
									}
									
									}
									else{
									
										?>
										<a href="event.php?idevento=<?php echo $idevento ?>"  class="btn btn-primary">Regresar</a>
										<span style="color:red">*Ud. ya adquirió una entrada</span>
										<?php
									
									}
									
									$_SESSION['id'] = $idevento;
									?>
								
								
									
									
									
									
									
									
									
							</form>	
						
					</div>
				  </div>
			</div>
			
			<?php if($p['preciounit']>0){ ?>
			<div class="col-xs-8 col-sm-5 col-md-5 col-lg-5">
			<object type="application/x-shockwave-flash" data="3.swf" width="480" height="240">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="8.0.35.0" />
          <param name="expressinstall" value="scripts/expressInstall.swf" />
          <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
          <div>
            <h4>El contenido de esta página requiere una versión más reciente de Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
			</div>
			
			<?php }?>
			
					<div class="col-xs-8 col-sm-5 col-md-5 col-lg-5">
					<div class="panel">
					<div class="panel-heading">
						<h3>Sede del evento</h3>
					</div>
					
					<div class="panel-body">
						<a href="http://maps.google.com/maps?f=q&hl=en&q=<?php echo $p['latitud']?>,<?php echo $p['longitud']?>" target="_blank">
						<img class="img-responsive" src="http://maps.google.com/maps/api/staticmap?center=<?php echo $p['latitud']?>,<?php echo $p['longitud']?>&zoom=15&size=625x525&maptype=roadmap&markers=color:red|color:red|label:C|<?php echo $p['latitud']?>,<?php echo $p['longitud']?>&sensor=false">
						</a>
					</div>
					</div>
					</div>
		
		</div>
      
<?php
	include("footer.php");
?>