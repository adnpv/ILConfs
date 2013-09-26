<?php

class Tema_model extends CI_Model{
    
    function Tema_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
        
    function insertar_tema_expositor()
    {
        
    }
    
    function mostrar_tema_expositor_evento($idevento)
    {
        $tema_expo = $this->db->query("select t.idtema as nro, t.nombre as nombre, t.horainicio as hinicio,
            t.horafin as hfin, concat(u.nombres, ' ',u.apepat, ' ', u.apemat) as expositor
            from tema t, expositor e, usuario u
            where t.idusuario = e.idusuario 
            and e.idusuario = u.idusuario 
            and idevento = ". $idevento ." order by t.idtema");
        return $tema_expo->result();   
    }
}
