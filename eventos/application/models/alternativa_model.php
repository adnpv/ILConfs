<?php

class Alternativa_model extends CI_Model{
    
    function Alternativa_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    
    function actualizar_alternativas($idalternativa, $nombrealternativa)
    {
        $datosalternt = array(
            'nombre' => $nombrealternativa
        );
        $this->db->where('idalternativa', $idalternativa);
        $this->db->update('alternativa', $datosalternt);        
    }
    
    function insertar_alternativa($datosalternt)
    {
        $this->db->insert_batch('alternativa', $datosalternt); 
    }
    
    function obtener_resultado($idpregunta)
    {
        $this->db->select('idalternativa, nombre, nromarcaciones');
        $this->db->from('alternativa');
        $this->db->where('idpregunta', $idpregunta);
        $datosevento = $this->db->get();
        return $datosevento->result();
    }
    
    function listar_alternativas($idpregunta)
    {
        $this->db->select('idalternativa, nombre');
        $this->db->from('alternativa');
        $this->db->where('idpregunta', $idpregunta);
        $alernts = $this->db->get();
        return $alernts->result();
    }
    
    function constestar_alternativa($idalternativa, $marcaciones)
    {
        $this->db->set('nromarcaciones', "nromarcaciones+'$marcaciones'", FALSE);
        $this->db->where('idalternativa', $idalternativa);
        $this->db->update('alternativa');
    }
}