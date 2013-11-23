<!doctype html>
<html lang="es" />
<head>
    <meta charset="utf-8"/>
    <title>Organizador</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" /></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/jquery.ui.all.css">
    <script src="<?php echo base_url(); ?>static/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url(); ?>static/js/jquery.ui.core.js"></script>
    <script src="<?php echo base_url(); ?>static/js/jquery.ui.widget.js"></script>
    <script src="<?php echo base_url(); ?>static/js/jquery.ui.datepicker.js"></script>
    <script src="<?php echo base_url(); ?>static/js/jquery.ui.datepicker-es.js"></script>
    
    <!--<script src="<?php //echo base_url(); ?>/static/js/hideshow.js" type="text/javascript" /></script>-->
    <script src="<?php echo base_url(); ?>static/js/jquery.tablesorter.min.js" type="text/javascript" /></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.equalHeight.js" /></script>
    <script type="text/javascript" />
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
    <script type="text/javascript" />
	$(function() {
            $( ".datepicker" ).datepicker( $.datepicker.regional[ "es" ] );
            $( "#locale" ).change(function() {
                    $( ".datepicker" ).datepicker( "option",
                            $.datepicker.regional[ $( this ).val() ] );
            });
	});
    </script>
    <script type="text/javascript" >
    $(function(){
        $('.column').equalHeight();
    });
    </script>

