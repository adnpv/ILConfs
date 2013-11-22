<?php

class Tema extends CI_Controller {
    
    function Tema() {
       parent::__construct(); //llamada al constructor de Model.
       $this->load->model('evento_model');
       $this->load->model('tema_model');
       $this->load->model('usuario_model');
       $this->load->helper('url');
       $this->load->library('session');       
    }
    
    public function abrir_consultas()
    {
        $idtema = $this->input->get('idtema');         
        $idevento = $this->input->get('idevento');
        $nombreevento = $this->input->post('nombreevento'); 
        /*$aviso = array(
          'aviso' => 1,  
          'idevento' => $idevento,
          'idusuario' => $idusuario,   
          'idtema' => $idtema
        );   */ 
        $this->tema_model->abrir_ronda_consultas($idtema); 
        redirect( base_url() . 'index.php/tema/mostrar_temas_evento?idevento='. $idevento . '&nombreevento=' . $nombreevento);       
        /*$url = 'http://localhost/curl2/index.php';        
        $ch = curl_init($url);
        $data_string = urlencode(json_encode($aviso));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('aviso'=>$data_string));
        $result = curl_exec($ch);
        curl_close($ch);  */          
    }
    
    public function cerrar_consultas()
    {
        $idtema = $this->input->get('idtema');
        $idevento = $this->input->get('idevento');
        $nombreevento = $this->input->post('nombreevento'); 
        $this->tema_model->cerrar_ronda_consultas($idtema); 
        redirect( base_url() . 'index.php/tema/mostrar_temas_evento?idevento='.$idevento.'&nombreevento='.$nombreevento);       
    }    
    
    public function cerrar_ronda_consultas()
    {
        $idtema = $this->input->get('idtema');
        $idevento = $this->input->get('idevento');
        $nombreevento = $this->input->post('nombreevento'); 
        $this->tema_model->cerrar_ronda_consultas($idtema); 
        redirect( base_url() . 'index.php/tema/mostrar_temas_expositor?idevento='.$idevento.'&nombreevento='.$nombreevento);       
    }      
    
    public function insertar_tema_expositor()
    {    //agregar descripcion al tema y evento
        //ver mandar preguntas todo pot get
        $idevento = $this->input->post('idevento');
        $nombreevento = $this->input->post('nombreevento');
        $nombretema = $this->input->post('tema');
        /*$hinicio = $this->input->post('hinicio');
        $hfin = $this->input->post('hfin');*/
        $descripcion = $this->input->post('descripcion');
        $idexpositor = $this->input->post('idexpositor');
        $datosnvotema = array(
            array(
                'nombre' => $nombretema,
                /*'horainicio' => $hinicio,
                'horafin' => $hfin,*/
                'descripcion' => $descripcion, 
                'idevento' => $idevento,
                'idusuario' => $idexpositor,
                'rondapreguntas' => 0,
                'rondaconsultas' => 0
                ),
        );
        $this->tema_model->insertar_tema_expositor($datosnvotema);
        $this->enviar_nuevo_tema($nombretema, $idevento);
        $this->agregar_tema_expositor($nombreevento, $idevento);          
    }
    
