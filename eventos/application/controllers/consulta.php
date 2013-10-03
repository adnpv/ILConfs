<?php

class Consulta extends CI_Controller {
    
    function Consulta() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('consulta_model');
       $this->load->model('tema_model');
       $this->load->helper('url');
       $this->load->library('session');
    }
    
    function mostrar_consultas_tema()
    {       
        //$this->insertar_consulta();
        $idtema = $this->input->post('idtema');  
        $datos['idtema'] = $idtema; 
        $edorondacons = $this->tema_model->ver_estado_consultas($idtema);
        $datos['edorondacons'] = $edorondacons; 
        $total = $this->consulta_model->contar_consultas_tema($idtema); 
        $datos['total'] = $total;
        $respondidas = $this->consulta_model->obtener_cantidad_respondidas($idtema);             
        $datos['respondidas'] = $respondidas;  
        $datos['consultas_tema'] = $this->consulta_model->mostrar_consultas_tema($idtema);
        $this->load->view('/expositor/pregparticipantes_view', $datos);      
    }
    
    function actualizar_consulta()
    {        
        $idtema = $this->input->post('idtema');
        $datos['idtema'] = $idtema;
        $edorondacons = $this->tema_model->ver_estado_consultas($idtema);
        $datos['edorondacons'] = $edorondacons; 
        $respondidas = $this->consulta_model->obtener_cantidad_respondidas($idtema);        
        $total = $this->consulta_model->contar_consultas_tema($idtema);        
        $datos['respondidas'] =  $respondidas;          
        
        if ($respondidas < $total)        
        {                           
            $idconsulta = $this->input->post('idconsulta');            
            $this->consulta_model->responder_pregunta_en_evento($idconsulta);           
            $datos['consultas_tema'] = $this->consulta_model->mostrar_consultas_tema($idtema);           
        }
        else
        {   
            $datos['edorondacons'] = 'La ronda de consultas fue cerrada';             
        }  
        $datos['total'] = $total;
        $this->load->view('/expositor/pregparticipantes_view', $datos);
    }
    
    /*function actualizar_consulta()
    {        
        $idtema = $this->input->post('idtema');
        $datos['idtema'] = $idtema;
        $respondidas = $this->consulta_model->obtener_cantidad_respondidas($idtema);        
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
     * http://codular.com/curl-with-php  
    }*/
    
    function insertar_consultas()
    { 
        header("Content-Type: text/html; charset=UTF-8");//Se lee el json escrito por el front-end
        $ruta =  base_url() . 'jsondesdeelpublico/consultasdlpubl.json';
        $consultas = json_decode(@file_get_contents($ruta), true);  
        $datoscons = array(array('idusuario' => null, 'nombre' => null, 'estado' => null, 'respuesta' => null));
        for($i = 0; $i < count($consultas); $i++)
        {
            $datoscons[$i] = array(
                array (
                    'idusuario' => $consultas[$i]["idusuario"],
                    'nombre' => $consultas[$i]["nombre"],
                    'estado' => $consultas[$i]["estado"],
                    'respuesta' => null
                )
            );
        }        
        $this->consulta_model->insertar_consulta($consultas);
    }     
}