<?php

class Participante extends CI_Controller {

    function Participante() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('participante_model');       
       $this->load->helper('url');
       $this->load->library('session');
    }
    
    public function cambiar_edo_participante()
    {
        $idusuario = $this->input->get('idusuario');
        $idevento = $this->input->get('idevento');        
        $nombreevento = $this->input->get('nombreevento');
        $edoevento = $this->input->get('edoevento');
        $estado = $this->input->get('estado');                
        $this->participante_model->cambiar_edo_participante($idusuario, $estado);     
        redirect ( base_url() . 'index.php/evento/listar_participantes_evento?idevento=' . $idevento .
            '&nombreevento' . $nombreevento . '&edoevento=' . $edoevento);
    }   
}    