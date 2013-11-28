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
       $this->personalizar_msj_error_preg();
    }    
   
    public function agregar_preguntas()
    {
        $idevento = $this->input->get('idevento');
        $nombreevento = $this->input->get('nombreevento');
        $idtema = $this->input->get('idtema');
        $nombretema = $this->input->get('nombretema');
        /*$nvapregunta = $this->input->post('nvapregunta');        
        $idusuario = $this->input->post('idusuario');    */    
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['idtema'] = $idtema;   
        $datos['nombretema'] = $nombretema;                     
        $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema_moderador($idtema);       
        $this->load->view('/moderador/agregarpregtema_view', $datos);
    }
    
    public function insertar_pregunta()            
    {
        $idevento = $this->input->post('idevento');
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('nombretema');
        $idtema = $this->input->post('idtema');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombrepregunta','nombrepregunta','required|xss_clean');        
        
        if ($this->form_validation->run() == TRUE)
        {            
            $nombrepregunta = $this->input->post('nombrepregunta');
                       
            $datospregunta = array (                
                array(                
                    'nombre' => $nombrepregunta,
                    'estado' => 'Recibida',
                    'activa' => 0,
                    'idtema' => intval($idtema)  
                    )
                );            
            
            $this->pregunta_model->insertar_pregunta($datospregunta);    
           
            $idpregunta = $this->pregunta_model->obtener_id_pregunta($nombrepregunta);
            redirect ( base_url() . 'index.php/alternativa/agregar_alternativa?idevento=' . $idevento . 
                    '&nombreevento=' . $nombreevento . '&idtema=' . $idtema . '&nombretema=' . $nombretema .
                    '&idpregunta=' . $idpregunta . '&nombrepregunta=' . $nombrepregunta);
        }
        else
        {
            redirect ( base_url() . 'index.php/pregunta/agregar_preguntas?idevento=' . $idevento . 
                    '&nombreevento=' . $nombreevento . '&idtema=' . $idtema . '&nombretema=' . $nombretema);
        }
    }
    
    public function actualizar_preguntas()
    {
        $idevento = $this->input->post('idevento');
        $idpregunta = $this->input->post('idpregunta');
        $nombrepregunta = $this->input->post('nombrepregunta');
        $nombreevento = $this->input->post('nombreevento');
        //$nombre = $this->input->post('nombre');
        $nombretema = $this->input->post('nombretema');
        $idtema = $this->input->post('idtema');               
        $this->pregunta_model->actualizar_pregunta($idpregunta, $nombrepregunta);        
        redirect(base_url() . 'index.php/pregunta/mostrar_preguntas_tema_moderador?idevento=' . $idevento . '&idtema=' . $idtema . '&nombretema=' . $nombretema . '&nombreevento=' . $nombreevento);
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
        redirect(base_url() . 'index.php/pregunta/mostrar_preguntas_tema_moderador?idevento=' . $idevento . '&idtema=' . $idtema . '&nombretema=' . $nombretema . '&nombreevento=' . $nombreevento);
    }
          
    public function mostrar_preguntas_tema()
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'expositor' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $datos['inactivas'] = 4;
            $idtema = $this->input->post('idtema', TRUE); 
            $idevento = $this->input->post('idevento', TRUE); 
            $nombreevento = $this->input->post('nombreevento', TRUE); 
            $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema($idtema);
            $datos['idtema'] = $idtema;
            $datos['idevento'] = $idevento;
            $datos['nombreevento'] = $nombreevento;
            $this->load->view('/expositor/pregevento_view', $datos);
        }
    }
    
    public function mostrar_preguntas_tema_2($inactivas)
    {    
        $idtema = $this->input->post('idtema', TRUE); 
        $idevento = $this->input->post('idevento', TRUE); 
        $nombreevento = $this->input->post('nombreevento', TRUE); 
        $datos['idtema'] = $idtema;
        $datos['inactivas'] = $inactivas - 1;        
        $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema($idtema);       
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $this->load->view('/expositor/pregevento_view', $datos);
    }
    
    public function mostrar_preguntas_tema_moderador()
    {  
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'moderador' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        { 
            $idevento = $this->input->get('idevento'); 
            $nombreevento = $this->input->get('nombreevento');
            $idtema = $this->input->get('idtema');  
            $nombretema = $this->input->get('nombretema');
            $datos['idtema'] = $idtema;
            $datos['nombretema'] = $nombretema;
            $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema_moderador($idtema);       
            $datos['idevento'] = $idevento;
            $datos['nombreevento'] = $nombreevento;
            $this->load->view('/moderador/preguntastema_view', $datos);
        }
    }  
    
    /*function mostrar_preguntas_tema_moderador()
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
    }  */
    
    public function activar_pregunta()
    {
        $inactivas = $this->pregunta_model->obtener_cantidad_inactivas();         
        $idpregunta = $this->input->post('idpregunta');        
        $this->pregunta_model->activar_pregunta($idpregunta);         
        $this->mostrar_preguntas_alpublico($idpregunta);
        $this->mostrar_preguntas_tema_2($inactivas);
    }
    
    function desactivar_preguntas()
    {
        $this->pregunta_model->desactivar_preguntas();
    }
    /*foreach ($pregsalpubl as $pregpub)
        {
            $pregconaltrnts = array(
                    'idtema' => intval($pregpub->idtema),
                    'idpregunta' => intval($pregpub->idpregunta),
                    'nombre' => $pregpub->nombre,
                    'estado'  => $pregpub->estado, 
                    'alternativas' => $altssalpubl
             );            
        }
     */
    public function mostrar_preguntas_alpublico($idpregunta)
    {     
        //header("Content-Type: text/html; charset=UTF-8");


        $pregsalpubl = $this->pregunta_model->mostrar_preguntas_alpublico($idpregunta);
        //var_dump($pregsalpubl);
        //echo '<br>';
        $altssalpubl = $this->pregunta_model->mostrar_altrns_alpublico($idpregunta);
        $pregconaltrnts = array_merge((array)$pregsalpubl, (array)$altssalpubl);
        var_dump($pregconaltrnts);  
        $data_string = urlencode(json_encode($pregconaltrnts));    
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'http://pietreal.herokuapp.com/interactiv/newquest/?' . $data_string); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = trim(curl_exec($ch));
        curl_close($ch);

        // $url = 'http://localhost/curl2/index.php';
        // //$data = array("first_name" => "First name","last_name" => "last name","email"=>"email@gmail.com","addresses" => array ("address1" => "some address" ,"city" => "city","country" => "CA", "first_name" =>  "Mother","last_name" =>  "Lastnameson","phone" => "555-1212", "province" => "ON", "zip" => "123 ABC" ) );
        // $ch = curl_init($url);
        // $data_string = urlencode(json_encode($pregconaltrnts));
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        // curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, array('pregunta'=>$data_string));
        // $result = curl_exec($ch);
        // curl_close($ch);   
    }   
    
    public function mostrar_estad_preguntas_tema()
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
    
    function insertar_respuestas_alternativas()
    {        
        header("Content-Type: text/html; charset=UTF-8");
        $respspubl = @file_get_contents('http://pietreal.herokuapp.com/interactiv/jsonmquest/?id=2&top=1');
        $resps = json_decode(($respspubl), true);

        for($i = 0; $i < count($resps['choices']); $i++)
        {            
            $this->alternativa_model->constestar_alternativa(intval($resps['choices'][$i]['id']), intval($resps['choices'][$i]['nchoices']));            
        }        
    } 
    //mandar los ids de las preguntas con 0 para que een el se cierre todo
    //pasar al organizador el resultado de la encuesta
    //yo jalo el json de la ncuesta q manda adrian rolf la llena (si puede)
        
    private function personalizar_msj_error()
    { 	 
        $this->form_validation->set_error_delimiters('<span class="alert_error">','</span>');	
        $this->form_validation->set_message('required', 'El %s es obligatorio.');
        $this->form_validation->set_message('integer', 'El %s debe ser un número.');
        $this->form_validation->set_message('xss_clean', 'El campo %s no debe tener caracteres extraños.');
    }
    
    private function personalizar_msj_error_preg()
    { 	 
        $this->form_validation->set_error_delimiters('<span class="alert_error">','</span>');	
        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s no puede contener caracteres extraños.');
        $this->form_validation->set_message('exact_length', 'El DNI debe tener 8 dígitos.');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener hasta 12 caracteres.');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener mas de 6 caracteres.');
	$this->form_validation->set_message('integer', 'El %s solo debe tener números.');
	$this->form_validation->set_message('valid_email', 'El %s ingresado no es correcto.');
        $this->form_validation->set_message('matches', 'Las contraseñas deben ser idénticas.');
        $this->form_validation->set_message('xss_clean', 'El campo %s no debe tener caracteres extraños.');
    }
 
    private function validar_sesion()
    {
        if  ($this->session->userdata('idusuario') == '' || $this->session->userdata('rol') == '' || $this->session->userdata('nombres') == '' || $this->session->userdata('apepat') == '' || $this->session->userdata('apemat') == '' )        
            return FALSE;
        else
            return TRUE;
    }
    
    private function validar_moderador()
    {
        if  ($this->session->userdata('rol') == 'moderador' )
            return TRUE;
        else
            return FALSE;
    }
    
    private function validar_organizador()
    {
        if  ($this->session->userdata('rol') == 'organizador' )
            return TRUE;
        else
            return FALSE;
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


