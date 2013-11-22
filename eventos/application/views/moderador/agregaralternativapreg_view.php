<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Moderador</title>
	
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
			<h2 class="section_title">Agregar alternativa</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Bienvenido <?php echo  $this->session->userdata('rol') . ': ' .$this->session->userdata('nombres') . ' ' .  $this->session->userdata('apepat') . ' ' .  $this->session->userdata('apemat'); ?></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Panel de moderador</a> 
                            <div class="breadcrumb_divider"></div> <a class="current">Agregar alternativa</a></article>
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
                <li class="icn_jump_back"><a href="<?php echo base_url() . 'index.php/autenticacion/cerrar_sesion' ;?>">Cerrar sesión</a></li>
            </ul>   
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->
	
	<section id="main" class="column">
            <br />
            <header><h3><?php echo $nombrepregunta; ?></h3></header>
            <article class="module width_full">
                <header><h3>Agregar alternativas a preguntas</h3></header>
                <form action="<?php echo base_url(); ?>index.php/alternativa/insertar_alternativa" method="post">
                    <input type="hidden" id="idevento" name="idevento" value="<?php echo $idevento ?>" />
                    <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $nombreevento ?>" />
                    <input type="hidden" id="idtema" name="idtema" value="<?php echo $idtema; ?>" />
                    <input type="hidden" id="idpregunta" name="idpregunta" value="<?php echo $idpregunta; ?>" />
                    <input type="hidden" id="nombretema" name="nombretema" value="<?php echo $nombretema; ?>" />
                    <div class="module_content">                         
                       <fieldset style="width:99%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Alternativa</label>
                             <?php echo form_error('nombrealternativa'); ?>
                            <input type="text" id="nombrealternativa" name="nombrealternativa" style="width:97%;">
                        </fieldset>                                                                     
                        <div class="clear"></div>  
                    </div>
                    <footer>
                        <div class="submit_link" style="padding: 3px 340px;">
                            <ul id="ulrdbtn">
                                <li><input type="submit" value="Agregar" class="alt_btn"></li>
                                <li>&nbsp;</li>
                                <li>&nbsp;</li>
                                <li><a class="regresar" href="<?php echo base_url() . 'index.php/pregunta/mostrar_preguntas_tema_moderador?idevento=' . $idevento . 
                                      '&nombreevento=' . $nombreevento . '&idtema=' . $idtema . '&nombretema=' . $nombretema; ?>"></a></li>
                            </ul>
                        </div>
                    </footer>
                </form>
            </article><!-- end of post new article -->          	
            <div class="spacer"></div>           
	</section>
</body>
</html>