</head>
<body>
	<header id="header" />
		<hgroup>
			<h1 class="site_title" /><a href="index.html" />PIT Real</a></h1>
			<h2 class="section_title" />Crear evento </h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar" />
		<div class="user" />
			<p>Bienvenido <?php echo  $this->session->userdata('rol') . ': ' .$this->session->userdata('nombres') . ' ' .  $this->session->userdata('apepat') . ' ' .  $this->session->userdata('apemat'); ?></p>
			<!-- <a class="logout_user" href="#" title="Logout" />Logout</a> -->
		</div>
		<div class="breadcrumbs_container" />
			<article class="breadcrumbs" /><a href="index.html" />Panel de organizador</a> 
                            <div class="breadcrumb_divider" /></div> <a class="current" />Crear evento</a></article>
		</div>
	</section><!-- end of secondary bar comienzo de aside column -->
	
	 <aside id="sidebar" class="column" />
            <!--<form class="quick_search" />
                <input type="text" x-webkit-speech id="" name="" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" />
            </form>-->
            <hr/>
            <h3>Eventos</h3>
            <ul class="toggle" />
                <li class="icn_new_article" /><a href="<?php echo base_url(); ?>index.php/evento" />Crear evento</a></li>                
                <li class="icn_categories" /><a href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_proximos" />Eventos próximos</a></li>
                <li class="icn_categories" /><a href="listareventos.html" />Eventos pasados</a></li>
            </ul> 
           
           <h3>Usuarios</h3>
            <ul class="toggle" />
                <li class="icn_profile" /><a href="<?php echo base_url(); ?>index.php/usuario" />Crear moderador/expositor</a></li>                
            </ul>
           
            <h3>Cuenta</h3>
            <ul class="toggle" />
                <li class="icn_profile" /><a href="actualizarperfil.html" />Actualizar perfil</a></li>
                <li class="icn_jump_back"><a href="<?php echo base_url() . 'index.php/autenticacion/cerrar_sesion' ;?>">Cerrar sesión</a></li>
            </ul>   
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->
	
        <section id="main" class="column" />
            <article class="module width_full" />
                <header><h3>Datos</h3></header>                
                <form action="<?php echo base_url(); ?>/index.php/evento/insertar_evento" method="post" />
                    <div class="module_content" />  
                        <fieldset style="width:48%; float:left;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Nombre</label>
                            <?php echo form_error('nombre'); ?>
                            <input type="text" x-webkit-speech id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>" style="width:92%;" />
                        </fieldset>  
                        <fieldset style="width:48%; float:right;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Lugar</label>
                            <?php echo form_error('lugar'); ?>
                            <input type="text" x-webkit-speech id="lugar" name="lugar" value="<?php echo set_value('lugar'); ?>" style="width:92%;" />
                        </fieldset>                        
                        <div class="clear" /></div>                        
                        <fieldset style="width:99%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <?php echo form_error('descripcion'); ?>                            
                            <label>Descripción</label><span>P. ej. Evento grandioso</span>                                                        
                            <textarea id="descripcion" name="descripcion" rows="7" cols="10" style="width:97%;">                            
                            <?php echo set_value('descripcion'); ?>
                            </textarea>                            
                        </fieldset>    
                    <div class="form-group">
                        <label for="lugar">Coordenadas de evento :</label><input class="form-control" type="text" name="coordenadas" value="" placeholder="Ejm: -12.050232901863597,-77.025146484375" required>
                    </div>
                    <div class="form-group">
                    <a href="javascript:popUp('http://www.agenciacreativa.net/coordenadas_google_maps.php')">Buscar coordenadas</a>

                    </div>
                        <fieldset style="width:48%; float:left;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Fecha de inicio</label>
                            <?php echo form_error('finicio'); ?>
                            <?php echo form_error('validar_finicio_ffin'); ?>
                            <input type="text" class="datepicker" name="finicio" value="<?php echo set_value('finicio'); ?>" style="width:92%;" />
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Fecha de fin</label>
                            <?php echo form_error('ffin'); ?>
                            <?php echo form_error('validar_finicio_ffin'); ?>
                            <?php echo form_error('validar_ffin_flimite'); ?>
                            <input type="text" class="datepicker" name="ffin" value="<?php echo set_value('ffin'); ?>"  style="width:92%;" />
                        </fieldset>
                        <div class="clear" /></div>                        
                        <fieldset style="width:48%; float:left;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Hora de inicio</label><span>P. ej. 09:00</span>
                            <?php echo form_error('hinicio'); ?>
                            <input type="text" x-webkit-speech id="hinicio" name="hinicio" value="<?php echo set_value('hinicio'); ?>"  style="width:92%;" />
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Hora de fin</label><span>P. ej. 13:00</span>
                            <?php echo form_error('hfin'); ?>
                            <input type="text" x-webkit-speech id="hfin" name="hfin" value="<?php echo set_value('hfin'); ?>"  style="width:92%;" />
                        </fieldset>
                        <div class="clear" /></div>  
                        <fieldset style="width:48%; float:left;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Hora de registro</label>
                            <?php echo form_error('hregistro'); ?><span>P. ej. 08:00</span>
                            <input type="text" x-webkit-speech id="hregistro" name="hregistro" value="<?php echo set_value('hregistro'); ?>"  style="width:92%;" />
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Moderador</label>
                            <?php echo form_error('moderador'); ?>
                            <select id="moderador" name="moderador" style="width:92%;" />
                                <option value="0" />Elegir moderador</option>
                                <?php foreach ($datosmoderador as $moderador){?>
                                <option value="<?php echo $moderador->idusuario ?>" /><?php echo $moderador->apepat . ' ' . $moderador->apemat . ', ' . $moderador->nombres; ?></option>
                                <?php } ?>
                            </select>
                        </fieldset>    
                        <div class="clear" /></div> 
                        <fieldset style="width:48%; float:left;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Latitud</label><span>P. ej. -12.4832, 10.3433</span>
                            <?php echo form_error('latitud'); ?>
                            <input type="text" x-webkit-speech id="latitud" name="latitud" value="<?php echo set_value('latitud'); ?>"   style="width:92%;" />
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Longitud</label><span>P. ej. -12.4832, 10.3433</span>
                            <?php echo form_error('longitud'); ?>
                            <input type="text" x-webkit-speech id="longitud" name="longitud" value="<?php echo set_value('longitud'); ?>"   style="width:92%;" />
                        </fieldset>
                        <div class="clear" /></div>  
                        <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Nro. de Entradas</label><span>P. ej. 150</span>
                            <?php echo form_error('nroentradas'); ?>
                            <input type="text" id="nroentradas" name="nroentradas" value="<?php echo set_value('nroentradas'); ?>"   style="width:92%;" />
                        </fieldset>                                         
                        <fieldset style="width:48%; float:right;"> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Precio unitario (S/.)</label><span>P. ej. 35.00</span>
                            <?php echo form_error('preciounit'); ?>
                            <input type="text" id="preciounit" name="preciounit" value="<?php echo set_value('preciounit'); ?>"   style="width:92%;" />
                        </fieldset>
                        <div class="clear" /></div>                            
                        <fieldset style="width:48%; float:left;" /> <!-- to make two field float next to one another, adjust values accordingly -->
                            <label>Fin de ventas</label>
                            <?php echo form_error('flimite'); ?>
                            <?php echo form_error('validar_ffin_flimite'); ?>
                            <input type="text" class="datepicker" name="flimite" value="<?php echo set_value('flimite'); ?>"  style="width:92%;" />
                            <input type="hidden" class="idorganizador" name="idorganizador" value="<?php echo $this->session->userdata('idusuario'); ?>" />
                        </fieldset>   
                        <?php echo form_error('idorganizador'); ?>
                     <div class="clear" /></div>                           
                    </div>
                <footer>
                    <div class="submit_link" style="padding: 5px 335px;" />
                        <ul id="ulrdbtn" />
                            <li><input type="submit" value="Crear" class="alt_btn" /></li>
                            <li><a class="regresar" href="javascript:history.back()" /></a></li>
                        </ul>
                    </div>
                </footer>
                </form>
            </article><!-- end of post new article -->       
            <div class="spacer" /></div>
	</section>
</body>
</html>