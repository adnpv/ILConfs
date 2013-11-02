<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Organizador</title>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>static/js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <!--<script src="<?php //echo base_url(); ?>static/js/hideshow.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url(); ?>static/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
            $(".tablesorter").tablesorter(); 
   	} 
	);
	$(document).ready(function() {

            //When page loads.<?php echo base_url(); ?>
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });

        });
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>
<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">PIT Real</a></h1>
			<h2 class="section_title">Crear evento </h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Bienvenido organizador: John Doe</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Panel de organizador</a> 
                            <div class="breadcrumb_divider"></div> <a class="current">Crear evento</a></article>
		</div>
	</section><!-- end of secondary bar comienzo de aside column -->
	
	 <aside id="sidebar" class="column">
            <!--<form class="quick_search">
                <input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
            </form>-->
            <hr/>
           <h3>Eventos</h3>
            <ul class="toggle">
                <li class="icn_new_article"><a href="<?php echo base_url(); ?>index.php/evento">Crear evento</a></li>                
                <li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_proximos">Eventos próximos</a></li>
                <li class="icn_categories"><a href="listareventos.html">Eventos pasados</a></li>
            </ul> 
           
           <h3>Usuarios</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="<?php echo base_url(); ?>index.php/usuario">Crear usuario</a></li>
                <li class="icn_jump_back"><a href="#">Cerrar sesión</a></li>
            </ul>
           
            <h3>Cuenta</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="actualizarperfil.html">Actualizar perfil</a></li>
                <li class="icn_jump_back"><a href="#">Cerrar sesión</a></li>
            </ul>   
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->
	
	<section id="main" class="column">
            <br />
            <header><h3><?php echo $nombreevento ?></h3></header>
            <article class="module width_full">
                <header><h3>Temas y expositores</h3></header>
                <form action="<?php echo base_url(); ?>index.php/tema/insertar_tema_expositor" method="post">
                    <input type="hidden" id="idevento" name="idevento" value="<?php echo $idevento ?>">
                    <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $nombreevento ?>">
                    <div class="module_content">                         
                       <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Tema</label>
                            <input type="text" id="tema" name="tema" style="width:92%;">
                        </fieldset>
                        <fieldset style="width:48%; float:right; margin-left: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Expositor</label>
                            <select id="idexpositor" name="idexpositor" style="width:92%;">
                                <option value="0">Elegir expositor</option>
                                <?php foreach ($datosexpositor as $expositor){?>
                                <option value="<?php echo $expositor->idusuario ?>"><?php echo $expositor->apepat . ' ' . $expositor->apemat . ', ' . $expositor->nombres; ?></option>
                                <?php } ?>                                                                  
                            </select>
                        </fieldset>                       
                        <div class="clear"></div> 
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Hora de inicio</label><span>P. ej. 08:00</span>
                            <input type="text" id="hinicio" name="hinicio" style="width:92%;">
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Hora de fin</label><span>P. ej. 10:00</span>
                            <input type="text" id="hfin" name="hfin" style="width:92%;">
                        </fieldset>
                        <div class="clear"></div>  
                    </div>
                    <footer>
                        <div class="submit_link" style="padding: 3px 340px;">
                            <ul id="ulrdbtn">
                                <li><input type="submit" value="Agregar" class="alt_btn"></li>
                                <li>&nbsp;</li>
                                <li>&nbsp;</li>
                                <li><a class="regresar" href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_proximos"></a></li>
                            </ul>
                        </div>
                    </footer>
                </form>
            </article><!-- end of post new article -->           
	
            <div class="spacer"></div>
            
            <article class="module width_full">
            <header>
                <div class="submit_link" style="float: left; padding: 2px auto;">
                    <h3>Temas y expositores registrados</h3>
                </div>             
             </header>        
             <div class="tab_container" style="margin: 0 auto;">            
                <div id="tab1" class="tab_content">
                    <table class="tablesorter" cellspacing="0"> 
                        <thead> 
                        <tr> 
                            <th></th>
                            <th>Nro.</th>
                            <th>Tema</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Expositor</th>                           
                            <th>Acciones</th>  
                        </tr> 
                    </thead> 
                    <tbody> 
                        <?php foreach($tema_expo as $tm){ ?>
                        <tr> 
                            <td></td>
                            <td><?php echo $tm->nro ;?></td> 
                            <td><?php echo $tm->nombre ;?></td>  
                            <td><?php echo $tm->hinicio ;?></td>                              
                            <td><?php echo $tm->hfin ;?></td>                              
                            <td><?php echo $tm->expositor ;?></td>    
                            <td><ul id="ulrdbtn"><li><form action="actualizarevento.html"><input type="image" src="<?php echo base_url(); ?>static/images/icn_edit_article.png" title="Actualizar"/></form></li><li><form action="subirarchivos.html"><input type="image" src="<?php echo base_url(); ?>static/images/icn_folder.png" title="Subir archivos"/></form></li><li><form  action="registrados.html"><input type="image" src="<?php echo base_url(); ?>static/images/icn_user.png" title="Registrados " width="17" height="17"/></form></li></td>
                        </tr> 
                        <?php }?>                                          
                    </tbody> 
                </table>
            </div><!-- end of #tab1 -->	
        </div><!-- end of .tab_container -->	
        <footer>
            
        </footer>
            
         </article><!-- end of content manager article -->
	</section>
</body>
</html>