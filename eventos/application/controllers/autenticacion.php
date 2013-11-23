<?php

class Autenticacion extends CI_Controller {
    
    function Autenticacion() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('autenticacion_model');
       $this->load->model('evento_model');
       $this->load->model('usuario_model');
       $this->load->helper('url');
       $this->load->library('session');
    }
    
    public function index()            
    {
        $this->load->view('/login_view');
    }
    
    public function expositor()    
    {        
        $datos['datosevento']  = $this->evento_model->mostrar_eventos_proximos();        
        $this->load->view('/expositor/eventos_view', $datos);
    }

    public function autenticar() 
    {        
     $usuario =  $this->input->post('usuario');
     $contrasena = $this->input->post('contrasena');     
     $contrasenasha1 = sha1($contrasena);
     //$rol = $this->autenticacion_model->obtener_rol($usuario, $contrasenasha1);
     $datosus = $this->autenticacion_model->autenticar_usuario($usuario, $contrasenasha1);  
     
     if ($datosus <> null)
     {
         foreach($datosus as $dtus)
         {
             $sessionusuario = array(
                 'idusuario' => $dtus->idusuario,
                 'usuario' => $dtus->usuario,
                 'nombres' => $dtus->nombres,
                 'apepat' => $dtus->apepat,
                 'apemat' => $dtus->apemat,
                 'rol' => $dtus->rol
             );             
         }
         $this->session->set_userdata($sessionusuario);
         if($datosus[0]->rol == 'moderador')
         {
            redirect (base_url() . 'index.php/evento/mostrar_eventos');
         }
         elseif ($datosus[0]->rol == 'organizador') 
         {
            $datos['tipoevento'] = 'pr�ximos';
            $datos['datosevento'] = $this->evento_model->mostrar_eventos_proximos($this->session->userdata('idusuario'));         
            redirect (base_url() . 'index.php/evento/mostrar_eventos_proximos');
         }                 
         elseif ($datosus[0]->rol == 'expositor') 
         {             
             redirect(base_url() . 'index.php/evento/mostrar_eventos_expositor');
         }         
     }
     else
     {
         redirect ( base_url() . 'index.php/autenticacion?error=1');
     }
  }
  
  public function autenticar_participante()
  {
      header("Content-Type: application/json charset=UTF-8");       
      $usuario = strval($this->input->post('usuario'));
      $contrasena = strval($this->input->post('contrasena'));     
      $contrasenasha1 = sha1($contrasena);
      $rol = $this->autenticacion_model->obtener_rol($usuario, $contrasenasha1);
     
      /*if ($rol == 'participante')
      {*/
      $datosus = $this->autenticacion_model->obtener_datos_participante($usuario, $contrasenasha1);
      
      if ($datosus <> null)
      {
          foreach($datosus as $dt)
          {
              $datosus2 = array(
                  'nombre' => $dt->nombres,    
                  'userid' => $dt->idusuario,                                
                  'events' => array(
                      
                      array(
                            'idevento' => $dt->idevento,
                            'codauth' => $dt->codigo,
                        ),
                        // array(
                        //     'idevento' => 23,//$dt->idevento,
                        //     'codauth' => 2345,
                        // ),
                    ),
                  'apellido' => $dt->apepat
              );
          }
          //$jsondatosus = json_encode($datosus2);
          //return $jsondatosus;
          $this->output->set_output(json_encode($datosus2));
          //mandar todos los eventos en los q el usuario
          //estuvo, asi sean pasados
          /*$url = 'http://localhost/curl2/index.php';        
          $ch = curl_init($url);
          $data_string = urlencode(json_encode($datosus));
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
          curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
          curl_setopt($ch, CURLOPT_POSTFIELDS, array("nuevotema"=>$data_string));
          $result = curl_exec($ch);
          curl_close($ch);*/
      }
      else
          redirect ( base_url() . 'index.php/autenticacion?error=1');
    }
    
    public function cerrar_sesion()
    {
        /*echo '<script type="text/javascript">            
                   var retVal = confirm("�Est� seguro que desea salir de la aplicaci�n?");
                   if( retVal == false ){
                       window.top.location.href = "' . base_url() . 'index.php/usuario/asignar_particip_evento";
                          return false;
                   }else{
                       window.top.location.href = "' . base_url() . 'index.php/usuario";
                          return true;
                   }      
                </script>';     */
        $this->session->sess_destroy();
        redirect ( base_url() . 'index.php/autenticacion/');
    }
    
    public function aut_org()
    {
        //$this->session->sess_destroy();
        $usuario = $this->input->post('usuario');
        $contrasenasha1 = $this->input->post('contrasena');   
        //$rol = $this->autenticacion_model->obtener_rol($usuario, $contrasenasha1);
        $datosus = $this->autenticacion_model->autenticar_usuario($usuario, $contrasenasha1);       
        foreach($datosus as $dtus)        
        {
            $sessionusuario = array(
                'idusuario' => $dtus->idusuario,
                'usuario' => $dtus->usuario,
                'nombres' => $dtus->nombres,
                'apepat' => $dtus->apepat,
                'apemat' => $dtus->apemat,
                'rol' => $dtus->rol
            );   
        }            
        $this->session->set_userdata($sessionusuario);
              
        if ($datosus <> null)
        {  
            if ($datosus[0]->rol == 'usuario')
            {
                $this->usuario_model->cambiar_organizador($usuario, $contrasenasha1);
                $this->usuario_model->insertar_organizador_uc($usuario, $contrasenasha1);
                $this->session->set_userdata('rol', 'organizador');
                $datos['tipoevento'] = 'proximos';
                $datos['datosevento'] = $this->evento_model->mostrar_eventos_proximos($this->session->userdata('idusuario'));         
                redirect (base_url() . 'index.php/evento/mostrar_eventos_proximos');
            }           
            
            if ($datosus[0]->rol == 'organizador') 
            {
                 $datos['tipoevento'] = 'proximos';
                 $datos['datosevento'] = $this->evento_model->mostrar_eventos_proximos($this->session->userdata('idusuario'));         
                 redirect (base_url() . 'index.php/evento/mostrar_eventos_proximos');
            }   
            else
            {
                redirect ( base_url() . 'index.php/autenticacion?error=1');
            }            
        }  
        else
        {
            redirect ( base_url() . 'index.php/autenticacion?error=1');
        }           
    }
}

