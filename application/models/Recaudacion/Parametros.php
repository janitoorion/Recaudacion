<?php

class Parametros extends CI_Model {
    function __construct() {
        parent::__construct();
    }
        
    public function lista_estados($estado){
        $query = $this->db->query("SELECT par.id_parametro, par.tipo1, par.tipo2, par.val1, par.val2 , par.estado 
                                     FROM reca_parametros par 
                                    WHERE par.estado in (".$estado.")
                                      AND par.tipo1 = 'ESTADOS'");
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
	}
    
    function cbo_estados($estado) {
        $result = $this->lista_estados($estado);
        $cuerpo = '';
        if (!$result) {} 
        else {
            foreach ($result as $row) {
                $cuerpo = $cuerpo . '<option value="' . $row->tipo2 . '">' . $row->val1 . '</option>';
            }    
        }
        
        return $cuerpo;
    }
    
    function cbo_estados2($estado) {
        $result = $this->lista_estados($estado);
        $cuerpo = '';
        if (!$result) {} 
        else {
            foreach ($result as $row) {
                $cuerpo = $cuerpo . '<option value="' . $row->tipo2 . '">' . $row->val2 . '</option>';
            }    
        }
        
        return $cuerpo;
    }
}
