<?php
	session_start();
	include("header.php");
?>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=no,statusbar=0,menubar=0,resizable=0,width=750,height=700');");
}
// End -->
</script>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Crear evento</h1>
			</div>
		</div>
	</div>
</div>

<link href="static/css/calendario.css" type="text/css" rel="stylesheet">
<script src="static/js/calendar.js" type="text/javascript"></script>
<script src="static/js/calendar-es.js" type="text/javascript"></script>
<script src="static/js/calendar-setup.js" type="text/javascript"></script>

<!-- Example row of columns -->
    
	<div class="container">
      <div class="row">
	
			<div class="col-xs-8 col-sm-7 col-md-7 col-lg-7">
				<div class="panel">
					<div class="panel-heading">
						<h3> Datos del evento</h3>
					</div>
					<div class="panel-body">
					 	<form id="ajax-contacts" action="/events/pagocrea/" class="">
							<fieldset>
								<div class="form-group">
									<label for="name">Nombre del evento</label><input class="form-control" type="text" name="name" value="" placeholder="Nombre de evento" >
								</div>
								<div class="form-group">
								<label for="name">Descripción</label><textarea class="form-control" name="mensaje" rows="2" cols="25" placeholder="Escriba el detalle del evento" /></textarea>
								</div>
								
								<div class="form-group">
									<label for="lugar">Lugar</label><input class="form-control" type="text" name="lugar" value="" placeholder="Sede del evento" >
								</div>
								
								
								<div class="form-group row">
		
									<label for="dia_inicio" class="col-lg-3 control-label">Inicio evento</label>
									
									<div class="col-lg-4">
								<input type="text" name="ingreso" id="ingreso" value="yyyy-mm-dd" /> 
								<img src="static/images/calendario.png" width="15" height="15" border="0" title="Fecha Inicial" id="lanzador">
								
								<script type="text/javascript"> 
								   Calendar.setup({ 
									inputField     :    "ingreso",     // id del campo de texto 
									 ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
									 button     :    "lanzador"     // el id del botón que lanzará el calendario 
								}); 
								</script>
									</div>
									
									
									<div class="col-lg-3">
										<select class="form-control">
											<option>Hora</option>
					  						<option>01</option>
					  						<option>02</option>
											<option>03</option>
				  							<option>04</option>
				  							<option>05</option>
				  							<option>06</option>
							  				<option>07</option>								  			
							  				<option>08</option>
								  			<option>09</option>
								  			<option>10</option>
								  			<option>11</option>
								  			<option>12</option>
								  			<option>13</option>
					  						<option>14</option>
											<option>15</option>
				  							<option>16</option>
				  							<option>17</option>
				  							<option>18</option>
							  				<option>19</option>								  			
							  				<option>20</option>
								  			<option>21</option>
								  			<option>22</option>
								  			<option>23</option>
								  			<option>24</option>
										</select>
									</div>
									<div class="col-lg-2">
										<select class="form-control">
											<option>Min</option>
					  						<option>00</option>
											<option>10</option>
				  							<option>20</option>
							  				<option>30</option>	
								  			<option>40</option>
								  			<option>50</option>
								  			
										</select>
									</div>
								</div>
								<div class="form-group row">
		
									<label for="dia_inicio" class="col-lg-3 control-label">Fin evento</label>
									
									<div class="col-lg-4">
								<input type="text" name="ingreso2" id="ingreso2" value="yyyy-mm-dd" /> 
								<img src="static/images/calendario.png" width="15" height="15" border="0" title="Fecha Inicial" id="lanzador2">
								
								<script type="text/javascript"> 
								   Calendar.setup({ 
									inputField     :    "ingreso2",     // id del campo de texto 
									 ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
									 button     :    "lanzador2"     // el id del botón que lanzará el calendario 
								}); 
								</script>
									</div>
									
									
									<div class="col-lg-3">
										<select class="form-control">
											<option>Hora</option>
					  						<option>01</option>
					  						<option>02</option>
											<option>03</option>
				  							<option>04</option>
				  							<option>05</option>
				  							<option>06</option>
							  				<option>07</option>								  			
							  				<option>08</option>
								  			<option>09</option>
								  			<option>10</option>
								  			<option>11</option>
								  			<option>12</option>
								  			<option>13</option>
					  						<option>14</option>
											<option>15</option>
				  							<option>16</option>
				  							<option>17</option>
				  							<option>18</option>
							  				<option>19</option>								  			
							  				<option>20</option>
								  			<option>21</option>
								  			<option>22</option>
								  			<option>23</option>
								  			<option>24</option>
										</select>
									</div>
									<div class="col-lg-2">
										<select class="form-control">
											<option>Min</option>
					  						<option>00</option>
											<option>10</option>
				  							<option>20</option>
							  				<option>30</option>	
								  			<option>40</option>
								  			<option>50</option>
								  			
										</select>
									</div>
								</div>
								
								
								<div class="form-group row">
									<label for="registro" class="col-lg-2">Hora de registro</label>
									<div class="col-lg-2">
										<select name="registro" class="form-control">
											<option>Horas</option>
					  						<option>01</option>
					  						<option>02</option>
											<option>03</option>
				  							<option>04</option>
				  							<option>05</option>
				  							<option>06</option>
							  				<option>07</option>								  			
							  				<option>08</option>
								  			<option>09</option>
								  			<option>10</option>
								  			<option>11</option>
								  			<option>12</option>
								  			<option>13</option>
					  						<option>14</option>
											<option>15</option>
				  							<option>16</option>
				  							<option>17</option>
				  							<option>18</option>
							  				<option>19</option>								  			
							  				<option>20</option>
								  			<option>21</option>
								  			<option>22</option>
								  			<option>23</option>
								  			<option>24</option>
										</select>
									</div>
									<div class="col-lg-2">
										<select class="form-control">
											<option>Min</option>
					  						<option>00</option>
					  						<option>05</option>
											<option>10</option>
				  							<option>15</option>
				  							<option>20</option>
				  							<option>25</option>
							  				<option>30</option>								  			
							  				<option>35</option>
								  			<option>40</option>
								  			<option>45</option>
								  			<option>50</option>
								  			<option>55</option>
										</select>
									</div><br>
								</div>
								
								<div class="form-group">
									<label for="subject">Imagen del evento</label><input class="form-control" type="file" name="subject" value=""><br>
								</div>
								
								<div class="form-group">
									<label for="lugar">Coordenadas de evento :</label><input class="form-control" type="text" name="lugar" value="" placeholder="Ejm: -12.050232901863597,-77.025146484375" >
								</div>
								<div class="form-group">
								<a href="javascript:popUp('http://www.agenciacreativa.net/coordenadas_google_maps.php')">Buscar coordenadas</a>
								
								</div>
								
								<div class="panel-heading">
									<h3> Entradas</h3>
								</div>
								<div class="panel-body">
									<div class="form-group row">
										<label for="ticket" class="col-lg-2">Tipo de entrada</label>
										<div class="col-lg-2">
											<select name="ticket" class="form-control">
												<option>----</option>
						  						<option value="Gratis">Gratis</option>
						  						<option value="Pago">Pago</option>	
											</select>
										</div>
									</div>
									</div>
									
									<div class="form-group">
											<label for="email" class="col-lg-2">Cantidad</label><input class="col-lg-3"" type="text" name="email" value="">
									
											<label for="email" class="col-lg-2">Precio</label><input class="col-lg-3" type="text" name="email" value="" placeholder="En soles"><br>
									</div>
