<?php

class Validaciones extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function validaMonedas($moneda) {
        $query = $this->db->query("SELECT par.val1 FROM reca_parametros par WHERE par.tipo1 = 'TIPO_MONEDAS' AND par.tipo2 = '". $moneda . "' ");
        
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function validaTipoDocumento($tipo) {
        $query = $this->db->query("SELECT par.val1 FROM reca_parametros par WHERE par.tipo1 = 'DOCUMENTO' AND par.tipo2 = '". $tipo . "' ");
        
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function validaConvenio($cliente, $convenio) {
        $query = $this->db->query("SELECT cli.convenio FROM reca_clientes cli WHERE rut_persona = '" . $cliente . "' AND cli.convenio = '" . $convenio . "' ");
        
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}