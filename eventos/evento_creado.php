<?php
	session_start();
	include("header.php");
?>


<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>{{event.name}}</h1>
			</div>
		</div>
	</div>
</div>

	
<!-- Example row of columns -->
    <div class="row">
		<div  class="col-sm-12">
		<!-- CONTENT SIDE-->
			<div class="col-sm-12 col-lg-7">
			<!-- article-->
				<div class="thumbnail">
					<img class="img-responsive" src="static/images/thumb1.jpg" alt="post image">
				</div>
				
				
					<div class="panel panel-default hidden-xs" style="margin-top:30px;">
						<div class="panel-body">
						<!-- TABS CONTROLS -->
							<ul id="myTab" class="nav nav-tabs nav-justified">
								<li class="active"><a href="#home" data-toggle="tab"><i class="icon-info-sign"></i>Información del evento</a></li>
								<!--<li ><a href="#profile" data-toggle="tab"><i class="icon-info-sign"></i> DESCRIPTION TAB 2</a></li>-->
							</ul>
							<!-- /TABS CONTROLS -->
								<!-- PANES -->
								<div id="myTabContent" class="tab-content">
									<div class="tab-pane fade in active" id="home">
										<p>{{event.description}}.La aparición de la Informática y el uso masivo de las comunicaciones digitales han producido un número creciente de problemas de seguridad. Las transacciones que se realizan a través de la red pueden ser interceptadas. La seguridad de esta información debe garantizarse</p>
									</div>
									<div class="tab-pane fade widget-tags " id="profile">
										<p>{{event.description}}. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet.  </p>
									</div>
								</div>
							</div>
						</div>
			<hr>


		<!-- INNER ROW-FLUID-->

			</div>
		<!-- /CONTENT SIDE-->
		   
		<!-- RIGHT SIDE-->   
			<div class="col-sm-12 col-lg-5">
		        <h3>Agregar usuarios</h3>
				<form role="form"> 
					<div class="form-group">
						<p class="">
							<label for="email">Usuario:</label><input class="form-control" type="text" name="email" value=""><br>
							<label for="email">Mail:</label><input class="form-control" type="text" name="email" value=""><br>
							<!--<label for="email">Contraseña:</label><input class="form-control" type="text" name="email" value=""><br>-->
							<label for="tipo" class="control-label">Tipo</label>
											<div class="">
												<select name="tipo" class="form-control">
													<option value="">Seleccionar</option>
											  		<option value="1">Expositor</option>
											  		<option value="2">Moderador</option>
												</select><br>
						</p>
					</div>
					<!--<p class=""><a class="btn btn-block btn-lg btn-warning" href="modal_content_name" data-toggle="modal">Agregar</a></p>-->
					<div class="form-group">
						<label for="submit">&nbsp;</label><input class="btn btn-lg btn-info" type="submit" name="submit" value="Agregar">
					</div>
				</form>
				<hr>
				<h3>Subir material del evento</h3>
				<form id="ajax-contacts" action="/events/pagocrea/" class="">
					<fieldset>
						<div class="form-group">
							<label for="name">Archivo</label><input class="form-control" type="file" name="name" value="">
						</div>
						<div class="form-group">
							<label for="submit">&nbsp;</label><input class="btn btn-lg btn-info" type="submit" name="submit" value="Guardar">
						</div>
					</fieldset>
				</form>
				
		    </div>
		<!-- /RIGHT SIDE--> 
		<!-- .pager --><!--
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-left">
			<ul class="pager">
			  <li class="previous"><a href="#">&larr; Atras</a></li>
			  <li class="next"><a href="#">Mas Imagenes &rarr;</a></li>
			</ul>
		</div>-->
		<!-- /.pager -->
		</div>

		 <hr>
	</div>
 <div style="margin-top:600px" class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Temas <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="/all">Tema1</a></li>
				  <li><a href="#">Tema2</a></li>
				  <li><a href="#">Tema3</a></li>
				  <li><a href="#">Tema4</a></li>
				</ul>
			</li>
			
		    <!--<li class="active"><a href="#top-section">Temas</a></li>-->
			<li><a href="#Section-1">Horario</a></li>
			<li><a href="#Section-2">Busqueda</a></li> 
		</ul>
		
</div><!-- /.navbar-collapse --> 

<!-- START THE FEATURETTES -->
		
      <hr class="featurette-divider">

      <div style=""class="row featurette">

      	<div class="col-md-7">
          <h2 class="featurette-heading">Tema 1 <span class="text-muted">Criptografía</span></h2>
          <p class="lead">La aparición de la Informática y el uso masivo de las comunicaciones digitales han producido un número creciente de problemas de seguridad. Las transacciones que se realizan a través de la red pueden ser interceptadas. La seguridad de esta información debe garantizarse. La aparición de la Informática y el uso masivo de las comunicaciones digitales han producido un número creciente de problemas de seguridad. Las transacciones que se realizan a través de la red pueden ser interceptadas. La seguridad de esta información debe garantizarse.</p>
        </div>
        
      	<div class="col-md-5">
          <!--<img class="featurette-image img-responsive" src="data:image/png;base64," data-src="holder.js/500x500/auto" alt="Generic placeholder image">-->
          
          <img class="featurette-image img-responsive" src="static/images/500.png" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>

        
        
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="static/images/500.png" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Expositor <span class="text-muted">Juan Pérez</span></h2>
          <p class="lead">Expositor reconocido donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
      </div>



    <!--  <hr class="featurette-divider">

      <div class="panel panel-default">
<div class="col-12 col-lg-12 panel-heading text-center">
			<h3>Pensamientos de Expertos</h3>
		</div>
<div class="panel-body">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-6">
			<div class="row">
			<div class="col-xs-12 col-sm-4 col-lg-3 hidden-xs text-right">
				<img class="img-circle" src="images/avafour.jpg" style="width: 75px; height: 75px;">
			</div>
				<div class="col-xs-12 col-sm-8 col-lg-9">
					<blockquote>
					  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					  <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-lg-6">
			<div class="row">
			<div class="col-xs-12 col-sm-4 col-lg-3 hidden-xs text-right">
				<img class="img-circle" src="images/avafour.jpg" style="width: 75px; height: 75px;">
			</div>
				<div class="col-xs-12 col-sm-8 col-lg-9">
					<blockquote>
					  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					  <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-lg-6">
			<div class="row">
			<div class="col-xs-12 col-sm-4 col-lg-3 hidden-xs text-right">
				<img class="img-circle" src="images/avafour.jpg" style="width: 75px; height: 75px;">
			</div>
				<div class="col-xs-12 col-sm-8 col-lg-9">
					<blockquote>
					  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					  <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-lg-6">
			<div class="row">
			<div class="col-xs-12 col-sm-4 col-lg-3 hidden-xs text-right">
				<img class="img-circle" src="images/avafour.jpg" style="width: 75px; height: 75px;">
			</div>
				<div class="col-xs-12 col-sm-8 col-lg-9">
					<blockquote>
					  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					  <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
					</blockquote>
				</div>
			</div>	
		</div>
	</div>
	</div>
</div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

<?php
	include("footer.php");
?>