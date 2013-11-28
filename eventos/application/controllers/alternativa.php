<?php
ini_set('date.timezone', 'America/Lima');

class Alternativa extends CI_Controller {
    
    function Alternativa() {
       parent::__construct(); //llamada al constructor de Model. css 3.0 maker
       $this->load->model('alternativa_model');
       $this->load->model('pregunta_model');
       $this->load->helper('url');
       $this->load->library('session');
       $this->load->library('form_validation');
    }       
    
    public function agregar_alternativa()
    {
        $idevento = $this->input->get('idevento');
        $idpregunta = $this->input->get('idpregunta');
        $nombrepregunta = $this->input->get('nombrepregunta');
        $nombreevento = $this->input->get('nombreevento');
        $nombretema = $this->input->get('nombretema');
        $idtema = $this->input->get('idtema');   
        $datos['idevento'] = $idevento;
        $datos['idpregunta'] = $idpregunta;
        $datos['nombrepregunta'] = $nombrepregunta; 
        $datos['nombreevento'] = $nombreevento;
        $datos['nombretema'] = $nombretema;
        $datos['idtema'] = $idtema;
        $this->load->view('/moderador/agregaralternativapreg_view', $datos);
    }
    
    public function insertar_alternativa()
    {
        $this->load->library('form_validation');
        $idevento = $this->input->post('idevento');
        $idpregunta = $this->input->post('idpregunta');
        $nombrepregunta = $this->input->post('nombrepregunta');
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('nombretema');
        $idtema = $this->input->post('idtema');  
        $datos['idevento'] = $idevento;
        $datos['idpregunta'] = $idpregunta;
        $datos['nombrepregunta'] = $nombrepregunta; 
        $datos['nombreevento'] = $nombreevento;
        $datos['nombretema'] = $nombretema;
        $datos['idtema'] = $idtema;

        $this->form_validation->set_rules('nombrealternativa','nombrealternativa','required|xss_clean');
        $this->form_validation->set_rules('idpregunta','idpregunta','required|xss_clean|integer');        
        
        if ($this->form_validation->run() == TRUE)
        {
             $idpregunta = $this->input->post('idpregunta');
             $nombrealternativa = $this->input->post('nombrealternativa');
             $datosalternt = array(
                array(
                    
                    'nombre' => $nombrealternativa,
                    'nromarcaciones' => 0,
                    'idpregunta' => $idpregunta
                )
            );
            $this->alternativa_model->insertar_alternativa($datosalternt);        
            $this->load->view('/moderador/agregaralternativapreg_view', $datos);
        }
        else
            $this->load->view('/moderador/agregaralternativapreg_view', $datos);
    }
    
    public function mostrar_resultado_alternativa()//para mostrar los datos de la bd en la vista
    {
        $idevento = $this->input->get('idevento');
        $idpregunta = $this->input->get('idpregunta');
        $nombrepregunta = $this->input->get('nombrepregunta');
        $nombreevento = $this->input->get('nombreevento');
        $nombretema = $this->input->get('nombretema');
        $idtema = $this->input->get('idtema');    
        
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
        $idevento = $this->input->get('idevento');
        $idpregunta = $this->input->get('idpregunta');
        $nombrepregunta = $this->input->get('nombrepregunta');
        $nombreevento = $this->input->get('nombreevento');
        $nombretema = $this->input->get('nombretema');
        $idtema = $this->input->get('idtema');    
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
        $idalternativa = $this->input->post('idalternativa');               
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['nombretema'] = $nombretema;
        $datos['nombrepregunta'] = $nombrepregunta;
        $datos['idtema'] = $idtema;     
        $datos['idpregunta'] = $idpregunta;
        $datos['idalternativa'] = $idalternativa; 
        $datos['nombrealternativa'] = $nombrealternativa; 
        $this->load->view('/moderador/actualizaralternativa_view', $datos);
    }
    
    public function actualizar_alternativas()
    {
        $idpregunta = $this->input->post('idpregunta');
        $idevento = $this->input->post('idevento');
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('nombretema');
        $idtema = $this->input->post('idtema');
        $nombrepregunta = $this->input->post('nombrepregunta');
        $nombrealternativa = $this->input->post('nombrealternativa');
        $idalternativa = $this->input->post('idalternativa');               
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['nombretema'] = $nombretema;
        $datos['nombrepregunta'] = $nombrepregunta;
        $datos['idtema'] = $idtema;     
        $datos['idpregunta'] = $idpregunta;   
        $datos['idalternativa'] = $idalternativa;     
        $datos['nombrealternativa'] = $nombrealternativa;   
        $this->alternativa_model->actualizar_alternativas($idalternativa, $nombrealternativa);
            redirect ( base_url() . 'index.php/alternativa/listar_alternativas/?idevento=' . $idevento . '&nombreevento=' . $nombreevento .
            '&idpregunta=' . $idpregunta . '&nombrepregunta=' . $nombrepregunta . '&idtema=' . $idtema);        
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
    
    private function personalizar_msj_error()
    { 	 
        $this->form_validation->set_error_delimiters('<span class="alert_error">','</span>');	
        $this->form_validation->set_message('required', 'El campo es obligatorio.');        	
        $this->form_validation->set_message('xss_clean', 'La alternativa no debe tener caracteres extraños.');
        $this->form_validation->set_message('integer', 'El id de pregunta debe ser un entero.');
    }
    
    private function validar_sesion()
    {
        if  ($this->session->userdata('idusuario') == '' || $this->session->userdata('rol') == '' || $this->session->userdata('nombres') == '' || $this->session->userdata('apepat') == '' || $this->session->userdata('apemat') == '' )        
            return FALSE;
        else
            return TRUE;
    }
    
}
