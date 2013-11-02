<?php

class Encuesta_model extends CI_Model{
    
    function Encuesta_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    
    function obtener_encuesta($idevento)
    {
        $this->db->select('idencuesta, nombre');
        $this->db->from('encuesta');
        $this->db->where('idevento', $idevento);
        $datosencuesta = $this->db->get();
        return $datosencuesta->result();
    }
    
    function actualizar_edo_encuesta($idencuesta)
    {
        $datosnvoestado = array(                           
                'estado' => 'Respondida'
         );
        $this->db->where('idusuario', $idusuario);
        $this->db->update('participante', $datosnvoestado); 
    }
}