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
}





    
    



