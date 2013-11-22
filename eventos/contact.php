<?php
	include("header.php");
	
	$nombre= $_POST['nombre'];
	$correo= $_POST['correo'];
	$asunto= $_POST['asunto'];
	$mensaje= $_POST['mensaje'];
	$cuerpo="";
	
	$correo_admin="rolfcortez120@hotmail.com";
	
if( $nombre != "" || $correo != "" ||  $asunto != "" ||  $mensaje != ""){	
	
	$cuerpo = "Información de la consulta"."\n"; 
    $cuerpo .= "Nombre: ".$nombre."\n"; 
    $cuerpo .= "Correo: ".$correo."\n"; 
	$cuerpo .= "Asunto: ".$asunto."\n"; 
	$cuerpo .= "Mensaje: ".$mensaje;
  
mail($correo_admin,"Consulta Recibida", $cuerpo);

}


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Contáctanos</h1>
			</div>
		</div>
	</div>
</div>


<!-- Example row of columns -->
      
	
	<div class="row">
			<div class="col-xs-8 col-sm-5 col-md-5 col-lg-5">
				<div class="panel">
					<div class="panel-heading">
						<h3> Nuestra oficina</h3>
					</div>
					<div class="panel-body">
						<address>
						<strong>PIET REAL</strong><br>
						Centro Empresarial El Polo<br>
						Oficina 701<br>
						*Previa coordinación al número telefónico<br>
						992463202
						</address>
					</div>
				</div>
				
				<div class="panel">
					<div class="panel-heading">
						<h3> Ubicación</h3>
					</div>
					<div class="panel-body">
						<a href="http://maps.google.com/maps?f=q&hl=en&q=-12.102606,-76.970258" target="_blank">
						<img class="img-responsive" src="http://maps.google.com/maps/api/staticmap?center=-12.102606,-76.970258&zoom=15&size=610x250&maptype=roadmap&markers=color:red|color:red|label:C|-12.102606,-76.970258&sensor=false">
						</a>
					</div>
				</div>
				
				
				
			
			
			</div>
       <div class="col-12 col-lg-7">
	  
			<div class="panel">
					<div class="panel-heading">	
			<h3 class="">
				
				Comunícate con nosotros
			</h3>
			</div>
			
			<?php if($cuerpo== ""){ ?>
			<div class="panel-body">
			<!-- CONTACT FORM -->
			<form action="contact.php" method="post">
				<fieldset>
					<div class="form-group">
						<label for="name">Nombre</label><input class="form-control" type="text" name="nombre" value="" placeholder="Nombre" required/>
					</div>
					<div class="form-group">
						<label for="email">E-Mail</label><input class="form-control" type="text" name="correo" value="" placeholder="Correo electronico" required/>
					</div>
					<div class="form-group">
						<label for="subject">Asunto</label><input class="form-control" type="text" name="asunto" value="" placeholder="Asunto" required/>
					</div>
					<div class="form-group">
						<label for="message">Mensaje</label><textarea class="form-control" name="mensaje" rows="5" cols="25" placeholder="Ingrese aquí su mensaje" required/></textarea>
					</div>
					<div class="form-group">
						<label for="submit"></label><input class="btn btn-lg btn-info" type="submit" name="submit" value="Enviar">
					</div>
				<fieldset>
			</form>
		
			<!-- END CONTACT FORM -->
			</div>
			<?php } ?>
			
			<?php
			if($nombre != "" || $correo != "" ||  $asunto != "" ||  $mensaje != ""){ 
			echo "Su mensaje fue enviado.</br> Gracias por comunicarse con nosotros.</br> Se le enviará un correo de respuesta a la brevedad";
			print "<meta http-equiv=Refresh content=\"8 ; url=contact.php\">";
			}
			?>
			
			</div>			
		</div>
      </div>
<?php
	include("footer.php");
?>