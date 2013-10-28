<?php

class Tema_model extends CI_Model{
    
    function Tema_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
        
    function insertar_tema_expositor($datosnvotema)
    {
        $this->db->insert_batch('tema', $datosnvotema); 
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
    
    function ver_estado_consultas($idtema)
    {
        /*$this->db->select('rondaconsultas')->from('tema')->where('idtema', $idtema);
        $edorondacons = $this->db->get();
        return $edorondacons;   */
        $sql = $this->db->query("select rondaconsultas from tema where idtema = " . $idtema);
        $edc = $sql->row(0);
        return $edc->rondaconsultas;               
    }
    
    function cerrar_ronda_consultas($idtema)
    {
        $datostema =  array(
            'rondaconsultas' => 0                 
        );  
        $this->db->where('idtema', $idtema);
        $this->db->update('tema', $datostema);
    }
    
    function abrir_ronda_consultas($idtema)
    {
        $datostema =  array(
            'rondaconsultas' => 1                 
        );  
        $this->db->where('idtema', $idtema);
        $this->db->update('tema', $datostema);
    }
}
