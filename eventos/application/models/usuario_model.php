<?php

class Usuario_model extends CI_Model{
    
    function Usuario_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    //put your code here      
   
    public function mostrar_moderadores($idorganizador)
    {       
        $datosmoderador = $this->db->query("select u.idusuario, u.apepat, u.apemat, u.nombres
            from usuario u, moderador m
            where u.idusuario = m.idusuario
            and m.idorganizador = '" . $idorganizador . "' order by 2");
        return $datosmoderador->result();
    }
    
    function obtener_idusuario_uc($usuario, $contrasenasha1)
    {
        $sql = $this->db->query("select idusuario from usuario where usuario = '" . $usuario . 
            "' and contrasena = '" . $contrasenasha1 ."'");
        $idusuario = $sql->row(0);  
        return $idusuario->idusuario; 
    }
    
    function insertar_organizador_uc($usuario, $contrasenasha1)
    {
        $idusuario = $this->obtener_idusuario_uc($usuario, $contrasenasha1);
        $this->db->set('idusuario', $idusuario); 
        $this->db->insert('organizador');        
    }
    
    public function mostrar_expositores($idorganizador)
    {       
        $datosmoderador = $this->db->query("select u.idusuario, u.apepat, u.apemat, u.nombres
            from usuario u, expositor e
            where u.idusuario = e.idusuario
            and e.idorganizador = '" . $idorganizador . "' order by 2");
        return $datosmoderador->result();
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
    
    public function cambiar_organizador($usuario, $contrasena)
    {
        $this->db->set('rol', 'organizador');
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasena', $contrasena);
        $this->db->update('usuario');
    }
    
    function insertar_participante($datospartic)
    {
        $this->db->insert_batch('participante', $datospartic); 
    }
    
    function insertar_moderador($idusuario, $idorganizador)
    {
        $this->db->set('idorganizador',$idorganizador);
        $this->db->set('idusuario', $idusuario); 
        $this->db->insert('moderador'); 
    }
    
    function insertar_organizador($idusuario)
    {
        $this->db->set('idusuario', $idusuario); 
        $this->db->insert('organizador'); 
    }
    
    function insertar_expositor($idusuario, $descripcion, $idorganizador)
    {
        $this->db->set('idorganizador',$idorganizador);
        $this->db->set('idusuario', $idusuario); 
        $this->db->set('descripcion', $descripcion); 
        $this->db->insert('expositor'); 
    }
    
    function insertar_administrador($idusuario)
    {
        $this->db->set('idusuario', $idusuario); 
        $this->db->insert('administrador'); 
    }
    
    
}





    
    



