<?php

class Alternativa_model extends CI_Model{
    
    function Alternativa_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    
    function obtener_resultado($idpregunta)
    {
        $this->db->select('idalternativa, nombre, nromarcaciones');
        $this->db->from('alternativa');
        $this->db->where('idpregunta', $idpregunta);
        $datosevento = $this->db->get();
        return $datosevento->result();
    }
    function constestar_alternativa($idalternativa, $marcaciones)
    {
        $this->db->set('nromarcaciones', "nromarcaciones+'$marcaciones'", FALSE);
        $this->db->where('idalternativa', $idalternativa);
        $this->db->update('alternativa');
    }
}