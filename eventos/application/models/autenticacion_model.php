<?php

class Autenticacion_model extends CI_Model{
    
    function Autenticacion_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    //put your code here
    public function autenticar_usuario($usuario, $contrasenasha1)
    {
        $this->db->select('usuario, nombres, rol');
        $this->db->from('usuario');
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasena', $contrasenasha1);
        $datosus = $this->db->get();
        return $datosus->result();
    }  
}




    
    



