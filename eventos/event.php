<?php
	session_start();

	mysql_connect('localhost', 'root', 'toortoor') or die(mysql_error());
	mysql_select_db('eventos') or die(mysql_error());

	if($_GET['idevento']==""){
	header('Location: home.php');
	}
	
	$idevento=$_GET['idevento'];

	$query="select * from evento where idevento='$idevento'";
	$result=mysql_query($query) or die (mysql_error());

	$p = array();
	if ($d = mysql_fetch_array($result))
	{
		$p = $d;
		
	}

	$query2="select * from tema where idevento='$idevento'";
	$result2=mysql_query($query2) or die (mysql_error());

	$r = array();
	while ($e = mysql_fetch_array($result2))
	{
		$r[] = $e;
	}	
	
	
	    $fecha_evento= $p['fechainicio']; //2013-09-30
		$partes = explode("-", $fecha_evento);
		$ano_evento = $partes[0]; // 
		$mes_evento = $partes[1]; 
		$dia_evento= $partes[2];
	
	
	
	include("header.php");
?>

<html lang="es"> <meta charset="utf-8"/>
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Detalle de evento</h1>
			</div>
		</div>
	</div>
</div>



	

<div class="container">
   
	  
	<div class="col-sm-12 col-lg-7">
			<div class="panel">
				<div class="panel-heading">
					<h2><?php echo $p['nombre'] ?></h2>
				</div>
				<div class="panel-body">
				
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="home">
							<p><?php echo $p['descripcion'] ?></p>
							


<div class="col-sm-1 col-lg-4">						
<div class="panel-body ">
<SCRIPT LANGUAGE="JavaScript">
var now = new Date();
var month_array = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

document.write("<form name=date_list><table bgcolor=blue><tr><td>");

var fecha = new Date();

var ano = fecha.getFullYear();
var mes = fecha.getMonth();
month_array[fecha.getMonth()]
document.write("<td><font color=black>"+month_array[fecha.getMonth()]+"  "+ano+"</font></td>");

document.write("</select></td></tr><tr><td colspan=2><right>");

document.write("<table bgcolor=white border=0 cellspacing = 0 cellpading = 0 width=123120%><tr bgcolor=black align=right>");
document.write("<td><font color=white>L</font></td><td><font color=white>M</td><td><font color=white>M</td><td><font color=white>J</td><td><font color=white>V</td><td ><font color=white>S</td><td ><font color=white>D</td>");
document.write("</tr><tr>");
for(j=0;j<6;j++)
{
 for(i=0;i<7;i++)
 {
   document.write("<td align=right id=d"+i+"r"+j+"></td>")
 }
 document.write("</tr>");
}

document.write("</table>");

document.write("</right></from></td></tr></table>");

var show_date = new Date();

function set_cal(show_date)
{
begin_day = new Date (show_date.getYear(),show_date.getMonth(),1);
begin_day_date = begin_day.getDay();
end_day = new Date (show_date.getYear(),show_date.getMonth()+1,1);
count_day = (end_day - begin_day)/1000/60/60/24;
input_table(begin_day_date,count_day);
}
set_cal(show_date);

function input_table(begin,count)
{
init();
j=0;
if (begin!=0){i=begin-1;}else{i=6}
for (c=1;c<count+1;c++)
{
 colum_name = eval("d"+i+"r"+j);
 

 if ((<?php echo $partes[2]?> == c)&&(show_date.getMonth() == now.getMonth())&&(show_date.getYear() == now.getYear())) {colum_name.style.backgroundColor = "grey";colum_name.style.color = "white";};
 colum_name.innerText =  c;
 i++;
 if (i==7){i=0;j++;}
}
}

function init()
{
for(j=0;j<6;j++)
{
 for(i=0;i<7;i++)
 {
 colum_name = eval("d"+i+"r"+j);
 colum_name.innerText =  "-";
 colum_name.style.backgroundColor ="";
 colum_name.style.color ="";
 }
}
}

</script>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</div>
</div>
<div class="col-sm-1 col-lg-8">						
<div class="panel-body ">
							<p>Dirección:<?php echo $p['lugar']?></p>
							<p>Fecha: <?php echo $partes[2]."/".$partes[1]."/".$partes[0]?></p>	
							<p>Hora de registro: <?php echo $p['horaregistro']?></p>	
							<p>Hora de inicio: <?php echo $p['horainicio']?></p>
							<p>Entradas disponibles: <?php echo $p['nroentradas']-$p['entradasvendidas'];?></p>
							<p>Precio: <?php if($p['preciounit']==0){echo "Gratuito";} else {echo $p['preciounit'];}?></p>	
							<?php
							
							$url= "compra_entradas.php?idevento=".$p['idevento'];
							
							if ($usuario==""){
							
							$url= "event.php?idevento=".$p['idevento']."&error=1";
							
							}
							
							date_default_timezone_set('America/Lima');
							$dia_actual= date("d");
							$mes_actual= date("m");
							$ano_actual= date("Y");
	
							$cadena = $ano_actual."-".$mes_actual."-".$dia_actual;
							$entradas = $p['nroentradas']- $p['entradasvendidas'];
							
							if($p['fechalimite']>= $cadena && $entradas >0 ){
							
							
							?>
							
							<a class="btn btn-warning btn-primary" href="<?php echo $url ?>">Comprar</a>
							<?php if($_GET['error']==1){ 
							$error= "*Debe loguearse para comprar";
							?>
							<span style="color:red"><?php echo $error ?></span>
							<?php }} ?>
							
							</div></div>
						</div>
							
					</div>
				</div>
			</div>
	</div>

 

	<div class="col-sm-12 col-lg-5">
	    <div class="thumbnail">
			<img class="img-responsive" src="static/images/<?php echo $p['idevento'].".jpg"; ?>" alt="post image">
		</div>
       <div class="panel">
					<div class="panel-heading">
						<h3> Sede del evento</h3>
					</div>
					<div class="panel-body">
						<a href="http://maps.google.com/maps?f=q&hl=en&q=<?php echo $p['latitud']?>,<?php echo $p['longitud']?>" target="_blank">
						<img class="img-responsive" src="http://maps.google.com/maps/api/staticmap?center=<?php echo $p['latitud']?>,<?php echo $p['longitud']?>&zoom=15&size=450x250&maptype=roadmap&markers=color:red|color:red|label:C|<?php echo $p['latitud']?>,<?php echo $p['longitud']?>&sensor=false">
						</a>
					</div>
				</div>
		
         
    </div>

