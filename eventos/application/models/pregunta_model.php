<?php

class Pregunta_model extends CI_Model{
    
    function Pregunta_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    
    function mostrar_preguntas_tema($idtema)
    {
        $this->db->select('idpregunta, nombre, estado, activa');
        $this->db->from('pregunta');
        $this->db->where('idtema', $idtema);
        $this->db->where('activa', 0);
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
    
    function mostrar_preguntas_alpublico($idpregunta)
    {
        $this->db->select('idpregunta, nombre, activa');
        $this->db->from('pregunta');
        $this->db->where('idpregunta', $idpregunta);        
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
}