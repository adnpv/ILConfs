<?php

class Tema extends CI_Controller {
    
    function Tema() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('evento_model');
       $this->load->model('tema_model');
       $this->load->model('usuario_model');
       $this->load->helper('url');
       $this->load->library('session');
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
                'nombre' => $nombretema,
                'horainicio' => $hinicio,
                'horafin' => $hfin,
                'idevento' => $idevento,
                'idusuario' => $idexpositor,
                'rondapreguntas' => 0,
                'rondaconsultas' => 0
                )
        );
        
        $this->tema_model->insertar_tema_expositor($datosnvotema);
        $this->agregar_tema_expositor($nombreevento, $idevento);  
    }   
    
    function agregar_tema_expositor($nombreevento, $idevento)
    {        
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;        
        $datos['datosexpositor'] = $this->usuario_model->mostrar_expositores();
        $datos['tema_expo'] = $this->tema_model->mostrar_tema_expositor_evento($idevento);
        $this->load->view('/organizador/agregartemaexpo_view', $datos);
    }
    
    public function mostrar_tema_expositor()    
    {
        $idevento = $this->input->post('idevento');         
        $nombreevento = $this->input->post('nombreevento'); 
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $tema_expo = $this->tema_model->mostrar_tema_expositor_evento($idevento);
        $datos['tema_expo'] = $tema_expo;
        $this->load->view('/expositor/temas_view', $datos);
    }
    
    public function mostrar_temas_expositor()    
    {
        $idevento = $this->input->get('idevento');
        $nombreevento = $this->input->get('nombreevento');
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['tema_expo'] = $this->tema_model->mostrar_tema_expositor_evento($idevento);
        $this->load->view('/expositor/temas_view', $datos);
    }   
    
    public function cerrar_ronda_consultas()
    {
        $idtema = $this->input->post('idtema');
        $idevento = $this->input->post('idevento');
        $nombreevento = $this->input->post('nombreevento'); 
        $this->tema_model->cerrar_ronda_consultas($idtema); 
        redirect( base_url() . 'index.php/tema/mostrar_temas_expositor/?idevento='.$idevento.'&nombreevento='.$nombreevento);       
    }    
    
    public function subir_archivos()
    {
        $idtema = $this->input->post('idtema');
        $nombretema = $this->input->post('nombretema');
        $nombreevento = $this->input->post('nombreevento');
        $datos['idtema'] = $idtema;
        $datos['nombretema'] = $nombretema;
        $datos['nombreevento'] = $nombreevento;
        $this->load->view('/organizador/subirarchivos_view', $datos);                
    }
    
    public function cargar_archivos()
    {
        $this->load->library('upload');
        $idtema = $this->input->post('idtema');
        $nombretema = $this->input->post('nombretema');
        $nombreevento = $this->input->post('nombreevento');
        $datos['idtema'] = $idtema;
        $datos['nombretema'] = $nombretema;
        $datos['nombreevento'] = $nombreevento;
        $this->load->view('/organizador/subirarchivos_view', $datos);                
    }
}