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
                <h2 class="section_title">Eventos</h2>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <p>Bienvenido organizador: Adrián Peralta</p>
                <!--<a class="logout_user" href="#" title="Logout">Logout</a>-->
            </div>
            <div class="breadcrumbs_container">
                <article class="breadcrumbs">
                    <a href="<?php echo base_url(); ?>eventos/index.php/evento/mostrar_eventos_proximos">Panel de organizador</a>
                    <div class="breadcrumb_divider"></div> 
                    <a class="current">Eventos <?php echo $tipoevento; ?></a>
                </article>
            </div>
        </section><!-- end of secondary bar -->

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
                <li class="icn_profile"><a href="<?php echo base_url(); ?>index.php/usuario/asignar_particip_evento">Asignar participantes a evento</a></li>                
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
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->
        <section id="main" class="column">

        <article class="module width_full">
            <header>
                <div class="submit_link" style="float: left; padding: 2px auto;">
                    <h3>Eventos <?php echo $tipoevento; ?></h3>
                </div>              
                 <div class="submit_link2">
                    <form class="post_message"> 
                        <ul id="ulrdbtn">                        
                           <li><input type="text" style="width:90%;"></li>               
                           <li><input type="submit" value="Buscar" class="alt_btn">  </li> 
                        </ul>  
                    </form>
                 </div>
             </header>        
             <div class="tab_container" style="margin: 0 auto;">            
                <div id="tab1" class="tab_content">
                    <table class="tablesorter" cellspacing="0"> 
                        <thead> 
                        <tr> 
                            <th></th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Fecha</th>                            
                            <th>Hora de registro</th>
                            <th>Hora de inicio</th>
                            <th>Hora de fin</th>                            
                            <!--<th>Estado</th>-->
                            <th style="text-align: center;">Acciones</th>  
                        </tr> 
                    </thead> 
                    <tbody> 
                        <?php foreach($datosevento as $evento){ ?>
                        <tr> 
                            <td></td>
                            <td><?php echo $evento->idevento; ?></td> 
                            <td><?php echo $evento->nombre; ?></td>  
                            <td><?php echo $evento->fechainicio; ?></td>                              
                            <td><?php echo $evento->horaregistro; ?></td>                              
                            <td><?php echo $evento->horainicio; ?></td>  
                            <td><?php echo $evento->horafin; ?></td>  
                            <!--<td>Activo</td>-->
                            <td>
                                <ul id="ulrdbtn">                                    
                                    <li>
                                        <form action="<?php echo base_url(); ?>index.php/evento/mostrar_participantes_evento" method="post">
                                            <input type="hidden" id="idevento" name="idevento" value="<?php echo $evento->idevento; ?>" />
                                            <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $evento->nombre; ?>" />
                                            <button type="submit" class="imgbuttonparticipantes" title="Participantes registrados"></button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="<?php echo base_url(); ?>index.php/evento/mostrar_venta_entradas" method="post">
                                            <input type="hidden" id="idevento" name="idevento" value="<?php echo $evento->idevento; ?>" />
                                            <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $evento->nombre; ?>" />
                                            <button type="submit" class="imgbuttonentradas" title="Reporte de ventas"></button>
                                        </form>
                                    </li> 
                                    <li>
                                        <form action="<?php echo base_url(); ?>index.php/evento/mostrar_temas_evento" method="post">
                                            <input type="hidden" id="idevento" name="idevento" value="<?php echo $evento->idevento; ?>" />
                                            <input type="hidden" id="tipoevento" name="tipoevento" value="<?php echo $tipoevento; ?>" />
                                            <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $evento->nombre; ?>" />
                                            <button type="submit" class="imgbuttontemas"title="Temas"></button>
                                        </form>
                                    </li>                                        
                                </ul>
                            </td>
                        </tr> 
                        <?php }?>          
                    </tbody> 
                </table>
            </div><!-- end of #tab1 -->	
        </div><!-- end of .tab_container -->	
        <footer>
            
        </footer>
            
         </article><!-- end of content manager article -->
        <div class="spacer"></div>
        </section>   
    </body>
</html>
<!--<input type="image" src="<?php echo base_url(); ?>static/images/iconoinfo.jpg" title="Informacion del evento" width="17" height="17"/>-->