<br>
									
									<div class="form-group row">
		
									<label for="dia_inicio" class="col-lg-3 control-label">Fin de ventas</label>
									
									<div class="col-lg-4">
								<input type="text" name="ingreso3" id="ingreso3" value="yyyy-mm-dd" /> 
								<img src="static/images/calendario.png" width="15" height="15" border="0" title="Fecha Inicial" id="lanzador3">
								
								<script type="text/javascript"> 
								   Calendar.setup({ 
									inputField     :    "ingreso3",     // id del campo de texto 
									 ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
									 button     :    "lanzador3"     // el id del botón que lanzará el calendario 
								}); 
								</script>
									</div>
									
									
									<div class="col-lg-3">
										<select class="form-control">
											<option>Hora</option>
					  						<option>01</option>
					  						<option>02</option>
											<option>03</option>
				  							<option>04</option>
				  							<option>05</option>
				  							<option>06</option>
							  				<option>07</option>								  			
							  				<option>08</option>
								  			<option>09</option>
								  			<option>10</option>
								  			<option>11</option>
								  			<option>12</option>
								  			<option>13</option>
					  						<option>14</option>
											<option>15</option>
				  							<option>16</option>
				  							<option>17</option>
				  							<option>18</option>
							  				<option>19</option>								  			
							  				<option>20</option>
								  			<option>21</option>
								  			<option>22</option>
								  			<option>23</option>
								  			<option>24</option>
										</select>
									</div>
									<div class="col-lg-2">
										<select class="form-control">
											<option>Min</option>
					  						<option>00</option>
											<option>10</option>
				  							<option>20</option>
							  				<option>30</option>	
								  			<option>40</option>
								  			<option>50</option>
								  			
										</select>
									</div>
								</div>



									<div class="form-group checkbox">
									<label>
									    <input type="checkbox" value="">
									    Deseo usar el servicio de interacción (Implica un pago correspondiente a este servicio)
									  </label>
								</div>
								<div class="form-group checkbox">
									<label>
									    <input type="checkbox" value="">
									    Acepto las condiciones y términos de uso
									 </label>
								</div>

								<div class="form-group">
									<label for="submit">&nbsp;</label><input class="btn btn-lg btn-info" type="submit" name="submit" value="Crear Evento">
					</div>
				<fieldset>
			</form>
					</div>
					
					</div></div>
					
					
					
					
					
					
			
	 
	 <div class="col-xs-8 col-sm-5 col-md-5 col-lg-5">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="text-center">Organizador</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-lg-12 text-center">
							<img src="static/images/organizador.jpg" />
						</div>

					</div>
					</br>
						<ul class="list-group list-group-flush text-left">
							<li class="list-group-item">Nuestros socios podrán implementar esta tecnología y así incrementar la cantidad de participantes a sus eventos</li>
							<li class="list-group-item">Ofrecemos la difusión de eventos, venta de entradas y disponibilidad de la plataforma durante todo el evento</li>
							<li class="list-group-item">Nuestros precios son:</br> <strong>- Venta de entradas = 8%</strong> </br><strong>- Plataforma tiempo real = 3%</strong></li>
							<li class="list-group-item">Los porcentajes son en base al costo de la entrada. Pueden adquirir uno o dos de los servicios</li>
							<li class="list-group-item">Al adquirir ambos servicios, Ud. podrá ver las ventas realizadas y los ingresos obtenidos</li>
						</ul>
				</div>
				<div class="panel-footer">
					<a class="btn btn-info btn-block" href="contact.php">Contáctanos para mayor información</a>
				</div>
			</div> 
	   </div>
	 
