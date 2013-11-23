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
        <script type="text/javascript">
            function seleccionar_todo(){ 
                for (i=0;i<document.participantes.elements.length;i++) 
                   if(document.participantes.elements[i].type === "checkbox")	
                      document.participantes.elements[i].checked=1;
            } 
            
            function deseleccionar_todo(){ 
                for (i=0;i<document.participantes.elements.length;i++) 
                   if(document.participantes.elements[i].type === "checkbox")	
                      document.participantes.elements[i].checked=0;
             } 
        </script>
    </head>
    <body>
        <header id="header">
            <hgroup>
                <h1 class="site_title"><a href="index.html">PIT Real</a></h1>
                <h2 class="section_title">Asignar participantes a evento</h2>
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
                <li class="icn_profile"><a href="<?php echo base_url(); ?>index.php/usuario">Crear usuario</a></li>
            </ul>
           
            <h3>Cuenta</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="actualizarperfil.html">Actualizar perfil</a></li>
                <li class="icn_jump_back"><a href="<?php echo base_url() . 'index.php/autenticacion/cerrar_sesion' ;?>">Cerrar sesión</a></li>
            </ul>   
                <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->        

        <section id="main" class="column">            
            <header><br />
                <h3 class="tabs_involved">Asignar participantes a evento</h3>  
            </header> 
        <form name="participantes" action="<?php echo base_url(); ?>index.php/evento/asignar_partic_evento" method="post" >
        <article class="module width_full">
            <header><h3>Eventos proximos</h3></header>             
               <fieldset style="width:48%; float:left; margin-left: 2%"> <!-- to make two field float next to one another, adjust values accordingly -->
                    <label>Evento</label>
                    <?php echo form_error('idevento'); ?>
                    <select id="idevento" name="idevento" style="width:92%;">
                         <option value="0" selected="selected">Elegir evento</option>
                         <?php 
                            foreach ($proxevtos as $proxevs)
                            {?>
                            <option value="<?php echo $proxevs->idevento; ?>" ><?php echo $proxevs->nombre; ?></option>
                          <?php 
                            }
                          ?>                        
                   </select>                            
              </fieldset>      
            <div class="clear"></div>
            <footer>
                
            </footer>
       </article>  
        <article class="module width_full">         
            <header>
                <div class="submit_link" style="float: left; padding: 2px auto;">
                    <h3>Participantes</h3>
                </div>                          
            </header>  
        
        <div class="tab_container" style="margin: 0 auto;">
            <div id="tab1" class="tab_content">                
                <table class="tablesorter" cellspacing="0"> 
                    <thead> 
                        <tr>  
                            <th></th>
                            <th></th>
                            <th>Código</th>  
                            <th>Apellido Paterno</th> 
                            <th>Apellido Materno</th>
                            <th>Nombres</th>            
                            <th>Nro. de entrada</th>
                        </tr> 
                    </thead>                     
                    <tbody> 
                    <?php 
                        foreach($usuariosnoasig as $usnoasign)
                        { ?>
                        <tr>  
                            <td></td>
                            <td><input type="checkbox" name="numero[]" value="<?php echo $usnoasign->idusuario; ?>" /></td>
                            <td><?php echo $usnoasign->idusuario; ?></td> 
                            <td><?php echo $usnoasign->apepat; ?></td>                             
                            <td><?php echo $usnoasign->apemat; ?></td>  
                            <td><?php echo $usnoasign->nombres; ?></td>    
                            <td><input type="text" id="nroentrada" name="nroentrada" style="width:40%;"/></td>      
                        </tr> 
                   <?php
                        }
                        ?>
                    </tbody> 
                </table>
                <footer>            
                </footer>           
    </article><!-- end of content manager article -->
    <div class="submit_link" style="padding: 3px 200px;">  
        <br>      
        <ul id="ulrdbtn">
            <li><a class="marcar" href="javascript:seleccionar_todo()">Marcar todos</a></li>
            <li>&nbsp;</li>
            <li><a class="marcar" href="javascript:deseleccionar_todo()">Desmarcar</a></li>                    
            <li>&nbsp;</li>
            <li><input type="submit" value="Asignar a evento" class="alt_btn"></li>
            <li>&nbsp;</li>
            <li><a class="regresar" href="<?php echo base_url(); ?>index.php/evento/mostrar_eventos_proximos"></a></li>
         </ul>                
    </div>
    </form>
    <div class="spacer"></div>
        </section>   
    </body>
</html>