<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Iniciar sesión</title>	
        <link rel="stylesheet" href="<?php echo $url ?>/static/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo $url ?>/static/js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <!--<script src="static/js/hideshow.js" type="text/javascript"></script>
    <script src="static/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="static/js/jquery.equalHeight.js"></script>
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
        </script>-->
        <script type="text/javascript">
            $(function(){
                $('.column').equalHeight();
            });
        </script>
    </head>
    <body>
        
        <header id="header">
            <hgroup style="text-align: center;">
                <h2 class="section_title">Nombre de la empresa no me acuerdo</h2>
            </hgroup>
        </header> <!-- end of header bar -->       
        <section id="main" class="column" >

    <article class="module width_3_quarter" style="margin: 140px 320px;">
            <header>
                <h3>Inicio de sesión</h3>
            </header>
               <div class="module_content">
                <fieldset style="float:left; width: 420px; margin: 10px 90px;">
                    <form action="<?php echo $url ?>/index.php/autenticacion/autenticar" method="post">
                        <table>
                            <tr>
                                <td><label>Usuario</label></td>
                                <td><input type="text" name="usuario" style="width:90%;"  /></td>
                                <td><br /><br /></td>
                            </tr>
                            <tr>
                                <td><label>Contraseña</label></td>
                                <td><input type="password" name="contrasena" style="width:90%;" /></td>
                                 <td><br /><br /></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"></td>   
                                <td style="text-align: left;"><input type="submit" value="Ingresar" class="alt_btn" /></td>                                                                                              
                            </tr>
                        </table>
                    </form>                    
                </fieldset>      
            </div>
    </article>      
        </section>   
    </body>
</html>