    public function enviar_nuevo_tema($nombretema, $idevento)
    {   
        /*$idevento = 1;
        $nombretema = 'Novedades de HTML5';
        $datosnvotema = $this->tema_model->mostrar_tema($nombretema, $idevento);
        $url = 'http://localhost/curl2/index.php';        
        $ch = curl_init($url);
        $data_string = urlencode(json_encode($datosnvotema));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array("nuevotema"=>$data_string));
        $result = curl_exec($ch);
        curl_close($ch);       
        $idevento = 1;
        $nombretema = 'Novedades de HTML5';*/
        $datosnvotema = $this->tema_model->mostrar_tema($nombretema, $idevento);
        $data_string = urlencode(json_encode($datosnvotema));
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'http://pietreal.herokuapp.com/json/insertop/?' . $data_string); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = trim(curl_exec($ch));
        curl_close($ch);
       // echo $content;
    }
    
    public function agregar_tema_expositor($nombreevento, $idevento)
    {        
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;        
        $datos['datosexpositor'] = $this->usuario_model->mostrar_expositores();
        $datos['tema_expo'] = $this->tema_model->mostrar_tema_expositor_evento($idevento);
        $this->load->view('/organizador/agregartemaexpo_view', $datos);
    }
    
    public function mostrar_temas_evento()
    {
        $idevento = $this->input->get('idevento');         
        $nombreevento = $this->input->get('nombreevento');          
        $temas_evto = $this->tema_model->mostrar_temas_evento($idevento);
        $datos['idevento'] = $idevento;        
        $datos['nombreevento'] = $nombreevento;  
        $tipoevento = $this->input->post('tipoevento');     
        $datos['temas_evto']  = $temas_evto;
        $this->load->view('/moderador/temas_view', $datos);        
    }
            
    public function mostrar_tema_expositor()    
    {
        $idevento = $this->input->post('idevento');         
        $nombreevento = $this->input->post('nombreevento'); 
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $tema_expo = $this->tema_model->mostrar_tema_expositor_evento($idevento);
        $datos['tema_expo'] = $tema_expo;
        $this->load->view('/expositor/temas_view', $datos);
    }
    
    public function mostrar_temas_expositor()    
    {
        $idevento = $this->input->get('idevento');
        $nombreevento = $this->input->get('nombreevento');
        $datos['idevento'] = $idevento;
        $datos['nombreevento'] = $nombreevento;
        $datos['tema_expo'] = $this->tema_model->mostrar_tema_expositor_evento($idevento);
        $this->load->view('/expositor/temas_view', $datos);
    }       
    
    public function subir_archivos()
    {
        $idtema = $this->input->post('idtema');
        $nombretema = $this->input->post('nombretema');
        $nombreevento = $this->input->post('nombreevento');
        $lista = $this->listar_archivos();
        $datos['idtema'] = $idtema;
        $datos['nombretema'] = $nombretema;
        $datos['nombreevento'] = $nombreevento;
        $datos['lista'] = $lista;
        $this->load->view('/organizador/subirarchivos_view', $datos);                
    }
    
    public function cargar_archivo()
    {   //http://php.net/manual/es/ftp.examples-basic.php 
        $this->load->library('ftp');
        $config['hostname'] = 'pitreal.hostei.com';        
        $config['username'] = 'a2968841';  
        $config['password'] = 'pitreal.hostei.com';
        $config['debug'] = TRUE;
        $this->ftp->chmod('/public_html/eventos/archivos', DIR_WRITE_MODE);
        
        $archivo = $_FILES["archivo"];
        $nombrearchivo = $archivo['name'];        
        $this->ftp->connect($config);
        
        $this->ftp->upload('.', '/public_html/eventos/archivos');
        //$this->ftp->upload('', '/public_html/eventos/archivos');
        
        $this->ftp->close();
        /*$config['upload_path'] = base_url() . 'archivos';
        $config['allowed_types'] = 'gif|jpg|png|pdf|txt|doc|docx|ppt|pptx|xls|xlsx';
        $config['max_size'] = '5000';   
        $this->load->library('upload', $config);
        var_dump(is_dir(base_url() . 'archivos')); 
        echo '<br><br>';
        echo base_url() . 'archivos';
        echo '<br><br>';
        if ( ! $this->upload->do_upload('archivo'))
        {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
        else
        {
            $datos = array('upload_data' => $this->upload->data());
            var_dump($datos);
        }
        $idtema = $this->input->post('idtema');
        $nombretema = $this->input->post('nombretema');
        $nombreevento = $this->input->post('nombreevento');     
        $datos['idtema'] = $idtema;
        $datos['nombretema'] = $nombretema;
        $datos['nombreevento'] = $nombreevento;
        $this->load->view('/organizador/subirarchivos_view', $datos);
        /*$archivo = $_FILES["archivo"];

        /*if (($archivo['size']) > (50*1024)) {

                header('Location: index.php?error=1');//tarea: validar tamaño, tipo, 
                exit;//crear una pg que permita subir varios archivos p ej 30(dinamico)
                //funcion que lee los archivos de un directorio
        }
         * 
        $filename = $archivo['name'];
        $ext = substr(strrchr($filename, '.'), 1);
        
        if ($ext <> "jpg"){

                header('Location: index.php?error=2');
                exit;
        }

        if ($filename == ""){

               echo "no hay archvo para subir";
        }
        # Sirve para mostrar la info de un arreglo
        # $a = array("a","b");
        # print_r($archivo);
        # echo sizeof($a);
        #Movemos elarchivo de la ruta temporal a una carpeta

        $random = rand(0,100000);

        //$ruta_final  = 'fotos_subidas/' . $random . $archivo["name"];
        $ruta_final  = base_url() . 'archivos/' . $archivo["name"];
        move_uploaded_file($archivo['tmp_name'], $ruta_final) ;*/                        
    }
    public function listar_archivos()
    {
        header("Content-Type: text/html; charset=UTF-8");
        $this->load->library('ftp');
        $config['hostname'] = 'pitreal.hostei.com';        
        $config['username'] = 'a2968841';  
        $config['password'] = 'pitreal.hostei.com';
        $config['debug'] = TRUE;          
        $this->ftp->connect($config);
        
        if ( ! $this->ftp->connect($config))
        {
            echo 'No se pudo conectar';
        }
        else
        {
            $lista = $this->ftp->list_files('/public_html/eventos/archivos');
        }
       return $lista;
     }
}