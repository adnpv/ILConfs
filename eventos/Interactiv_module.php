<?php
	session_start();
	include("header.php");
?>

<div class="container sub">
	<!-- Example row of columns -->
	<div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
        <div class="well col-xs-12 col-md-8">
            <h2>{{event.name}}</h2>
            <h4>Criptografia de Hoy</h4>


            <div class="panel panel-default">
					<div class="panel-body">
						<ul id="myTab" class="nav nav-tabs">
							<li class="active"><a href="#home" data-toggle="tab">Preguntar</a></li>
							<li><a href="#profile" data-toggle="tab">Responder</a></li>
			
						</ul>
						<div id="myTabContent" class="tab-content ">
							<div class="tab-pane fade in active" id="home">
								<h3>Realice su pregunta</h3>
								<input class="form-control input-lg" type="text" placeholder="Titulo">
								<textarea class="form-control" rows="3"></textarea>
								<button type="button" class="btn btn-primary">Enviar</button>
						
							</div>
							<div class="tab-pane fade widget-tags" id="profile">
								<h3>¿Que Algoritmo es mas Seguro?</h3>
								<div class="radio">
								  <label>
								    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
								    DES
								  </label>

								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								    3DES
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								    AES
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								    RSA
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								    WPA2
								  </label>
								</div>
								<div class="row">
  									<div class="col-md-4">
										<button type="button" class="btn btn-primary">Responder</button>
									</div>
								</div>
							</div>
					  	</div>
					</div>
				</div>
          
        </div><!--/span-->

        <div class="col-xs-6 col-md-4 " id="sidebar" role="navigation">
          
          <div class="well sidebar-nav">
            <h3>Calendario/entradas</h3>
			<!--
				<div class="panel panel-default">
					<div class="panel-body">
						
					</div>
				</div>-->
				
				<div class="panel panel-default">
					<div class="panel-body">
						<ul id="myTab" class="nav nav-tabs">
							<li class="active"><a href="#patty" data-toggle="tab">Cal</a></li>
							<li><a href="#enrique" data-toggle="tab">Entradas</a></li>
			
						</ul>
						<div id="myTab" class="tab-content">
							<div class="tab-pane fade in active" id="patty">
								<div class="row">
									<div class="col-xs-4 col-sm-4 col-lg-4 text-center">
										<div class="thumbnail" style="">
											<!--<img src="http://lorempixel.com/260/195/technics/1" class="img-responsive" alt="">-->
										</div>
									</div>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<a class="" href=""><h5>Ruby Perú</h5></a>

									</div>
								</div>
								
								<div class="row">
									<div class="col-xs-4 col-sm-4 col-lg-4 text-center">
										<div class="thumbnail" style="">
											<!--<img src="http://lorempixel.com/260/195/technics/1" class="img-responsive" alt="">-->
										</div>
									</div>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<a class="" href=""><h5>Startup Weekend</h5></a>

									</div>
								</div>
						
						
							</div>
							<div class="tab-pane fade widget-tags" id="enrique">
								<div class="list-group">
									<a href="#" class="list-group-item active">Simposio<span class="badge">134</span></a>
									<a href="#" class="list-group-item">Ruby Perú</a>
									<a href="#" class="list-group-item">Startup Weekend</a>
									<a href="#" class="list-group-item">Anual Forum<span class="badge">14</span></a>
									<a href="#" class="list-group-item">Agile Lima</a>
								</div>
							</div>
					  	</div>
					</div>
				</div>


          </div><!--/.well -->

          <div class="well sidebar-nav">
            <h3>Socios Estratégicos</h3>
            <ul class="nav">
              <li>Socios Estratégicos</li>
            </ul>
          </div><!--/.well -->


        </div><!--/span-->
      </div><!--/row-->


</div>

<?php
	include("FOOTER.php");
?>

<!--
	</body>
</html>
-->