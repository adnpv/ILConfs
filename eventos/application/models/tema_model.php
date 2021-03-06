<?php

class Tema_model extends CI_Model{
    
    function Tema_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
        
    function insertar_tema_expositor($datosnvotema)
    {
        $this->db->insert_batch('tema', $datosnvotema); 
    }    
    
    public function mostrar_tema($nombretema, $idevento)
    {
        $this->db->select('idevento, idtema, nombre, descripcion, idusuario, rondapreguntas, rondaconsultas');
        $this->db->from('tema');
        $this->db->where('nombre', $nombretema);
        $this->db->where('idevento', $idevento);
        $datosevento = $this->db->get();
        return $datosevento->result();
    }
    
    function mostrar_temas_evento($idevento)
    {
        $tema_expo = $this->db->query("select t.idtema as nro, t.nombre as nombre, t.descripcion as descripcion,
            concat(u.nombres, ' ',u.apepat, ' ', u.apemat) as expositor, t.rondaconsultas as rondaconsultas
            from tema t, expositor e, usuario u
            where t.idusuario = e.idusuario 
            and e.idusuario = u.idusuario 
            and idevento = '$idevento' order by t.idtema");
        return $tema_expo->result();   
    }
    
    function mostrar_tema_expositor_evento($idevento)
    {
        $tema_expo = $this->db->query("select t.idtema as nro, t.nombre as nombre, t.descripcion as descripcion,
            concat(u.nombres, ' ',u.apepat, ' ', u.apemat) as expositor
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
