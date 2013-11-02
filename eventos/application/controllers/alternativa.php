<?php
ini_set('date.timezone', 'America/Lima');

class Alternativa extends CI_Controller {
    
    function Alternativa() {
       parent::__construct(); //llamada al constructor de Model. css 3.0 maker
       $this->load->model('alternativa_model');
       $this->load->model('pregunta_model');
       $this->load->helper('url');
       $this->load->library('session');
    }         
    
     public function mostrar_resultado_alternativa()//para mostrar los datos de la bd en la vista
    {
        $idpregunta = $this->input->post('idpregunta');        
        $datos['idpregunta'] = $idpregunta;        
        $datospregyalternt = $this->obtener_datos_alternativa($idpregunta);
        $datos['pregunta'] = $datospregyalternt[0];
        $datos['alternativas'] = $datospregyalternt[1];
        $marcaciones = $datospregyalternt[2];        
        /*for($i = 0; $i < count($marcaciones); $i++)
        {
            $nroresps = $marcaciones[$i];
        }*/
        $nroresps = array_sum($marcaciones);
        $datos['nroresps'] = $nroresps;
        $this->load->view('/expositor/estadisticaspregunta_view', $datos);
    }
    
    public function listar_alternativas()
    {       
        $idevento = $this->input->post('idevento');
        $idpregunta = $this->input->post('idpregunta');
        $nombrepregunta = $this->input->post('nombrepregunta');
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('nombretema');
        $idtema = $this->input->post('idtema');    
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['nombretema'] = $nombretema;
        $datos['nombrepregunta'] = $nombrepregunta;
        $datos['idpregunta'] = $idpregunta;
        $datos['idtema'] = $idtema;      
        $datos['alternts'] = $this->alternativa_model->listar_alternativas($idpregunta);       
        $this->load->view('/moderador/alternativaspreg_view', $datos);
    }   
    
    public function actualizar_alternativa()
    {
        $idpregunta = $this->input->post('idpregunta');
        $idevento = $this->input->post('idevento');
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('nombretema');
        $idtema = $this->input->post('idtema');
        $nombrepregunta = $this->input->post('nombrepregunta');
        $nombrealternativa = $this->input->post('nombrealternativa');
        $idalternaativa = $this->input->post('idalternaativa');        
        //$pregunta = $this->pregunta_model->listar_pregunta($idpregunta);
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['nombretema'] = $nombretema;
        $datos['nombrepregunta'] = $nombrepregunta;
        $datos['idtema'] = $idtema;     
        $datos['idpregunta'] = $idpregunta;
        $datos['idalternaativa'] = $idalternaativa; 
        $datos['nombrealternativa'] = $nombrealternativa; 
        $this->load->view('/moderador/actualizaralternativa_view', $datos);
    }
    
    private function obtener_datos_alternativa($idpregunta)//obtiene datos de la bd para pasarlo a las demas funciones
    {   
        $pregunta = $this->pregunta_model->mostrar_preguntas_alpublico($idpregunta);
        $resultado = $this->alternativa_model->obtener_resultado($idpregunta);
        $marcaciones = array();
        $textalternt = array();     
        $datosalternt = array();
        
        for($i = 0; $i < count($resultado); $i++)
        {
            array_push($marcaciones, intval($resultado[$i]->nromarcaciones));
            array_push($textalternt, $resultado[$i]->nombre);
        } 
        
        $datosalternt[0] = $pregunta;
        $datosalternt[1] = $textalternt;
        $datosalternt[2] = $marcaciones;      
        
        return $datosalternt;
    }

    public function mostrar_grafico_resultado($idpregunta) //para mostrar el grafico
    {
        $this->load->library('reporte_pregunta');
        
        $datosalternt = $this->obtener_datos_alternativa($idpregunta);       
        
        $pregunta = $datosalternt[0];
        $txtalternativa = $datosalternt[1];
        $valores = $datosalternt[2];
        
        //var_dump($pregunta);
        
        foreach($pregunta as $pgta)
        {
            $txtpregunta = $pgta->nombre;
        }
        
        $graph = new PieGraph(510,550);
        $graph->SetShadow();

        $graph->title->Set('');//($txtpregunta);
        $graph->subtitle->Set('');
        $p1 = new PiePlot3D($valores);
        $p1->SetLabelType(PIE_VALUE_ADJPERCENTAGE);
        //$p1->ExplodeSlice(2);
        $p1->SetSize(0.4);
        $p1->SetCenter(0.50);
        $p1->SetAngle(45);        
        $p1->SetLegends($txtalternativa);
        $graph->Add($p1);
        $graph->Stroke(); 
    }
}
