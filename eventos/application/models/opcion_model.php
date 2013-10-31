<?php

class Opcion_model extends CI_Model{
    
    function Opcion_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    
    function obtener_opciones_encuesta($idencuesta)
    {
        $opciones = $this->db->query("select o.nombre, o.nromarcaciones
            from encuesta e, opcion o
            where e.idencuesta = o.idencuesta and e.idencuesta = '$idencuesta'");
        return $opciones->result();
    }
}