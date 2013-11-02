<?php

class Pregunta_model extends CI_Model{
    
    function Pregunta_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    
    function listar_pregunta($idpregunta)
    {
        $this->db->select('idpregunta, nombre');
        $this->db->from('pregunta');
        $this->db->where('idpregunta', $idpregunta);        
        $datospreg = $this->db->get();
        return $datospreg->result();
    }
    
    function actualizar_pregunta($idpregunta, $nombrepregunta)
    {
        $datospreg =  array(
            'nombre' => $nombrepregunta            
        );  
        $this->db->where('idpregunta', $idpregunta);
        $this->db->update('pregunta', $datospreg);
    }
    
    function validar_pregunta($idpregunta, $accion)
    {
        $datospreg =  array(
            'estado' => $accion,
        );  
        $this->db->where('idpregunta', $idpregunta);
        $this->db->update('pregunta', $datospreg);
    }
    
    function mostrar_preguntas_tema($idtema)
    {
        $this->db->select('idpregunta, nombre, estado, activa');
        $this->db->from('pregunta');
        $this->db->where('idtema', $idtema);
        $this->db->where('activa', 0);
        $this->db->where('estado', 'No respondida');
        $datospregtema = $this->db->get();
        return $datospregtema->result();
    }
    
    function mostrar_preguntas_tema_moderador($idtema)
    {
        $this->db->select('idpregunta, nombre, estado, activa');
        $this->db->from('pregunta');
        $this->db->where('idtema', $idtema);        
        $datospregtema = $this->db->get();
        return $datospregtema->result();
    }
    
    function mostrar_preguntas_tema_estad($idtema)
    {
        $this->db->select('idpregunta, nombre');
        $this->db->from('pregunta');
        $this->db->where('idtema', $idtema);
        $datospregtema = $this->db->get();
        return $datospregtema->result();
    }
    
    function activar_pregunta($idpregunta)
    {
        $datospreg =  array(
            'activa' => 1               
        );  
        $this->db->where('idpregunta', $idpregunta);
        $this->db->update('pregunta', $datospreg);
    }
    
    function desactivar_preguntas()
    {
        $datospreg =  array(
            'activa' => 0
        ); 
        $this->db->update('pregunta', $datospreg);
    }
    
    function obtener_cantidad_inactivas()
    {
        $sql = $this->db->query("select idpregunta from pregunta where activa = 0");
        $inactivas = $sql->num_rows(); 
        return $inactivas;        
    }
    
    function mostrar_preguntas_alpublico($idpregunta)
    {
        $this->db->select('idpregunta, nombre');
        $this->db->from('pregunta');
        $this->db->where('idpregunta', $idpregunta);       
        $this->db->where('estado', $idpregunta);  
        $datospregtema = $this->db->get();
        return $datospregtema->result();       
    }
    
    function mostrar_altrns_alpublico($idpregunta)
    {
        $alternts = $this->db->query("SELECT a.idalternativa, a.nombre
        from pregunta p, alternativa a
        where p.idpregunta = a.idpregunta
        and p.idpregunta = '$idpregunta'");
        return $alternts->result();
    }  
    
    function constestar_alternativa($idalternativa, $marcaciones)
    {
        $this->db->set('nromarcaciones', "nromarcaciones+'$marcaciones'", FALSE);
        $this->db->where('idalternativa', $idalternativa);
        $this->db->update('alternativa');
    }
}