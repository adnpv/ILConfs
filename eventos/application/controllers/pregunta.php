<?php

class Pregunta extends CI_Controller {
    
    function Pregunta() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('pregunta_model');
    }
    
    function mostrar_preguntas_tema()
    {
        $idtema = $this->input->post('idtema');
        $datos['url'] = 'http://localhost/eventos';      
        $datos['preguntas_tema'] = $this->pregunta_model->mostrar_preguntas_tema($idtema);
        $datos['idtema'] = $idtema;
        $this->load->view('/expositor/pregevento_view', $datos);
    }
    
    function activar_pregunta()
    {
        $idpregunta = $this->input->post('idpregunta');
        //$valor = $this->input->post('valor');
        $this->pregunta_model->activar_pregunta($idpregunta);
        $this->mostrar_preguntas_tema();
    }
    
    function desactivar_preguntas()
    {
        $this->pregunta_model->desactivar_preguntas();
    }
    
    function mostrar_preguntas_alpublico()
    {
        $idpregunta = 1;//$this->input->post('idpregunta');
        $pregsalpubl = $this->pregunta_model->mostrar_preguntas_alpublico($idpregunta);
        var_dump($pregsalpubl);
    }
    
    function mostrar_altrns_alpublico()
    {
       $idpregunta = 1;//$this->input->post('idpregunta');
       $pregsalpubl = $this->pregunta_model->mostrar_altrns_alpublico($idpregunta);
       var_dump($pregsalpubl);
    } 
}


