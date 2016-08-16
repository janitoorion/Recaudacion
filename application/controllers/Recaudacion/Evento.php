<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        $this->load->model('Menus');
        
        /* IDIOMA */
        $idioma = "";
        if ($this->session->userdata('idioma_seleccionado')) {
            $userdata = $this->session->userdata('idioma_seleccionado');
            $idioma = $userdata['idioma'];
        }
        else {
            $userdata = array('idioma' => 'es');
            $this->session->set_userdata('idioma_seleccionado', $userdata);
            $idioma = 'es';
        }
        
        if ($idioma == 'es'){ $this->lang->load('es','spanish'); }
        else { $this->lang->load('en','english'); }
        /* --- */
        
        /* VALIDA LOGIN */
        if (!$this->session->userdata('logged_in')) {
            if ($this->session->userdata('logged_remember')) {
                $userdata = $this->session->userdata('logged_remember');
                $remember = $userdata['remember'];
                $usuario = $userdata['usuario'];
                if ($remember == 'on'){
                    redirect('Lock', 'refresh');
                }
                else{
                    redirect('Login', 'refresh');
                }
            }
            else {
                redirect('Login', 'refresh');
            }
            redirect('Login', 'refresh'); 
        }
        /* --- */
	}

    public function Actividades()	{
                
        $userdata = $this->session->userdata('idioma_seleccionado');
        $datos['idioma_seleccionado'] = $userdata['idioma'];
        $datos['datosUsuario'] = $this->session->userdata('logged_in');
        
        $this->load->model('Actividades');
        
        $datos['grilla'] = $this->Actividades->grilla_cliente_moroso("01/01/2016", "01/01/2017");
        $this->load->view('ajax/Recaudacion/Evento/v_actividades', $datos);
        
	}
    
    public function BuscarDocumentos($cliente, $moroso, $convenio){
        $this->load->model('Documentos');
        $datos['grilla'] = $this->Documentos->grilla_documentos($cliente, $moroso, $convenio);
        $this->load->view('ajax/Recaudacion/Evento/v_documentos', $datos);
    }   
    
}