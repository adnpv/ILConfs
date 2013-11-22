<?php
ini_set('date.timezone', 'America/Lima');
class Evento extends CI_Controller {
    
    function Evento() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('usuario_model');
       $this->load->model('evento_model');
       $this->load->model('tema_model');
       $this->load->helper('url');
       $this->load->helper('form');
       $this->personalizar_msj_error();
       $this->load->library('session');
    }
    
    public function index()
    {   
        $idorganizador = $this->session->userdata('idusuario');
        $datos['datosmoderador'] = $this->usuario_model->mostrar_moderadores($idorganizador);
        $this->load->view('/organizador/crearevento_view', $datos);
    }
    
    function asignar_moderador()//organizador
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idevento = $this->input->get('idevento');
            $nombreevento = $this->input->get('nombreevento');
            $idorganizador = $this->session->userdata('idusuario');
            $datos['datosmoderador'] = $this->usuario_model->mostrar_moderadores($idorganizador);
            $datos['idevento'] = $idevento ;
            $datos['nombreevento'] = $nombreevento;        
            $this->load->view('organizador/asignarmoderador_view', $datos);
        }
    }
    
    function asignar_mod()//organizador
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idevento = $this->input->get('idevento');
            $nombreevento = $this->input->get('nombreevento');  
            $idmoderador = $this->input->get('idmoderador');
            $datos['idevento'] = $idevento ;
            $datos['nombreevento'] = $nombreevento;        
            $idusuario = $this->session->userdata('idusuario');
            $datos['tipoevento'] = 'próximos';
            $datos['datosevento'] = $this->evento_model->mostrar_eventos_proximos($idusuario);         
            redirect (base_url() . 'index.php/evento/mostrar_eventos_proximos');
        }       
     }    
    
    public function activar_encuesta()//moderador
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'moderador' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idevento = $this->input->post('idevento');
            $datosevto = array(

                    'eventoid' => $idevento,
                    'activar' => 1
                    );

            $jsondatosevto = json_encode($datosevto);
            $this->output->set_output($jsondatosevto);
            redirect ( base_url() . 'index.php/evento/mostrar_eventos');
        }
    }
    
    public function activar_evento()//moderador
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'moderador' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idevento = $this->input->post('idevento');
            $accion = $this->input->post('accion');
            $this->evento_model->cambiar_edo_evento($idevento, $accion);
            redirect ( base_url() . 'index.php/evento/mostrar_eventos');
        }
    }
    
    public function desactivar_evento()//moderador
    {
        if ( !$this->validar_sesion()  | $this->session->userdata('rol') <> 'moderador'  )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idevento = $this->input->post('idevento');
            $accion = $this->input->post('accion');
            $this->evento_model->cambiar_edo_evento($idevento, $accion);
            redirect ( base_url() . 'index.php/evento/mostrar_eventos');
        }
    }
    
    public function insertar_evento()//organizador
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $finicio = $this->input->post("finicio");
            $ffin = $this->input->post("ffin");
            $hregistro = $this->input->post("hregistro");
            $hinicio = $this->input->post("hinicio");
            $hfin = $this->input->post("hfin");

            $this->load->library('form_validation');
            $this->form_validation->set_rules('nombre','nombre','required|xss_clean');
            $this->form_validation->set_rules('lugar','lugar','required|xss_clean');
            $this->form_validation->set_rules('finicio','finicio','required|xss_clean|callback_validar_finicio');
            $this->form_validation->set_rules('ffin','ffin','required|xss_clean|callback_validar_ffin');
            $this->form_validation->set_rules('hinicio','hinicio','required|xss_clean');
            $this->form_validation->set_rules('hfin','hfin','trim|required|xss_clean');
            $this->form_validation->set_rules('hregistro','hregistro','required|xss_clean');
            $this->form_validation->set_rules('destacado','destacado','required|xss_clean|numeric|exact_length[1]');
            $this->form_validation->set_rules('latitud','latitud','required|xss_clean|numeric|decimal');
            $this->form_validation->set_rules('longitud','longitud','required|xss_clean|numeric|decimal');
            $this->form_validation->set_rules('moderador','moderador','required|xss_clean|integer|greater_than[1]');
            $this->form_validation->set_rules('nroentradas','nroentradas','required|xss_clean|integer|greater_than[1]');
            $this->form_validation->set_rules('flimite','flimite','trim|required|xss_clean|callback_validar_flimite');
            $this->form_validation->set_rules('preciounit','preciounit','required|xss_clean|decimal');

            if ($this->form_validation->run() == TRUE || $this->validar_finicio_ffin($finicio, $ffin) == TRUE)
            {
                $nombreevento = $this->input->post("nombre");
                $lugar = $this->input->post("lugar");                       
                $destacado = $this->input->post("destacado");
                $latitud = $this->input->post("latitud");
                $longitud = $this->input->post("longitud");
                $moderador = $this->input->post("moderador");       
                $finicio = $this->input->post("finicio");
                $nroentradas = $this->input->post("nroentradas");
                $preciounit = $this->input->post("preciounit");
                $flimite = $this->input->post("fechalimite");        
                $datosnvoevento = array(
                    array(
                        'nombre' => $nombreevento,
                        'fechainicio' => $finicio,
                        'fechafin' => $ffin,
                        'horainicio' => $hinicio,
                        'horafin' => $hfin,
                        'horaregistro' => $hregistro,
                        'lugar' => $lugar,
                        'latitud' => $latitud,
                        'longitud' => $longitud,
                        'destacado' => $destacado,
                        'estado' => 'Pendiente',
                        'idusuario' => $moderador,
                        'nroentradas' => $nroentradas,
                        'entradasvendidas' => 0,
                        'preciounit' => $preciounit,
                        'fechalimite' => $flimite
                    )
                );
                $this->evento_model->insertar_evento($datosnvoevento);   
                $this->enviar_nuevo_evento($nombreevento);         
                redirect( base_url() . 'index.php/evento/agregar_tema_expositor/?nombreevento='.$nombreevento);            
            }
            else
            {             
                $datos['datosmoderador'] = $this->usuario_model->mostrar_moderadores();
                $this->load->view('/organizador/crearevento_view', $datos);
            }
        }
    }
    
    public function agregar_tema_expositor()//organizador
    {   
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador'  )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $nombreevento = $this->input->get('nombreevento');
            $idevento = $this->evento_model->obtener_id_evento($nombreevento);         
            $datos['idevento'] = $idevento ;
            $datos['nombreevento'] = $nombreevento;        
            $datos['datosexpositor'] = $this->usuario_model->mostrar_expositores();
            $datos['tema_expo'] = $this->tema_model->mostrar_tema_expositor_evento($idevento);
            $this->load->view('/organizador/agregartemaexpo_view', $datos);
        }
    }    
    
    public function mostrar_temas_evento()//organizador    
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador'  )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idevento = $this->input->post('idevento');
            $nombreevento = $this->input->post('nombreevento');
            $tipoevento = $this->input->post('tipoevento');     
            $datos['idevento'] = $idevento;
            $datos['tipoevento'] = $tipoevento;
            $datos['nombreevento'] = $nombreevento;        
            $datos['temas_evto'] = $this->evento_model->mostrar_temas_evento($idevento);
            $this->load->view('/organizador/temas_view', $datos);
        }
    }
    
    public function mostrar_eventos()//moderador
    {   
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'moderador' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {            
            $datos['tipoevento'] = 'próximos';
            /*$datoseventosprox = $this->evento_model->mostrar_eventos_proximos();   
            $datoseventospend = $this->evento_model->mostrar_eventos_pendientes();  
            $datos['datosevento'] = array_merge($datoseventosprox, $datoseventospend);*/
            $idusuario = $this->session->userdata('idusuario');
            $datos['datosevento'] = $this->evento_model->mostrar_eventos_moderador($idusuario);
            $this->load->view('/moderador/eventosproximos_view', $datos);
            //echo 'wpirfpire rol ' . $this->session->userdata('rol');
        }
    }
    
    public function mostrar_eventos_expositor()//expositor
    {       
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'expositor'  )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            //$datos['tipoevento'] = 'próximos';
            $idusuario = $this->session->userdata('idusuario');
            $datos['datosevento'] = $this->evento_model->mostrar_eventos_expositor($idusuario);//mostrar_eventos_proximos();         
            $this->load->view('/expositor/eventos_view', $datos);
        }
    }
    
    public function mostrar_eventos_proximos()//organizador
    {       
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idusuario = $this->session->userdata('idusuario');
            $datos['tipoevento'] = 'próximos';
            $datos['datosevento'] = $this->evento_model->mostrar_eventos_proximos($idusuario);         
            $this->load->view('/organizador/eventosproximos_view', $datos);
        }
    }
    
    public function mostrar_eventos_pasados()//organizador
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador'  )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idusuario = $this->session->userdata('idusuario');
            $datos['tipoevento'] = 'pasados';
            $datos['datosevento'] = $this->evento_model->mostrar_eventos_pasados($idusuario);         
            $this->load->view('/organizador/eventospasados_view', $datos);
        }
    }
    
    public function mostrar_eventos_pendientes()//organizador
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador'  )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idusuario = $this->session->userdata('idusuario');
            $datos['tipoevento'] = 'pendientes';
            $datos['datosevento'] = $this->evento_model->mostrar_eventos_pendientes($idusuario);         
            $this->load->view('/organizador/eventospendientes_view', $datos);
        }
    }
    
    public function mostrar_participantes_evento()
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador'  )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idevento = $this->input->post('idevento');
            $nombreevento = $this->input->post('nombreevento');       
            $edoevento = $this->input->post('edoevento');
            $particdeevto = $this->evento_model->mostrar_participantes_evento($idevento);
            $asistentes = $this->evento_model->contar_asistentes_evento($idevento);
            $inasistentes = $this->evento_model->contar_inasistentes_evento($idevento);
            $datos['idevento'] = $idevento;
            $datos['nombreevento'] = $nombreevento;
            $datos['particdeevto'] = $particdeevto;
            $datos['edoevento'] = $edoevento;
            $datos['asistentes'] = $asistentes;
            $datos['inasistentes'] = $inasistentes;
            $this->load->view('/organizador/reporteregistrados_view', $datos);       
        }
    }   
    public function listar_participantes_evento()
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'moderador'  )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idevento = $this->input->get('idevento');
            $nombreevento = $this->input->get('nombreevento');     
            $edoevento = $this->input->get('edoevento');       
            $particdeevto = $this->evento_model->mostrar_participantes_evento($idevento);
            $asistentes = $this->evento_model->contar_asistentes_evento($idevento);
            $inasistentes = $this->evento_model->contar_inasistentes_evento($idevento);
            $datos['idevento'] = $idevento;
            $datos['nombreevento'] = $nombreevento;
            $datos['edoevento'] = $edoevento;
            $datos['particdeevto'] = $particdeevto;
            $datos['asistentes'] = $asistentes;
            $datos['inasistentes'] = $inasistentes;
            $this->load->view('/moderador/reporteregistrados_view', $datos);       
        }
    }   
    
    public function enviar_nuevo_evento($nombreevento)
    {   
        /*header("Content-Type: text/html; charset=UTF-8");
        $nombreevento = 'Cómo venderle a un escéptico';*/
        $datosnvoevento = $this->evento_model->mostrar_evento($nombreevento);
        $data_string = urlencode(json_encode($datosnvoevento));
        //$data_string = json_encode($datosnvoevento);
        //$data_string = urlencode($datosnvoevento);
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'http://pietreal.herokuapp.com/json/insertev/?' . $data_string); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = trim(curl_exec($ch));
        curl_close($ch);
        //print $content;
      
        /*redirect ('http://localhost/curl2/index.php?nuevoevento='.$data_string);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('nuevoevento'=>$data_string));
        $result = curl_exec($ch);
        curl_close($ch);*/
    }
    
    public function enviar_eventos_proximos()//organizador
    {   
        header("Content-Type: text/html; charset=UTF-8");
        $datoseventosprox = $this->evento_model->mostrar_eventos_proximos();   
        $url = 'http://localhost/curl2/index.php';        
        $ch = curl_init($url);
        $data_string = urlencode(json_encode($datoseventosprox));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('eventosprox'=>$data_string));

        $result = curl_exec($ch);
        curl_close($ch);
    }
    
    function asignar_partic_evento()//organizador
    {
        /*$this->load->library('form_validation');
        //numero[]
        $this->form_validation->set_rules('idevento','idevento','required|xss_clean|integer');
        //$this->form_validation->set_rules('numero','numero','callback_verificar_particp_null');
        
        if ($this->form_validation->run() == TRUE)
        {*/
            $participantes = $this->input->post('numero');
            $idevento = $this->input->post('idevento');

            for($i = 0; $i < count($participantes); $i++)
            {
                $this->evento_model->asignar_partic_evento($participantes[$i], $idevento);
                $this->evento_model->actualizar_edo_partic_evento($participantes[$i]);
            }                
             echo '<script type="text/javascript">            
                       var retVal = confirm("Usuarios asignados a evento. ¿Desea continuar asignando participantes a algun evento?");
                       if( retVal == false ){
                           window.top.location.href = "' . base_url() . 'index.php/evento/mostrar_eventos_proximos";
                              return false;
                       }else{
                           window.top.location.href = "' . base_url() . 'index.php/usuario/asignar_particip_evento";
                              return true;
                       }      
                    </script>';   
         /*}
         else
         {             
            $proxevtos = $this->evento_model->mostrar_eventos_proximos();
            $usuariosnoasig = $this->usuario_model->mostrar_usuarios_noasig();
            $datos['proxevtos'] = $proxevtos;
            $datos['usuariosnoasig'] = $usuariosnoasig;
            $this->load->view('/organizador/asignarparticaevento_view', $datos);
         }*/
    }
    /*
    function verificar_particp_null($participantes)
    {
        if ($participantes == NULL)        
           return FALSE;        
        else
            return TRUE;   
    }
    /*function personalizar_msj_error()
    { 	 
        $this->form_validation->set_error_delimiters('<span class="alert_error">','</span>');	
        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
        //$this->form_validation->set_message('callback_verificar_particp_null','Debe elegir por lo menos un participante');
    }
    }*/
    private function personalizar_msj_error()
    { 	 
        $this->form_validation->set_error_delimiters('<span class="alert_error">','</span>');	
        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s no puede contener caracteres extraños.');
        $this->form_validation->set_message('exact_length', 'El DNI debe tener 8 dígitos.');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener hasta 12 caracteres.');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener mas de 6 caracteres.');
	$this->form_validation->set_message('integer', 'El %s solo debe tener números enteros.');
        $this->form_validation->set_message('numeric', 'El %s solo debe tener números.');
	$this->form_validation->set_message('valid_email', 'El %s ingresado no es correcto.');
        $this->form_validation->set_message('matches', 'Las contraseñas deben ser idénticas.');
        $this->form_validation->set_message('xss_clean', 'El campo %s no debe tener caracteres extraños.');
        $this->form_validation->set_message('greater_than', 'Debe elegir un moderador.');
        $this->form_validation->set_message('validar_finicio', 'La fecha de inicio debe ser mayor o igual al dia de hoy.');
        $this->form_validation->set_message('validar_ffin', 'La fecha de fin debe ser mayor o igual al dia de hoy.');
        $this->form_validation->set_message('validar_finicio_ffin', 'La fecha de fin debe ser mayor o igual a la fecha de inicio.');
    }
    
    function validar_finicio($finicio)
    {
        if(strtotime(date($finicio)) < (strtotime(date("Y-m-d"))))                  
            return FALSE;
        else
            return TRUE;
    }
    
    function validar_ffin($ffin)
    {
        if(strtotime(date($ffin)) < (strtotime(date("Y-m-d"))))            
            return FALSE;
        else
            return TRUE;
    }
    
    function validar_flimite($flimite)
    {
        if(strtotime(date($flimite)) < (strtotime(date("Y-m-d"))))            
            return FALSE;
        else
            return TRUE;
    }
    
    function validar_finicio_ffin($finicio, $ffin)
    {   //echo 'F. inicio: ' . $finicio . ', F. fin: ' . $ffin;          
        if(strtotime(date($finicio)) > strtotime((date($ffin)))) 
        {   echo 'La fecha de fin debe ser mayor o igual a la fecha de inicio.';
            return FALSE;
        }
        else
            return TRUE;
    }
    
    function validar_hinicio_hfin($hinicio, $hfin)
    {   //echo 'F. inicio: ' . $finicio . ', F. fin: ' . $ffin;          
        if(strtotime(date($hinicio)) > strtotime((date($hfin)))) 
        {   echo 'La hora de fin debe ser mayor o igual a la hora de inicio.';
            return FALSE;
        }
        else
            return TRUE;
    }
    
    public function mostrar_venta_entradas()//organizador
    {
        if ( !$this->validar_sesion() | $this->session->userdata('rol') <> 'organizador' )
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $idevento = $this->input->post('idevento');
            $nombreevento = $this->input->post('nombreevento');
            $datosventas = $this->evento_model->mostrar_venta_entradas($idevento);
            $datos['idevento'] = $idevento;
            $datos['nombreevento'] = $nombreevento;
            $datos['datosventas'] = $datosventas;
            $this->load->view('organizador/ventas_view', $datos);
        }
    }
    
    private function validar_sesion()
    {
        if  ($this->session->userdata('idusuario') == '' || $this->session->userdata('rol') == '' || $this->session->userdata('nombres') == '' || $this->session->userdata('apepat') == '' || $this->session->userdata('apemat') == '' )        
            return FALSE;
        else
            return TRUE;
    }
    
    private function validar_moderador()
    {
        if  ($this->session->userdata('rol') == 'moderador' )
            return TRUE;
        else
            return FALSE;
    }
    
    private function validar_organizador()
    {
        if  ($this->session->userdata('rol') == 'organizador' )
            return TRUE;
        else
            return FALSE;
    }
}

/*
 * (opciones de prueba, solo funciona la primera) http://pietreal.herokuapp.com/interactiv/getsdata

(obtencion y almacenamiento en db django multiple opc de json de enrique): http://pietreal.herokuapp.com/interactiv/getquest?new=1

(preguntas multiple opcion en formato simple) (por id de pregunta!) http://pietreal.herokuapp.com/interactiv/jsonmquest/?id=2

(preguntas a expositor en formato simple) (por id de tema!) http://pietreal.herokuapp.com/interactiv/jsonquestion/?id=1

(preguntas a expositor en formato tastypie) http://pietreal.herokuapp.com/api/question/?format=json

(las preguntas multiple opc en formato tastypie) http://pietreal.herokuapp.com/jsoncho/choices/?format=json 
 */