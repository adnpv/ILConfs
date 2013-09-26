<?php

class Consulta_model extends CI_Model{
    
    function Consulta_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    
    function mostrar_consultas_tema($idevento)
    {
        $consulta = $this->db->query("select c.idconsulta, concat(u.nombres, ' ', u.apepat)as autor, c.nombre as consulta, c.estado
            from consulta c, participante p, usuario u, participante_evento a, 
            evento e, tema t where c.idusuario = p.idusuario and p.idusuario = a.idusuario
            and a.idusuario = u.idusuario and a.idevento = e.idevento and e.idevento = t.idevento
            and t.idtema = '$idevento' and c.estado = 'No respondida' order by rand() limit 1");
        return $consulta->result();
    }
    
    function responder_pregunta_en_evento($idconsulta)
    {
        $datoscons =  array(
            'estado' => 'Respondida'                 
        );  
        $this->db->where('idconsulta', $idconsulta);
        $this->db->update('consulta', $datoscons);
    }
    
    function obtener_cantidad_respondidas()
    {
        $sql = $this->db->query("select idconsulta from consulta where estado = 'Respondida'");
        $respondidas = $sql->num_rows(); 
        return $respondidas;        
    }
    
    
}
    //put your code here

