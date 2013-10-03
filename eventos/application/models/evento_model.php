<?php

class Evento_model extends CI_Model{
    
    function Evento_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    //put your code here    
    
    public function mostrar_eventos_proximos()
    {
        $this->db->select('idevento, nombre, fechainicio, horaregistro, horainicio, horafin, estado');
        $this->db->from('evento');
        $datosevento = $this->db->get();
        return $datosevento->result();
    }
    
    function insertar_evento($datosnvoevento)
    {
        $this->db->insert_batch('evento', $datosnvoevento); 
    }
    
    function obtener_id_evento($nombreevento)
    {
        $sql = "select idevento from evento where nombre = " . $nombreevento . " limit 1";
        $idevto = $sql->row(0);
        $idevento = $idevto->idevento;
        return $idevento;
        /*$this->db->select('idevento');
        $this->db->from('evento');
        $this->db->where('nombre', $nombre);
        $idevto = $this->db->get();    */          
    }
}





    
    



