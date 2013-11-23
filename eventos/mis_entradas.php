<?php
	session_start();
	include("header.php");
	
	mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());
	
	$query7 =  "SELECT * FROM usuario WHERE usuario= '$usuario'";
	
	$result7 = mysql_query($query7)or die (mysql_error());
	
	$p = array();
	if ($d = mysql_fetch_array($result7))
	{
		$p = $d;
		
	}
	$idusuario = $p['idusuario'];
	
	$query8 =  "SELECT * FROM entrada WHERE idusuario= '$idusuario'";

	$result8 = mysql_query($query8)or die (mysql_error());
	$r = array();
	while ($e = mysql_fetch_array($result8))
	{
		$r[] = $e;
	}	
	
	date_default_timezone_set('America/Lima');
	$dia= date("d");
	$mes= date("m");
	$ano= date("Y");
	
	
?>
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Mis entradas</h1>
			</div>
		</div>
	</div>
	</div>

<div class="container sub">
	<!-- Example row of columns -->
	<div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          	<div class="well col-xs-12 col-md-8">


            	<table class="table">
	                <thead>
	                  <tr>
	                    <th >Codigo</th>
	                    <th >Nombre</th>
	                    <th >Fecha Inicio</th>
	                    <th >Hora Inicio</th>
						<th >Recibo</th>
						<th >Acción</th>
						
	                    <th ></th>
	                  </tr>
	                </thead>

					<tbody>
					
					<?php 
					
					
						
					$conta=count($r);
					
					for($i=0; $i<=$conta-1; $i++){
					
					$idevento= $r[$i]['idevento'];
					$query9 =  "SELECT * FROM evento WHERE idevento= '$idevento'";

					$result9 = mysql_query($query9)or die (mysql_error());
						$arreglo = array();
						$arreglo[$i]= mysql_fetch_array($result9);
								
							
							$codigo=$dia.$mes.$ano.$idusuario.$arreglo[$i]['idevento'];
							$_SESSION['nombre']=$arreglo[$i]['nombre'];
							$_SESSION['fechainicio']=$arreglo[$i]['fechainicio'];
							$_SESSION['horainicio']=$arreglo[$i]['horainicio'];
							$_SESSION['precio']=$arreglo[$i]['preciounit'];
							$_SESSION['codigo']=$codigo;
							$_SESSION['fechahoy']=$dia."/".$mes."/".$ano;
							$_SESSION['cliente']=$p['nombres']." ".$p['apepat']." ".$p['apemat'];
					
					?>
										
	                  <tr>
	                    <td><?php echo $arreglo[$i]['idevento']; ?></td>
	                    <td><?php echo $arreglo[$i]['nombre']; ?></td>
	                    <td><?php echo $arreglo[$i]['fechainicio']; ?></td>
	                    <td><?php echo $arreglo[$i]['horainicio']; ?></td>
						
						<td><a href="#" onclick="   window.open('recibo.php?idevento=<?php echo $arreglo[$i]['idevento']; ?>&idusuario=<?php echo $p['idusuario'] ?>', 'facebook-share-dialog', 'width=400,height=550');  return false;"> Imprimir</a></td>
	                
						<td><a href="event.php?idevento=<?php echo $arreglo[$i]['idevento']; ?>"  class="btn btn-primary">Ver</a></td>
						   </tr>
	               
					<?php
					}
					
					?>
					
					</tbody>
				</table>
			</div>
          
        </div><!--/span-->

        <div class="col-xs-6 col-md-4 " id="sidebar" role="navigation">
          
          <div class="well sidebar-nav">
            <h3>Entradas disponibles</h3>
			
					<div class="panel-body">
						
						
						<?php 
					
					
						
					$conta=count($r);
					
					for($i=0; $i<=$conta-1; $i++){
					
					$idevento= $r[$i]['idevento'];
					$query9 =  "SELECT * FROM evento WHERE idevento= '$idevento'";

					$result9 = mysql_query($query9)or die (mysql_error());
						$arreglo = array();
						$arreglo[$i]= mysql_fetch_array($result9);
								
							
							
					
					
					?>
						
						
						<div id="myTabContent" class="tab-content">
							
								<div class="list-group ">
									<a  class="list-group-item btn-default "><?php echo $arreglo[$i]['nombre']; ?><span class="badge"><?php echo $arreglo[$i]['nroentradas']-$arreglo[$i]['entradasvendidas']; ?></span></a>
									
								</div>
						</div>
						
						<?php } ?>
						
						
						
				</div>
   </div>




          


        </div><!--/span-->
      </div><!--/row-->


</div>


<?php
	include("footer.php");
?>