<?php

class Participante_model extends CI_Model{
    
    function Participante_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    
    function cambiar_edo_participante($idusuario, $estado)
    {
        $datospartic =  array(
            'estado' => $estado            
            );  
        $this->db->where('idusuario', $idusuario);
        $this->db->update('participante', $datospartic);
    }
}