</div>
 
 
<!-- TEMAS Y EXPOSITORES -->

		      	
				<div class="container">
				<div class="panel-heading">
				<p><h3>TEMAS</h3></p>
				</div></div>
				</br>

			<!-- TEMAS -->
				<div class="container">
			    <div class="row featurette">
				
				    <div class="col-sm-12 col-lg-7 col-md-7">
						<div class="container">
							<?php for($i=0; $i<=1000; $i++){
							if($r[$i]['nombre'] != ""){
							$busqueda = str_replace(" ", "+", $r[$i]['nombre']);
							?>
							<h4 class="featurette-heading"><?php echo $r[$i]['nombre']; ?></h4>
							<p>Inicio: <?php echo $r[$i]['horainicio']." ";?>Fin: <?php echo $r[$i]['horafin'];?></p>
							
							<p><?php echo $r[$i]['descripcion'];?></p>
							<p><a href="https://www.google.com.pe/#q=<?php echo $busqueda; ?>" target=_blank><img width=" 20px"height="20px" src="http://blog.marginmedia.com.au/Portals/92872/images/google-g-logo.png" alt="item" />Buscar tema</a></p>
							</br>
							<?php }}?>
						</div>
					
					</div>
			        <div class="col-md-5">
			          
						<div 	class="col-xs-8 col-sm-5 col-md-5 col-lg-5">
							<object type="application/x-shockwave-flash" data="3.swf" width="450" height="230">
			
							<param name="quality" value="high" />
							<param name="wmode" value="opaque" />
							<param name="swfversion" value="8.0.35.0" />
							<param name="expressinstall" value="scripts/expressInstall.swf" />
          
							<div>
							<h4>El contenido de esta página requiere una versión más reciente de Adobe Flash Player.</h4>
							<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
							</div>
          
							</object>
						</div>
			        </div>
			    
				</div>
				</div>

			    <div class="container">
				<div class="panel-heading">
				<p><h3>EXPOSITORES</h3></p>
				</div></div>
				</br>

		    <!--EXPOSITORES -->
				<div class="container">
			    <div class="row featurette">
			        <div class="col-md-5">
			          
						<div 	class="col-xs-8 col-sm-5 col-md-5 col-lg-5">
							<img src="static/images/900.jpg" alt="item" />
						</div>
			        </div>
					
			        <div class="col-sm-12 col-lg-7 col-md-7">
						<div class="container">
							<?php 
							$conta=0;
							
							for($i=0; $i<=1000; $i++){
							$conta++;
												
							if($r[$i]['idusuario'] != ""){
							$aja=$r[$i]['idusuario'];
							
							$query3="select nombres, apepat,apemat from usuario where idusuario='$aja'";
							
							$result3=mysql_query($query3) or die (mysql_error());

							$s = array();
							if ($t = mysql_fetch_array($result3))
							{
								$s = $t;
							
							}
							
							$query4="select * from expositor where idusuario='$aja'";
							
							$result4=mysql_query($query4) or die (mysql_error());

							$z = array();
							if ($x = mysql_fetch_array($result4))
							{
								$z = $x;
							
							}
							
							
							$bus_nom = str_replace(" ", "+", $s['nombres']);
							$bus_pat = str_replace(" ", "+", $s['apepat']);
							$bus_mat = str_replace(" ", "+", $s['apemat']);
														
							?>
							<h4 class="featurette-heading"><?php echo $s['nombres']; ?> <?php echo $s['apepat']; ?> <?php echo $s['apemat']; ?></h4>
								
							<p> <?php echo $z['descripcion']; ?> </p>
							<p><a href="https://www.google.com.pe/#q=<?php echo $bus_nom; ?>+<?php echo $bus_pat; ?>+<?php echo $bus_mat; ?>" target=_blank><img width=" 20px"height="20px" src="http://blog.marginmedia.com.au/Portals/92872/images/google-g-logo.png" alt="item" />Buscar expositor</a></p>
							</br>
							<?php }} ?>
						</div>
					
					</div>
			    </div>
		
	<!-- comentarios -->
	
				<div class="col-sm-12 col-lg-6">
					<div id="face_comentario"><div class="fb-comments" data-href="http://www.facebook.com/pietreal<?php echo $idevento;?>" data-width="470" data-num-posts="3" data-colorscheme="light"></div></div>
				</div>			
				        
    </div>
	</html>
<?php
	include("footer.php");
?>