<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Moderador</title>	
        <link rel="stylesheet" href="<?php echo base_url() ; ?>static/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url() ; ?>static/js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ; ?>static/js/hideshow.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ; ?>static/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() ; ?>static/js/jquery.equalHeight.js"></script>
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
                <h2 class="section_title">Preguntas del expositor</h2>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <p>Bienvenido <?php echo  $this->session->userdata('rol') . ': ' .$this->session->userdata('nombres') . ' ' .  $this->session->userdata('apepat') . ' ' .  $this->session->userdata('apemat'); ?></p>
                <!--<a class="logout_user" href="#" title="Logout">Logout</a>-->
            </div>
            <div class="breadcrumbs_container">
                <article class="breadcrumbs">
                    <a href="index.html">PIT Real</a>
                    <div class="breadcrumb_divider"></div> 
                    <a class="current">Lista de preguntas</a>
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
                <li class="icn_categories"><a href="index.html">Lista de eventos</a></li>         
                <li class="icn_categories"><a href="listaralternativas.html">Asistentes</a></li> 
            </ul>
          
           <h3>Preguntas</h3>
            <ul class="toggle">                   
                <li class="icn_new_article"><a href="crearpregunta.html">Crear preguntas</a></li>                       
                <li class="icn_new_article"><a href="activarpregunta.html">Activar ronda de preguntas</a></li>     
                <li class="icn_categories"><a href="listarpreguntas.html">Preguntas del expositor</a></li>               
                <li class="icn_categories"><a href="listarpreguntasdelpublico.html">Preguntas del público</a></li>               
            </ul>       
                       
          <h3>Encuesta</h3>            
            <ul class="toggle">  
                <li class="icn_new_article"><a href="encuesta.html">Encuesta</a></li>        
            </ul>
          
            <h3>Cuenta</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="actualizarusuario.html">Actualizar usuario</a></li>
                <li class="icn_jump_back"><a href="<?php echo base_url() . 'index.php/autenticacion/cerrar_sesion' ;?>">Cerrar sesión</a></li>
            </ul>
               <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->

        <section id="main" class="column">
            <header><br>
                 <h3 class="tabs_involved"><?php echo $nombreevento . ' - ' . $nombretema; ?></h3>  
            </header>
	 
        <article class="module width_full">
        <header>
            <div class="submit_link" style="float: left; padding: 2px auto;">
            <h3 class="tabs_involved">Preguntas</h3>
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
                            <th>Estado</th>  
                            <th>Activa</th>  
                            <th>Acciones</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                  <?php foreach($preguntas_tema as $preg){ ?>
                        <tr>  
                            <td></td>
                            <td><?php echo $preg->idpregunta; ?></td> 
                            <td><?php echo $preg->nombre; ?></td> 
                            <td><?php echo $preg->estado; ?></td>  
                            <?php if ($preg->activa == 1)
                                  {?>
                                    <td><?php echo 'Activa'; ?></td>                                           
                            <?php }else 
                                  {?>
                                    <td><?php echo 'Inactiva'; ?></td> 
                            <?php } ?>
                            </td> 
                            <td>
                                <ul id="ulrdbtn">
                                    <li>
                                        <form action="<?php echo base_url() ; ?>index.php/pregunta/actualizar_pregunta" method="post">
                                            <input type="hidden" id="idevento" name="idevento" value="<?php echo $idevento; ?>" />
                                            <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $nombreevento; ?>" />
                                            <input type="hidden" id="idtema" name="idtema" value="<?php echo $idtema; ?>" />
                                            <input type="hidden" id="nombretema" name="nombretema" value="<?php echo $nombretema; ?>" />
                                            <input type="hidden" id="idpregunta" name="idpregunta" value="<?php echo $preg->idpregunta; ?>" />
                                            <input type="hidden" id="nombrepregunta" name="nombrepregunta" value="<?php echo $preg->nombre; ?>" />
                                            <button type="submit" class="imgbuttonactualizar" title="Actualizar"></button>                                            
                                        </form>
                                    </li>
                                    <li>                                       
                                        <form action="<?php echo base_url() ; ?>index.php/alternativa/listar_alternativas" method="get">
                                            <input type="hidden" id="idevento" name="idevento" value="<?php echo $idevento; ?>" />
                                            <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $nombreevento; ?>" />
                                            <input type="hidden" id="idtema" name="idtema" value="<?php echo $idtema; ?>" />
                                            <input type="hidden" id="nombretema" name="nombretema" value="<?php echo $nombretema; ?>" />
                                            <input type="hidden" id="idpregunta" name="idpregunta" value="<?php echo $preg->idpregunta; ?>" />
                                            <input type="hidden" id="nombrepregunta" name="nombrepregunta" value="<?php echo $preg->nombre; ?>" />
                                            <button type="submit" class="imgbuttonlistar" title="Alternativas"></button>                                            
                                        </form>    
                                    </li>
                                    <li>                                        
                                        <form action="<?php echo base_url() ; ?>index.php/pregunta/validar_pregunta" method="post">
                                            <input type="hidden" id="idevento" name="idevento" value="<?php echo $idevento; ?>" />
                                            <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $nombreevento; ?>" />
                                            <input type="hidden" id="idtema" name="idtema" value="<?php echo $idtema; ?>" />
                                            <input type="hidden" id="nombretema" name="nombretema" value="<?php echo $nombretema; ?>" />
                                            <input type="hidden" id="idpregunta" name="idpregunta" value="<?php echo $preg->idpregunta; ?>" />
                                            <input type="hidden" id="accion" name="accion" value="No respondida" />
                                            <button type="submit" class="imgactivar" title="Validar pregunta"></button>                                            
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
            <div class="submit_link" style="padding: 3px 330px;">
                <ul id="ulrdbtn">
                    <li>
                        <form action="<?php echo base_url(); ?>index.php/pregunta/agregar_preguntas" method="get">
                            <input type="hidden" id="idevento" name="idevento" value="<?php echo $idevento; ?>" />
                            <input type="hidden" id="nombreevento" name="nombreevento" value="<?php echo $nombreevento; ?>" />
                            <input type="hidden" id="idtema" name="idtema" value="<?php echo $idtema; ?>" />
                            <input type="hidden" id="nombretema" name="nombretema" value="<?php echo $nombretema; ?>" />
                            <input type="submit" class="alt_btn" value="Agregar preguntas" />
                        </form>
                    </li> 
                    <li><a class="regresar" href="<?php echo base_url() . 'index.php/pregunta/mostrar_preguntas_tema_moderador?idevento=' . $idevento . '&nombreevento=' . $nombreevento; ?>"></a></li>
                </ul>
                
            </div>
        </footer>
    </article><!-- end of content manager article -->   

        <div class="spacer"></div>
        </section>   
    </body>
</html>