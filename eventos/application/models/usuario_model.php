<?php

class Usuario_model extends CI_Model{
    
    function Usuario_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    //put your code here    
    
    public function mostrar_moderadores()
    {       
        $this->db->select('idusuario, apepat, apemat, nombres');
        $this->db->from('usuario');
        $this->db->where('rol', 'moderador');
        $this->db->order_by('apepat', 'asc'); 
        $datosmoderador = $this->db->get();
        return $datosmoderador->result();
    }
    
    public function mostrar_expositores()
    {       
        $this->db->select('idusuario, apepat, apemat, nombres');
        $this->db->from('usuario');
        $this->db->where('rol', 'expositor');
        $this->db->order_by('apepat', 'asc'); 
        $datosexpositor = $this->db->get();
        return $datosexpositor->result();
    }
    
    public function mostrar_organizadores()
    {       
        $this->db->select('idusuario, apepat, apemat, nombres');
        $this->db->from('usuario');
        $this->db->where('rol', 'organizador');
        $this->db->order_by('apepat', 'asc'); 
        $datosorganizador = $this->db->get();
        return $datosorganizador->result();
    }
    
    function mostrar_usuarios_noasig()
    {
        $usuariosnoasig = $this->db->query("select p.idusuario as idusuario, u.apepat as apepat, u.apemat as apemat, u.nombres as nombres
            from participante p, usuario u where p.idusuario = u.idusuario
            and p.estado = 'No asociado'");
        return $usuariosnoasig->result();
    }
    
    function obtener_datos_usuario($idusuario)
    {
        $usuarionvo = $this->db->query("select p.idusuario as idusuario, u.apepat as apepat, u.apemat as apemat, u.nombres as nombres
            from participante p, usuario u where p.idusuario = u.idusuario and p.idusuario = " . $idusuario);
        return $usuarionvo->result();
    }
    
    function insertar_usuario($datosusuario)
    {
        $this->db->insert_batch('usuario', $datosusuario); 
    }
    
    function obtener_idusuario($dni)
    {
        $sql = $this->db->query("select idusuario from usuario where dni =  " . $dni);
        $idus = $sql->row(0);
        return $idus->idusuario; 
    }
    
    function insertar_participante($datospartic)
    {
        $this->db->insert_batch('participante', $datospartic); 
    }
    
    function insertar_moderador($idusuario)
    {
        $this->db->set('idusuario', $idusuario); 
        $this->db->insert('moderador'); 
    }
    
    function insertar_organizador($idusuario)
    {
        $this->db->set('idusuario', $idusuario); 
        $this->db->insert('organizador'); 
    }
    
    function insertar_expositor($idusuario)
    {
        $this->db->set('idusuario', $idusuario); 
        $this->db->insert('expositor'); 
    }
    
    function insertar_administrador($idusuario)
    {
        $this->db->set('idusuario', $idusuario); 
        $this->db->insert('administrador'); 
    }
    
    
}





    
    



