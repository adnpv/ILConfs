<?php

class Tema extends CI_Controller {
    
    function Tema() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('evento_model');
       $this->load->model('tema_model');
       $this->load->model('usuario_model');
    }
    
    public function insertar_tema_expositor()
    {        
        $idevento = $this->input->post('idevento');
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('tema');
        $hinicio = $this->input->post('hinicio');
        $hfin = $this->input->post('hfin');
        $idexpositor = $this->input->post('idexpositor');
        $datosnvotema = array(
            array(
                'nombretema' => $nombretema,
                'horainicio' => $hinicio,
                'horafin' => $hfin,
                'idevento' => $idevento,
                'idusuario' => $idexpositor
                )
        );
        $this->tema_model->insertar_tema_expositor($datosnvotema);
        $this->agregar_tema_expositor($nombreevento, $idevento);
    }   
    function agregar_tema_expositor($nombreevento, $idevento)
    {
        $datos['url'] = 'http://localhost/eventos';
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;        
        $datos['datosexpositor'] = $this->usuario_model->mostrar_expositores();
        $datos['tema_expo'] = $this->tema_model->mostrar_tema_expositor_evento($idevento);
        $this->load->view('/admin/organizador/agregartemaexpo_view', $datos);
    }
    
    function mostrar_tema_expositor()    
    {
        $idevento = $this->input->post('idevento');
        $datos['url'] = 'http://localhost/eventos';
        $datos['idevento'] = $idevento; 
        $datos['tema_expo'] = $this->tema_model->mostrar_tema_expositor_evento($idevento);
        $this->load->view('/expositor/temas_view', $datos);
    }
    
}