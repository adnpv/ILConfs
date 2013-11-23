<?php

class Usuario extends CI_Controller {
    
    function Usuario() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('autenticacion_model');
       $this->load->model('usuario_model');
       $this->load->model('evento_model');
       $this->load->helper('url');
       $this->load->helper('form');
       $this->load->library('session');
       $this->personalizar_msj_error();
    }
    
    public function index()
    {       
        if ( $this->validar_sesion() == FALSE)
        {
            redirect ( base_url() . 'index.php/autenticacion?error=2');
        }
        else
        {
            $this->load->view('/organizador/crearusuario_view');
        }
    }
    
    public function insertar_usuario()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('apepat','apellido paterno','required|xss_clean');
        $this->form_validation->set_rules('apemat','apellido materno','required|xss_clean');
        $this->form_validation->set_rules('descripcion','descripcion','xss_clean');
        $this->form_validation->set_rules('nombres','Nombres','required|xss_clean');
        $this->form_validation->set_rules('dni','DNI','required|xss_clean|exact_length[8]|integer');
        $this->form_validation->set_rules('rol','rol','required|xss_clean|alpha_numeric');
        $this->form_validation->set_rules('correo','correo','trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('telefono','telefono','required|xss_clean|integer|min_length[6]');
        $this->form_validation->set_rules('celular','celular','required|xss_clean|integer|min_length[9]');
        $this->form_validation->set_rules('direccion','direccion','required|xss_clean');
        $this->form_validation->set_rules('distrito','distrito','required|xss_clean');
        $this->form_validation->set_rules('usuario','usuario','required|xss_clean|min_length[6]|max_length[12]|alpha_numeric');
        $this->form_validation->set_rules('contrasena1','contraseña','required|xss_clean|min_length[6]|matches[contrasena2]');
        $this->form_validation->set_rules('contrasena2','contraseña de confirmacion','required|xss_clean|min_length[6]');
        
        if ($this->form_validation->run() == TRUE)
        {
            $apepat = $this->input->post('apepat');
            $apemat = $this->input->post('apemat');
            $nombres = $this->input->post('nombres');
            $dni = $this->input->post('dni');
            $descripcion = $this->input->post('descripcion');
            $rol = $this->input->post('rol');
            $correo = $this->input->post('correo');
            $telefono = $this->input->post('telefono');
            $celular = $this->input->post('celular');
            $direccion = $this->input->post('direccion');  
            $distrito = $this->input->post('distrito');  
            $usuario = $this->input->post('usuario');  
            $contrasena1 = $this->input->post('contrasena1'); 
            $datosusuario = array(
                array(
                    'apepat' => $apepat,
                    'apemat' => $apemat,
                    'nombres' => $nombres,
                    'dni' => $dni,
                    'rol' => $rol,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'celular' => $celular,
                    'direccion' => $direccion,
                    'distrito' => $distrito,
                    'usuario' => $usuario,
                    'contrasena' => sha1($contrasena1)
                )
            );
            $idorganizador = $this->session->userdata('idusuario');
            $this->usuario_model->insertar_usuario($datosusuario);
            $idusuario = $this->usuario_model->obtener_idusuario($dni);

            switch ($rol)
            {
                case 'participante': 
                    $datospartic = array(
                        array(
                            'idusuario' => $idusuario,
                            'estado' => 'No asociado'
                        )
                    );
                    $this->usuario_model->insertar_participante($datospartic);
                    $this->enviar_nuevo_participante($idusuario);

                case 'moderador':
                    $this->usuario_model->insertar_moderador($idusuario, $idorganizador);

                case 'organizador':
                    $this->usuario_model->insertar_organizador($idusuario);

                case 'expositor':
                    $this->usuario_model->insertar_expositor($idusuario, $descripcion, $idorganizador);

                /*case 'administrador':
                    $this->usuario_model->insertar_administrador($idusuario);*/
            } 
            echo '<script type="text/javascript">            
                   var retVal = confirm("Usuario registrado. ¿Desea continuar registrando?");
                   if( retVal == false ){
                       window.top.location.href = "' . base_url() . 'index.php/usuario/asignar_particip_evento";
                          return false;
                   }else{
                       window.top.location.href = "' . base_url() . 'index.php/usuario";
                          return true;
                   }      
                </script>';     
        }
        else
        {             
            $this->load->view('/organizador/crearusuario_view');
        }
    }
    
    private function personalizar_msj_error()
    { 	 
        $this->form_validation->set_error_delimiters('<span class="alert_error">','</span>');	
        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s no puede contener caracteres extraños.');
        $this->form_validation->set_message('exact_length', 'El DNI debe tener 8 dígitos.');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener hasta 12 caracteres.');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener mas de 6 caracteres.');
	$this->form_validation->set_message('integer', 'El %s solo debe tener números.');
	$this->form_validation->set_message('valid_email', 'El %s ingresado no es correcto.');
        $this->form_validation->set_message('matches', 'Las contraseñas deben ser idénticas.');
        $this->form_validation->set_message('xss_clean', 'El campo %s no debe tener caracteres extraños.');
    }
    
    public function asignar_particip_evento()
    {
        $proxevtos = $this->evento_model->mostrar_eventos_proximos();
        $usuariosnoasig = $this->usuario_model->mostrar_usuarios_noasig();
        $datos['proxevtos'] = $proxevtos;
        $datos['usuariosnoasig'] = $usuariosnoasig;
        $this->load->view('/organizador/asignarparticaevento_view', $datos);
    }
    public function enviar_nuevo_participante($idusuario)//enviar cada vez q se crea un nuevo partic
    {
        header("Content-Type: text/html; charset=UTF-8");                  
        $nvousuario = $this->usuario_model->obtener_datos_usuario($idusuario);
        $url = 'http://localhost/curl2/index.php';  
        $ch = curl_init($url);
        $data_string = urlencode(json_encode($nvousuario));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array("nvousuario"=>$data_string));
        $result = curl_exec($ch);
        curl_close($ch);   
    }
    
    private function validar_sesion()
    {
        if  ($this->session->userdata('rol') ==  '' || $this->session->userdata('nombres') ==  ''  || $this->session->userdata('apepat') ==  ''  || $this->session->userdata('apemat') == '')        
            return FALSE;
        else
            return TRUE;
    }
    
}
