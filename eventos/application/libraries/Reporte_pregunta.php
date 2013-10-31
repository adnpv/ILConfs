<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');    

class Reporte_pregunta {
    
    public function __construct() 
    {
        include ('src/jpgraph.php');
        include ('src/jpgraph_pie.php');
        include ('src/jpgraph_pie3d.php');
    }    
}