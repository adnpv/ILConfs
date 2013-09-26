<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Organizador</title>
	
	<link rel="stylesheet" href="<?php echo $url ?>/static/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo $url ?>/static/js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="<?php echo $url ?>/static/js/hideshow.js" type="text/javascript"></script>
    <script src="<?php echo $url ?>/static/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $url ?>/static/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
            $(".tablesorter").tablesorter(); 
   	} 
	);
	$(document).ready(function() {

            //When page loads.<?php echo $url ?>
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
                <input type="text" id="" name="" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
            </form>-->
            <hr/>
            <h3>Eventos</h3>
            <ul class="toggle">
                <li class="icn_new_article"><a href="crearevento.html">Crear evento</a></li>                
                <li class="icn_categories"><a href="index.html">Eventos próximos</a></li>
                <li class="icn_categories"><a href="listareventos.html">Eventos pasados</a></li>
            </ul> 
           
            <h3>Cuenta</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="actualizarperfil.html">Actualizar perfil</a></li>
                <li class="icn_jump_back"><a href="#">Cerrar sesión</a></li>
            </ul>
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->
	
        <section id="main" class="column">
            <article class="module width_full">
                <header><h3>Datos</h3></header>                
                <form action="<?php echo $url ?>/index.php/evento/insertar_evento" method="post">
                    <div class="module_content">  
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Nombre</label>
                            <input type="text" id="nombre" name="nombre" style="width:92%;">
                        </fieldset>  
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Lugar</label>
                            <input type="text" id="lugar" name="lugar" style="width:92%;">
                        </fieldset>                        
                        <div class="clear"></div>                        
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Fecha de inicio</label>
                            <input type="text" id="finicio" name="finicio" style="width:92%;">
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Fecha de fin</label>
                            <input type="text" id="ffin" name="ffin" style="width:92%;">
                        </fieldset>
                        <div class="clear"></div>                        
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Hora de inicio</label>
                            <input type="text" id="hinicio" name="hinicio" style="width:92%;">
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Hora de fin</label>
                            <input type="text" id="hfin" name="hfin" style="width:92%;">
                        </fieldset>
                        <div class="clear"></div>  
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Hora de registro</label>
                            <input type="text" id="hregistro" name="hregistro" style="width:92%;">
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Destacado</label>
                            <ul id="ulrdbtn">
                                <li><input type="radio" name="destacado" id="destacado" value="1" checked/>Sí</li>
                                <li>&nbsp;</li>
                                <li>&nbsp;</li>
                                <li><input type="radio" name="destacado" id="destacado" value="0"/>No</li>
                            </ul>
                        </fieldset>
                        <div class="clear"></div> 
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Latitud</label>
                            <input type="text" id="latitud" name="latitud" style="width:92%;">
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Longitud</label>
                            <input type="text" id="longitud" name="longitud" style="width:92%;">
                        </fieldset>
                        <div class="clear"></div>  
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Moderador</label>
                            <select id="moderador" name="moderador" style="width:92%;">
                                <option value="0">Elegir moderador</option>
                                <?php foreach ($datosmoderador as $moderador){?>
                                <option value="<?php echo $moderador->idusuario ?>"><?php echo $moderador->apepat . ' ' . $moderador->apemat . ', ' . $moderador->nombres; ?></option>
                                <?php } ?>
                            </select>
                        </fieldset>                                                                
                        <div class="clear"></div>                           
                    </div>
                <footer>
                    <div class="submit_link" style="padding: 5px 360px;">
                        <input type="submit" value="Crear" class="alt_btn" />
                        <input type="submit" value="Limpiar" />
                    </div>
                </footer>
                </form>
            </article><!-- end of post new article -->       
            <div class="spacer"></div>
	</section>
</body>
</html>