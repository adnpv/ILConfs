<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de organizador</title>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>static/js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>static/js/hideshow.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>static/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
            $(".tablesorter").tablesorter(); 
   	} 
	);
	$(document).ready(function() {

            //When page loads...
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
			<h2 class="section_title">Subir archivos </h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Bienvenido <?php echo  $this->session->userdata('rol') . ': ' .$this->session->userdata('nombres') . ' ' .  $this->session->userdata('apepat') . ' ' .  $this->session->userdata('apemat'); ?></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Panel de organizador</a> 
                            <div class="breadcrumb_divider"></div> <a class="current">Subir archivos</a></article>
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
                <li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_pasados">Eventos pasados</a></li>
                <li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_pendientes">Eventos pendientes</a></li>               
            </ul> 
           
           <h3>Usuarios</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="<?php echo base_url(); ?>index.php/usuario">Crear moderador/expositor</a></li>
                <li class="icn_jump_back"><a href="#">Cerrar sesión</a></li>
            </ul>
           
            <h3>Cuenta</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="actualizarperfil.html">Actualizar perfil</a></li>
                <li class="icn_jump_back"><a href="<?php echo base_url() . 'index.php/autenticacion/cerrar_sesion' ;?>">Cerrar sesión</a></li>
            </ul>   
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->
	
        <section id="main" class="column">
             <header><br>
                 <h3 class="tabs_involved"><?php echo $nombreevento . ' - ' . $nombretema;?></h3>  
            </header>
            <article class="module width_full">
                <header><h3>Subir archivos</h3></header>
                <form method="post" action="<?php echo base_url(); ?>index.php/tema/cargar_archivo" enctype="multipart/form-data">
                    <div class="module_content">             
                        <fieldset style="width:55%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Archivo</label>
                            <input type="hidden" id="idtema" name="idtema" value="<?php echo $idtema; ?>" />
                            <input type="file" id="archivo" name="archivo" style="width:92%;">
                        </fieldset>                                                                              
                        <div class="clear"></div>                           
                    </div>
                <footer>
                   <div class="submit_link" style="padding: 3px 340px;">
                        <ul id="ulrdbtn">
                            <li><input type="submit" value="Subir" class="alt_btn"></li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li><a class="regresar" href="javascript:history.back()"></a></li>
                        </ul>
                    </div>
                </footer>
                </form>
            </article><!-- end of post new article -->       
        <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Archivos</h3>
        </header>

        <div class="tab_container" style="margin: 0 auto;">
            <div id="tab1" class="tab_content">
                <table class="tablesorter" cellspacing="0"> 
                    <thead> 
                        <tr>  
                            <th>Nro.</th>                       
                            <th>Nombre</th> 
                            <th>Acciones</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        
                        <?php
                            for ($i = 0; $i < count($lista); $i++)
                            { 
                                if($i < 2)
                                {
                                    continue;
                                }
                                else
                                {    ?>
                                    <tr> 
                                        <td><?php echo $i + 1 ; ?></td>
                                        <td><a href = "<?php echo 'http://pitreal.hostei.com/eventos/archivos/' .$lista[$i]; ?>" target="_blank" ><?php echo $lista[$i]; ?></a></td>
                                        <td><input type="image" src="<?php echo base_url(); ?>static/images/icn_edit.png" title="Actualizar"/><input type="image" src="<?php echo base_url(); ?>static/images/icn_trash.png" title="Eliminar"></td> 
                                    </tr>
                        <?php   }
                            }?>                                
                    </tbody> 
                </table>
            </div><!-- end of #tab1 -->           		
    </article><!-- end of content manager article -->
            <div class="spacer"></div>
	</section>
</body>
</html>