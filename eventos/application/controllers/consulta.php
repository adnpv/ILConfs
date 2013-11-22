<?php

class Consulta extends CI_Controller {
    
    function Consulta() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('consulta_model');
       $this->load->model('tema_model');
       $this->load->helper('url');
       $this->load->library('session');
    }
    
    public function mostrar_consultas_tema()
    {     
        //$this->insertar_consultas();
        $idtema = $this->input->post('idtema');  
        $idevento = $this->input->post('idevento'); 
        $nombreevento = $this->input->post('nombreevento'); 
        $datos['nombreevento'] = $nombreevento;
        $datos['idtema'] = $idtema;        
        $datos['idevento'] = $idevento;     
        $nrocons = $this->consulta_model->contar_consultas_tema($idtema);
        $datos['nrocons'] = $nrocons;
        $datos['edorondacons'] = $this->tema_model->ver_estado_consultas($idtema);
        $datos['total'] = $this->consulta_model->contar_consultas_tema($idtema);          
        $datos['respondidas'] = $this->consulta_model->obtener_cantidad_respondidas($idtema);                     
        $datos['consultas_tema'] = $this->consulta_model->mostrar_consultas_tema($idtema);
        $this->load->view('/expositor/pregparticipantes_view', $datos);      
    }  
    
    public function mostrar_consultas_partic()
    {     
        $idevento = $this->input->get('idevento'); 
        $nombreevento = $this->input->get('nombreevento'); 
        $idusuario = $this->input->get('idusuario'); 
        $datos['nombreevento'] = $nombreevento; 
        $datos['idevento'] = $idevento;                    
        $datos['idusuario'] = $idusuario;         
        $datos['consultas_partic'] = $this->consulta_model->mostrar_consultas_participante($idevento, $idusuario);
        $this->load->view('/moderador/consultas_view', $datos);      
    } 
    
    public function listar_consultas_partic()
    {     
        $idevento = $this->input->get('idevento'); 
        $nombreevento = $this->input->get('nombreevento'); 
        $idusuario = $this->input->get('idusuario'); 
        $datos['nombreevento'] = $nombreevento; 
        $datos['idevento'] = $idevento;                    
        $datos['idusuario'] = $idusuario;         
        $datos['consultas_partic'] = $this->consulta_model->mostrar_consultas_participante($idevento, $idusuario);
        $this->load->view('/organizador/consultas_view', $datos);      
    } 
    
    public function mostrar_consultas_detema()
    {     
        //$this->insertar_consultas();
        $idtema = $this->input->get('idtema');  
        $idevento = $this->input->get('idevento');  
        $datos['nombreevento'] = $this->input->get('nombreevento'); 
        $datos['idtema'] = $idtema;     
        $datos['idevento'] = $idevento; 
        $nrocons = $this->consulta_model->contar_consultas_tema($idtema);
        $datos['nrocons'] = $nrocons;
        $datos['edorondacons'] = $this->tema_model->ver_estado_consultas($idtema);
        $datos['total'] = $this->consulta_model->contar_consultas_tema($idtema);          
        $datos['respondidas'] = $this->consulta_model->obtener_cantidad_respondidas($idtema);                     
        $datos['consultas_tema'] = $this->consulta_model->mostrar_consultas_tema($idtema);
        $this->load->view('/expositor/pregparticipantes_view', $datos);      
    }    
    
    public function validar_consulta()
    {  
        $idusuario = $this->input->post('idusuario');
        $idevento = $this->input->post('idevento');  
        $nombreevento = $this->input->post('nombreevento'); 
        $accion = $this->input->post('accion');
        $idconsulta = $this->input->post('idconsulta');
        $datos['idevento'] = $idevento; 
        $datos['nombreevento'] = $nombreevento;        
        $datos['accion'] = $accion; 
        $datos['idconsulta'] = $idconsulta;         
        $this->consulta_model->actualizar_estado_consulta($idconsulta, $accion);
        redirect(base_url() . 'index.php/consulta/mostrar_consultas_partic/?idevento=' .
                $idevento . '&nombreevento=' . $nombreevento . '&idconsulta=' . $idconsulta .
                '&idusuario=' . $idusuario);
     }
    
    public function actualizar_consulta()
    {  
        $idtema = $this->input->post('idtema'); 
        $idevento = $this->input->post('idevento');  
        $nombreevento = $this->input->post('nombreevento'); 
        $datos['nombreevento'] = $nombreevento;
        $datos['idtema'] = $idtema;
        $datos['idevento'] = $idevento; 
        $datos['edorondacons'] = $this->tema_model->ver_estado_consultas($idtema);
        $respondidas = $this->consulta_model->obtener_cantidad_respondidas($idtema);   
        $datos['respondidas'] = $respondidas;
        $total = $this->consulta_model->contar_consultas_tema($idtema);        
      
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
    
    public function insertar_consultas()
    {        
        $consultaspubl = @file_get_contents('http://pietreal.herokuapp.com/interactiv/jsonquestion/?id=1');
        $consultas = json_decode(($consultaspubl), true);
        $datoscons = array();//('idusuario' => null, 'nombre' => null, 'estado' => null, 'respuesta' => null);
        for($i = 0; $i < count($consultas); $i++)
        {
             $datoscons[$i] =                
                array (
                    'idusuario' => intval($consultas[$i]['usuarioid']),
                    'nombre' => $consultas[$i]["nombre"] . '. ' . $consultas[$i]["detalle"],
                    'estado' => 'Recibida',
                    'respuesta' => ''
                );                     
         }            
         $this->consulta_model->insertar_consulta($datoscons);
    } 
    
    public function contar_consultas_tema($idtema)
    {
        $nrocons = $this->consulta_model->contar_consultas_tema($idtema);
        echo $nrocons;
    }
}
/*cada vez que el moerador habilite la ronda de consultas, se debe enviar un aviso 
 * a adrian por curl
 */