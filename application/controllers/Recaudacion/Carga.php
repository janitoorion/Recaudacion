<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carga extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
        $this->load->model('Menus');
        $this->load->model('Utiles');
        $this->load->model('Recaudacion/Cargas');
        $this->load->model('Recaudacion/Clientes');
        $this->load->model('Recaudacion/Validaciones');
        
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
    
    /* SUBIR ARCHIVO */
    public function SubirArchivo($recarga = false)
    {
        $userdata = $this->session->userdata('idioma_seleccionado');
        $datos['idioma_seleccionado'] = $userdata['idioma'];
        $datos['datosUsuario'] = $this->session->userdata('logged_in');
        $datos['tituloPagina'] = 'Subir Excel';
        $datos['subTituloPagina'] = 'Carga de datos al sistema';
        
        $datos['cboClientes'] = $this->Clientes->cbo_clientes("1", FALSE);
        
        if (!$recarga){
            $this->load->view('ajax/Recaudacion/Carga/v_subir_archivo', $datos);
        } else {
            $resp = $this->load->view('ajax/Recaudacion/Carga/v_subir_archivo', $datos, true);
            echo $resp;
        }
    }

    public function Subir()
    {
        $fecha = new DateTime();
        $timestamp = $fecha->getTimestamp();
        
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'xls|xlsx';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = 'CAREXCEL_' . $timestamp;
        $config['file_ext_tolower']     = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {       
                $datos['tituloPagina'] = 'Subir Excel';
                $datos['subTituloPagina'] = 'Carga de datos al sistema';
                
                $datos['error'] = $this->upload->display_errors();
                
                $msg = $this->load->view('ajax/Recaudacion/Carga/v_subir_error', $datos, true);
                echo $msg;
        }
        else
        {
                $rutCliente = $this->input->post('cboClientes');
                $clientes = $this->Clientes->datos_cliente($rutCliente);
                $nombreCliente = "";
                foreach ($clientes as $cliente) {
                    $nombreCliente = $cliente->nombre;
                }
                $datos['rutCliente'] = $rutCliente;
                $datos['nombreCliente'] = $nombreCliente;
                
                $userdata = $this->session->userdata('idioma_seleccionado');
                $datos['idioma_seleccionado'] = $userdata['idioma'];
                $datos['datosUsuario'] = $this->session->userdata('logged_in');
                $datos['tituloPagina'] = 'Subir Excel';
                $datos['subTituloPagina'] = 'Carga de datos al sistema';
                                
                $archivo = array('upload_data' => $this->upload->data());
                foreach ($archivo as $info) {
                    $ruta = 'uploads/' . $info['file_name'];
                }
                /*
                $test = $this->Cargas->CrearGrillaCargaExcel($ruta);
                $conta = 0;
                foreach ($test as $row) {
                    if ($conta > 0){
                        echo date_format(date_create_from_format('m-d-y', $row['H']), 'Y-m-d');
                        echo "</br>";
                        echo substr(date_format(date_create_from_format('m-d-y', $row['H']), 'Y-m-d'),0,4); //año
                        echo "</br>";
                        echo substr(date_format(date_create_from_format('m-d-y', $row['H']), 'Y-m-d'),5,2); //mes
                        echo "</br>";
                        echo substr(date_format(date_create_from_format('m-d-y', $row['H']), 'Y-m-d'),8,2); //dia
                        echo "</br>";
                    }
                    
                    $conta = $conta + 1;
                }
                */
                
                $datos['grilla'] = $this->Cargas->CrearGrillaCargaExcel($ruta);
                unlink($ruta);                
                
                $msg = $this->load->view('ajax/Recaudacion/Carga/v_subir_archivo2', $datos, true);
                echo $msg;
        }
    }
    
    public function ProcesarArchivo()
    {
        $usuarioLog = $this->session->userdata('logged_in');
        
        $cliente = $this->input->post('cliente');
        $jsonData = $this->input->post('data');
        $data = json_decode($jsonData, true);
        
        $idCarga = 0;
                
        $datosNo = array();
        $array = $data;
        $cont = 0;   
        $contProcesados = 0;             
        foreach($data as $row){ 
            foreach($row as $fila){
               $validacion = $this->ValidarRegistro($fila, $cliente);
               
               if ($validacion == "OK"){
                    if ($idCarga == 0){
                        $datosCab = array( 'rut_cliente' => $cliente,
                                        'fecha_carga' => date("Y-m-d H:i:s"),
                                        'cantidad' => 0,
                                        'usuario' => $usuarioLog['usuario'],
                                        'estado' => 1);
                        $idCarga = $this->Cargas->insertar_carga($datosCab);
                    }
                   
                    $datos = array( 'id_carga' => $idCarga,
                                    'rut_cliente' => $cliente,
                                    'rut_moroso' => $fila["Rut_Moroso"],
                                    'nombre_moroso' => $fila["Nombre_Moroso"],
                                    'moneda' => $fila["Moneda"],
                                    'tipo_documento' => $fila["Tipo"],
                                    'folio' => $fila["Folio"],
                                    'monto' => $fila["Monto"],
                                    'monto_pendiente' => $fila["Monto_Pendiente"],
                                    'fecha_emision' => $fila["Fecha_Emision"],
                                    'fecha_vencimiento' => $fila["Fecha_Vencimiento"],
                                    'convenio' => $fila["Convenio"],
                                    'cuota' => $fila["Cuota"],
                                    'estado' => 1
                                    );
                    $this->Cargas->insertar_carga_det($datos);
                    $contProcesados = $contProcesados + 1;
               } else {
                   $cont = $cont +1;
                   array_push($datosNo, array('fila' => $fila["Fila"],
                                              'Error' => $validacion,
                                              'rut_moroso' => $fila["Rut_Moroso"],
                                              'nombre_moroso' => $fila["Nombre_Moroso"],
                                              'moneda' => $fila["Moneda"],
                                              'tipo_documento' => $fila["Tipo"],
                                              'folio' => $fila["Folio"],
                                              'monto' => $fila["Monto"],
                                              'monto_pendiente' => $fila["Monto_Pendiente"],
                                              'fecha_emision' => $fila["Fecha_Emision"],
                                              'fecha_vencimiento' => $fila["Fecha_Vencimiento"],
                                              'convenio' => $fila["Convenio"],
                                              'cuota' => $fila["Cuota"])
                  );
               }
            }
        }
        
        if ($contProcesados > 0){
            $datos = array( 'cantidad' => $contProcesados);
            $this->Cargas->update_carga($idCarga, $datos);
        }
        
        if ($cont > 0){
            $datos['grillaVisible'] = '';
            $datos['grilla'] = $this->Cargas->grilla_no_cargados($datosNo);
            $datos['tituloPagina'] = 'Subir Excel';
            $datos['subTituloPagina'] = 'Carga de datos al sistema';
            
            $datos['tipoMensaje'] = "class='alert alert-block alert-warning'";
            $datos['tituloMensaje'] = "Proceso completo";
            $datos['mensaje'] = "No todos los registro fueron cargados al sistema, a continuación se muestra un listados con los registros no procesados.";
            
            $msg = $this->load->view('ajax/Recaudacion/Carga/v_subir_archivo3', $datos, true);
            echo $msg;
        }
        else{
            $datos['grillaVisible'] = 'style="display:none;"';
            $datos['grilla'] = $this->Cargas->grilla_no_cargados(array());
            $datos['tituloPagina'] = 'Subir Excel';
            $datos['subTituloPagina'] = 'Carga de datos al sistema';
            $datos['tipoMensaje'] = "class='alert alert-block alert-success'";
            $datos['tituloMensaje'] = "Procesado con exito";
            $datos['mensaje'] = "Todos los registro fueron cargados al sistema con exito.";
            
            $msg = $this->load->view('ajax/Recaudacion/Carga/v_subir_archivo3', $datos, true);
            echo $msg;
        }
        
        
    }
        
    public function ValidarRegistro($fila, $cliente){
        $errores = '';
        
        if($fila["Procesar"] == "0"){
            $errores = $errores . "Registro omitido por usuario";
        } 
        else{
            if ($fila["Rut_Moroso"] == "") {
                $errores = $errores . "Campo rut moroso no tiene valor - ";
            }
            elseif (!$this->Utiles->validaRut($fila["Rut_Moroso"])){
                $errores = $errores . "Rut moroso no válido - ";
            }
            
            if ($fila["Nombre_Moroso"] == "") {
                $errores = $errores . "Campo nombre moroso no tiene valor - ";
            }
            
            if ($fila["Moneda"] == "") {
                $errores = $errores . "Campo moneda no tiene valor - ";
            }
            elseif (!$this->Validaciones->validaMonedas($fila["Moneda"])){
                $errores = $errores . "Moneda no válida - ";
            }
            
            if ($fila["Tipo"] == "") {
                $errores = $errores . "Campo tipo documento no tiene valor - ";
            }
            elseif (!$this->Validaciones->validaTipoDocumento($fila["Tipo"])){
                $errores = $errores . "Tipo documento no válido - ";
            }
            
            if ($fila["Folio"] == "") {
                $errores = $errores . "Campo folio no tiene valor - ";
            }
            
            if ($fila["Monto"] == "") {
                $errores = $errores . "Campo monto no tiene valor - ";
            }
            elseif (!is_numeric($fila["Monto"])){
                $errores = $errores . "Monto no válido - ";
            }
            elseif ($fila["Monto"] <= 0){
                $errores = $errores . "Monto debe ser mayor a 0 - ";
            }
            
            if ($fila["Monto_Pendiente"] == "") {
                $errores = $errores . "Campo monto pendiente no tiene valor - ";
            }
            elseif (!is_numeric($fila["Monto_Pendiente"])){
                $errores = $errores . "Monto pendiente no válido - ";
            }
            
            if ($fila["Fecha_Emision"] == "") {
                $errores = $errores . "Campo fecha emisión no tiene valor - ";
            }
            elseif (!checkdate(substr($fila["Fecha_Emision"],5,2), substr($fila["Fecha_Emision"],8,2), substr($fila["Fecha_Emision"],0,4))){ //mes - dia - año
                $errores = $errores . "Fecha emisión no válida - ";
            }
            
            if ($fila["Fecha_Vencimiento"] == "") {
                $errores = $errores . "Campo fecha vencimiento no tiene valor - ";
            }
            elseif (!checkdate(substr($fila["Fecha_Vencimiento"],5,2), substr($fila["Fecha_Vencimiento"],8,2), substr($fila["Fecha_Vencimiento"],0,4))){ //mes - dia - año
                $errores = $errores . "Fecha vencimiento no válida - ";
            }
            elseif (strtotime($fila["Fecha_Vencimiento"]) < strtotime($fila["Fecha_Emision"])){
                $errores = $errores . "Fecha vencimiento no puede ser menor a la fecha emisión - ";
            }
            
            if ($fila["Convenio"] == "") {
                $errores = $errores . "Campo convenio no tiene valor - ";
            }
            elseif (!$this->Validaciones->validaConvenio($cliente, $fila["Convenio"])){ 
                $errores = $errores . "Convenio no válido - ";
            }
            
            if ($fila["Cuota"] == "") {
                $errores = $errores . "Campo cuota no tiene valor - ";
            }
            elseif (!is_numeric($fila["Cuota"])){ 
                $errores = $errores . "Cuota no válida - ";
            }
            
        }
                
        if($errores == '') {
            if (!$this->Cargas->validar_carga_det($cliente, $fila["Rut_Moroso"], $fila["Folio"], $fila["Tipo"], $fila["Cuota"], $fila["Convenio"])){ 
                $errores = $errores . "Documento ya existe en el sistema con esas caracteristicas";
                return $errores;
            } else {
                return "OK";
            }
        }
        else{
            return $errores;
        }
    }
    /* --- */
    
    /* LISTADO CARGAS */
    public function ListadoCargas($recarga = false)
    {
        $userdata = $this->session->userdata('idioma_seleccionado');
        $datos['idioma_seleccionado'] = $userdata['idioma'];
        $datos['datosUsuario'] = $this->session->userdata('logged_in');
        $datos['tituloPagina'] = 'Cargas Efectuadas';
        $datos['subTituloPagina'] = 'Listado de datos cargados al sistema';
        
        $datos['cboClientes'] = $this->Clientes->cbo_clientes("1", FALSE);
        
        if (!$recarga){
            $this->load->view('ajax/Recaudacion/Carga/v_listado_cargas', $datos);
        } else {
            $resp = $this->load->view('ajax/Recaudacion/Carga/v_listado_cargas', $datos, true);
            echo $resp;
        }
    }
    
    public function ListadoCargasBusc(){
        $fecIni = $this->input->post('startdate');
        $fecFin = $this->input->post('finishdate');
        $rutCliente = $this->input->post('cboClientes');
        
        $clientes = $this->Clientes->datos_cliente($rutCliente);
        $nombreCliente = "";
        foreach ($clientes as $cliente) {
            $nombreCliente = $cliente->nombre;
        }
        $datos['rutCliente'] = $rutCliente;
        $datos['nombreCliente'] = $nombreCliente;
        
        $userdata = $this->session->userdata('idioma_seleccionado');
        $datos['idioma_seleccionado'] = $userdata['idioma'];
        $datos['datosUsuario'] = $this->session->userdata('logged_in');
        $datos['tituloPagina'] = 'Cargas Efectuadas';
        $datos['subTituloPagina'] = 'Listado de datos cargados al sistema';
                
        $datos['grilla'] = $this->Cargas->grilla_cargas_efectuadas($rutCliente, $fecIni, $fecFin);
        
        $msg = $this->load->view('ajax/Recaudacion/Carga/v_listado_cargas2', $datos, true);
        echo $msg;
    }
    /* --- */    
}