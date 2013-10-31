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
			<p>Bienvenido organizador: John Doe</p>
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
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->
	
        <section id="main" class="column">
             <header><br>
                 <h3 class="tabs_involved"><?php echo $nombreevento; ?></h3>  
            </header>
            
        <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Ventas al <?php echo date("d-m-Y"); ?></h3>
        </header>

        <div class="tab_container" style="margin: 0 auto;">
            <div id="tab1" class="tab_content">
                <table class="tablesorter" cellspacing="0"> 
                    <thead> 
                        <tr>  
                            <th class="alineacioncentral">Cantidad</th>  
                            <th class="alineacioncentral">Por vender</th> 
                            <th class="alineacioncentral">Vendidas</th> 
                            <th class="alineacioncentral">Precio (S/.)</th>                            
                            <th class="alineacioncentral">Total (S/.)</th> 
                            <th class="alineacioncentral">Cierre</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        <tr>  
                  <?php foreach ($datosventas as $dvtas)
                        { ?>
                            <td class="alineacioncentral"><?php echo $dvtas->nroentradas; ?></td> 
                            <td class="alineacioncentral"><?php echo $dvtas->porvender; ?></td>  
                            <td class="alineacioncentral"><?php echo $dvtas->entradasvendidas; ?></td>                              
                            <td class="alineacioncentral"><?php echo $dvtas->preciounit; ?></td>                              
                            <td class="alineacioncentral"><?php echo $dvtas->ganancia; ?></td>  
                            <td class="alineacioncentral"><?php echo $dvtas->flimite; ?></td>  
                  <?php } ?>
                        </tr>                       
                    </tbody> 
                </table>
            </div><!-- end of #tab1 -->    
            <footer>
                <div class="submit_link" style="padding: 5px 420px;">
                    <a class="regresar" href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_proximos"></a>
                </div>
            </footer>
    </article><!-- end of content manager article -->
            <div class="spacer"></div>
	</section>
</body>
</html>