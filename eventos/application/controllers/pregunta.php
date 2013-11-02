<?php

class Pregunta extends CI_Controller {
    
    function Pregunta() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('pregunta_model');
       $this->load->model('alternativa_model');
       $this->load->helper('file');
       $this->load->helper('url');
       $this->load->helper('form');
       $this->load->library('session');
    }
    
    public function actualizar_pregunta()
    {
        $idpregunta = $this->input->post('idpregunta');
        $idevento = $this->input->post('idevento');
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('nombretema');
        $idtema = $this->input->post('idtema');
        $pregunta = $this->pregunta_model->listar_pregunta($idpregunta);
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['nombretema'] = $nombretema;
        $datos['pregunta'] = $pregunta;
        $datos['idtema'] = $idtema;        
        $this->load->view('/moderador/actualizarpregunta_view', $datos);
    }
    
    public function actualizar_preguntas()
    {
        $idevento = $this->input->post('idevento');
        $idpregunta = $this->input->post('idpregunta');
        $nombrepregunta = $this->input->post('nombrepregunta');
        $nombreevento = $this->input->post('nombreevento');
        $nombre = $this->input->post('nombre');
        $nombretema = $this->input->post('nombretema');
        $idtema = $this->input->post('idtema');               
        $this->pregunta_model->actualizar_pregunta($idpregunta, $nombrepregunta);        
        redirect(base_url() . 'index.php/pregunta/mostrar_preguntas_tema_moderador_?idevento=' . $idevento . '&idtema=' . $idtema . '&nombretema=' . $nombretema . '&nombreevento=' . $nombreevento);
    }
    
    public function validar_pregunta()
    {
        $idevento = $this->input->post('idevento');
        $idpregunta = $this->input->post('idpregunta');
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('nombretema');
        $idtema = $this->input->post('idtema');               
        $accion = $this->input->post('accion');
        $this->pregunta_model->validar_pregunta($idpregunta, $accion);        
        redirect(base_url() . 'index.php/pregunta/mostrar_preguntas_tema_moderador_?idevento=' . $idevento . '&idtema=' . $idtema . '&nombretema=' . $nombretema . '&nombreevento=' . $nombreevento);
    }
          
    public function mostrar_preguntas_tema()
    {
        $datos['inactivas'] = 4;
        $idtema = $this->input->post('idtema'); 
        $idevento = $this->input->post('idevento'); 
        $nombreevento = $this->input->post('nombreevento'); 
        $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema($idtema);
        $datos['idtema'] = $idtema;
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $this->load->view('/expositor/pregevento_view', $datos);
    }
    
    function mostrar_preguntas_tema_2($inactivas)
    {    
        $idtema = $this->input->post('idtema');     
        $idevento = $this->input->post('idevento'); 
        $nombreevento = $this->input->post('nombreevento'); 
        $datos['idtema'] = $idtema;
        $datos['inactivas'] = $inactivas - 1;        
        $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema($idtema);       
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $this->load->view('/expositor/pregevento_view', $datos);
    }
    
    function mostrar_preguntas_tema_moderador_()
    {
        $idtema = $this->input->get('idtema');     
        $idevento = $this->input->get('idevento'); 
        $nombreevento = $this->input->get('nombreevento');
        $nombretema = $this->input->get('nombretema');
        $datos['idtema'] = $idtema;
        $datos['nombretema'] = $nombretema;
        $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema_moderador($idtema);       
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $this->load->view('/moderador/preguntastema_view', $datos);
    }  
    
    function mostrar_preguntas_tema_moderador()
    {
        $idtema = $this->input->post('idtema');     
        $idevento = $this->input->post('idevento'); 
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('nombretema');
        $datos['idtema'] = $idtema;
        $datos['nombretema'] = $nombretema;
        $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema_moderador($idtema);       
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $this->load->view('/moderador/preguntastema_view', $datos);
    }  
    
    function activar_pregunta()
    {
        $inactivas = $this->pregunta_model->obtener_cantidad_inactivas();         
        $idpregunta = $this->input->post('idpregunta');        
        $this->pregunta_model->activar_pregunta($idpregunta);         
        //$this->mostrar_preguntas_alpublico($idpregunta);
        $this->mostrar_preguntas_tema_2($inactivas);
    }
    
    function desactivar_preguntas()
    {
        $this->pregunta_model->desactivar_preguntas();
    }
    
    function mostrar_preguntas_alpublico($idpregunta)
    {     
        header("Content-Type: text/html; charset=UTF-8");
        $pregsalpubl = $this->pregunta_model->mostrar_preguntas_alpublico($idpregunta);
        $altssalpubl = $this->pregunta_model->mostrar_altrns_alpublico($idpregunta);
        $pregconaltrnts = array_merge((array)$pregsalpubl, (array)$altssalpubl);
        
        $url = 'http://localhost/curl2/index.php';
        //$data = array("first_name" => "First name","last_name" => "last name","email"=>"email@gmail.com","addresses" => array ("address1" => "some address" ,"city" => "city","country" => "CA", "first_name" =>  "Mother","last_name" =>  "Lastnameson","phone" => "555-1212", "province" => "ON", "zip" => "123 ABC" ) );
        $ch = curl_init($url);
        $data_string = urlencode(json_encode($pregconaltrnts));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('pregunta'=>$data_string));

        $result = curl_exec($ch);
        curl_close($ch);       
    }       
    
    function mostrar_estad_preguntas_tema()
    {    
        /*$ruta =  base_url() . 'altrntmarcadas/altrnmarcadas.json';
        $marcadas = json_decode(@file_get_contents($ruta));  
        //$datosaltrns = array('idalternativa' => null, 'marcaciones' => null);
        foreach ($marcadas as $key => $marc) {
           $this->pregunta_model->constestar_alternativa($marc->idalternativa, $marc->nromarcaciones);            
        }  */
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('idtema','idtema','required|xss_clean|numeric');
        
        if ($this->form_validation->run() == TRUE)
        {
            $idtema = $this->input->post('idtema');     
            $nombreevento = $this->input->post('nombreevento');     
            $datos['idtema'] = $idtema;
            $datos['nombreevento'] = $nombreevento;
            $datos['datapreg'] = TRUE;
            $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema_estad($idtema);
            $this->insertar_respuestas_alternativas();
            $this->load->view('/expositor/estadpregevento_view', $datos);
        }
        else
        {    
            $datos['datapreg'] = FALSE;
            $this->load->view('/expositor/estadpregevento_view');
        }
    }
    
    public function insertar_respuestas_alternativas()
    {        
        header("Content-Type: text/html; charset=UTF-8");
        $respspubl = @file_get_contents('http://pietreal.herokuapp.com/interactiv/jsonmquest/?id=2&top=1');
        $resps = json_decode(($respspubl), true);

        for($i = 0; $i < count($resps['choices']); $i++)
        {            
            $this->alternativa_model->constestar_alternativa(intval($resps['choices'][$i]['id']), intval($resps['choices'][$i]['nchoices']));            
        }        
    } 
    
    private function personalizar_msj_error()
    { 	 
        $this->form_validation->set_error_delimiters('<span class="alert_error">','</span>');	
        $this->form_validation->set_message('required', 'El %s es obligatorio.');
        $this->form_validation->set_message('integer', 'El %s debe ser un número.');
        $this->form_validation->set_message('xss_clean', 'El campo %s no debe tener caracteres extraños.');
    }
 
    /*function constestar_alternativa()
    {
        $idsalternativas = json_decode(@file_get_contents('http://localhost/eventos/altrntmarcadas/altrnmarcadas.json'));  
        for($i = 0; $i<count($idsalternativas); $i++)//Se lee el json escrito por el front-end
        {
            $this->pregunta_model->constestar_alternativa($idsalternativas[$i]);
        }                            
    }*/
}


