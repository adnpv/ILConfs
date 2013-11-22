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
                <h1 class="site_title"><a href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_proximos ">PIT Real</a></h1>
                <h2 class="section_title">Crear nuevo usuario</h2>
            </hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Bienvenido <?php echo  $this->session->userdata('rol') . ': ' .$this->session->userdata('nombres') . ' ' .  $this->session->userdata('apepat') . ' ' .  $this->session->userdata('apemat'); ?></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_proximos ">Panel de organizador</a> 
                            <div class="breadcrumb_divider"></div> <a class="current">Crear nuevo usuario</a></article>
		</div>
	</section><!-- end of secondary bar comienzo de aside column -->
	
	 <aside id="sidebar" class="column">
            <!--<form class="quick_search">
                <input type="text" x-webkit-speech value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
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
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->
        
	<section id="main" class="column">

            <article class="module width_full">
                <header><h3>Datos de usuario</h3></header>
                <form action="<?php echo base_url(); ?>index.php/usuario/insertar_usuario" method="post">                    
                    <div class="module_content">  
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Apellido Paterno</label>
                            <?php echo form_error('apepat'); ?>
                            <input type="text" x-webkit-speech id="apepat" name="apepat" value="<?php echo set_value('apepat'); ?>" style="width:92%; ">                            
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Apellido Materno</label>
                            <?php echo form_error('apemat'); ?>
                            <input type="text" x-webkit-speech id="apemat" name="apemat" value="<?php echo set_value('apemat'); ?>" style="width:92%;">                            
                        </fieldset>
                        <div class="clear"></div>   
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Nombres</label>
                            <?php echo form_error('nombres'); ?>
                            <input type="text" x-webkit-speech id="nombres" name="nombres" value="<?php echo set_value('nombres'); ?>"  style="width:92%;">                            
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>D.N.I.</label>
                            <?php echo form_error('dni'); ?>
                            <input type="text" x-webkit-speech id="dni" name="dni" value="<?php echo set_value('dni'); ?>" style="width:92%;">                            
                        </fieldset>
                        <div class="clear"></div>                         
                        
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Teléfono</label>
                            <?php echo form_error('telefono'); ?>
                            <input type="text" x-webkit-speech id="telefono" name="telefono" value="<?php echo set_value('telefono'); ?>"  style="width:92%;">                            
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Celular</label>
                            <?php echo form_error('celular'); ?>
                            <input type="text" x-webkit-speech id="celular" name="celular" value="<?php echo set_value('celular'); ?>"  style="width:92%;">                            
                        </fieldset>
                        <div class="clear"></div>              
                        
                         <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Dirección</label>
                            <?php echo form_error('direccion'); ?>
                            <input type="text" x-webkit-speech id="direccion" name="direccion" value="<?php echo set_value('direccion'); ?>"   style="width:92%;">                            
                        </fieldset>
                        <fieldset style="width:48%; float:right; margin-left: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Distrito</label>
                            <?php echo form_error('distrito'); ?>
                            <select id="distrito" name="distrito" value="<?php echo set_value('distrito'); ?>" style="width:92%;">
                                <option value="" <?php echo set_select('rol', 'expositor', TRUE); ?> >Elegir distrito</option>
                                <option value="Ancón" <?php echo set_select('rol', 'Ancón'); ?> >Ancón</option>
                                <option value="Breña" <?php echo set_select('rol', 'Breña'); ?> >Breña</option> 
                                <option value="San Borja"<?php echo set_select('rol', 'San Borja'); ?> >San Borja</option>
                                <option value="La Molina" <?php echo set_select('rol', 'La Molina'); ?> >La Molina</option>
                                <option value="Magdalena" <?php echo set_select('rol', 'Magdalena'); ?> >Magdalena</option>
                                <option value="Miraflores" <?php echo set_select('rol', 'Miraflores'); ?> >Miraflores</option>
                                <option value="San Isidro" <?php echo set_select('rol', 'San Isidro'); ?> >San Isidro</option>
                                <option value="Surco" <?php echo set_select('rol', 'Surco'); ?> >Surco</option>                                
                                <option value="Surquillo" <?php echo set_select('rol', 'Surquillo'); ?> >Surquillo</option>
                                <option value="Villa El Salvador" <?php echo set_select('rol', 'Villa El Salvador'); ?> >Villa El Salvador</option>
                                <option value="Villa María del Triunfo" <?php echo set_select('rol', 'Villa María del Triunfo'); ?> >Villa María del Triunfo</option>                                                                                                                                    
                            </select>                            
                         </fieldset>                        
                         <div class="clear"></div>           
                        
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Correo</label>
                            <?php echo form_error('correo'); ?>
                            <input type="text" x-webkit-speech id="correo" name="correo" value="<?php echo set_value('correo'); ?>" style="width:92%;">                            
                        </fieldset>
                         
                         <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Usuario</label>
                            <?php echo form_error('usuario'); ?>
                            <input type="text" x-webkit-speech id="usuario" name="usuario" value="<?php echo set_value('usuario'); ?>" style="width:92%;">                            
                        </fieldset>   
                        <div class="clear"></div>                        
                                                               
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Contraseña</label>
                            <?php echo form_error('contrasena1'); ?>
                            <input type="password" id="contrasena1" name="contrasena1" style="width:92%;">                            
                        </fieldset>                        
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Repetir contraseña</label>
                            <?php echo form_error('contrasena2'); ?>
                            <input type="password" id="contrasena2" name="contrasena2" style="width:92%;">                            
                        </fieldset>
                        <div class="clear"></div> 
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Tipo</label>
                            <?php echo form_error('rol'); ?>
                            <select id="rol" name="rol" style="width:92%;">
                                <option value="" <?php echo set_select('rol', 'rol', TRUE); ?> >Elegir tipo</option>
                                <!--<option value="administrador">Administrador</option>-->
                                <option value="expositor" <?php echo set_select('rol', 'expositor'); ?> >Expositor</option>
                                <option value="moderador" <?php echo set_select('rol', 'moderador'); ?> >Moderador</option>                                        
                                <option value="participante" <?php echo set_select('rol', 'participante'); ?> >Participante</option>  
                            </select>                            
                        </fieldset>
                        <div class="clear"></div> 
                    </div>
                    <footer>
                        <div class="submit_link" style="padding: 5px 360px;">
                            <input type="submit" value="Registrar" class="alt_btn">
                            <input type="submit" value="Limpiar">
                        </div>
                    </footer>
                </form>
            </article><!-- end of post new article -->           
	
            <div class="spacer"></div>
	</section>
</body>
</html>