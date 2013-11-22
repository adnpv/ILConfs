<?php
	session_start();
	include("header.php");
?>

<div class="jumbotron">
	
</div>

	
<!-- Example row of columns -->
<div class="container">
    <div class="row">
	  
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
						<li class="active"><a href="#home" data-toggle="tab"><i class="icon-info-sign"></i> <h3>Información del evento</h3></a></li>
						<!--<li ><a href="#profile" data-toggle="tab"><i class="icon-info-sign"></i> DESCRIPTION TAB 2</a></li>-->
					</ul>
					<!-- /TABS CONTROLS -->
						<!-- PANES -->
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade in active" id="home">
								<p>{{event.description}}. Este evento se llevó a cabo en las instalaciones del Swiss Hotel , el 15 de Agosto del 2013 </p>
							</div>
							<!--<div class="tab-pane fade widget-tags " id="profile">
								<p>{{event.description}}. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet. Some text description lorem ipsum dolor sit amet.  </p>
							</div>-->
						</div>
					</div>
				</div>
<hr>


<!-- INNER ROW-FLUID-->

</div>
<!-- /CONTENT SIDE-->
   
<!-- RIGHT SIDE-->   
	<div class="col-sm-12 col-lg-5">
        <h2>Descarga de materiales</h2>
		<hr>
		  	<div class="list-group">
				<!--<a href="#" class="list-group-item active"><span class="badge">134</span></a>-->
				<a href="#" class="list-group-item">Tema1.ppt</a>
				<a href="#" class="list-group-item">Tema2.ppt</a>
				<a href="#" class="list-group-item">Tema3.ppt</span></a>
				<a href="#" class="list-group-item">Tema4.ppt</a>
			</div>
		<hr>
		  
		
         
    </div>
<!-- /RIGHT SIDE--> 
<!-- .pager -->
<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 pull-left">
	<ul class="pager">
	  <li class="previous"><a href="#">&larr; Anterior</a></li>
	  <li class="next"><a href="#">Siguiente &rarr;</a></li>
	</ul>
</div>
<!-- /.pager -->
</div>

 <hr>

<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								Categorias
								<select name="categorias" class="form-control">
								  <option value="all">Todas</option>
								  <option>Categ1</option>
								  <option>Categ2</option>
								  <option>Categ3</option>
								  <option>Categ4</option>
								</select>
							</div>
							<div class="form-group">
								Día:
								<select name="dia" class="form-control">
									<option value="all">Todos</option>
						  			<option value="1">1</option>
						  			<option value="2">2</option>
						  			<option>3</option>
						  			<option>4</option>
						  			<option>5</option>
						  			<option>6</option>
						  			<option>7</option>
						  			<option>8</option>
						  			<option>9</option>
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
						  			<option>25</option>
						  			<option>26</option>
						  			<option>27</option>
						  			<option>28</option>
						  			<option>29</option>
						  			<option>30</option>
						  			<option>31</option>
								</select>
							</div>
							<div class="form-group">
								Mes:
								<select name="mes" class="form-control">
									<option>Todos</option>
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
							<div class="form-group">
								Año:
								<select name="ano" class="form-control">
									<option>Todos</option>
					  				<option>2013</option>
					  				<option>2014</option>
					  				<option>2015</option>
					  				<option>2016</option>
								</select>
							</div>
							<div class="form-group">
								Precio:
								<select name="precio" class="form-control">
									<option>Todos</option>
					  				<option>Gratis</option>
					  				<option>Pago</option>
								</select>
							</div>
							<div class="form-group">
								<input name="nombre" type="text" class="form-control" placeholder="Nombre">
							</div>
						  	<button type="submit" class="btn btn-primary">Buscar</button>
				</form><!--</li>-->
		</ul>
		
</div><!-- /.navbar-collapse -->  






