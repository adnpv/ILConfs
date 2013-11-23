<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Organizador</title>	
        <link rel="stylesheet" href="<?php echo base_url(); ?>/static/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>/static/js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <!--<script src="<?php //echo base_url(); ?>/static/js/hideshow.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url(); ?>/static/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/static/js/jquery.equalHeight.js"></script>
        <script type="text/javascript">
            $(document).ready(function() 
            { 
              $(".tablesorter").tablesorter(); 
             } 
            );
            $(document).ready(function() {

                //When page loads.
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
                <h2 class="section_title">Participantes registrados</h2>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <p>Bienvenido <?php echo  $this->session->userdata('rol') . ': ' .$this->session->userdata('nombres') . ' ' .  $this->session->userdata('apepat') . ' ' .  $this->session->userdata('apemat'); ?></p>
                <!--<a class="logout_user" href="#" title="Logout">Logout</a>-->
            </div>
            <div class="breadcrumbs_container">
                <article class="breadcrumbs">
                    <a href="index.html">Panel de organizador</a>
                    <div class="breadcrumb_divider"></div> 
                    <a class="current">Registrados</a>
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
                <li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_pendientes">Eventos pendientes</a></li>               
            </ul> 
           
           <h3>Usuarios</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="<?php echo base_url(); ?>index.php/usuario">Crear moderador/expositor</a></li>
            </ul>
           
            <h3>Cuenta</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="actualizarperfil.html">Actualizar perfil</a></li>
                <li class="icn_jump_back"><a href="<?php echo base_url() . 'index.php/autenticacion/cerrar_sesion' ;?>">Cerrar sesión</a></li>
            </ul>      
                <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->

        <section id="main" class="column">            
            <header><br />
                <h3 class="tabs_involved"><?php echo $nombreevento; ?></h3>  
            </header>
        <article class="module width_full">
        <header>
        <div class="submit_link" style="float: left; padding: 2px auto;">
            <h3 class="tabs_involved">Registrados</h3>
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
                            <th>Apellidos</th> 
                            <th>Nombres</th>  
                            <th>Estado</th>
                            <th>Asistencia</th>
                            <th>Acciones</th>                              
                        </tr> 
                    </thead> 
                    <tbody> 
                     <?php
                        foreach($particdeevto as $pde)
                        {
                       ?>
                        <tr> 
                            <td></td>
                            <td><?php echo $pde->idusuario; ?></td> 
                            <td><?php echo $pde->apepat .' '. $pde->apemat; ?></td>  
                            <td><?php echo $pde->nombres; ?></td>
                            <td><?php echo $pde->estado; ?></td>
                            <td><?php echo $pde->asistencia; ?></td>                            
                            <td>
                                <ul id="ulrdbtn">
                                    <li>                                        
                                        <form action="<?php echo base_url(); ?>index.php/consulta/listar_consultas_partic" method="get">
                                            <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $pde->idusuario; ?>" />                                            
                                            <input type="hidden" id="idevento" name="idevento" value="<?php echo $idevento; ?>" />
                                            <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $nombreevento; ?>" />
                                            <button type="submit" class="imgpreguntasexpositor" title="Consultas del participante"></button>                                            
                                        </form>
                                    </li>
                                </ul>
                            </td>                                    
                        </tr> 
                        <?php
                        }
                        ?>                       
                    </tbody> 
                </table>
                <footer>     
                    <div class="submit_link" style="padding: 3px 390px;">                        
                         <a class="regresar" href="javascript:history.back()"></a>                      
                    </div>
                </footer>
            </div><!-- end of #tab1 -->           	
        </div><!-- end of .tab_container -->	
       </article> 
       <article class="module width_full">
        <div class="tab_container" style="margin: 0 auto;">
            <div id="tab1" >
                <table class="tablesorter" cellspacing="0"> 
                    <thead> 
                        <tr>  
                            <th></th>
                            <th></th>
                            <th>Registrados</th>  
                            <th>Asistentes</th> 
                            <th>Inasistentes</th>                                                         
                        </tr> 
                    </thead> 
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?php echo $asistentes + $inasistentes; ?></td>                        
                            <td><?php echo $asistentes; ?></td>                      
                            <td><?php echo $inasistentes; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </article><!-- end of content manager article -->
    
    <div class="spacer"></div>
        </section>   
    </body>
</html>
