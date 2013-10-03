<?php

class Evento extends CI_Controller {
    
    function Evento() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('usuario_model');
       $this->load->model('evento_model');
       $this->load->model('tema_model');
       $this->load->helper('url');
       $this->load->library('encrypt');
    }
    
    public function index()
    {        
        $datos['datosmoderador'] = $this->usuario_model->mostrar_moderadores();
        $this->load->view('/admin/organizador/crearevento_view', $datos);
    }
    
    public function insertar_evento()
    {
        $nombreevento = $this->input->post("nombre");
        $lugar = $this->input->post("lugar");
        $finicio = $this->input->post("finicio");
        $ffin = $this->input->post("ffin");
        $hregistro = $this->input->post("hregistro");
        $hinicio = $this->input->post("hinicio");
        $hfin = $this->input->post("hfin");
        $destacado = $this->input->post("destacado");
        $latitud = $this->input->post("latitud");
        $longitud = $this->input->post("longitud");
        $moderador = $this->input->post("moderador");        
        $datosnvoevento = array(
            array(
                'nombre' => $nombreevento,
                'fechainicio' => $finicio,
                'fechafin' => $ffin,
                'horainicio' => $hinicio,
                'horafin' => $hfin,
                'horaregistro' => $hregistro,
                'lugar' => $lugar,
                'latitud' => $latitud,
                'longitud' => $longitud,
                'destacado' => $destacado,
                'estado' => 'Pendiente',
                'idusuario' => $moderador
            )
        );
        $this->evento_model->insertar_evento($datosnvoevento);
        $this->agregar_tema_expositor($nombreevento);             
    }
    
    function agregar_tema_expositor($nombreevento)
    {        
        $idevento = 22;//$this->evento_model->obtener_id_evento($nombreevento);         
        $datos['idevento'] = $idevento ;
        $datos['nombreevento'] = $nombreevento;        
        $datos['datosexpositor'] = $this->usuario_model->mostrar_expositores();
        $datos['tema_expo'] = $this->tema_model->mostrar_tema_expositor_evento($idevento);
        $this->load->view('/admin/organizador/agregartemaexpo_view', $datos);
    }    
    
    function mostrar_eventos_proximos()
    {       
       $datos['datosevento']  = $this->evento_model->mostrar_eventos_proximos();         
       $this->load->view('/admin/organizador/inicio', $datos);
    }
    
}

