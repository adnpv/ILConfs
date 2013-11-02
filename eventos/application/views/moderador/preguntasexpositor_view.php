<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Moderador</title>	
        <link rel="stylesheet" href="../static/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="../static/js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="../static/js/hideshow.js" type="text/javascript"></script>
    <script src="../static/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../static/js/jquery.equalHeight.js"></script>
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
                <p>Bienvenido moderador: John Doe</p>
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
                <li class="icn_jump_back"><a href="#">Cerrar sesión</a></li>
            </ul>
               <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </aside><!-- end of sidebar -->

        <section id="main" class="column">
            <header><br>
                 <h3 class="tabs_involved">HTML5 y CSS3</h3>  
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
                            <th>Código</th>  
                            <th>Tema</th>
                            <th>Nombre</th>  
                            <th>Acciones</th>  
                        </tr> 
                    </thead> 
                    <tbody> 
                        <tr>  
                            <td>3543</td> 
                            <td>Novedades de HTML5</td>
                            <td>¿Le interesa crear páginas con HTML5?</td> 
                            <td><ul id="ulrdbtn"><li><form action="actualizarpregunta.html"><input type="image" src="../static/images/icn_edit_article.png" title="Actualizar"/></form></li><li><form action="listaralternativas.html"><input type="image" src="../static/images/icn_categories.png" title="Ver alternativas"/></form></li><li><form action=""><input type="image" src="../static/images/activar.gif" title="Enviar al público"/></form></li></ul></td> 
                        </tr> 
                        <tr>                             
                            <td>3544</td>
                            <td>Reconocimiento de voz con HTML5</td>
                            <td>Bla bla bla</td>
                            <td><ul id="ulrdbtn"><li><form action="actualizarpregunta.html"><input type="image" src="../static/images/icn_edit_article.png" title="Actualizar"/></form></li><li><form action="listaralternativas.html"><input type="image" src="../static/images/icn_categories.png" title="Ver alternativas"/></form></li><li><form action=""><input type="image" src="../static/images/activar.gif" title="Enviar al público"/></form></li></ul></td> 
                            <td></td> 
                        </tr>
                        <tr>                             
                            <td>3545</td> 
                            <td>Nuevos elementos</td>   
                            <td>Bla bla </td>
                            <td><ul id="ulrdbtn"><li><form action="actualizarpregunta.html"><input type="image" src="../static/images/icn_edit_article.png" title="Actualizar"/></form></li><li><form action="listaralternativas.html"><input type="image" src="../static/images/icn_categories.png" title="Ver alternativas"/></form></li><li><form action=""><input type="image" src="../static/images/activar.gif" title="Enviar al público"/></form></li></ul></td> 
                        </tr> 
                        <tr>                             
                            <td>3546</td> 
                            <td>¿Esta de acuerdo con la convocatoria de Vargas?</td>   
                            <td>Audio y video con HTML5</td>
                            <td><ul id="ulrdbtn"><li><form action="actualizarpregunta.html"><input type="image" src="../static/images/icn_edit_article.png" title="Actualizar"/></form></li><li><form action="listaralternativas.html"><input type="image" src="../static/images/icn_categories.png" title="Ver alternativas"/></form></li><li><form action=""><input type="image" src="../static/images/activar.gif" title="Enviar al público"/></form></li></ul></td> 
                        </tr> 
                        <tr>                             
                            <td>3547</td> 
                            <td>¿Cree que se puede ganar a Argentina?</td>   
                            <td>Nuevos elementos</td>
                            <td><ul id="ulrdbtn"><li><form action="actualizarpregunta.html"><input type="image" src="../static/images/icn_edit_article.png" title="Actualizar"/></form></li><li><form action="listaralternativas.html"><input type="image" src="../static/images/icn_categories.png" title="Ver alternativas"/></form></li><li><form action=""><input type="image" src="../static/images/activar.gif" title="Enviar al público"/></form></li></ul></td> 
                        </tr> 
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