<div class="container sub">
	<h3>pasados</h3>
	<!-- Example row of columns -->
	<div class="row">
	{% if events.count > 0 %}
		{% for event in events %}
				<!-- portfolio item -->
				<div class="box col-xs-12 col-md-4 col-sm-6 col-lg-3">
					<!-- START WRAPPER IMG THUMBNAIL-->
					<div class="thumbnail">
								<!-- NAV LINKS -->
								<div class="plus">
										<a href="#" title="read more" class="btn btn-medium btn-default"><i class="fa-icon-heart"></i> Lugar</a>
										
										<!--  btn-danger-->
								</div>
								<!-- /NAV LINKS -->
							<!-- / IMAGE-->
							<img class="img-responsive" src="http://specialevents.livenation.com/images/home_slideshow/CCAHP_0336.jpg" alt="">
							<!-- / IMAGE-->
							<div class="caption">
								<!-- TITLE-->
								<h3 class="single-title"><a href="#" title="">{{event.name}}</a></h3>
								<!-- END TITLE-->
						<!-- META-->
						<span class="meta">
							<i class="fa-icon-calendar"></i> {{event.start_date}}
						</span>
						<!-- END META-->
						<!-- PARAGRAPH -->
							<p>{{ event.description | lower | truncatewords:"10" }} 
							</p>
							<p><a class="btn btn-default" href="/get/{{event.id}}">View details »</a>
							</p>
						<!-- /PARAGRAPH -->
						
						</div><!-- /caption-->
					</div> 
				</div>
	{% endfor %}
	{% else %}
		<p>None to show!</p>
	{% endif %}

	</div>
<hr>
<div class="row">
<!-- PAGINATION-->
<div class="col-12 col-lg-12 text-center">

<ul class="pagination text-center">
  <li class="disabled"><a href="#">Previous</a></li>
  <li class="active" id="page_nav"><a href="#">1</a></li>
  <li id="page_nav"><a href="#">2</a></li>
  <li id="page_nav"><a href="#">3</a></li>
  <li id="page_nav"><a href="#">4</a></li>
  <li id="page_nav"><a href="#">5</a></li>
  <li id="page_nav"><a href="#">Next</a></li>
</ul>
</div>
<!-- END PAGINATION-->
</div>
<hr>



	<h3>Futuros</h3>
	<div class="row">
	{% if events.count > 0 %}
		{% for event in events %}
				<!-- portfolio item -->
				<div class="box col-xs-12 col-md-4 col-sm-6 col-lg-3">
					<!-- START WRAPPER IMG THUMBNAIL-->
					<div class="thumbnail">
								<!-- NAV LINKS -->
								<div class="plus">
										<a href="#" title="read more" class="btn btn-medium btn-default"><i class="fa-icon-heart"></i> Lugar</a>
										
										<!--  btn-danger-->
								</div>
								<!-- /NAV LINKS -->
							<!-- / IMAGE-->
							<img class="img-responsive" src="http://specialevents.livenation.com/images/home_slideshow/CCAHP_0336.jpg" alt="">
							<!-- / IMAGE-->
							<div class="caption">
								<!-- TITLE-->
								<h3 class="single-title"><a href="#" title="">{{event.name}}</a></h3>
								<!-- END TITLE-->
						<!-- META-->
						<span class="meta">
							<i class="fa-icon-calendar"></i> {{event.start_date}}
						</span>
						<!-- END META-->
						<!-- PARAGRAPH -->
							<p>{{ event.description | lower | truncatewords:"10" }} 
							</p>
							<p><a class="btn btn-default" href="/get/{{event.id}}">View details »</a>
							</p>
						<!-- /PARAGRAPH -->
						
						</div><!-- /caption-->
					</div> 
				</div>
	{% endfor %}
	{% else %}
		<p>None to show!</p>
	{% endif %}

	</div>
</div>

<hr>
<div class="row">
<!-- PAGINATION-->
<div class="col-12 col-lg-12 text-center">

<ul class="pagination text-center">
  <li class="disabled"><a href="#">Previous</a></li>
  <li class="active" id="page_nav"><a href="#">1</a></li>
  <li id="page_nav"><a href="#">2</a></li>
  <li id="page_nav"><a href="#">3</a></li>
  <li id="page_nav"><a href="#">4</a></li>
  <li id="page_nav"><a href="#">5</a></li>
  <li id="page_nav"><a href="#">Next</a></li>
</ul>
</div>
<!-- END PAGINATION-->
</div>
<hr>

</div>

<?php
	include("FOOTER.php");
?>

