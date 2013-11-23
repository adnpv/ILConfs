<?php

class Evento_model extends CI_Model{
    
    function Evento_model() {
       parent::__construct(); //llamada al constructor de Model.
    }
    //put your code here    
    
    public function mostrar_eventos_moderador($idusuario)
    {
        $this->db->select("idevento, nombre, descripcion, fechainicio, horaregistro, horainicio, horafin, estado");
        $this->db->from('evento');
        //$this->db->where('estado', 'Activo');
        $this->db->where('idusuario', $idusuario);
        $datosevento = $this->db->get();
        return $datosevento->result();
    }
    
    public function mostrar_eventos_proximos($idusuario)
    {
        $this->db->select("idevento, nombre, descripcion, fechainicio, horaregistro, horainicio, horafin, estado");
        $this->db->from('evento');
        $this->db->where('estado', 'Activo');
        $this->db->where('idorganizador', $idusuario);
        $datosevento = $this->db->get();
        return $datosevento->result();
    }
    
    public function mostrar_eventos_pendientes($idusuario)
    {
        $this->db->select('idevento, nombre, descripcion, fechainicio, horaregistro, horainicio, horafin, estado');
        $this->db->from('evento');
        $this->db->where('estado', 'Pendiente');
        $this->db->where('idorganizador', $idusuario);
        $datosevento = $this->db->get();
        return $datosevento->result();
    }
    
    public function mostrar_evento($nombreevento)
    {
        $this->db->select('idevento, nombre, descripcion, fechainicio, fechafin, horainicio, horafin, horaregistro, lugar, latitud, longitud, destacado, estado, idusuario, nroentradas, entradasvendidas, preciounit, fechalimite');
        $this->db->from('evento');
        $this->db->where('nombre', $nombreevento);
        $datosevento = $this->db->get();
        return $datosevento->result();
    }
    
    public function mostrar_eventos_pasados($idusuario)
    {
        $this->db->select('idevento, nombre, fechainicio, horaregistro, horainicio, horafin, estado');
        $this->db->from('evento');
        $this->db->where('estado', 'Finalizado');
        $this->db->where('idorganizador', $idusuario);
        $datosevento = $this->db->get();
        return $datosevento->result();
    }
    
    function mostrar_temas_evento($idevento)
    {
        $temas_evto = $this->db->query("select t.idtema as nro, t.nombre as nombre, t.descripcion as descripcion,
            concat(u.nombres, ' ',u.apepat, ' ', u.apemat) as expositor
            from tema t, expositor e, usuario u
            where t.idusuario = e.idusuario 
            and e.idusuario = u.idusuario 
            and idevento = " . $idevento . " order by t.idtema");
        return $temas_evto->result();   
    }
    
    function mostrar_eventos_expositor($idusuario)
    {
        $temas_evto = $this->db->query("select distinct e.idevento, e.nombre, e.fechainicio, e.horaregistro, e.horainicio, e.horafin, e.estado
            from evento e, tema t
            where e.idevento = t.idevento
            and t.idusuario = $idusuario
            and e.estado = 'Activo';");
        return $temas_evto->result();   
    }
    
    function insertar_evento($datosnvoevento)
    {
        $this->db->insert_batch('evento', $datosnvoevento); 
    }
    
    function obtener_id_evento($nombreevento)
    {
        $sql = $this->db->query("select idevento from evento where nombre = '$nombreevento'");
        $idevento = $sql->row(0);
        return $idevento->idevento;    
    }
    
    function asignar_partic_evento($idparticipante, $idevento)
    {
        $datos = array(
            array(
                'idevento' => $idevento,
                'idusuario' => $idparticipante
            )
        );
        $this->db->insert_batch('entrada', $datos); 
    } 
    
    function cambiar_edo_evento($idevento, $accion)
    {
        $datosevto = array(                           
                'estado' => $accion
         );
        $this->db->where('idevento', $idevento);
        $this->db->update('evento', $datosevto); 
    }
    
    function actualizar_edo_partic_evento($idusuario)
    {
        $datosnvoestado = array(                           
                'estado' => 'Habilitado'
         );
        $this->db->where('idusuario', $idusuario);
        $this->db->update('participante', $datosnvoestado); 
    }
    
    function mostrar_participantes_evento($idevento)
    {
        $particip_evto = $this->db->query("select u.idusuario as idusuario, u.apepat as apepat, u.apemat as apemat, 
            u.nombres as nombres, p.estado as estado, a.asistencia as asistencia
            from usuario u, entrada a, participante p, evento e
            where e.idevento = a.idevento 
            and a.idusuario = p.idusuario
            and p.idusuario = u.idusuario
            and e.idevento = " . $idevento);
        return $particip_evto->result();
    }
    
    function mostrar_venta_entradas($idevento)
    {
        $datosventas = $this->db->query("select idevento, nroentradas, nroentradas-entradasvendidas as porvender, entradasvendidas,
            preciounit, entradasvendidas*preciounit as ganancia, 
            DATE_FORMAT(fechalimite,'%d/%m/%Y') as flimite
            from evento where idevento = '$idevento'");
        return $datosventas->result();
    }
    
    function contar_asistentes_evento($idevento)
    {
        $sql = $this->db->query("select u.idusuario as idusuario, u.apepat as apepat, u.apemat as apemat, 
            u.nombres as nombres, p.estado as estado, asistencia
            from usuario u, entrada a, participante p, evento e
            where e.idevento = a.idevento 
            and a.idusuario = p.idusuario
            and p.idusuario = u.idusuario
            and asistencia = 'Sí'
            and e.idevento = '$idevento'");
        $asist_evto = $sql->num_rows(); 
        return $asist_evto;  
    }
    
    function contar_inasistentes_evento($idevento)
    {
        $sql = $this->db->query("select u.idusuario as idusuario, u.apepat as apepat, u.apemat as apemat, 
            u.nombres as nombres, p.estado as estado, asistencia
            from usuario u, entrada a, participante p, evento e
            where e.idevento = a.idevento 
            and a.idusuario = p.idusuario
            and p.idusuario = u.idusuario
            and asistencia = 'No'
            and e.idevento = '$idevento'");
        $inasist_evto = $sql->num_rows(); 
        return $inasist_evto;
    }
}





    
    



