<?php

class Pregunta extends CI_Controller {
    
    function Pregunta() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('pregunta_model');
       $this->load->helper('file');
       $this->load->helper('url');
       //$this->load->library('session');
    }
    
    function mostrar_preguntas_tema()
    {
        $datos['inactivas'] = 4;
        $idtema = $this->input->post('idtema'); 
        $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema($idtema);
        $datos['idtema'] = $idtema;
        $this->load->view('/expositor/pregevento_view', $datos);
    }
    
    function mostrar_preguntas_tema_2($inactivas)
    {
        $datos['inactivas'] = $inactivas - 1;
        $idtema = $this->input->post('idtema'); 
        $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema($idtema);
        $datos['idtema'] = $idtema;
        $this->load->view('/expositor/pregevento_view', $datos);
    }
    
    function activar_pregunta()
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
    
    function mostrar_preguntas_alpublico($idpregunta)
    {     
        header("Content-Type: text/html; charset=UTF-8");
        //$idpregunta = 2;//cambiar!
        $pregsalpubl = $this->pregunta_model->mostrar_preguntas_alpublico($idpregunta);
        $altssalpubl = $this->pregunta_model->mostrar_altrns_alpublico($idpregunta);
        $pregconaltrnts = array_merge((array)$pregsalpubl, (array)$altssalpubl);
        //var_dump(json_encode($pregconaltrnts), JSON_UNESCAPED_UNICODE);
        $jsonpregsalpubl = json_encode($pregconaltrnts);
        $ruta =  base_url() . 'jsonparapublico/pregsalpubl.json';
        if ( ! write_file($ruta, $jsonpregsalpubl))
        {
            echo 'No se puede escribir el archivo';
        }
        else
        {
            echo 'Se escribió el archivo!';
        }             
    }
    
    function constestar_alternativa2()
    {
        $ruta =  base_url() . 'altrntmarcadas/altrnmarcadas.json';
        $marcadas = json_decode(@file_get_contents($ruta));  
        //$datosaltrns = array('idalternativa' => null, 'marcaciones' => null);
        foreach ($marcadas as $key => $marc) {
           $this->pregunta_model->constestar_alternativa($marc->idalternativa, $marc->nromarcaciones);            
        }        
    }
    
    function constestar_alternativa()
    {
        $ruta =  base_url() . 'altrntmarcadas/altrnmarcadas.json';
        $marcadas = json_decode(@file_get_contents($ruta));  
        //$datosaltrns = array('idalternativa' => null, 'marcaciones' => null);
        foreach ($marcadas as $key => $marc) {
           $this->pregunta_model->constestar_alternativa($marc->idalternativa, $marc->nromarcaciones);            
        }        
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


