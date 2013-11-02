<?php

class Autenticacion_model extends CI_Model{
    
    function Autenticacion_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    //put your code here
    function autenticar_usuario($usuario, $contrasenasha1)
    {
        $this->db->select('idusuario, usuario, nombres, apepat, apemat, rol');
        $this->db->from('usuario');
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasena', $contrasenasha1);
        $datosus = $this->db->get();
        return $datosus->result();
    }  
    
    function obtener_rol($usuario, $contrasenasha1)
    {
        $sql = $this->db->query("select rol from usuario where usuario = '$usuario' 
            and contrasena = '$contrasenasha1'");
        $rol = $sql->row(0);
        return $rol->rol;           
    }
    
    function obtener_datos_participante($usuario, $contrasenasha1)
    {
        $datospartic= $this->db->query("select u.idusuario, u.nombres, u.apepat, u.apemat, a.idevento, p.estado
        from usuario u, participante p, participante_evento a
        where u.idusuario = p.idusuario and p.idusuario = a.idusuario and p.estado = 'Habilitado'
        and u.usuario = '$usuario' and u.contrasena = '$contrasenasha1'");
        return $datospartic->result();
    }
    
    
    
    
    
}




    
    