</div></div>
  <?php
	include("footer.php");
?>

<script src="assets/js/jquery.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>



<!-- gMap PLUGIN -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="assets/js/jquery.gmap.js"></script>

<!-- CONTACTS SCRIPT-->
<script type="text/javascript" src="assets/js/contacts.js"></script>
<!-- / CONTACTS SCRIPT-->


<script type="text/javascript">
		
				jQuery(document).ready(function(){

				jQuery('#map').gMap({ address: 'Sidney',
							   panControl: true,
						   zoomControl: true,
							   zoomControlOptions: {
					style: google.maps.ZoomControlStyle.SMALL
							   },
						   mapTypeControl: true,
						   scaleControl: true,
						   streetViewControl: false,
						   overviewMapControl: true,
							   scrollwheel: true,
							   icon: {
						image: "http://www.google.com/mapfiles/marker.png",
						shadow: "http://www.google.com/mapfiles/shadow50.png",
						iconsize: [20, 34],
						shadowsize: [37, 34],
						iconanchor: [9, 34],
						shadowanchor: [19, 34]
					},
						zoom:14,
							   markers: [
							{ 'address' : 'Sidney'}
						]
							   
							   
							   }); 
				});

</script>

<!-- CONTACT FORM SCRIPT -->
<script type="text/javascript">

$(document).ready(function ()
{ // after loading the DOM
    $("#ajax-contacts").submit(function ()
    {
        // this points to our form
        var str = $(this).serialize(); // Serialize the data for the POST-request
        $.ajax(
        {
            type: "POST",
            url: '<?php echo get_template_directory_uri(); ?>/assets/includes/contact-process.php',
            data: str,
            success: function (msg)
            {
                $("#note").ajaxComplete(function (event, request, settings)
                {
                    if (msg == 'OK')
                    {
                        result = '<div class="alert alert-success">Message was sent to website administrator, thank you!</div>';
                        $("#fields").hide();
                    }
                    else
                    {
                        result = msg;
                    }
                    $(this).html(result);
                });
            }
        });
        return false;
    });
});

</script>
<!-- CONTACT FORM SCRIPT -->

