<?php

class Consulta_model extends CI_Model{
    
    function Consulta_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    
    function mostrar_consultas_tema($idevento)
    {
        $consulta = $this->db->query("select c.idconsulta, concat(u.nombres, ' ', u.apepat) as autor, c.nombre as consulta, c.estado
            from consulta c, participante p, usuario u, participante_evento a, 
            evento e, tema t where c.idusuario = p.idusuario and p.idusuario = a.idusuario
            and a.idusuario = u.idusuario and a.idevento = e.idevento and e.idevento = t.idevento
            and t.idevento = '$idevento' and c.estado = 'No respondida' order by rand() limit 1");
        return $consulta->result();
    }    
    
    function responder_pregunta_en_evento($idconsulta)
    {
        $datoscons =  array(
            'estado' => 'Respondida en evento'                 
        );  
        $this->db->where('idconsulta', $idconsulta);
        $this->db->update('consulta', $datoscons);
    }   
    
    function obtener_cantidad_respondidas($idtema)
    {
        $sql = $this->db->query("select c.idconsulta 
            from consulta c, participante p, participante_evento a, evento e, tema t
            where c.idusuario = p.idusuario and p.idusuario = a.idusuario 
            and a.idevento = e.idevento and e.idevento = t.idevento and t.idtema = '$idtema'
            and c.estado = 'Respondida en evento' 
            order by 1 asc");
        $respondidas = $sql->num_rows(); 
        return $respondidas;        
    }
    
    function contar_consultas_tema($idtema)
    {
        $sql = $this->db->query("select c.idconsulta
            from consulta c, participante p, participante_evento a, evento e, tema t
            where c.idusuario = p.idusuario and p.idusuario = a.idusuario 
            and a.idevento = e.idevento and e.idevento = t.idevento and t.idtema = '$idtema'");
        $total = $sql->num_rows(); 
        return $total;   
    }
    
     function insertar_consulta($consultas)    
     {
         //var_dump($consultas);
         $this->db->insert_batch('consulta', $consultas); 
     }   
}
    //put your code here

