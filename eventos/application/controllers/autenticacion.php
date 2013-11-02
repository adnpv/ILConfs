<?php

class Autenticacion extends CI_Controller {
    
    function Autenticacion() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('autenticacion_model');
       $this->load->model('evento_model');
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
     $rol = $this->autenticacion_model->obtener_rol($usuario, $contrasenasha1);
     $datosus = $this->autenticacion_model->autenticar_usuario($usuario, $contrasenasha1);  
     
     if ($datosus <> null)
     {
         /*if($datosus['rol'] == "moderador")
         {
            $data['titulo'] = "Moderador"; 
            $data['datosus'] = $datosus;
            $this->load->view('mantenimiento_view', $data);
         }
         elseif ($datosus['rol'] == "organizador") 
         {
            $data['titulo'] = "Moderador"; 
            $data['datosus'] = $datosus;
            $this->load->view('mantenimiento_view', $data);
         }  
            var_dump($datosus[0]);
            var_dump($datosus["3"]); */ 
         $datos['tipoevento'] = 'próximos';
         $datos['datosevento'] = $this->evento_model->mostrar_eventos_proximos();         
         $this->load->view('organizador/eventosproximos_view', $datos);         
     }
     else
     {
         echo "nombre de usuario y/o contraseña incorrectos.";
     }
  }
  
  public function autenticar_participante()
  {
      header("Content-Type: application/json charset=UTF-8");       
      $usuario =  'amunoz';//strval($this->input->post('usuario'));
      $contrasena = '123456';//strval($this->input->post('contrasena'));     
      $contrasenasha1 = sha1($contrasena);
      $rol = $this->autenticacion_model->obtener_rol($usuario, $contrasenasha1);
     
      if ($rol == 'participante')
      {
          $datosus = $this->autenticacion_model->obtener_datos_participante($usuario, $contrasenasha1);
          
          foreach($datosus as $dt)
          {
              $datosus2 = array(
                  'nombre' => $dt->nombres,    
                  'userid' => $dt->idusuario,                                
                  'events' => array(
                      'idevento' => $dt->idevento,
                      'codauth' => 2345,
                    ),
                  'apellido' => $dt->apepat
              );
          }
          //$jsondatosus = json_encode($datosus2);
          //return $jsondatosus;
          $this->output->set_output(json_encode($datosus2));
          
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
          echo 'No es participante, o nombre de usuario y/o contraseña incorrectos.';
  }
  
}

