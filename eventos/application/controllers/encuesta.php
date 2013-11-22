<?php
ini_set('date.timezone', 'America/Lima');

class Encuesta extends CI_Controller {
    
    function Encuesta() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('opcion_model');
       $this->load->model('encuesta_model');
       $this->load->helper('url');
       $this->load->library('session');
    }
    
    public function mostrar_preguntas_encuesta()
    {
        $idevento = $this->input->post('idevento');
        $nombreevento = $this->input->post('nombreevento'); 
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['preguntas_encta'] = null;        
        $this->load->view('organizador/preguntasencuesta_view', $datos);
    }

    public function mostrar_encuesta()
    {
        $idevento = $this->input->post('idevento');
        $nombreevento = $this->input->post('nombreevento');        
        $datosenc = $this->obtener_datos_encuesta($idevento);        
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['encuesta'] = $datosenc[0];
        $datos['opciones'] = $datosenc[1];
        $nroresps = array_sum($datosenc[2]);
        $datos['nroresps'] = $nroresps;
        $datos['idencuesta'] = $datosenc[3];
        $this->load->view('organizador/estadisticasencuesta_view', $datos);
    }
    
    function obtener_datos_encuesta($idevento)
    {
        $encuesta = $this->encuesta_model->obtener_encuesta($idevento);        
        
        foreach ($encuesta as $enc)
        {
           $idencuesta = $enc->idencuesta;
        }
        
        $opciones = $this->opcion_model->obtener_opciones_encuesta($idencuesta); 
        $marcaciones = array();
        $textopc = array();     
        $datosencuesta = array();
        
        for($i = 0; $i < count($opciones); $i++)
        {
            array_push($marcaciones, intval($opciones[$i]->nromarcaciones));
            array_push($textopc, $opciones[$i]->nombre);
        } 
        
        $datosencuesta[0] = $encuesta;
        $datosencuesta[1] = $textopc;
        $datosencuesta[2] = $marcaciones;   
        $datosencuesta[3] = $idencuesta;

        return $datosencuesta;
    }
    
    public function mostrar_grafico_encuesta($idevento) //para mostrar el grafico
    {
        $this->load->library('reporte_encuesta');        
        
        $datosencuesta = $this->obtener_datos_encuesta($idevento);       
        
        $encuesta = $datosencuesta[0];
        $txtopcion = $datosencuesta[1];
        $valores = $datosencuesta[2];
        
        foreach($encuesta as $enc)
        {
            $txtencuesta = $enc->nombre;
        }
        // Create the graph. These two calls are always required
        $graph = new Graph(510,400,'auto');
        $graph->SetScale("textlin");
        //$theme_class="DefaultTheme";
        //$graph->SetTheme(new $theme_class());
        // set major and minor tick positions manually        
        $graph->yaxis->SetTickPositions(array(0,20,40,60,80,100), array(15,45,75,105,135));
        $graph->SetBox(false);
        $graph->ygrid->SetColor('gray');
        $graph->ygrid->SetFill(false);
        $graph->xaxis->SetTickLabels($txtopcion);
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false,false);
        // Create the bar plots
        $b1plot = new BarPlot($valores);
        // ...and add it to the graPH
        $graph->Add($b1plot);
        $b1plot->SetColor("white");
        $b1plot->SetFillGradient("#73a839","#73a839",GRAD_LEFT_REFLECTION);
        $b1plot->SetWidth(45);
        $graph->title->Set($txtencuesta);     
        // Display the graph
        $graph->Stroke();
     }   
}    
