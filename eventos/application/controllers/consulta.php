<?php

class Consulta extends CI_Controller {
    
    function Consulta() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('consulta_model');
    }
    
    function mostrar_consultas_tema()
    {
        $idtema = $this->input->post('idtema');
        $datos['url'] = 'http://localhost/eventos';
        $datos['respondidas'] = 0;
        $datos['consultas_tema'] = $this->consulta_model->mostrar_consultas_tema($idtema);
        $datos['idtema'] = $idtema;
        $this->load->view('/expositor/pregparticipantes_view', $datos);
    }
    
    function actualizar_consulta()
    {
        $datos['url'] = 'http://localhost/eventos';
        $idtema = $this->input->post('idtema');
        $datos['idtema'] = $idtema;
        $respondidas = $this->consulta_model->obtener_cantidad_respondidas();        
        $datos['respondidas'] =  $respondidas;
        
        if ($respondidas < 5)
        {            
            $idconsulta = $this->input->post('idconsulta');            
            $this->consulta_model->responder_pregunta_en_evento($idconsulta);
            $datos['consultas_tema'] = $this->consulta_model->mostrar_consultas_tema($idtema);
            $this->load->view('/expositor/pregparticipantes_view', $datos);
        }
        else
        {            
            $this->load->view('/expositor/pregparticipantes_view', $datos);
        }        
    }
}


