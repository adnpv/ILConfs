<?php

class Autenticacion extends CI_Controller {
    
    function Autenticacion() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('autenticacion_model');
       $this->load->model('evento_model');
       $this->load->helper('url');
       //$this->load->library('session');
    }
    
    public function index()            
    {
        $this->load->view('/admin/login_view', $datos);
    }
    
    public function expositor()            
    {
        //$datos['url'] = 'http://localhost/eventos';
        $datos['datosevento']  = $this->evento_model->mostrar_eventos_proximos();        
        $this->load->view('/expositor/eventos_view', $datos);
    }

    function autenticar() {
        
     $usuario =  $this->input->post('usuario');
     $contrasena = $this->input->post('contrasena');     
     $contrasenasha1 = sha1($contrasena);
     //echo $usuario . $contrasena;
     $datosus = array();
     $datosus = $this->autenticacion_model->autenticar_usuario($usuario, $contrasenasha1);  
     
     if ($datosus <> null)
     {
         /*if($datosus['rol'] == "moderador")
         {
            $data['titulo'] = "Moderador"; 
            $data['datosus'] = $datosus;
            $this->load->view('mantenimiento_view', $data);
         }
         elseif ($datosus['rol'] == "organizador") 
         {
            $data['titulo'] = "Moderador"; 
            $data['datosus'] = $datosus;
            $this->load->view('mantenimiento_view', $data);
         }  
            var_dump($datosus);
            var_dump($datosus["3"]); */ 
         $datos['url'] = 'http://localhost/eventos';
         $datos['datosevento']  = $this->evento_model->mostrar_eventos_proximos();         
         $this->load->view('/admin/organizador/inicio', $datos);
     }
     else
     {
         echo "nombre de usuario y/o contraseña incorrectos.";
     }
  }
}

