<?php

class Usuario extends CI_Controller {
    
    function Usuario() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('autenticacion_model');
       $this->load->model('evento_model');
    }
    
    public function index()
    {
        $this->load->view('/admin/login_view');
    }
    
    public function insertar_usuario()
    {
        
    }
}

