<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('validar_sesion'))
{
    function validar_sesion()
    {
        if  ($this->session->userdata('rol') ==  '' || $this->session->userdata('nombres') ==  ''  || $this->session->userdata('apepat') ==  ''  || $this->session->userdata('apemat') == '')
        
            return FALSE;
        else
            return TRUE;
    }
}
