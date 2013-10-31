<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');    

class Reporte_encuesta {
    
    public function __construct() 
    {
        include ('src/jpgraph.php');
        include ('src/jpgraph_line.php');
        include ('src/jpgraph_bar.php');
    }    
}

