<?php

class Logins extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function busca_usuario_login($username){
		$query = $this->db->query("SELECT usu.id, usu.usuario, usu.nombre, usu.password, usu.id_perfil, sis.id id_sistema 
                                     FROM glob_usuarios usu, glob_perfil per, glob_sistema sis 
                                    WHERE usu.estado = 1 and usu.usuario = '" . $username . "' 
                                      AND per.id = usu.id_perfil 
                                      AND per.estado = 1 
                                      AND sis.id = per.id_sistema 
                                      AND sis.estado = 1");

		if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
	}
    
}
